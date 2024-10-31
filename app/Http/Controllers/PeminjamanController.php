<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Anggota;
use App\Models\Buku;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $title = 'tgl_pinjam'; // Define the title
        $searchQuery = $request->query('searchQuery'); // Ganti $q dengan $searchQuery
        $peminjamans = Peminjaman::where('tgl_pinjam', 'like', '%' . $searchQuery . '%') // Gunakan $searchQuery di sini
            ->paginate(5)
            ->withQueryString();
        $no = $peminjamans->firstItem();
        return view('peminjaman.index', compact('title', 'peminjamans', 'searchQuery', 'no')); // Pass the $searchQuery variable
    }

    public function create()
    {
        $title = 'Tambah buku';
        $peminjamans = Peminjaman::orderBy('tgl_pinjam')->get();
        $anggota = Anggota::all(); // Ambil semua data pengarang
        $buku = Buku::all(); // Ambil semua data pengarang
        return view('peminjaman.create', compact('title', 'peminjamans', 'anggota', 'buku'));
    }
    public function show(string $id)
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'tgl_pinjam' => 'required|date',
            'tgl_max_pinjam' => 'required|date',
            'tgl_kembali' => 'nullable|date',
            'id_anggota' => 'required|exists:tb_anggota,id',
            'buku' => 'required',
            /** 'id_petugas' => 'required|exists:',*/
            'status' => 'required|in:dipinjam,dikembalikan', // hanya menerima nilai tertentu
        ]);
        $peminjaman = new Peminjaman($request->all());
        $peminjaman->save();
        return redirect()->route('peminjaman.index')->with(['message' => "Data Berhasil ditambahkan"]);
    }

    public function edit($id)
    {
        $title = 'Ubah Peminjaman';
        $peminjaman = Peminjaman::where('id', $id)->first();
        return view('peminjaman.edit', compact('title', 'peminjaman'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all(),$id);
        $peminjaman = Peminjaman::find($id);
        $peminjaman->update($request->all());
        return redirect()->route('peminjaman.index')->with(['message' => 'Data Berhasil diperbarui']);
    }

    public function destroy(Peminjaman $id)
    {
        $id->delete();
        return redirect()->route('peminjaman.index')->with(['message' => 'Data Berhasil dihapus!']);
    }
}
