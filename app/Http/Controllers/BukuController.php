<?php

namespace App\Http\Controllers;

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
        $bukus = Buku::where('judul', 'like', '%' . $q . '%')
        ->leftjoin('tb_anggota', 'tb_anggota.id', 'tb_buku.id')
        ->leftjoin('pengarang', 'pengarang.id', 'tb_buku.id')
        ->leftjoin('penerbit', 'penerbit.id', 'penerbit.id')
        ->paginate(5)
        ->withQueryString();
        $no = $bukus->firstItem();
        return view('buku.index', compact('title', 'bukus','q','no'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
