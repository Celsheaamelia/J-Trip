<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\Api\RiwayatPesananApiController;
use App\Http\Controllers\Api\WisataApiController;
use App\Http\Controllers\Api\UmkmApiController;


Route::post('/auth/register', [AuthApiController::class, 'register']);
Route::post('/auth/login', [AuthApiController::class, 'login']);
Route::post('/auth/verify-otp', [AuthApiController::class, 'verifyOtp']);
Route::post('/auth/resend-otp', [AuthApiController::class, 'resendOtp']);

Route::get('/wisata', [WisataApiController::class, 'index']);
Route::get('/wisata-populer', [WisataApiController::class, 'populer']);

Route::post('/midtrans/notification', [MidtransController::class, 'notification'])
    ->name('midtrans.notification');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/auth/me', [AuthApiController::class, 'me']);
    Route::post('/auth/logout', [AuthApiController::class, 'logout']);
    Route::put('/auth/profile', [AuthApiController::class, 'updateProfile']);

    Route::get('/riwayat-pesanan', [RiwayatPesananApiController::class, 'index']);

    Route::post('/midtrans/checkout', [MidtransController::class, 'checkout']);
    Route::post('/midtrans/success', [MidtransController::class, 'success']);

    Route::get('/umkm', [UmkmApiController::class, 'index']);
});