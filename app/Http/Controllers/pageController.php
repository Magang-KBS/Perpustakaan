<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Denda;
use App\Models\Pengarang;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function home(){
        
        $title = 'Home';
        $jumlah_anggota = Anggota::count();
        $jumlah_pengarang = Pengarang::count();      
        $jumlah_denda = Denda::count();       
        return view('home', compact('title', 'jumlah_anggota','jumlah_pengarang','jumlah_denda'));

}}
