<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
<<<<<<< HEAD
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pengarang;
=======
use App\Models\Penerbit;
>>>>>>> 35b039139aa87f46ae1f819b63331532dafcbca0
use App\Models\User;
use Illuminate\Http\Request;

class pageController extends Controller
{
    public function home()
    {

        $title = 'Home';
        $jumlah_anggota = Anggota::count();
        $jumlah_penerbit = Penerbit::count();
<<<<<<< HEAD
        $total_peminjaman = Peminjaman::count();

        return view('home', compact('title', 'jumlah_anggota', 'jumlah_penerbit', 'total_peminjaman'));
=======
        return view('home', compact('title', 'jumlah_anggota', 'jumlah_penerbit'));
>>>>>>> 35b039139aa87f46ae1f819b63331532dafcbca0
    }
}
