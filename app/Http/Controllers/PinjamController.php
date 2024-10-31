<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use App\Models\Buku;
use App\Models\Anggota;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    public function index()
    {
        $pinjams = Pinjam::with(['buku', 'anggota'])->paginate(10); // Mengambil data pinjam dengan relasi
        return view('pinjam.index', compact('pinjams'));
    }

    public function create()
    {
        $buku = Buku::all(); // Mendapatkan daftar buku
        $anggota = Anggota::all(); 
        $user = User::all(); 
        return view('pinjam.create', compact('buku', 'anggota', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_buku' => 'required|integer|exists:buku,id',
            'id_anggota' => 'required|integer|exists:anggota,id', 
            'id_user' => 'required|integer|exists:user,id',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        Pinjam::create($request->all());

        return redirect()->route('pinjam.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function show($id)
    {
        $pinjam = Pinjam::with(['buku', 'anggota'])->findOrFail($id); // Mengambil pinjam dengan relasi
        return view('pinjam.show', compact('pinjam'));
    }

    public function edit($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $buku = Buku::all(); 
        $anggota = Anggota::all(); 
        $user = User::all(); 
        return view('pinjam.edit', compact('pinjam', 'buku', 'anggota', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_buku' => 'required|integer|exists:buku,id',
            'id_anggota' => 'required|integer|exists:anggota,id',
            'id_user' => 'required|integer|exists:user,id', 
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        $pinjam = Pinjam::findOrFail($id);
        $pinjam->update($request->all());

        return redirect()->route('pinjam.index')->with('success', 'Peminjaman berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pinjam = Pinjam::findOrFail($id);
        $pinjam->delete();

        return redirect()->route('pinjam.index')->with('success', 'Peminjaman berhasil dihapus');
    }
}
