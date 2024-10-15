<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class petugasController extends Controller
{
    public function loginAction(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return back()->withErrors([
            'username' => 'Username atau Password Anda Salah',
        ]);
    }

    public function login()
    {
        $title = 'Login';
        return view('petugas.login', compact('title'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
    public function password()
    {
        $title = 'Ubah Password';
        return view('petugas.password', compact('title'));
    }
    public function passwordAction(Request $request)
    {
        $request->validate([
            'pass1' => 'required',
            'pass2' => 'required',
            'pass3' => 'required',
        ]);

        if (!Hash::check($request->pass1, Auth::petugas()->password)) {
            return back()->withErrors(['pass1' => 'Password lama salah']);
        }

        if ($request->pass2 != $request->pass3) {
            return back()->withErrors(['pass2' => 'Password baru dan konfirmasi password baru harus sama']);
        }

        Petugas::where('id', Auth::id())->update([
            'password' => Hash::make($request->pass2)
        ]);

        return redirect()->route('petugas.password')->with(['message' => 'Password berhasil diubah!']);
    }

    public function index(Request $request)
    {
        $title = 'Petugas';
        $q = $request->query('q');
        $petugass = Petugas::where('nama_petugas', 'like', '%' . $q . '%')
            ->paginate(10)
            ->withQueryString();
        $no = $petugass->firstItem();
        return view('petugas.index', compact('title', 'petugas', 'q', 'no'));
    }
    public function destroy(Petugas $petugas)
    {
        $petugas->delete();
        return redirect()->route('petugas.index')->with(['message' => 'Data Terhapus']);
    }
    public function edit(Petugas $petugas)
    {
        $title = 'Ubah Petugas';
        $levels = ['admin', 'petugas'];
        return view('petugas.edit_pet', compact('title', 'petugas', 'levels'));
    }
    public function create()
    {
        $title = 'Tambah Petugas';
        $levels = ['admin', 'petugas'];
        return view('petugas.tambah_pet', compact('title', 'levels'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'email_petugas' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);
        if (Petugas::where('username', $request->username)->first())
            return back()->withErrors(['username' => 'Username Sudah Terdaftar!']);

        $petugas = new Petugas($request->all());
        $petugas->password = Hash::make($request->password);
        $petugas->save();
        return redirect()->route('petugas.index')->with(['message' => 'Data Berhasil Ditambah!']);
    }
    public function update(Petugas $petugas, Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'email_petugas' => 'required',
            'level' => 'required',
            'password' => 'required',
        ]);
        if (Petugas::where('username', $request->username)->where('id', '<>', $petugas->id)->first())
            return back()->withErrors(['username' => 'Username Sudah Terdaftar!']);

        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->username = $request->username;
        $petugas->email_petugas = $request->email_petugas;
        if ($request->password)
            $petugas->password = Hash::make($request->password);
        $petugas->level = $request->level;
        $petugas->save();
        return redirect()->route('petugas.index')->with(['message' => 'Data Berhasil Diubah!']);
    }
}