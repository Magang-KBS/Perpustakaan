<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\pageController;
use Illuminate\Support\Facades\Route;

Route::get("anggota",[AnggotaController::class,'index'])->name('anggota.index');
Route::put("anggota/{id}",[AnggotaController::class,'update'])->name('anggota.update');
Route::post("anggota",[AnggotaController::class,'store'])->name('anggota.store');
Route::delete('anggota/{id}', [AnggotaController::class, 'destroy'])->name('anggota.destroy');
Route::get('anggota/edit/{id}', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::get('anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');


Route::get('home' , [pageController::class, 'home'])->name('home');

    