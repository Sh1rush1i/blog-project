<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('index');

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

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('store');
