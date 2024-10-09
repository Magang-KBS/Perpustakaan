<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;


class PengarangController extends Controller
{
    public function index(Request $request)
    {   
        $q = $request->query('q');
        $pengarangs = pengarang::where('nama_pengarang','like','%'.$q.'%')
            ->paginate(5)
            ->withQueryString();
        $no = $pengarangs->firstItem();
        return view('pengarang.index', compact('pengarangs'));
    }

    public function create()
    {
        return view('pengarang.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_pengarang' => 'required|string|max:255'
        ]);
    
        // Menyimpan data ke database
        $pengarang =  new Pengarang($request->only('nama_pengarang', 'id'));
        $pengarang->save();
    
        return redirect()->route('pengarang.index')->with('message', 'Pengarang berhasil ditambahkan!');
    }

    public function destroy(Pengarang $id)
    {
        $id->delete();
        return redirect()->route('pengarang.index')->with('message', 'Pengarang berhasil dihapus!'); // Redirect dengan pesan sukses
    }

    public function edit($id)
    {
        // Cari pengarang berdasarkan ID
        $pengarang = Pengarang::find($id);
    
        // Cek jika pengarang tidak ditemukan
        if (!$pengarang) {
            return redirect()->route('pengarang.index')->with('error', 'Pengarang tidak ditemukan');
        }
    
        // Kirim data ke view
        return view('pengarang.edit', compact('pengarang'));
    }
    
    public function update(Request $request, $id)
    {
        $pengarang = Pengarang::find($id);
        $pengarang->update($request->all());
        return redirect()->route('pengarang.index')->with(['message'=>'Data Berhasil diperbarui']);
    }
}

