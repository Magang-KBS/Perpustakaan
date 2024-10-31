<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pengarang;
use App\Models\User;
use Illuminate\Http\Request;

class pageController extends Controller
{
        public function home()
        {

                $title = 'Home';
                $jumlah_anggota = Anggota::count();
                $jumlah_penerbit = Penerbit::count();
                $total_peminjaman = Peminjaman::count();

                return view('home', compact('title', 'jumlah_anggota', 'jumlah_penerbit', 'total_peminjaman'));
        }
}
