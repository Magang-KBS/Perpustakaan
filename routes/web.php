<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\DendaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PinjamController;


Route::get('/', function () {
   return 'Welcome to the home page!';
});

Route::get('/pengarang', [PengarangController::class,'index'])->name('pengarang.index');
Route::get('/pengarang/create', [PengarangController::class,'create'])->name('pengarang.create');
Route::post('/pengarang/store', [PengarangController::class,'store'])->name('pengarang.store');
Route::get('/pengarang/edit/{id}', [PengarangController::class, 'edit'])->name('pengarang.edit');
Route::put("pengarang/update{id}",[PengarangController::class,'update'])->name('pengarang.update');
Route::delete('/pengarang/{id}', [PengarangController::class, 'destroy'])->name('pengarang.destroy');

Route::get('/denda', [DendaController::class,'index'])->name('denda.index');
Route::get('/denda/create', [DendaController::class,'create'])->name('denda.create');
Route::post('/denda/store', [DendaController::class,'store'])->name('denda.store');
Route::get('/denda/edit/{id}', [DendaController::class, 'edit'])->name('denda.edit');
Route::put("denda/update{id}",[DendaController::class,'update'])->name('denda.update');
Route::delete('/denda/{id}', [DendaController::class, 'destroy'])->name('denda.destroy');

Route::get("anggota", [AnggotaController::class, 'index'])->name('anggota.index');
Route::put("anggota/{id}", [AnggotaController::class, 'update'])->name('anggota.update');
Route::post("anggota", [AnggotaController::class, 'store'])->name('anggota.store');
Route::delete('anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::get('anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');

Route::get('/', function () {
  return view('welcome');
});
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


Route::get('home', [pageController::class, 'home'])->name('home');



Route::get('/', function () {
  return view('welcome');
});
Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
Route::post('/penerbit/store', [PenerbitController::class, 'store'])->name('penerbit.store');
Route::get('penerbit/edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit');
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');
Route::put('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');

Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
Route::get('buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');

Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');

Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');

Route::get('/pinjam', [PinjamController::class, 'index'])->name('pinjam.index');
Route::get('/pinjam/create', [PinjamController::class, 'create'])->name('pinjam.create');
Route::post('/pinjam/store', [PinjamController::class, 'store'])->name('pinjam.store');
Route::get('pinjam/edit/{id}', [PinjamController::class, 'edit'])->name('pinjam.edit');
Route::delete('/pinjam/{id}', [PinjamController::class, 'destroy'])->name('pinjam.destroy');
Route::put('/pinjam/{id}', [PinjamController::class, 'update'])->name('pinjam.update');

Route::get('/', [pageController::class, 'home'])->name('home');
