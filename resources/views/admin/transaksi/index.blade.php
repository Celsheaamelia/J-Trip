@extends('layout.app')

@section('styles')
<style>
    .transaksi-page {
        padding: 8px 6px;
    }

    .page-title {
        font-size: 42px;
        font-weight: 700;
        color: #155c43;
        line-height: 1.1;
    }

    .page-subtitle {
        color: #7b7f86;
        font-size: 15px;
    }

    .search-box {
        background: #ffffff;
        border-radius: 18px;
        padding: 10px 16px;
        border: 1px solid #ececec;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        max-width: 360px;
    }

    .search-box input {
        background: transparent;
        font-size: 14px;
    }

    .search-icon {
        color: #9ca3af;
        font-size: 14px;
    }

    .top-action-btn {
        border-radius: 12px;
        padding: 10px 16px;
        font-size: 13px;
        border: 1px solid #e5e7eb;
        background: #fff;
        color: #444;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }

    .top-action-btn.primary {
        background: #155c43;
        color: #fff;
        border-color: #155c43;
    }

    .stat-card {
        background: #fff;
        border-radius: 18px;
        padding: 22px;
        min-height: 136px;
        border: 1px solid #efefef;
        box-shadow: 0 8px 22px rgba(0,0,0,0.05);
        position: relative;
        overflow: hidden;
    }

    .stat-card.success-card {
        background: #2f7d57;
        color: #fff;
    }

    .stat-card.warning-card {
        background: #efd8a7;
    }

    .stat-title {
        font-size: 12px;
        margin-bottom: 8px;
        color: inherit;
        opacity: 0.9;
    }

    .success-card .stat-title,
    .success-card .stat-desc,
    .success-card .stat-chip {
        color: #fff;
    }

    .stat-value {
        font-size: 32px;
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 10px;
    }

    .stat-desc {
        font-size: 13px;
        color: #6b7280;
    }

    .stat-chip {
        display: inline-block;
        font-size: 11px;
        padding: 6px 10px;
        border-radius: 999px;
        background: rgba(255,255,255,0.18);
        color: #fff;
    }

    .chip-warning {
        background: #f8e5bd;
        color: #8a6418;
    }

    .chip-muted {
        background: #f3e0d6;
        color: #8b5a3c;
    }

    .table-card {
        background: #fff;
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid #efefef;
        box-shadow: 0 8px 24px rgba(0,0,0,0.05);
    }

    .table-card-header {
        padding: 24px 24px 14px 24px;
    }

    .table-title {
        font-size: 22px;
        font-weight: 700;
        margin: 0;
        color: #222;
    }

    .filter-tabs .btn {
        border-radius: 10px;
        font-size: 12px;
        padding: 6px 12px;
        border: 1px solid #e5e7eb;
        background: #fff;
        color: #555;
    }

    .filter-tabs .btn.active {
        background: #e8f3ed;
        color: #155c43;
        border-color: #d7e9df;
        font-weight: 600;
    }

    .custom-table thead th {
        background: #f2f2f2;
        border: 0;
        padding: 16px 18px;
        font-size: 11px;
        font-weight: 700;
        color: #444;
        white-space: nowrap;
    }

    .custom-table tbody td {
        padding: 16px 18px;
        font-size: 13px;
        vertical-align: middle;
        border-top: 1px solid #f0f0f0;
    }

    .order-code {
        color: #19684c;
        font-weight: 700;
        font-size: 13px;
    }

    .small-muted {
        font-size: 11px;
        color: #8a8f98;
    }

    .user-wrap {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .avatar-circle {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        background: #d9f0df;
        color: #2f7d57;
        font-size: 10px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .avatar-circle.orange {
        background: #f4ddb0;
        color: #8a6418;
    }

    .avatar-circle.yellow {
        background: #f0e0b7;
        color: #8a6418;
    }

    .avatar-circle.dark {
        background: #d9d9d9;
        color: #444;
    }

    .user-name {
        font-size: 12px;
        font-weight: 700;
        color: #222;
        line-height: 1.2;
    }

    .status-badge {
        display: inline-block;
        padding: 5px 12px;
        border-radius: 999px;
        font-size: 10px;
        font-weight: 700;
        min-width: 62px;
        text-align: center;
    }

    .status-paid {
        background: #d8eee0;
        color: #2b7a55;
    }

    .status-pending {
        background: #f4ddb0;
        color: #8a6418;
    }

    .status-failed {
        background: #f4d6d6;
        color: #c94a4a;
    }

    .aksi-link {
        color: #155c43;
        text-decoration: none;
        font-weight: 700;
    }

    .table-footer {
        padding: 14px 18px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        border-top: 1px solid #f0f0f0;
        background: #fff;
    }

    .footer-text {
        font-size: 12px;
        color: #6b7280;
    }

    .pagination-wrap {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .page-item-ui {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        color: #666;
        background: #fff;
        border: 1px solid #ececec;
    }

    .page-item-ui.active {
        background: #155c43;
        color: #fff;
        border-color: #155c43;
    }

    .trend-card {
        background: #f5f5f5;
        border-radius: 20px;
        padding: 16px;
        border: 1px solid #efefef;
    }

    .trend-title {
        font-size: 16px;
        font-weight: 700;
        color: #333;
        margin-bottom: 14px;
    }

    .trend-item {
        background: #fff;
        border-radius: 14px;
        padding: 12px 14px;
        display: flex;
        align-items: center;
        gap: 10px;
        height: 100%;
        border: 1px solid #ededed;
    }

    .trend-rank {
        width: 24px;
        height: 24px;
        border-radius: 8px;
        background: #e8f3ed;
        color: #155c43;
        font-size: 11px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .trend-name {
        font-size: 12px;
        font-weight: 700;
        color: #222;
        line-height: 1.2;
    }

    .trend-sub {
        font-size: 11px;
        color: #8a8f98;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 30px;
        }

        .table-title {
            font-size: 18px;
        }
    }
</style>
@endsection

@section('content')

<div class="transaksi-page">

    {{-- Search --}}
    <div class="mb-4">
        <div class="search-box d-flex align-items-center">
            <span class="search-icon me-2">⌕</span>
            <input type="text" class="form-control border-0 shadow-none" placeholder="Cari data laporan..">
        </div>
    </div>

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">
        <div>
            <h1 class="page-title mb-2">Transaksi Tiket</h1>
            <p class="page-subtitle mb-0">
                Kelola dan monitor seluruh arus pendapatan pariwisata.
            </p>
        </div>

        <div class="d-flex gap-2 mt-3 mt-md-0">
            <button class="btn top-action-btn">Filter data</button>
            <button class="btn top-action-btn primary">+ Input Manual</button>
        </div>
    </div>

    {{-- Statistik --}}
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="stat-card success-card h-100">
                <div class="stat-title">Total Tiket Terjual (Bulan Ini)</div>
                <div class="stat-value">1287</div>
                <div class="stat-chip">↗ +12.5% dari bulan lalu</div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card warning-card h-100">
                <div class="stat-title">Transaksi Berhasil</div>
                <div class="stat-value">1,429</div>
                <div class="stat-desc">
                    <span class="status-badge chip-warning">🎟 Tiket Terbit</span>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="stat-card h-100">
                <div class="stat-title">Menunggu Pembayaran</div>
                <div class="stat-value">42</div>
                <div class="stat-desc">
                    <span class="status-badge chip-muted">⚠ Perlu Tindak Lanjut</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Riwayat transaksi --}}
    <div class="table-card mb-4">
        <div class="table-card-header d-flex justify-content-between align-items-center flex-wrap">
            <h3 class="table-title mb-3 mb-md-0">Riwayat Transaksi Terkini</h3>

            <div class="filter-tabs d-flex gap-2">
                <button class="btn active">Semua</button>
                <button class="btn">Sukses</button>
                <button class="btn">Tertunda</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table custom-table mb-0">
                <thead>
                    <tr>
                        <th>ORDER CODE</th>
                        <th>USER</th>
                        <th>TOTAL</th>
                        <th>PAYMENT STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="order-code">#JS-20230901-001</div>
                            <div class="small-muted">14 Okt 2025, 09:41</div>
                        </td>
                        <td>
                            <div class="user-wrap">
                                <div class="avatar-circle">AS</div>
                                <div>
                                    <div class="user-name">Andi Saputra</div>
                                    <div class="small-muted">andi.s@gmail.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold">Rp 450.000</div>
                            <div class="small-muted">3 Tiket • Papuma</div>
                        </td>
                        <td><span class="status-badge status-paid">PAID</span></td>
                        <td><a href="#" class="aksi-link">👁</a></td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order-code">#JS-20230901-002</div>
                            <div class="small-muted">14 Okt 2025, 11:10</div>
                        </td>
                        <td>
                            <div class="user-wrap">
                                <div class="avatar-circle orange">SA</div>
                                <div>
                                    <div class="user-name">Siti Aminah</div>
                                    <div class="small-muted">siti_amin@yahoo.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold">Rp 125.000</div>
                            <div class="small-muted">1 Tiket • Rembangan</div>
                        </td>
                        <td><span class="status-badge status-pending">PENDING</span></td>
                        <td><a href="#" class="aksi-link">👁</a></td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order-code">#JS-20230901-003</div>
                            <div class="small-muted">14 Okt 2025, 13:03</div>
                        </td>
                        <td>
                            <div class="user-wrap">
                                <div class="avatar-circle yellow">BK</div>
                                <div>
                                    <div class="user-name">Budi Kusuma</div>
                                    <div class="small-muted">budi_k@outlook.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold">Rp 75.000</div>
                            <div class="small-muted">2 Tiket • Tancak</div>
                        </td>
                        <td><span class="status-badge status-failed">FAILED</span></td>
                        <td><a href="#" class="aksi-link">👁</a></td>
                    </tr>

                    <tr>
                        <td>
                            <div class="order-code">#JS-20230901-004</div>
                            <div class="small-muted">14 Okt 2025, 13:56</div>
                        </td>
                        <td>
                            <div class="user-wrap">
                                <div class="avatar-circle dark">RH</div>
                                <div>
                                    <div class="user-name">Rian Hidayat</div>
                                    <div class="small-muted">rian.hd@gmail.com</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="fw-bold">Rp 300.000</div>
                            <div class="small-muted">4 Tiket • Payangan</div>
                        </td>
                        <td><span class="status-badge status-paid">PAID</span></td>
                        <td><a href="#" class="aksi-link">👁</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-footer">
            <div class="footer-text">Menampilkan 4 dari 1,429 transaksi</div>

            <div class="pagination-wrap">
                <span class="page-item-ui">&lt;</span>
                <span class="page-item-ui active">1</span>
                <span class="page-item-ui">2</span>
                <span class="page-item-ui">3</span>
                <span class="page-item-ui">&gt;</span>
            </div>
        </div>
    </div>

    {{-- Tren destinasi --}}
    <div class="trend-card">
        <div class="trend-title">Tren Destinasi</div>

        <div class="row g-3">
            <div class="col-md-3">
                <div class="trend-item">
                    <div class="trend-rank">1</div>
                    <div>
                        <div class="trend-name">Pantai Papuma</div>
                        <div class="trend-sub">490 Tiket terjual</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="trend-item">
                    <div class="trend-rank">2</div>
                    <div>
                        <div class="trend-name">Rembangan</div>
                        <div class="trend-sub">327 Tiket terjual</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="trend-item">
                    <div class="trend-rank">3</div>
                    <div>
                        <div class="trend-name">Kebun Teh G. Gambir</div>
                        <div class="trend-sub">286 Tiket terjual</div>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="trend-item">
                    <div class="trend-rank">4</div>
                    <div>
                        <div class="trend-name">Pantai Payangan</div>
                        <div class="trend-sub">199 Tiket terjual</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
