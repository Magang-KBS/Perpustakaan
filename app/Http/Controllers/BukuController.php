<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Pengarang;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $title = 'buku'; // Define the title
        $searchQuery = $request->query('searchQuery'); // Ganti $q dengan $searchQuery
        $bukus = Buku::where('kode_buku', 'like', '%' . $searchQuery . '%') // Gunakan $searchQuery di sini
            ->paginate(5)
            ->withQueryString();
        $no = $bukus->firstItem();
        return view('buku.index', compact('title', 'bukus', 'searchQuery', 'no')); // Pass the $searchQuery variable
    }

    public function create()
    {
        $title = 'Tambah buku';
        $bukus = Buku::orderBy('kode_buku')->get();
        $pengarangs = Pengarang::all(); // Ambil semua data pengarang
        $penerbits = Penerbit::all(); // Ambil semua data pengarang
        return view('buku.create', compact('title', 'bukus', 'pengarangs', 'penerbits'));
    }

    public function show(string $id)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'kategori' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun_terbit' => 'required',
            'stok' => 'nullable',
        ]);
        $buku = new Buku($request->all());
        $buku->save();
        return redirect()->route('buku.index')->with(['message' => "Data Berhasil ditambahkan"]);
    }

    public function edit($id)
    {
        $title = 'Ubah buku';
        $buku = Buku::where('id', $id)->first();
        $pengarangs = Pengarang::all(); // Ambil semua data pengarang
        return view('buku.edit', compact('title', 'buku', 'pengarangs'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->update($request->all());
        return redirect()->route('buku.index')->with(['message' => 'Data Berhasil diperbarui']);
    }

    public function destroy(Buku $id)
    {
        $id->delete();
        return redirect()->route('buku.index')->with(['message' => 'Data Berhasil dihapus!']);
    }
}
