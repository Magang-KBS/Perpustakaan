<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {

        $title = 'Peminjaman'; // Define the title
        $q = $request->query('q');
        $peminjamans = Peminjaman::where('tgl_pinjam', 'like', '%' . $q . '%')
            ->paginate(5)
            ->withQueryString();
        $no = $peminjamans->firstItem();
        return view('peminjaman.index', compact('title', 'peminjamans', 'q', 'no')); // Pass the $title variable
    }

    public function create()
    {
        $title = 'Tambah Peminjaman';
        $peminjamans = Peminjaman::orderBy('tgl_pinjam')->get();
        return view('peminjaman.create', compact('title', 'peminjamans'));
    }
    public function show(string $id)
    {
        //
    }
    public function store(Request $request)
    {
        $request->validate([
            'tgl_pinjam' => 'required',
            'tgl_max_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'id_anggota' => 'required',
            'id_petugas' => 'required',
            'status' => 'nullable',
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
