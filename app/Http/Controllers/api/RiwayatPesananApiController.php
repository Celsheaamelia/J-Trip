<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tiket;
use Illuminate\Http\Request;

class RiwayatPesananApiController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $tikets = Tiket::with(['wisata', 'transaksi', 'detailTiket'])
            ->where('id_user', $user->id_user)
            ->latest('dibuat_pada')
            ->get()
            ->map(function ($tiket) {
                return [
                    'id_tiket' => $tiket->id_tiket,
                    'kode_booking' => $tiket->kode_booking,
                    'tanggal_kunjungan' => $tiket->tanggal_kunjungan,
                    'jumlah_pengunjung' => $tiket->jumlah_pengunjung,
                    'grand_total' => $tiket->grand_total,
                    'status' => $tiket->status,

                    'wisata' => [
                        'id_wisata' => $tiket->wisata->id_wisata ?? null,
                        'name' => $tiket->wisata->name ?? 'Wisata',
                        'image' => $tiket->wisata && $tiket->wisata->image
                            ? asset('uploads/wisata/' . $tiket->wisata->image)
                            : null,
                    ],

                    'transaksi' => [
                        'status_pembayaran' => $tiket->transaksi->status_pembayaran ?? null,
                        'metode_pembayaran' => $tiket->transaksi->metode_pembayaran ?? null,
                        'paid_at' => $tiket->transaksi->paid_at ?? null,
                    ],

                    'detail_tiket' => $tiket->detailTiket->map(function ($detail) {
                        return [
                            'id_dtl_tiket' => $detail->id_dtl_tiket,
                            'kode_tiket' => $detail->kode_tiket,
                            'qr_code' => $detail->qr_code,
                            'status' => $detail->status,
                            'digunakan_pada' => $detail->digunakan_pada ?? null,
                        ];
                    })->values(),
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Riwayat pesanan berhasil diambil',
            'data' => $tikets,
        ]);
    }
}