<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start_date;
        $end = $request->end_date;

        $query = DB::table('transaksi')
            ->leftJoin('tiket', 'transaksi.id_tiket', '=', 'tiket.id_tiket')
            ->leftJoin('wisata', 'tiket.id_wisata', '=', 'wisata.id_wisata')
            ->select(
                'transaksi.*',
                'tiket.jumlah',
                'wisata.name as nama_wisata'
            );

        if ($start && $end) {
            $query->whereBetween(DB::raw('DATE(transaksi.dibuat_pada)'), [$start, $end]);
        }

        $totalTransaksi = (clone $query)->count();
        $totalPendapatan = (clone $query)->sum('transaksi.total_harga');
        $totalTiketTerjual = (clone $query)->sum('tiket.jumlah');

        $bulanIni = DB::table('transaksi')
            ->whereMonth('dibuat_pada', now()->month)
            ->whereYear('dibuat_pada', now()->year)
            ->sum('total_harga');

        $bulanLalu = DB::table('transaksi')
            ->whereMonth('dibuat_pada', now()->subMonth()->month)
            ->whereYear('dibuat_pada', now()->subMonth()->year)
            ->sum('total_harga');

        $transaksis = $query
            ->orderBy('transaksi.dibuat_pada', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.laporan.index', compact(
            'transaksis',
            'totalTransaksi',
            'totalPendapatan',
            'totalTiketTerjual',
            'bulanIni',
            'bulanLalu',
            'start',
            'end'
        ));
    }
}
