<?php

namespace App\Services;

use App\Models\EmailOtp;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OtpService
{
    public function sendRegisterOtp(string $email): string
    {
        $otp = (string) random_int(100000, 999999);

        DB::table('email_otps')
            ->where('email', $email)
            ->where('purpose', 'register')
            ->whereNull('verified_at')
            ->delete();

        EmailOtp::create([
            'email' => $email,
            'otp_code' => $otp,
            'purpose' => 'register',
            'expires_at' => now()->addMinutes(10),
        ]);

        Mail::raw(
            "Kode OTP J-TRIP kamu adalah: {$otp}\n\nKode ini berlaku selama 10 menit.\nJangan berikan kode ini kepada siapa pun.",
            function ($message) use ($email) {
                $message->to($email)
                    ->subject('Kode OTP Registrasi J-TRIP');
            }
        );

        return $otp;
    }

    public function verifyRegisterOtp(string $email, string $otp): bool
    {
        $record = EmailOtp::where('email', $email)
            ->where('otp_code', $otp)
            ->where('purpose', 'register')
            ->whereNull('verified_at')
            ->latest()
            ->first();

        if (!$record) {
            return false;
        }

        if (Carbon::parse($record->expires_at)->isPast()) {
            return false;
        }

        $record->update([
            'verified_at' => now(),
        ]);

        return true;
    }
}