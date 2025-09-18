<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/tulisan', function () {
    return view('tulisan');
})->name('tulisan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/details', function () {
    return view('details');
})->name('details');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');