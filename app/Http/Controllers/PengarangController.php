<?php

namespace App\Http\Controllers;

use App\Models\Pengarang;
use Illuminate\Http\Request;


class PengarangController extends Controller
{
    public function index(Request $request)
    {

        $title = 'pengarang'; // Define the title
        $q = $request->query('q');
        $pengarangs = pengarang::where('nama_pengarang', 'like', '%' . $q . '%')
            ->paginate(5)
            ->withQueryString();
        $no = $pengarangs->firstItem();
        return view('pengarang.index', compact('title', 'pengarangs', 'q', 'no')); // Pass the $title variable
    }

    public function create()
    {
        $title = 'Tambah pengarang';
        $pengarangs = pengarang::orderBy('nama_pengarang')->get();
        return view('pengarang.create', compact('title', 'pengarangs'));
    }
    public function show(string $id)
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_pengarang' => 'required',
            'no_telepon' => 'required',
            'email' => 'required|email',
        ]);
        $pengarang = new pengarang($request->all());
        $pengarang->save();
        return redirect()->route('pengarang.index')->with(['message' => "Data Berhasil ditambahkan"]);
    }

    public function edit($id)
    {
        $title = 'Ubah pengarang';
        $pengarang = pengarang::where('id', $id)->first();
        return view('pengarang.edit', compact('title', 'pengarang'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all(),$id);
        $pengarang = pengarang::find($id);
        $pengarang->update($request->all());
        return redirect()->route('pengarang.index')->with(['message' => 'Data Berhasil diperbarui']);
    }

    public function destroy(pengarang $id)
    {
        $id->delete();
        return redirect()->route('pengarang.index')->with(['message' => 'Data Berhasil dihapus!']);
    }
}
