<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class AuthApiController extends Controller
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

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email',
            'no_telp' => 'required|string|max:20',
            'password' => 'required|min:8|confirmed',

            'kewarganegaraan' => 'nullable|string',
            'jenis_identitas' => 'nullable|string',
            'nomor_identitas' => 'nullable|string',
            'jenis_kelamin' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        /** @var \App\Models\User $user */
        $user = User::create([
            'id_user' => $this->generateUserId(),
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status' => 'aktif',
        ]);

        DetailUser::create([
            'id_dtl_user' => $this->generateDetailUserId(),
            'id_user' => $user->id_user,
            'jenis_identitas' => $request->jenis_identitas ?? 'nik',
            'nomor_identitas' => $request->nomor_identitas ?? '-',
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'kewarganegaraan' => $request->kewarganegaraan ?? 'domestik',
        ]);

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Register berhasil',
            'data' => [
                'token_type' => 'Bearer',
                'access_token' => $token,
                'user' => $this->formatUser($user),
            ],
        ], 201);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors(),
            ], 422);
        }

        $login = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$login) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah',
            ], 401);
        }

        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User tidak ditemukan',
            ], 401);
        }

        if ($user->status !== 'aktif') {
            return response()->json([
                'success' => false,
                'message' => 'Akun sedang nonaktif',
            ], 403);
        }

        $token = $user->createToken('mobile-token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login berhasil',
            'data' => [
                'token_type' => 'Bearer',
                'access_token' => $token,
                'user' => $this->formatUser($user),
            ],
        ]);
    }

    public function me(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Token tidak valid atau user tidak ditemukan',
            ], 401);
        }

        $user->load('detail');

        return response()->json([
            'success' => true,
            'data' => [
                'id_user' => $user->id_user,
                'name' => $user->name,
                'email' => $user->email,
                'no_telp' => $user->no_telp,
                'avatar' => $user->avatar ? asset($user->avatar) : null,
                'role' => $user->role,
                'status' => $user->status,
                'detail' => $user->detail ? [
                    'id_dtl_user' => $user->detail->id_dtl_user,
                    'jenis_identitas' => $user->detail->jenis_identitas,
                    'nomor_identitas' => $user->detail->nomor_identitas,
                    'jenis_kelamin' => $user->detail->jenis_kelamin,
                    'tanggal_lahir' => $user->detail->tanggal_lahir,
                    'kewarganegaraan' => $user->detail->kewarganegaraan,
                ] : null,
            ],
        ]);
    }

    public function logout(Request $request)
{
    $plainToken = $request->bearerToken();

    if (!$plainToken) {
        return response()->json([
            'success' => false,
            'message' => 'Token tidak ditemukan',
        ], 401);
    }

    DB::table('personal_access_tokens')
        ->where('token', hash('sha256', $plainToken))
        ->delete();

    return response()->json([
        'success' => true,
        'message' => 'Logout berhasil',
    ]);
}

    private function formatUser(User $user)
    {
        return [
            'id_user' => $user->id_user,
            'name' => $user->name,
            'email' => $user->email,
            'no_telp' => $user->no_telp,
            'avatar' => $user->avatar ? asset($user->avatar) : null,
            'role' => $user->role,
            'status' => $user->status,
        ];
    }
}