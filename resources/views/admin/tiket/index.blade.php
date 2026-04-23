@extends('layout.app')

@section('styles')
<style>
    .ticket-page {
        padding: 10px 6px;
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
        border-radius: 20px;
        padding: 10px 16px;
        border: 1px solid #ececec;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }

    .search-box input {
        background: transparent;
        font-size: 14px;
    }

    .search-icon {
        color: #9ca3af;
        font-size: 14px;
    }

    .period-btn {
        background: #f3f4f6;
        border: 1px solid #e5e7eb;
        color: #555;
        border-radius: 10px;
        font-size: 13px;
        padding: 8px 18px;
    }

    .period-btn.active {
        background: #ffffff;
        color: #155c43;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .ticket-stat-card {
        background: #fff;
        border-radius: 18px;
        padding: 24px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        border: 1px solid #efefef;
        min-height: 150px;
    }

    .active-card {
        background: #2f7d57;
        color: #fff;
    }

    .stat-label {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .8px;
        opacity: .9;
        margin-bottom: 10px;
    }

    .stat-value {
        font-size: 40px;
        font-weight: 700;
        line-height: 1.1;
        margin-bottom: 14px;
    }

    .stat-badge {
        display: inline-block;
        background: rgba(255,255,255,0.18);
        color: #fff;
        font-size: 12px;
        padding: 6px 12px;
        border-radius: 20px;
    }

    .icon-wrap {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        font-weight: 700;
    }

    .icon-warning {
        background: #f4ddb0;
        color: #8a6418;
    }

    .icon-success {
        background: #dff2e7;
        color: #1f7a4f;
    }

    .icon-gray {
        background: #ececec;
        color: #8f8f8f;
    }

    .mini-label {
        font-size: 11px;
        font-weight: 700;
        color: #8b8b8b;
        margin-bottom: 8px;
    }

    .stat-number {
        font-size: 34px;
        font-weight: 700;
        color: #222;
        line-height: 1.1;
    }

    .mini-desc {
        margin-top: 8px;
        font-size: 13px;
        color: #81858b;
    }

    .ticket-table-card {
        background: #fff;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 8px 24px rgba(0,0,0,0.05);
        border: 1px solid #efefef;
    }

    .table-card-header {
        padding: 26px 26px 18px 26px;
    }

    .table-title {
        font-size: 34px;
        font-weight: 700;
        color: #222;
        margin: 0;
    }

    .action-btn {
        background: #fff;
        border: 1px solid #e5e7eb;
        color: #444;
        border-radius: 12px;
        padding: 10px 16px;
        font-size: 14px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }

    .custom-ticket-table thead th {
        background: #d7d7d7;
        border: 0;
        padding: 18px 20px;
        font-size: 12px;
        font-weight: 700;
        color: #303030;
        white-space: nowrap;
    }

    .custom-ticket-table tbody td {
        padding: 18px 20px;
        vertical-align: middle;
        border-top: 1px solid #eeeeee;
        font-size: 14px;
        background: #fff;
    }

    .ticket-code {
        color: #19684c;
        font-weight: 700;
    }

    .avatar-circle {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        background: #e8c886;
        color: #7c5d1d;
        font-size: 10px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .user-name {
        font-size: 12px;
        font-weight: 700;
        color: #222;
        line-height: 1.2;
    }

    .status-pill {
        display: inline-block;
        border-radius: 999px;
        padding: 7px 16px;
        font-size: 11px;
        font-weight: 700;
        min-width: 78px;
        text-align: center;
    }

    .status-paid {
        background: #d8eee0;
        color: #2b7a55;
    }

    .status-pending {
        background: #ecd19d;
        color: #8a6418;
    }

    .status-used {
        background: #e6e6e6;
        color: #888;
    }

    .eye-link {
        color: #155c43;
        text-decoration: none;
        font-size: 16px;
        font-weight: bold;
    }

    .table-footer {
        background: #efefef;
        padding: 16px 22px;
    }

    .footer-info {
        font-size: 14px;
        color: #444;
    }

    .pagination-wrap {
        font-size: 14px;
    }

    .page-number,
    .page-arrow,
    .page-dots {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 30px;
        height: 30px;
        color: #444;
        border-radius: 8px;
        font-weight: 600;
    }

    .page-number.active {
        background: #155c43;
        color: #fff;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 30px;
        }

        .table-title {
            font-size: 24px;
        }

        .ticket-stat-card {
            min-height: auto;
        }
    }
</style>
@endsection

@section('content')

<div class="ticket-page">

    <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">
        <div>
            <h1 class="page-title mb-2">Manajemen Tiket</h1>
            <p class="page-subtitle mb-0">
                Pantau dan kelola seluruh pemesanan tiket wisata secara real-time
            </p>
        </div>

        <div class="d-flex gap-2 mt-3 mt-md-0">
            <button class="btn period-btn active">Harian</button>
            <button class="btn period-btn">Mingguan</button>
            <button class="btn period-btn">Bulanan</button>
        </div>
    </div>

    <div class="mb-4" style="max-width: 340px;">
        <div class="search-box d-flex align-items-center">
            <span class="search-icon me-2">⌕</span>
            <input type="text" class="form-control border-0 shadow-none" placeholder="Cari tiket atau user...">
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="ticket-stat-card active-card h-100">
                <div class="stat-label">TOTAL BOOKING</div>
                <div class="stat-value">1.287</div>
                <div class="stat-badge">↗ +12% dari bulan lalu</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ticket-stat-card h-100">
                <div class="icon-wrap icon-warning mb-3">◔</div>
                <div class="mini-label">PENDING</div>
                <div class="stat-number">38</div>
                <div class="mini-desc">Menunggu Pembayaran</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ticket-stat-card h-100">
                <div class="icon-wrap icon-success mb-3">✓</div>
                <div class="mini-label">PAID</div>
                <div class="stat-number">1,287</div>
                <div class="mini-desc">Transaksi Berhasil</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="ticket-stat-card h-100">
                <div class="icon-wrap icon-gray mb-3">↺</div>
                <div class="mini-label">USED</div>
                <div class="stat-number">122</div>
                <div class="mini-desc">Tiket yang digunakan</div>
            </div>
        </div>
    </div>

    <div class="ticket-table-card">
        <div class="table-card-header d-flex justify-content-between align-items-center flex-wrap">
            <h3 class="table-title mb-3 mb-md-0">Daftar Reservasi Terbaru</h3>

            <div class="d-flex gap-2">
                <button class="btn action-btn">Filter</button>
                <button class="btn action-btn">Ekspor CSV</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table custom-ticket-table mb-0">
                <thead>
                    <tr>
                        <th>KODE TIKET</th>
                        <th>USER</th>
                        <th>WISATA</th>
                        <th>TANGGAL</th>
                        <th>JUMLAH</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="ticket-code">#JS-24099001</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-circle">RA</div>
                                <div>
                                    <div class="user-name">Rizky Amelia</div>
                                    <small class="text-muted">amelia@example.com</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-muted">Pantai Papuma</td>
                        <td class="text-muted">16 April 2026</td>
                        <td class="fw-semibold">4 Orang</td>
                        <td><span class="status-pill status-paid">PAID</span></td>
                        <td><a href="#" class="eye-link">◉</a></td>
                    </tr>

                    <tr>
                        <td class="ticket-code">#JS-24099002</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-circle">RA</div>
                                <div>
                                    <div class="user-name">Rizky Amelia</div>
                                    <small class="text-muted">amelia@example.com</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-muted">Pantai Papuma</td>
                        <td class="text-muted">16 April 2026</td>
                        <td class="fw-semibold">4 Orang</td>
                        <td><span class="status-pill status-pending">PENDING</span></td>
                        <td><a href="#" class="eye-link">◉</a></td>
                    </tr>

                    <tr>
                        <td class="ticket-code">#JS-24099003</td>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="avatar-circle">RA</div>
                                <div>
                                    <div class="user-name">Rizky Amelia</div>
                                    <small class="text-muted">amelia@example.com</small>
                                </div>
                            </div>
                        </td>
                        <td class="text-muted">Pantai Papuma</td>
                        <td class="text-muted">16 April 2026</td>
                        <td class="fw-semibold">4 Orang</td>
                        <td><span class="status-pill status-used">USED</span></td>
                        <td><a href="#" class="eye-link">◉</a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="table-footer d-flex justify-content-between align-items-center flex-wrap">
            <div class="footer-info">
                Menampilkan 1 - 4 dari <strong>1.287</strong> tiket
            </div>

            <div class="pagination-wrap d-flex align-items-center gap-2">
                <span class="page-arrow">&lt;</span>
                <span class="page-number active">1</span>
                <span class="page-number">2</span>
                <span class="page-number">3</span>
                <span class="page-dots">...</span>
                <span class="page-number">1287</span>
                <span class="page-arrow">&gt;</span>
            </div>
        </div>
    </div>

</div>

@endsection
