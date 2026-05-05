<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    private function generateUserId()
    {
        $lastUser = User::orderBy('id_user', 'desc')->first();

        if (!$lastUser) {
            return 'USR001';
        }

        $lastNumber = (int) substr($lastUser->id_user, 3);
        $newNumber = $lastNumber + 1;

        return 'USR' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }

    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            $user = User::create([
                'id_user' => $this->generateUserId(),
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'password' => Hash::make(Str::random(32)),
                'role' => 'user',
                'status' => 'aktif',
            ]);
        } else {
            $user->update([
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
            ]);
        }

        Auth::login($user);

        return redirect('/');
    }
}
