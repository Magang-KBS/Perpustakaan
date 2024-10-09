<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function home()
    {

        $title = 'Home';
        $jumlah_anggota = Anggota::count();
        $jumlah_penerbit = Penerbit::count();
        return view('home', compact('title', 'jumlah_anggota', 'jumlah_penerbit'));
    }
}
