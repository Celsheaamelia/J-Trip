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

        <div class="filter-box mt-3 mt-md-0">
            <input type="date">
            <input type="date">
            <button class="btn-apply">Terapkan</button>
        </div>
    </div>

    {{-- SUMMARY --}}
    <div class="row g-3 mb-4">

        <div class="col-md-8">
            <div class="summary-card h-100">
                <div class="summary-small">Total Tiket Terjual</div>
                <h2>1.428.500</h2>

                <div class="d-flex gap-4 mt-3">
                    <div>
                        <div class="summary-small">Bulan Ini</div>
                        <strong>84.2k</strong>
                    </div>
                    <div>
                        <div class="summary-small">Bulan Lalu</div>
                        <strong>58.6k</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-box h-100">
                <div class="summary-small">Total Transaksi</div>
                <h3>24.812</h3>

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
                    <tr>
                        <td>#JSM-88210</td>
                        <td>Puncak Rembangan</td>
                        <td>21 Des 2025</td>
                        <td><span class="badge-method">QRIS</span></td>
                        <td class="nominal">Rp 125.000</td>
                    </tr>

                    <tr>
                        <td>#JSM-88209</td>
                        <td>Pantai Papuma</td>
                        <td>21 Des 2025</td>
                        <td><span class="badge-method">Transfer</span></td>
                        <td class="nominal">Rp 450.000</td>
                    </tr>

                    <tr>
                        <td>#JSM-88208</td>
                        <td>Gn. Gambir</td>
                        <td>21 Des 2025</td>
                        <td><span class="badge-method">OVO</span></td>
                        <td class="nominal">Rp 75.000</td>
                    </tr>

                    <tr>
                        <td>#JSM-88207</td>
                        <td>Air Terjun Tancak</td>
                        <td>21 Des 2025</td>
                        <td><span class="badge-method">QRIS</span></td>
                        <td class="nominal">Rp 40.000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        {{-- FOOTER --}}
        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap">
            <div class="page-subtitle">Menampilkan 1-4 dari 24.000 transaksi</div>

            <div class="pagination-ui">
                <span>&lt;</span>
                <span class="active">1</span>
                <span>2</span>
                <span>3</span>
                <span>&gt;</span>
            </div>
        </div>

    </div>

</div>

@endsection
