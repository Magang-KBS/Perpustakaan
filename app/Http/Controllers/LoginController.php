<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mengambil kredensial dari request
        $credentials = $request->only('username', 'password');

        // Mencari user di tabel login
        $user = DB::table('login')->where('username', $credentials['username'])->first();

        // Jika username tidak ditemukan
        if (!$user) {
            return back()->withErrors([
                'username' => 'Username Salah.',
                'password' => 'Password salah.' // Menampilkan pesan ini juga
            ])->onlyInput('username'); // Hanya mengisi kembali username
        }

        // Memeriksa password
        if (!Hash::check($credentials['password'], $user->password)) {
            // Jika password tidak cocok
            return back()->withErrors([
                'password' => 'Password salah.', // Hanya menampilkan pesan ini
            ])->onlyInput('username'); // Hanya mengisi kembali username
        }

        // Jika login berhasil, redirect ke halaman dashboard/home
        return redirect()->route('home'); // Ganti dengan rute yang sesuai
    }
    public function showLoginForm()
    {
        return view('login'); // Pastikan view login ini ada
    }
}
