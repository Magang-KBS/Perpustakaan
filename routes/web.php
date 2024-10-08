<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/kategori',[kategoriController::class,'index'])->name('kategori.index');
Route::get('/kategori/tambah',[kategoriController::class,'create'])->name('kategori.tambah_kat');
Route::get('/kategori/edit/{id}', [kategoriController::class, 'edit'])->name('kategori.edit_kat');
Route::post('/kategori/store', [kategoriController::class,'store'])->name('kategori.store');
Route::put('/kategori/{id}',[kategoriController::class,'update'])->name('kategori.update');
Route::delete('kategori/{id}',[kategoriController::class, 'destroy'])->name('kategori.destroy');

Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
Route::post('/penerbit/store', [])->name('penerbit.store');



//Route::get('/', function () {
  //  return view('welcome');
//});


Route::get('/pengarang', [PengarangController::class,'index'])->name('pengarang.index');
Route::get('/pengarang/create', [PengarangController::class,'create'])->name('pengarang.create');
Route::post('/pengarang/store', [PengarangController::class,'store'])->name('pengarang.store');
Route::delete('/pengarang/{id}', [PengarangController::class, 'destroy'])->name('pengarang.destroy');
Route::get('/pengarang/edit', [PengarangController::class, 'edit'])->name('pengarang.edit');
Route::put("pengarang/{id}",[PengarangController::class,'update'])->name('pengarang.update');



Route::get("anggota",[AnggotaController::class,'index'])->name('anggota.index');
Route::put("anggota/{id}",[AnggotaController::class,'update'])->name('anggota.update');
Route::post("anggota",[AnggotaController::class,'store'])->name('anggota.store');
Route::delete('anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::get('anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');


Route::get('home' , [pageController::class, 'home'])->name('home');

    
