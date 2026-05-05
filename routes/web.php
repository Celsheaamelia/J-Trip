<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WisataUserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/wisata', [WisataUserController::class, 'index'])->name('wisata');

Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);

Route::get('/auth/google', [GoogleAuthController::class, 'redirect']);
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback']);

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [AuthController::class, 'register']);

// Route::get('/', function () {
//     return view('user.home');
// })->name('home');

// Route::get('/wisata', function () {
//     return view('user.wisata');
// })->name('wisata');

Route::get('/admin/user', [UserController::class, 'index']);

// Route::get('/admin/wisata', function () {
//     return view('admin.wisata.index');
// });

Route::get('/admin/tiket', function () {
    return view('admin.tiket.index');
});

Route::get('/admin/transaksi', function () {
    return view('admin.transaksi.index');
});

Route::get('/admin/umkm', function () {
    return view('admin.umkm.index');
});

Route::get('/admin/laporan', function () {
    return view('admin.laporan.index');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
});

Route::get('/admin/user/{id}/edit', [UserController::class, 'edit']);
Route::put('/admin/user/{id}/update', [UserController::class, 'update']);
Route::delete('/admin/user/{id}/delete', [UserController::class, 'destroy']);

Route::get('/admin/wisata', [WisataController::class, 'index']);
Route::post('/admin/wisata/store', [WisataController::class, 'store']);
Route::get('/admin/wisata/{id}/edit', [WisataController::class, 'edit']);
Route::put('/admin/wisata/{id}/update', [WisataController::class, 'update']);
Route::delete('/admin/wisata/{id}/delete', [WisataController::class, 'destroy']);
