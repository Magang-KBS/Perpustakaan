<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\kategori;
use App\Models\Petugas;
use Illuminate\Http\Request;
use Laravel\Prompts\Key;

class pageController extends Controller
{
    public function home(){
        
        $title = 'Home';
        $jumlah_anggota = Anggota::count();
        $jumlah_kategori = kategori::count();
        $jumlah_petugas = Petugas::count();
        return view('home', compact('title', 'jumlah_anggota','jumlah_kategori','jumlah_petugas'));

}}
