<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\DetailTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Config;
use Midtrans\Snap;

class MidtransController extends Controller
{
    private function midtransConfig()
    {
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = (bool) config('services.midtrans.is_production');
        Config::$isSanitized = (bool) config('services.midtrans.is_sanitized');
        Config::$is3ds = (bool) config('services.midtrans.is_3ds');
    }

    private function generateId($model, $column, $prefix)
    {
        $last = $model::orderBy($column, 'desc')->first();

        if (!$last) {
            return $prefix . '001';
        }

        $number = (int) substr($last->$column, strlen($prefix));
        $number++;

        return $prefix . str_pad($number, 3, '0', STR_PAD_LEFT);
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'id_wisata' => 'required|exists:wisata,id_wisata',
            'tanggal_kunjungan' => 'required|date',
            'jumlah_pengunjung' => 'required|integer|min:1',
            'metode_pembayaran' => 'nullable|string|max:100',
        ]);

        $this->midtransConfig();

        $user = Auth::user();
        $wisata = Wisata::where('id_wisata', $request->id_wisata)->firstOrFail();

        $jumlah = (int) $request->jumlah_pengunjung;
        $hargaTiket = (int) $wisata->price;
        $totalHarga = $hargaTiket * $jumlah;

        $biayaParkir = 0;
        $pajak = 0;
        $grandTotal = $totalHarga + $biayaParkir + $pajak;

        $result = DB::transaction(function () use (
            $request,
            $user,
            $wisata,
            $jumlah,
            $totalHarga,
            $biayaParkir,
            $pajak,
            $grandTotal
        ) {
            $idTiket = $this->generateId(Tiket::class, 'id_tiket', 'TKT');
            $idTransaksi = $this->generateId(Transaksi::class, 'id_transaksi', 'TRX');

            $kodeBooking = 'BOOK-' . now()->format('YmdHis') . '-' . rand(100, 999);

            $tiket = Tiket::create([
            'id_tiket' => $idTiket,
            'id_user' => $user?->id_user,
            'id_wisata' => $wisata->id_wisata,
            'kode_booking' => $kodeBooking,
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'jumlah' => $jumlah,
            'jumlah_pengunjung' => $jumlah,
            'total_harga' => $totalHarga,
            'biaya_parkir' => $biayaParkir,
            'pajak' => $pajak,
            'grand_total' => $grandTotal,
            'status' => 'pending',
        ]);

            for ($i = 1; $i <= $jumlah; $i++) {
                $kodeTiket = $kodeBooking . '-' . str_pad($i, 2, '0', STR_PAD_LEFT);

                DetailTiket::create([
                    'id_dtl_tiket' => $this->generateId(DetailTiket::class, 'id_dtl_tiket', 'DTK'),
                    'id_tiket' => $tiket->id_tiket,
                    'kode_tiket' => $kodeTiket,
                    'qr_code' => $kodeTiket,
                    'status' => 'aktif',
                ]);
            }

            $transaksi = Transaksi::create([
                'id_transaksi' => $idTransaksi,
                'id_user' => $user?->id_user,
                'id_tiket' => $tiket->id_tiket,
                'kode_pesanan' => $kodeBooking,
                'total_harga' => $totalHarga,
                'biaya_parkir' => $biayaParkir,
                'pajak' => $pajak,
                'grand_total' => $grandTotal,
                'status_pembayaran' => 'pending',
                'metode_pembayaran' => 'Midtrans Snap',
            ]);

            $params = [
                'transaction_details' => [
                    'order_id' => $transaksi->kode_pesanan,
                    'gross_amount' => (int) $transaksi->grand_total,
                ],
                'customer_details' => [
                    'first_name' => $user?->name ?? 'User JTrip',
                    'email' => $user?->email ?? 'guest@jtrip.local',
                    'phone' => $user?->no_telp ?? '',
                ],
                'item_details' => [
                    [
                        'id' => $wisata->id_wisata,
                        'price' => (int) $transaksi->grand_total,
                        'quantity' => 1,
                        'name' => 'Tiket ' . $wisata->name,
                    ],
                ],
            ];

            $snapToken = Snap::getSnapToken($params);

            $transaksi->update([
                'snap_token' => $snapToken,
            ]);

            return [
                'transaksi' => $transaksi,
                'snap_token' => $snapToken,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Snap token berhasil dibuat',
            'snap_token' => $result['snap_token'],
            'id_transaksi' => $result['transaksi']->id_transaksi,
            'kode_pesanan' => $result['transaksi']->kode_pesanan,
        ]);
    }

    public function success(Request $request)
{
    $request->validate([
        'order_id' => 'required|string',
        'payment_type' => 'nullable|string',
    ]);

    $transaksi = Transaksi::where('kode_pesanan', $request->order_id)->first();

    if (!$transaksi) {
        return response()->json([
            'success' => false,
            'message' => 'Transaksi tidak ditemukan',
        ], 404);
    }

    $transaksi->update([
        'status_pembayaran' => 'paid',
        'metode_pembayaran' => $request->payment_type ?? 'Midtrans',
        'paid_at' => now(),
    ]);

    if ($transaksi->tiket) {
        $transaksi->tiket->update([
            'status' => 'paid',
        ]);
    }

    return response()->json([
        'success' => true,
        'message' => 'Status pembayaran berhasil diupdate',
    ]);
}

    public function notification(Request $request)
{
    Log::info('MIDTRANS NOTIFICATION MASUK', $request->all());

    // Untuk test URL dari Midtrans / curl kosong.
    // Kalau payload belum membawa order_id, endpoint tetap balas 200.
    if (!$request->has('order_id')) {
        return response()->json([
            'success' => true,
            'message' => 'Notification endpoint is reachable',
        ], 200);
    }

    $payload = $request->all();

    $orderId = $payload['order_id'] ?? null;
    $statusCode = $payload['status_code'] ?? null;
    $grossAmount = $payload['gross_amount'] ?? null;
    $signatureKey = $payload['signature_key'] ?? null;

    $serverKey = config('services.midtrans.server_key');

    $validSignature = hash(
        'sha512',
        $orderId . $statusCode . $grossAmount . $serverKey
    );

    if ($signatureKey !== $validSignature) {
        Log::warning('MIDTRANS INVALID SIGNATURE', [
            'order_id' => $orderId,
            'signature_from_midtrans' => $signatureKey,
            'signature_from_server' => $validSignature,
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Invalid signature',
        ], 403);
    }

    $transactionStatus = $payload['transaction_status'] ?? null;
    $fraudStatus = $payload['fraud_status'] ?? null;
    $paymentType = $payload['payment_type'] ?? 'Midtrans';

    $transaksi = Transaksi::where('kode_pesanan', $orderId)->first();

    if (!$transaksi) {
        Log::warning('MIDTRANS TRANSAKSI TIDAK DITEMUKAN', [
            'order_id' => $orderId,
        ]);

        return response()->json([
            'success' => false,
            'message' => 'Transaksi tidak ditemukan',
        ], 404);
    }

    if ($transactionStatus === 'capture') {
        if ($fraudStatus === 'accept') {
            $this->markAsPaid($transaksi, $paymentType);
        }
    } elseif ($transactionStatus === 'settlement') {
        $this->markAsPaid($transaksi, $paymentType);
    } elseif ($transactionStatus === 'pending') {
        $transaksi->update([
            'status_pembayaran' => 'pending',
            'metode_pembayaran' => $paymentType,
        ]);

        if ($transaksi->tiket) {
            $transaksi->tiket->update([
                'status' => 'pending',
            ]);
        }
    } elseif (in_array($transactionStatus, ['deny', 'cancel', 'failure', 'expire'])) {
        $transaksi->update([
            'status_pembayaran' => 'failed',
            'metode_pembayaran' => $paymentType,
        ]);

        if ($transaksi->tiket) {
            $transaksi->tiket->update([
                'status' => 'pending',
            ]);
        }
    }

    return response()->json([
        'success' => true,
        'message' => 'Notification processed',
    ]);
}

    private function markAsPaid(Transaksi $transaksi, $paymentType = null)
    {
        $transaksi->update([
            'status_pembayaran' => 'paid',
            'metode_pembayaran' => $paymentType ?? 'Midtrans',
            'paid_at' => now(),
        ]);

        if ($transaksi->tiket) {
            $transaksi->tiket->update([
                'status' => 'paid',
            ]);
        }
    }
}