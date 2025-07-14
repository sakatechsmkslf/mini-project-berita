<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [AuthController::class, 'Login'])->name('login');
Route::get('/login', [AuthController::class, 'viewLogin']);

Route::resource('category', CategoryController::class);


// Route::view('/login', 'auth.login')->name('login');
Route::view('/dahboard', 'dashboard.index')->name('main');

Route::view('kategori', 'kategori.index')->name('kategori');
