<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\OtpService;


class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        return $this->authService->register($request);
    }

    public function login(Request $request)
    {
        return $this->authService->login($request);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function showVerifyOtp(Request $request)
{
    return view('auth.verify-otp', [
        'email' => $request->email,
    ]);
}

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'otp_code' => 'required|string|min:6|max:6',
    ]);

    $isValid = app(OtpService::class)
        ->verifyRegisterOtp($request->email, $request->otp_code);

    if (!$isValid) {
        return back()
            ->withInput()
            ->withErrors([
                'otp_code' => 'Kode OTP salah atau sudah kadaluarsa.',
            ]);
    }

    $user = User::where('email', $request->email)->firstOrFail();

    $user->update([
        'status' => 'aktif',
        'email_verified_at' => now(),
    ]);

    return redirect('/login')
        ->with('success', 'Verifikasi berhasil. Silakan login.');
}

public function resendOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    $user = User::where('email', $request->email)->firstOrFail();

    if ($user->status === 'aktif') {
        return redirect('/login')
            ->with('success', 'Akun sudah aktif. Silakan login.');
    }

    app(OtpService::class)->sendRegisterOtp($user->email);

    return back()->with('success', 'Kode OTP baru sudah dikirim.');
}
}