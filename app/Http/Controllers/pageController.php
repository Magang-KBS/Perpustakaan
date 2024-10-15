<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\kategori;
use App\Models\Petugas;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Prompts\Key;

class pageController extends Controller
{
    public function home()
    {

        $title = 'Home';
        $jumlah_anggota = Anggota::count();
        $jumlah_kategori = kategori::count();
        $jumlah_petugas = Petugas::count();
        $jumlah_penerbit = Penerbit::count();
        return view('home', compact('title', 'jumlah_anggota','jumlah_kategori','jumlah_petugas','jumlah_penerbit'));

}}
