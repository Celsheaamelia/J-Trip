<?php

namespace App\Services;

use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthService
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
    private function generateDetailUserId()
    {
        $last = DetailUser::orderBy('id_dtl_user', 'desc')->first();

        if (!$last) {
            return 'DTL001';
        }

        $number = (int) substr($last->id_dtl_user, 3);
        $number++;

        return 'DTL' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
    public function register($request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:user,email',
            'password' => 'required|min:6|confirmed',
            'no_telp' => 'required',
            'jenis_identitas' => 'required',
            'nomor_identitas' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()
            ], 400);
        }

        $userId = $this->generateUserId();

        // SIMPAN USER
        $user = User::create([
            'id_user' => $userId,
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 'aktif'
        ]);

        // SIMPAN DETAIL USER
        DetailUser::create([
            'id_dtl_user' => $this->generateDetailUserId(),
            'id_user' => $user->id_user,
            'jenis_identitas' => $request->jenis_identitas,
            'nomor_identitas' => $request->nomor_identitas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kewarganegaraan' => $request->kewarganegaraan
        ]);

            Auth::login($user);

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

return redirect('/');

            return redirect('/');
    }

    public function login($request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Email atau password salah'
            ], 401);
        }

        Auth::login($user);

            if ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/');

        return redirect('/');

    }
}
