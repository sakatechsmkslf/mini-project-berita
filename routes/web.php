<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [AuthController::class, 'Login'])->name('login');
Route::get('/login', [AuthController::class, 'viewLogin']);

Route::resource('category', CategoryController::class);
Route::resource('tag', TagController::class);
Route::resource('berita', BeritaController::class);

Route::view('/dashboard', 'dashboard.index')->name('main');
// Route::view('/berita', 'berita.index')->name('berita');

Route::view('/tambahKategori', 'kategori.tambah')->name('tambahKategori');
// Route::view('/bt', 'berita.tambah')->name('beritaTambah');
