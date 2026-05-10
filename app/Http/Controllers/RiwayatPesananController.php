<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use Illuminate\Support\Facades\Auth;

class RiwayatPesananController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $tikets = Tiket::with(['wisata', 'transaksi', 'detailTiket'])
            ->where('id_user', $user->id_user)
            ->latest('dibuat_pada')
            ->get();

        return view('user.riwayat.index', compact('tikets'));
    }

    public function show($id)
    {
        $user = Auth::user();

        $tiket = Tiket::with(['wisata', 'transaksi', 'detailTiket'])
            ->where('id_user', $user->id_user)
            ->where('id_tiket', $id)
            ->firstOrFail();

        return view('user.riwayat.show', compact('tiket'));
    }
}