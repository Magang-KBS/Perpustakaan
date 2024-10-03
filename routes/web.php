<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;


Route::resource('anggota', AnggotaController::class);
Route::delete('anggota', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');


Route::get('/' , [pageController::class, 'home'])->name
    ('home');

    