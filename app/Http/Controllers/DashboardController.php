<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Transaksi;
use App\Models\User;
use App\Models\Wisata;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $tahun = now()->year;

        $totalWisata = Wisata::count();

        $tiketTerjual = Tiket::whereIn('status', ['paid', 'used'])
            ->sum(DB::raw('COALESCE(jumlah_pengunjung, 0)'));

        $totalTransaksi = Transaksi::count();

        $totalUser = User::count();

        $paidCount = Transaksi::whereIn('status_pembayaran', [
                'paid',
                'settlement',
                'capture',
            ])
            ->count();

        $pendingCount = Transaksi::whereIn('status_pembayaran', [
                'pending',
                'unpaid',
            ])
            ->count();

        $failedCount = Transaksi::whereIn('status_pembayaran', [
                'failed',
                'expire',
                'cancel',
                'deny',
            ])
            ->count();

        $totalStatus = $paidCount + $pendingCount + $failedCount;

        if ($totalStatus <= 0) {
            $paidPercent = 0;
            $pendingPercent = 0;
            $failedPercent = 0;
        } else {
            $paidPercent = round(($paidCount / $totalStatus) * 100);
            $pendingPercent = round(($pendingCount / $totalStatus) * 100);
            $failedPercent = max(0, 100 - $paidPercent - $pendingPercent);
        }

        $monthlyTickets = [];
        $monthlyTransactions = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthlyTickets[] = (int) Tiket::whereYear('dibuat_pada', $tahun)
                ->whereMonth('dibuat_pada', $month)
                ->whereIn('status', ['paid', 'used'])
                ->sum(DB::raw('COALESCE(jumlah_pengunjung, 0)'));

            $monthlyTransactions[] = (int) Transaksi::whereYear('dibuat_pada', $tahun)
                ->whereMonth('dibuat_pada', $month)
                ->count();
        }

        $popularDestination = Wisata::query()
            ->leftJoin('tiket', 'wisata.id_wisata', '=', 'tiket.id_wisata')
            ->select([
                'wisata.id_wisata',
                'wisata.name',
                'wisata.location_name',
                'wisata.image',
                DB::raw('COALESCE(SUM(tiket.jumlah_pengunjung), 0) as total_tiket'),
            ])
            ->groupBy(
                'wisata.id_wisata',
                'wisata.name',
                'wisata.location_name',
                'wisata.image'
            )
            ->orderByDesc('total_tiket')
            ->first();

        $latestTransactions = Transaksi::query()
            ->leftJoin('tiket', 'transaksi.id_tiket', '=', 'tiket.id_tiket')
            ->leftJoin('user', 'tiket.id_user', '=', 'user.id_user')
            ->leftJoin('wisata', 'tiket.id_wisata', '=', 'wisata.id_wisata')
            ->select([
                'transaksi.id_transaksi',
                'transaksi.kode_pesanan',
                'transaksi.status_pembayaran',
                'transaksi.total_harga',
                'transaksi.dibuat_pada',
                'tiket.kode_booking',
                'tiket.grand_total',
                'user.name as nama_user',
                'user.email as email_user',
                'wisata.name as nama_wisata',
            ])
            ->orderByDesc('transaksi.dibuat_pada')
            ->limit(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'tahun',
            'totalWisata',
            'tiketTerjual',
            'totalTransaksi',
            'totalUser',
            'paidCount',
            'pendingCount',
            'failedCount',
            'paidPercent',
            'pendingPercent',
            'failedPercent',
            'monthlyTickets',
            'monthlyTransactions',
            'popularDestination',
            'latestTransactions'
        ));
    }
}