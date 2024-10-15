<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PetugasLoginController extends Controller
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
        return view('user.login', compact('title'));
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
        return view('user.password', compact('title'));
    }
    public function passwordAction(Request $request)
    {
        $request->validate([
            'pass1' => 'required',
            'pass2' => 'required',
            'pass3' => 'required',
        ]);

        if (!Hash::check($request->pass1, Auth::user()->password)) {
            return back()->withErrors(['pass1' => 'Password lama salah']);
        }

        if ($request->pass2 != $request->pass3) {
            return back()->withErrors(['pass2' => 'Password baru dan konfirmasi password baru harus sama']);
        }

        User::where('id_user', Auth::id())->update([
            'password' => Hash::make($request->pass2)
        ]);

        return redirect()->route('user.password')->with(['message' => 'Password berhasil diubah!']);
    }

    public function index(Request $request)
    {
        $title = 'Data User';
        $q = $request->query('q');
        $users = User::where('nama_user', 'like', '%' . $q . '%')
            ->paginate(10)
            ->withQueryString();
        $no = $users->firstItem();
        return view('user.index', compact('title', 'users', 'q', 'no'));
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('user.index')->with(['message' => 'Data Terhapus']);
    }
    public function edit(User $user)
    {
        $title = 'Ubah User';
        $levels = ['admin', 'user'];
        return view('user.edit', compact('title', 'user', 'levels'));
    }
    public function create()
    {
        $title = 'Tambah User';
        $levels = ['admin', 'user'];
        return view('user.create', compact('title', 'levels'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'level' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);
        if (User::where('username', $request->username)->first())
            return back()->withErrors(['username' => 'Username Sudah Terdaftar!']);

        $user = new User($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.index')->with(['message' => 'Data Berhasil Ditambah!']);
    }
    public function update(User $user, Request $request)
    {
        $request->validate([
            'nama_user' => 'required',
            'username' => 'required',
            'email' => 'required',
            'telp' => 'required',
            'level' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'status' => 'required',
            'password' => 'required',
        ]);
        if (User::where('username', $request->username)->where('id_user', '<>', $user->id_user)->first())
            return back()->withErrors(['username' => 'Username Sudah Terdaftar!']);

        $user->nama_user = $request->nama_user;
        $user->username = $request->username;
        $user->telp = $request->telp;
        $user->email = $request->email;
        $user->telp = $request->telp;
        $user->alamat = $request->alamat;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->umur = $request->umur;
        $user->status = $request->status;
        if ($request->password)
            $user->password = Hash::make($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect()->route('user.index')->with(['message' => 'Data Berhasil Diubah!']);
    }
}