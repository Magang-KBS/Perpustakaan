<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
  return view('welcome');
});
Route::post('/logout', function () {
  Auth::logout();
  return redirect('/login'); // Arahkan pengguna ke halaman login setelah logout
})->name('logout');



Route::get('/pengarang', [PengarangController::class, 'index'])->name('pengarang.index');
Route::get('/pengarang/create', [PengarangController::class, 'create'])->name('pengarang.create');
Route::post('/pengarang/store', [PengarangController::class, 'store'])->name('pengarang.store');
Route::delete('/pengarang/{id}', [PengarangController::class, 'destroy'])->name('pengarang.destroy');
Route::get('/pengarang/{id}/edit', [PengarangController::class, 'edit'])->name('pengarang.edit');
Route::put('/pengarang/{id}', [PengarangController::class, 'update'])->name('pengarang.update');

Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
Route::post('/penerbit/store', [PenerbitController::class, 'store'])->name('penerbit.store');
Route::get('penerbit/edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit');
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');
Route::put('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');

Route::get("anggota", [AnggotaController::class, 'index'])->name('anggota.index');
Route::put("anggota/{id}", [AnggotaController::class, 'update'])->name('anggota.update');
Route::post("anggota", [AnggotaController::class, 'store'])->name('anggota.store');
Route::delete('anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::get('anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::get('/peminjaman/create', [peminjamanController::class, 'create'])->name('peminjaman.create');
Route::post('/peminjaman/store', [peminjamanController::class, 'store'])->name('peminjaman.store');
Route::get('peminjaman/edit/{id}', [peminjamanController::class, 'edit'])->name('peminjaman.edit');
Route::delete('/peminjaman/{id}', [peminjamanController::class, 'destroy'])->name('peminjaman.destroy');
Route::put('/peminjaman/{id}', [peminjamanController::class, 'update'])->name('peminjaman.update');

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
Route::get('buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');


Route::get('home', [PageController::class, 'home'])->name('home');

Route::resource('buku', BukuController::class);
