<?php

namespace App\Http\Controllers;
use App\Models\Pengarang;
use App\Models\Penerbit;
use App\Models\Kategori;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Data Peminjaman';

        $q = $request->query('q');
        $bukus = Buku::with(['anggota', 'pengarang', 'penerbit'])
            ->where('judul', 'like', '%' . $q . '%')
            ->paginate(5)
            ->appends($request->query());
        $no = $bukus->firstItem();
        return view('buku.index', compact('title', 'bukus', 'q', 'no'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        // Mengambil data kategori, pengarang, dan penerbit dari database
        $kategoris = Kategori::all();
        $pengarangs = Pengarang::all();
        $penerbits = Penerbit::all();

        // Mengirim data ke view create.blade.php
        return view('buku.create', compact('kategoris', 'pengarangs', 'penerbits'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'judul' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date',
            'stok' => 'required|integer',
        ]);

        // Membuat instance Buku baru dan mengisi dengan data yang diterima
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->kode_buku = $request->kode_buku;
        $buku->kategori = $request->kategori;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->stok = $request->stok;

        // Menyimpan data buku ke database
        $buku->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan');
    }

        /**
         * Display the specified resource.
         */
     public function show(string $id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         */
    public function edit(string $id)
        {
            // Mengambil data buku berdasarkan ID
            $buku = Buku::findOrFail($id);
        
            // Mengambil data kategori, pengarang, dan penerbit dari database
            $kategoris = Kategori::all();
            $pengarangs = Pengarang::all();
            $penerbits = Penerbit::all();
        
            // Mengirim data ke view edit.blade.php
            return view('buku.edit', compact('buku', 'kategoris', 'pengarangs', 'penerbits'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima
        $request->validate([
            'judul' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'pengarang' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|date',
            'stok' => 'required|integer',
        ]);
    
        // Mengambil data buku berdasarkan ID
        $buku = Buku::findOrFail($id);
    
        // Mengisi data buku dengan data yang diterima
        $buku->judul = $request->judul;
        $buku->kode_buku = $request->kode_buku;
        $buku->kategori = $request->kategori;
        $buku->pengarang = $request->pengarang;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->stok = $request->stok;
    
        // Menyimpan perubahan ke database
        $buku->save();
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Mengambil data buku berdasarkan ID
        $buku = Buku::findOrFail($id);

        // Menghapus data buku dari database
        $buku->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }
}
