<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pengarang;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function home(){
        
        $title = 'Home';
        $jumlah_anggota = Anggota::count();
        $jumlah_pengarang = Pengarang::count();       
        return view('home', compact('title', 'jumlah_anggota','jumlah_pengarang'));

}}
