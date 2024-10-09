<?php

namespace App\Http\Controllers;

use App\Models\Penerbit;
use Illuminate\Http\Request;


class PenerbitController extends Controller
{
    public function index(Request $request)
    {
        $title = 'Penerbit'; // Define the title
        $q = $request->query('q');
        $penerbits = Penerbit::where('nama_penerbit', 'like', '%' . $q . '%')
            ->paginate(5)
            ->withQueryString();
        $no = $penerbits->firstItem();
        return view('penerbit.index', compact('title', 'penerbits', 'q', 'no')); // Pass the $title variable
    }


    public function create()
    {
        $title = 'Tambah Penerbit';
        $penerbits = Penerbit::orderBy('nama_penerbit')->get();
        return view('penerbit.create', compact('title', 'penerbits'));
    }
    public function show(string $id)
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_penerbit' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);
        $penerbit = new Penerbit($request->all());
        $penerbit->save();
        return redirect()->route('penerbit.index')->with(['message' => "Data Berhasil ditambahkan"]);
    }


    public function edit($id)
    {
        $title = 'Ubah Penerbit';
        $penerbit = Penerbit::where('id', $id)->first();
        return view('penerbit.edit', compact('title', 'penerbit'));
    }

    public function update(Request $request, Penerbit $id)
    {
        $id->update($request->all());
        return redirect()->route('penerbit.index')->with(['message' => 'Data Berhasil diperbarui']);
    }

    public function destroy(Penerbit $id)
    {
        $id->delete();
        return redirect()->route('penerbit.index')->with(['message' => 'Data Berhasil dihapus!']);
    }
}
