<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/kategori', [kategoriController::class,'loadAllCategory']);
Route::get('/kategori/add-category', [kategoriController::class,'loadAddCategory']);
use App\Http\Controllers\PenerbitController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
Route::post('/penerbit/store', [])->name('penerbit.store');
