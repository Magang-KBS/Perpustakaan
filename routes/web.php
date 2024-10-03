<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengarangController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('pengarang', [PengarangController::class, 'index'])->name('pengarang.index');
Route::get('/pengarang/create', [PengarangController::class, 'create'])->name('pengarang.create');
Route::post('/pengarang', [PengarangController::class, 'store'])->name('pengarang.store');


