<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'auth.login')->name('login');

// Route::post('login', [AuthController::class, 'proses_login'])->name('prosesLogin');
