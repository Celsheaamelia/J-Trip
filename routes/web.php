<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WisataUserController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\DashboardController;

Route::get('/admin/umkm', [UmkmController::class, 'index'])
    ->name('admin.umkm.index');

Route::get('/admin/umkm/create', [UmkmController::class, 'create'])
    ->name('admin.umkm.create');

Route::post('/admin/umkm/store', [UmkmController::class, 'store'])
    ->name('admin.umkm.store');

Route::get('/admin/umkm/{id}/edit', [UmkmController::class, 'edit'])
    ->name('admin.umkm.edit');

Route::put('/admin/umkm/{id}/update', [UmkmController::class, 'update'])
    ->name('admin.umkm.update');

Route::delete('/admin/umkm/{id}/delete', [UmkmController::class, 'destroy'])
    ->name('admin.umkm.delete');

Route::get('/admin/transaksi', [TransaksiController::class, 'index'])
    ->name('admin.transaksi.index');

Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.index');
Route::get('/tiket/{id}', [TiketController::class, 'show'])->name('tiket.show');
Route::patch('/tiket/{id}/status', [TiketController::class, 'updateStatus'])->name('tiket.updateStatus');
Route::delete('/tiket/{id}', [TiketController::class, 'destroy'])->name('tiket.destroy');

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
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/admin/user', [UserController::class, 'index']);

Route::get('/admin/tiket', [TiketController::class, 'index'])
    ->name('admin.tiket.index');


Route::get('/admin/laporan', [LaporanController::class, 'index'])
    ->name('admin.laporan.index');

Route::get('/admin/laporan/export/excel', [LaporanController::class, 'exportExcel'])
    ->name('admin.laporan.export.excel');

Route::get('/admin/laporan/export/pdf', [LaporanController::class, 'exportPdf'])
    ->name('admin.laporan.export.pdf');

Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/admin/user/{id}/edit', [UserController::class, 'edit']);
Route::put('/admin/user/{id}/update', [UserController::class, 'update']);
Route::delete('/admin/user/{id}/delete', [UserController::class, 'destroy']);

Route::get('/admin/wisata', [WisataController::class, 'index'])
    ->name('admin.wisata.index');

Route::post('/admin/wisata/store', [WisataController::class, 'store'])
    ->name('admin.wisata.store');

Route::get('/admin/wisata/{id}/edit', [WisataController::class, 'edit'])
    ->name('admin.wisata.edit');

Route::put('/admin/wisata/{id}', [WisataController::class, 'update'])
    ->name('admin.wisata.update');

Route::delete('/admin/wisata/{id}/delete', [WisataController::class, 'destroy'])
    ->name('admin.wisata.destroy');


Route::post('/midtrans/snap-token/{id}', [MidtransController::class, 'createSnapToken'])
    ->name('midtrans.snap-token');
Route::middleware('auth')->group(function () {
    Route::post('/checkout/midtrans', [MidtransController::class, 'checkout'])
        ->name('midtrans.checkout');

    Route::post('/checkout/midtrans/success', [MidtransController::class, 'success'])
        ->name('midtrans.success');

    Route::get('/riwayat-pesanan', [RiwayatPesananController::class, 'index'])
        ->name('riwayat.pesanan.index');

    Route::get('/riwayat-pesanan/{id}', [RiwayatPesananController::class, 'show'])
        ->name('riwayat.pesanan.show');

    Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])
    ->name('verify.otp');

    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])
        ->name('verify.otp.submit');

    Route::post('/resend-otp', [AuthController::class, 'resendOtp'])
        ->name('verify.otp.resend');
    });
