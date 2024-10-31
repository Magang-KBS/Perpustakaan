<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Pengarang;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::paginate(10); // Ambil semua buku dengan pagination
        return view('buku.index', compact('bukus'));
    }

    public function create()
    {
        $kategori = Kategori::all(); // Ambil semua kategori
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();
        return view('buku.create', compact('kategori', 'pengarang', 'penerbit'));
    }

    public function store(Request $request)
    {
            $request->validate([
            'kode_buku' => 'required|unique:buku,kode_buku',
            'judul' => 'required',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer',
            'id_kategori' => 'required|exists:kategori,id',
            'id_pengarang' => 'required|exists:pengarang,id',
            'sampul_buku' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->file('sampul_buku')) {
            $fileName = time() . '.' . $request->sampul_buku->extension();
            $request->sampul_buku->move(public_path('sampuls'), $fileName);
        }

        Buku::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'id_kategori' => $request->id_kategori,
            'id_pengarang' => $request->id_pengarang,
            'sampul_buku' => $fileName ?? null,
        ]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        $kategori = Kategori::all();
        $pengarang = Pengarang::all();
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('buku', 'kategori', 'pengarang', 'penerbit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer',
            'id_kategori' => 'required|integer|exists:kategori,id',
            'id_pengarang' => 'required|integer|exists:pengarang,id',
            'sampul_buku' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $buku = Buku::findOrFail($id);

        if ($request->file('sampul_buku')) {
            $fileName = time() . '.' . $request->sampul_buku->extension();
            $request->sampul_buku->move(public_path('sampuls'), $fileName);
            $buku->sampul_buku = $fileName;
        }

        $buku->update($request->except('sampul_buku') + ['sampul_buku' => $buku->sampul_buku]);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);

        if ($buku) {
            if ($buku->sampul_buku) {
                unlink(public_path('sampuls/' . $buku->sampul_buku));
            }
            $buku->delete();
        }

        Log::info('Attempting to delete book with ID: ' . $id);
        try {
            Buku::destroy($id);
            Log::info('Successfully deleted book with ID: ' . $id);
        } catch (\Exception $e) {
            Log::error('Error deleting book: ' . $e->getMessage());
            dd($e->getMessage());
        }

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
