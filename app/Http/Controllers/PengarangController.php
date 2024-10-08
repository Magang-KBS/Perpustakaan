<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;


class PengarangController extends Controller
{
    public function index(Request $request)
    {   $title = "Pengarang - Perpustakaan";
        $q = $request->query('q');
        $pengarangs = Pengarang::where('nama_pengarang','like','%'.$q.'%')
            ->paginate(5)
            ->withQueryString();
        $no = $pengarangs->firstItem();
        return view('pengarang.index', compact('title', 'pengarangs', 'no', 'q'));
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
        $id = 'Ganti Pengarang';
        $pengarang = Pengarang::where('id,$id')->first();

        return view('pengarang.index', compact('id','pengarang'));
    }

}

