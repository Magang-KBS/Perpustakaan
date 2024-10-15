<?php

namespace App\Http\Controllers;

use App\Models\kategori; //as ModelKategory;
use Illuminate\Http\Request;

class kategoriController extends Controller
{
    public function index(Request $request)
{
    $title = 'Kategori'; // Define the title
    $q = $request->query('q');
    $kategoris = kategori::where('nama_kategori', 'like', '%' . $q . '%')
        ->paginate(5)
        ->withQueryString();
    $no = $kategoris->firstItem();        
    return view('kategori.index', compact('title', 'kategoris', 'q', 'no')); // Pass the $title variable
}

    public function create()
    {
        $title = 'Tambah Kategori';
        $kategoris = Kategori::orderBy('nama_kategori')->get();
        return view('kategori.tambah_kat',compact('title','kategoris'));
    }
    public function show(string $id)
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([    
            'nama_kategori'=>'required',
            'deskripsi' => 'required'
        ]);
        //$kategori = new ModelKategory();
        //$kategori->nama_kategori = $request->nama_kategori;
        //$kategori->deskripsi = $request->deskripsi;
        //$kategori->save();

         $kategori = new Kategori($request->all());
         $kategori->save();
        return redirect()->route('kategori.index')->with(['message'=>"Data Berhasil ditambahkan"]);
    }

    public function edit($id)
    {
        $title = 'Ubah Kategori';
        $kategori = Kategori::where('id',$id)->first();        
        return view('kategori.edit_kat',compact('title','kategori'));
    }

    public function update(Request $request, Kategori $id)
    {
        $id->update($request->all());
        return redirect()->route('kategori.index')->with(['message'=>'Data Berhasil diperbarui']);
    }

    public function destroy(Kategori $id)
    {
        $id->delete();
        return redirect()->route('kategori.index')->with(['message'=>'Data Berhasil dihapus!']);
    }
}
