<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\PenerbitController;


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

Route::resource('anggota', AnggotaController::class);
Route::delete('anggota', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');


Route::get('/' , [pageController::class, 'home'])->name('home');

    
