<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.home');
})->name('home');

Route::get('/wisata', function () {
    return view('user.wisata');
})->name('wisata');

Route:: get('/admin/user', function () {
    return view('admin.user.index');
});

Route::get('/admin/wisata', function () {
    return view('admin.wisata.index');
});

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

