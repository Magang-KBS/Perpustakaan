<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\pageController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\petugasController;
use App\Http\Controllers\Auth\PetugasLoginController;

//Route::get('/', function () {
//  return view('welcome');
//});

Route::get('/kategori',[kategoriController::class,'index'])->name('kategori.index');
Route::get('/kategori/tambah',[kategoriController::class,'create'])->name('kategori.tambah_kat');
Route::get('/kategori/edit/{id}', [kategoriController::class, 'edit'])->name('kategori.edit_kat');
Route::post('/kategori/store', [kategoriController::class,'store'])->name('kategori.store');
Route::put('/kategori/{id}',[kategoriController::class,'update'])->name('kategori.update');
Route::delete('kategori/{id}',[kategoriController::class, 'destroy'])->name('kategori.destroy');


Route::get('/petugas',[petugasController::class,'index'])->name('petugas.index');
Route::get('/petugas/tambah',[petugasController::class,'create'])->name('petugas.tambah_pet');
Route::post('/petugas/store', [petugasController::class,'store'])->name('petugas.store');
Route::get('/petugas/edit/{id}', [petugasController::class,'edit'])->name('petugas.edit_pet');
Route::put('/petugas/{id}',[petugasController::class,'update'])->name('petugas.update');
Route::delete('petugas/{id}',[petugasController::class,'destroy'])->name('petugas.destroy');

Route::get('/penerbit', [PenerbitController::class, 'index'])->name('penerbit.index');
Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
Route::post('/penerbit/store', [])->name('penerbit.store');


Route::get('/pengarang', [PengarangController::class, 'index'])->name('pengarang.index');
Route::get('/pengarang/create', [PengarangController::class, 'create'])->name('pengarang.create');
Route::post('/pengarang/store', [PengarangController::class, 'store'])->name('pengarang.store');
Route::delete('/pengarang/{id}', [PengarangController::class, 'destroy'])->name('pengarang.destroy');
Route::get('/pengarang/edit', [PengarangController::class, 'edit'])->name('pengarang.edit');
Route::put("pengarang/{id}", [PengarangController::class, 'update'])->name('pengarang.update');


Route::get("anggota",[AnggotaController::class,'index'])->name('anggota.index');
Route::get("anggota/create",[AnggotaController::class,'index'])->name('anggota.create');
Route::put("anggota/{id}",[AnggotaController::class,'update'])->name('anggota.update');
Route::post("anggota",[AnggotaController::class,'store'])->name('anggota.store');
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

/**Route::middleware(['auth'])->group(function () {
    Route::get('petugas/edit_pass', [petugasController::class, 'editPass'])->name('petugas.edit_pass');
    Route::post('petugas/update-password', [petugasController::class, 'updatePassword'])->name('update.password');
});*/




Route::get('/home', [pageController::class, 'home'])->name('home');
Route::get('/login', [petugasController::class, 'login'])->name('login');
Route::post('/login', [petugasController::class, 'loginAction'])->name('petugas.login.action');
 // Pastikan hanya pengguna yang terautentikasi yang dapat mengakses halaman ini





Route::get('/' , [pageController::class, 'home'])->name('home');
Route::get('home', [pageController::class, 'home'])->name('home');



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
