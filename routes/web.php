<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengarangController;

//Route::get('/', function () {
//  return view('welcome');
//});


Route::get('/pengarang', [PengarangController::class, 'index'])->name('pengarang.index');
Route::get('/pengarang/create', [PengarangController::class, 'create'])->name('pengarang.create');
Route::post('/pengarang/store', [PengarangController::class, 'store'])->name('pengarang.store');
Route::delete('/pengarang/{id}', [PengarangController::class, 'destroy'])->name('pengarang.destroy');
Route::get('/pengarang/edit', [PengarangController::class, 'edit'])->name('pengarang.edit');
Route::put("pengarang/{id}", [PengarangController::class, 'update'])->name('pengarang.update');



Route::get("anggota", [AnggotaController::class, 'index'])->name('anggota.index');
Route::put("anggota/{id}", [AnggotaController::class, 'update'])->name('anggota.update');
Route::post("anggota", [AnggotaController::class, 'store'])->name('anggota.store');
Route::delete('anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::get('anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');


Route::get('home', [pageController::class, 'home'])->name('home');


use App\Http\Controllers\PenerbitController;

Route::get('/', function () {
  return view('welcome');
});
Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
Route::post('/penerbit/store', [])->name('penerbit.store');
Route::post('/penerbit/store', [PenerbitController::class, 'store'])->name('penerbit.store');
Route::get('penerbit/edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit');
Route::delete('/penerbit/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');
Route::put('/penerbit/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');


Route::resource('anggota', AnggotaController::class);
Route::delete('anggota', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');


Route::get('/', [pageController::class, 'home'])->name('home');
