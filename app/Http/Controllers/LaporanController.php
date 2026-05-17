<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->start_date ?? now()->startOfMonth()->format('Y-m-d');
        $end = $request->end_date ?? now()->endOfMonth()->format('Y-m-d');

        $query = $this->baseTransaksiQuery($start, $end);

        $transaksis = (clone $query)
            ->orderByDesc('transaksi.dibuat_pada')
            ->paginate(10)
            ->withQueryString();

        $summary = $this->getSummary($start, $end);

        return view('admin.laporan.index', [
            'start' => $start,
            'end' => $end,
            'transaksis' => $transaksis,
            'totalTiketTerjual' => $summary['totalTiketTerjual'],
            'totalTransaksi' => $summary['totalTransaksi'],
            'bulanIni' => $summary['bulanIni'],
            'bulanLalu' => $summary['bulanLalu'],
        ]);
    }

    public function exportExcel(Request $request)
    {
        $start = $request->start_date ?? now()->startOfMonth()->format('Y-m-d');
        $end = $request->end_date ?? now()->endOfMonth()->format('Y-m-d');

        $transaksis = $this->baseTransaksiQuery($start, $end)
            ->orderByDesc('transaksi.dibuat_pada')
            ->get();

        $summary = $this->getSummary($start, $end);

        $fileName = 'laporan_jtrip_' . $start . '_sampai_' . $end . '.xls';

        return response()
            ->view('admin.laporan.export-excel', [
                'start' => $start,
                'end' => $end,
                'transaksis' => $transaksis,
                'summary' => $summary,
            ])
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"')
            ->header('Cache-Control', 'max-age=0');
    }

    public function exportPdf(Request $request)
    {
        $start = $request->start_date ?? now()->startOfMonth()->format('Y-m-d');
        $end = $request->end_date ?? now()->endOfMonth()->format('Y-m-d');

        $transaksis = $this->baseTransaksiQuery($start, $end)
            ->orderByDesc('transaksi.dibuat_pada')
            ->get();

        $summary = $this->getSummary($start, $end);

        return view('admin.laporan.export-pdf', [
            'start' => $start,
            'end' => $end,
            'transaksis' => $transaksis,
            'summary' => $summary,
        ]);
    }

    private function baseTransaksiQuery($start, $end)
    {
        return Transaksi::query()
            ->leftJoin('tiket', 'transaksi.id_tiket', '=', 'tiket.id_tiket')
            ->leftJoin('wisata', 'tiket.id_wisata', '=', 'wisata.id_wisata')
            ->whereDate('transaksi.dibuat_pada', '>=', $start)
            ->whereDate('transaksi.dibuat_pada', '<=', $end)
            ->select([
                'transaksi.id_transaksi',
                'transaksi.kode_pesanan',
                'transaksi.metode_pembayaran',
                'transaksi.status_pembayaran',
                'transaksi.total_harga',
                'transaksi.dibuat_pada',
                'tiket.kode_booking',
                'tiket.jumlah_pengunjung',
                'tiket.grand_total',
                'tiket.status as status_tiket',
                'wisata.name as nama_wisata',
                'wisata.location_name as lokasi_wisata',
            ]);
    }

    private function getSummary($start, $end)
    {
        $filtered = $this->baseTransaksiQuery($start, $end);

        $totalTiketTerjual = (clone $filtered)
            ->whereIn('transaksi.status_pembayaran', ['paid', 'settlement', 'capture'])
            ->sum(DB::raw('COALESCE(tiket.jumlah_pengunjung, 0)'));

        $totalTransaksi = (clone $filtered)->count();

        $bulanIniStart = now()->startOfMonth()->format('Y-m-d');
        $bulanIniEnd = now()->endOfMonth()->format('Y-m-d');

        $bulanLaluStart = now()->subMonthNoOverflow()->startOfMonth()->format('Y-m-d');
        $bulanLaluEnd = now()->subMonthNoOverflow()->endOfMonth()->format('Y-m-d');

        $bulanIni = $this->baseTransaksiQuery($bulanIniStart, $bulanIniEnd)
            ->whereIn('transaksi.status_pembayaran', ['paid', 'settlement', 'capture'])
            ->sum(DB::raw('COALESCE(tiket.grand_total, transaksi.total_harga, 0)'));

        $bulanLalu = $this->baseTransaksiQuery($bulanLaluStart, $bulanLaluEnd)
            ->whereIn('transaksi.status_pembayaran', ['paid', 'settlement', 'capture'])
            ->sum(DB::raw('COALESCE(tiket.grand_total, transaksi.total_harga, 0)'));

        return [
            'totalTiketTerjual' => (int) $totalTiketTerjual,
            'totalTransaksi' => (int) $totalTransaksi,
            'bulanIni' => (int) $bulanIni,
            'bulanLalu' => (int) $bulanLalu,
        ];
    }
}