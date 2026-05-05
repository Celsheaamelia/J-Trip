<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $status = $request->status ?? 'semua';

        $query = Transaksi::with(['user', 'tiket.wisata']);

        if ($status !== 'semua') {
            $query->where('status_pembayaran', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('kode_pesanan', 'like', "%{$search}%")
                  ->orWhereHas('user', function ($user) use ($search) {
                      $user->where('name', 'like', "%{$search}%")
                           ->orWhere('email', 'like', "%{$search}%");
                  })
                  ->orWhereHas('tiket.wisata', function ($wisata) use ($search) {
                      $wisata->where('name', 'like', "%{$search}%");
                  });
            });
        }

        $transaksis = $query->latest('dibuat_pada')->paginate(10)->withQueryString();

        $totalTiketBulanIni = Transaksi::where('status_pembayaran', 'paid')
            ->whereMonth('dibuat_pada', Carbon::now()->month)
            ->whereYear('dibuat_pada', Carbon::now()->year)
            ->with('tiket')
            ->get()
            ->sum(fn ($trx) => $trx->tiket->jumlah_pengunjung ?? $trx->tiket->jumlah ?? 0);

        $transaksiBerhasil = Transaksi::where('status_pembayaran', 'paid')->count();

        $menungguPembayaran = Transaksi::where('status_pembayaran', 'pending')->count();

        $trenDestinasi = Transaksi::with('tiket.wisata')
            ->where('status_pembayaran', 'paid')
            ->get()
            ->groupBy(fn ($trx) => $trx->tiket->wisata->name ?? 'Tidak diketahui')
            ->map(function ($items, $namaWisata) {
                return [
                    'nama_wisata' => $namaWisata,
                    'total_tiket' => $items->sum(fn ($trx) => $trx->tiket->jumlah_pengunjung ?? $trx->tiket->jumlah ?? 0),
                ];
            })
            ->sortByDesc('total_tiket')
            ->take(4)
            ->values();

        return view('admin.transaksi.index', compact(
            'transaksis',
            'totalTiketBulanIni',
            'transaksiBerhasil',
            'menungguPembayaran',
            'trenDestinasi',
            'status',
            'search'
        ));
    }
}
