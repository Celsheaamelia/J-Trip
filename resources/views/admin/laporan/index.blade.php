@extends('layout.app')

@section('styles')
<style>
    .laporan-page {
        padding: 8px 6px;
    }

    .page-title {
        font-size: 36px;
        font-weight: 700;
        color: #155c43;
    }

    .page-subtitle {
        color: #7b7f86;
        font-size: 14px;
    }

    .filter-box {
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .filter-box input {
        border-radius: 10px;
        border: 1px solid #e5e7eb;
        padding: 8px 10px;
        font-size: 13px;
    }

    .btn-apply {
        background: #155c43;
        color: white;
        border-radius: 10px;
        padding: 8px 16px;
        border: none;
    }

    .summary-card {
        background: #2f7d57;
        color: white;
        border-radius: 18px;
        padding: 26px;
        position: relative;
        overflow: hidden;
    }

    .summary-card h2 {
        font-size: 28px;
        font-weight: 700;
    }

    .summary-small {
        font-size: 12px;
        opacity: 0.8;
    }

    .summary-box {
        background: #fff;
        border-radius: 18px;
        padding: 20px;
        border: 1px solid #eee;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
    }

    .summary-box h3 {
        font-size: 26px;
        font-weight: 700;
    }

    .progress {
        height: 6px;
        border-radius: 10px;
        background: #eee;
    }

    .progress-bar {
        background: #155c43;
    }

    .table-card {
        background: #fff;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        border: 1px solid #eee;
    }

    .table-title {
        font-size: 18px;
        font-weight: 700;
    }

    .custom-table th {
        font-size: 12px;
        color: #9aa3af;
        border-bottom: 1px solid #eee;
    }

    .custom-table td {
        font-size: 13px;
        padding: 14px;
        border-top: 1px solid #f3f4f6;
    }

    .badge-method {
        background: #f3f4f6;
        border-radius: 999px;
        padding: 5px 10px;
        font-size: 11px;
    }

    .nominal {
        color: #155c43;
        font-weight: 700;
    }

    .btn-export {
        border-radius: 10px;
        font-size: 13px;
        padding: 8px 14px;
        border: 1px solid #ddd;
        background: #fff;
    }

    .btn-export.green {
        background: #155c43;
        color: #fff;
        border: none;
    }

    .pagination-ui span {
        display: inline-block;
        width: 28px;
        height: 28px;
        text-align: center;
        line-height: 28px;
        border-radius: 8px;
        margin: 2px;
        background: #fff;
        border: 1px solid #eee;
    }

    .pagination-ui .active {
        background: #155c43;
        color: white;
    }
</style>
@endsection

@section('content')

<div class="laporan-page">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">
        <div>
            <h1 class="page-title">Laporan Tahunan & Bulanan</h1>
            <p class="page-subtitle">
                Analisis performa kunjungan wisata dan transaksi secara real-time
            </p>
        </div>


        <form method="GET" action="{{ route('admin.laporan.index') }}" class="filter-box mt-3 mt-md-0">
            <input type="date" name="start_date" value="{{ $start }}">
            <input type="date" name="end_date" value="{{ $end }}">
            <button class="btn-apply">Terapkan</button>
        </form>
    </div>

    {{-- SUMMARY --}}
    <div class="row g-3 mb-4">

        <div class="col-md-8">
            <div class="summary-card h-100">
                <div class="summary-small">Total Tiket Terjual</div>
                <h2>{{ number_format($totalTiketTerjual, 0, ',', '.') }}</h2>

                <div class="d-flex gap-4 mt-3">
                    <div>
                        <div class="summary-small">Bulan Ini</div>
                       <strong>Rp {{ number_format($bulanIni, 0, ',', '.') }}</strong>
                    </div>
                    <div>
                        <div class="summary-small">Bulan Lalu</div>
                        <strong>Rp {{ number_format($bulanLalu, 0, ',', '.') }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-box h-100">
                <div class="summary-small">Total Transaksi</div>
                <h3>{{ number_format($totalTransaksi, 0, ',', '.') }}</h3>

                <div class="progress mt-3">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>

                <div class="summary-small mt-2">
                    70% dari target bulan ini
                </div>
            </div>
        </div>

    </div>

    {{-- TABLE --}}
    <div class="table-card">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="table-title">Data Rinci Transaksi</div>

            <div class="d-flex gap-2">
                <button class="btn-export">Export PDF</button>
                <button class="btn-export green">Export Excel</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table custom-table">
                <thead>
                    <tr>
                        <th>ID PESANAN</th>
                        <th>DESTINASI</th>
                        <th>TANGGAL</th>
                        <th>METODE</th>
                        <th>NOMINAL</th>
                    </tr>
                </thead>

                <tbody>
@forelse ($transaksis as $trx)
    <tr>
        <td>#{{ $trx->kode_pesanan ?? $trx->id_transaksi }}</td>
        <td>{{ $trx->nama_wisata ?? '-' }}</td>
        <td>{{ \Carbon\Carbon::parse($trx->dibuat_pada)->format('d M Y') }}</td>
        <td>
            <span class="badge-method">
                {{ $trx->metode_pembayaran ?? '-' }}
            </span>
        </td>
        <td class="nominal">
            Rp {{ number_format($trx->grand_total ?? $trx->total_harga, 0, ',', '.') }}
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center text-muted py-4">
            Data transaksi belum ada
        </td>
    </tr>
@endforelse
</tbody>
            </table>
        </div>

        {{-- FOOTER --}}
        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <div class="page-subtitle">
    Menampilkan {{ $transaksis->firstItem() ?? 0 }}-{{ $transaksis->lastItem() ?? 0 }}
    dari {{ $transaksis->total() }} transaksi
</div>

           <div>
    {{ $transaksis->links() }}
</div>
        </div>

    </div>

</div>

@endsection
