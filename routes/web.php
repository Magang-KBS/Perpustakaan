<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengarangController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('pengarang', [PengarangController::class, 'index'])->name('pengarang.index');
Route::get('/pengarang/create', [PengarangController::class, 'create'])->name('pengarang.create');
Route::post('/pengarang', [PengarangController::class, 'store'])->name('pengarang.store');



Route::resource('anggota', AnggotaController::class);
Route::delete('anggota', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');


Route::get('/' , [pageController::class, 'home'])->name
    ('home');

    
