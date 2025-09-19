<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index'])->name('index');

Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/tulisan', [PostController::class, 'showAll'])->name('tulisan');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::get('/dashboard', [PostController::class, 'dashboard'])->name('dashboard');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('store');

Route::get('/{slug}-{stamp}', [PostController::class, 'show'])
    ->where([
        'slug' => '[A-Za-z0-9\-]+',
        'stamp' => '\d{12,14}'
    ])->name('posts.show');

Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');

Route::delete('/posts', [PostController::class, 'destroy'])->name('posts.destroy');
Route::put('/posts', [PostController::class, 'update'])->name('posts.update');
