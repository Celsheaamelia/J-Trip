@extends('layout.app')

@section('styles')
<style>
    .dashboard-page {
        padding: 8px 6px;
    }

    .topbar-search {
        max-width: 340px;
        background: #f3f4f6;
        border-radius: 999px;
        padding: 10px 16px;
        border: 1px solid #ececec;
    }

    .topbar-search input {
        background: transparent;
        border: none;
        outline: none;
        width: 100%;
        font-size: 14px;
        color: #6b7280;
    }

    .page-title {
        font-size: 44px;
        font-weight: 700;
        color: #155c43;
        line-height: 1.1;
        margin-bottom: 6px;
    }

    .page-subtitle {
        font-size: 14px;
        color: #7b7f86;
        margin-bottom: 0;
    }

    .profile-box {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .profile-text {
        text-align: right;
        line-height: 1.1;
    }

    .profile-text .name {
        font-size: 14px;
        font-weight: 700;
        color: #155c43;
    }

    .profile-text .role {
        font-size: 11px;
        color: #9aa3af;
    }

    .profile-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 3px solid #155c43;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        background: #fff;
    }

    .logout-btn {
        background: #155c43;
        color: #fff;
        border: none;
        border-radius: 10px;
        padding: 8px 14px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .logout-btn:hover {
        background: #124b37;
        color: #fff;
    }

    .summary-card {
        background: #fff;
        border: 1px solid #efefef;
        border-radius: 18px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.04);
        min-height: 145px;
    }

    .summary-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 18px;
    }

    .summary-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: #e8f5ec;
        color: #1f7a5c;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
    }

    .summary-badge {
        background: #e8f5ec;
        color: #22a06b;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        padding: 5px 10px;
    }

    .summary-label {
        font-size: 13px;
        color: #7b7f86;
        margin-bottom: 4px;
    }

    .summary-value {
        font-size: 34px;
        font-weight: 700;
        color: #1f2937;
        line-height: 1.1;
    }

    .panel-card {
        background: #fff;
        border: 1px solid #efefef;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.04);
        height: 100%;
    }

    .panel-title {
        font-size: 18px;
        font-weight: 700;
        color: #222;
        margin-bottom: 2px;
    }

    .panel-subtitle {
        font-size: 13px;
        color: #8a8f98;
        margin-bottom: 14px;
    }

    .chart-wrapper {
        width: 100%;
        height: 280px;
        background: #fff;
        border: 1px solid #f2f2f2;
        border-radius: 16px;
        padding: 12px;
    }

    .chart-wrapper canvas {
        width: 100% !important;
        height: 100% !important;
    }

    .demo-item {
        margin-bottom: 18px;
    }

    .demo-head {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        margin-bottom: 6px;
        color: #555;
        font-weight: 600;
    }

    .progress {
        height: 8px;
        border-radius: 10px;
        background: #ececec;
        overflow: hidden;
    }

    .progress-bar-green {
        background: #155c43;
    }

    .progress-bar-light {
        background: #3b8f73;
    }

    .progress-bar-gold {
        background: #8d6e3f;
    }

    .detail-link {
        color: #155c43;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .status-paid-text {
        color: #22a06b;
        font-weight: 700;
    }

    .status-pending-text {
        color: #3b8f73;
        font-weight: 700;
    }

    .status-failed-text {
        color: #8d6e3f;
        font-weight: 700;
    }

    .destination-card {
        background: #fff;
        border: 1px solid #efefef;
        border-radius: 20px;
        padding: 0;
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(0,0,0,0.04);
        height: 100%;
        min-height: 282px;
    }

    .destination-image {
        width: 100%;
        height: 282px;
        object-fit: cover;
        display: block;
        background: #e5e7eb;
    }

    .destination-overlay {
        padding: 14px 16px;
        background: linear-gradient(to top, rgba(0,0,0,0.74), rgba(0,0,0,0));
        margin-top: -82px;
        position: relative;
        color: #fff;
        min-height: 82px;
    }

    .destination-name {
        font-size: 16px;
        font-weight: 700;
        line-height: 1.2;
    }

    .destination-sub {
        font-size: 12px;
        opacity: 0.9;
    }

    .mini-table-card {
        background: #fff;
        border: 1px solid #efefef;
        border-radius: 20px;
        padding: 20px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.04);
        height: 100%;
    }

    .mini-table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 14px;
    }

    .mini-table-title {
        font-size: 18px;
        font-weight: 700;
        color: #222;
        margin: 0;
    }

    .see-all {
        color: #155c43;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
    }

    .mini-table {
        width: 100%;
    }

    .mini-table th {
        font-size: 11px;
        color: #9aa3af;
        font-weight: 700;
        padding: 10px 8px;
        border-bottom: 1px solid #f1f1f1;
        white-space: nowrap;
    }

    .mini-table td {
        font-size: 12px;
        color: #374151;
        padding: 12px 8px;
        border-bottom: 1px solid #f5f5f5;
        vertical-align: middle;
    }

    .user-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .user-avatar-mini {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: #e8c886;
        color: #7c5d1d;
        font-size: 10px;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .status-success {
        color: #22a06b;
        font-weight: 700;
    }

    .status-danger {
        color: #e3342f;
        font-weight: 700;
    }

    .status-warning {
        color: #b7791f;
        font-weight: 700;
    }

    .nominal-text {
        font-weight: 700;
        color: #374151;
        white-space: nowrap;
    }

    .empty-text {
        text-align: center;
        color: #9aa3af;
        padding: 22px 8px;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 32px;
        }

        .topbar-search {
            max-width: 100%;
        }

        .chart-wrapper {
            height: 240px;
        }

        .destination-image {
            height: 230px;
        }
    }
</style>
@endsection

@section('content')

@php
    $adminName = auth()->user()->name ?? 'Admin JTrip';
    $adminRole = 'Super Admin';

    /*
        Folder gambar wisata:
        public/uploads/wisata/nama_file.jpg

        Kalau folder kamu ternyata public/upload/wisata,
        ganti uploads/wisata jadi upload/wisata.
    */
    $defaultImage = asset('assets/images/default.jpg');

    if (!empty($popularDestination) && !empty($popularDestination->image)) {
        $popularImage = asset('uploads/wisata/' . $popularDestination->image);
    } else {
        $popularImage = $defaultImage;
    }
@endphp

<div class="dashboard-page">

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
        <div class="topbar-search d-flex align-items-center">
            <span class="me-2 text-muted">⌕</span>
            <input type="text" placeholder="Cari data atau laporan">
        </div>

        <div class="d-flex align-items-center gap-3">
            <div class="profile-box">
                <div class="profile-text">
                    <div class="name">{{ $adminName }}</div>
                    <div class="role">{{ $adminRole }}</div>
                </div>
                <div class="profile-avatar">👤</div>
            </div>

            <a href="{{ url('/logout') }}" class="btn logout-btn">
                Keluar
            </a>
        </div>
    </div>

    <div class="mb-4">
        <h1 class="page-title">Dashboard</h1>
        <p class="page-subtitle">
            Selamat datang kembali, pantau performa pariwisata Jember hari ini.
        </p>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="summary-card h-100">
                <div class="summary-top">
                    <div class="summary-icon">🏞</div>
                    <div class="summary-badge">Database</div>
                </div>
                <div class="summary-label">Total Wisata</div>
                <div class="summary-value">
                    {{ number_format($totalWisata ?? 0, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card h-100">
                <div class="summary-top">
                    <div class="summary-icon">🎟</div>
                    <div class="summary-badge">Paid / Used</div>
                </div>
                <div class="summary-label">Tiket Terjual</div>
                <div class="summary-value">
                    {{ number_format($tiketTerjual ?? 0, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="summary-card h-100">
                <div class="summary-top">
                    <div class="summary-icon">📊</div>
                    <div class="summary-badge">Semua Status</div>
                </div>
                <div class="summary-label">Total Transaksi</div>
                <div class="summary-value">
                    {{ number_format($totalTransaksi ?? 0, 0, ',', '.') }}
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-lg-8">
            <div class="panel-card">
                <div class="d-flex justify-content-between align-items-start flex-wrap">
                    <div>
                        <h3 class="panel-title">Tren Penjualan Bulanan</h3>
                        <div class="panel-subtitle">
                            Pertumbuhan tiket terjual dan transaksi sepanjang tahun {{ $tahun ?? date('Y') }}
                        </div>
                    </div>
                </div>

                <div class="chart-wrapper">
                    <canvas id="monthlySalesChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel-card">
                <h3 class="panel-title">Status Transaksi</h3>
                <div class="panel-subtitle">
                    Paid: {{ $paidCount ?? 0 }} •
                    Pending: {{ $pendingCount ?? 0 }} •
                    Failed: {{ $failedCount ?? 0 }}
                </div>

                <div class="demo-item">
                    <div class="demo-head">
                        <span class="status-paid-text">Paid</span>
                        <span>{{ $paidPercent ?? 0 }}%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-green"
                             style="width: {{ $paidPercent ?? 0 }}%">
                        </div>
                    </div>
                </div>

                <div class="demo-item">
                    <div class="demo-head">
                        <span class="status-pending-text">Pending</span>
                        <span>{{ $pendingPercent ?? 0 }}%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-light"
                             style="width: {{ $pendingPercent ?? 0 }}%">
                        </div>
                    </div>
                </div>

                <div class="demo-item">
                    <div class="demo-head">
                        <span class="status-failed-text">Failed</span>
                        <span>{{ $failedPercent ?? 0 }}%</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar progress-bar-gold"
                             style="width: {{ $failedPercent ?? 0 }}%">
                        </div>
                    </div>
                </div>

                <a href="{{ url('/admin/transaksi') }}" class="detail-link">
                    Lihat Detail Transaksi ›
                </a>
            </div>
        </div>
    </div>

    <div class="row g-3">
        <div class="col-lg-4">
            <div class="destination-card">
                <img src="{{ $popularImage }}"
                     alt="{{ $popularDestination->name ?? 'Destinasi Populer' }}"
                     class="destination-image"
                     onerror="this.onerror=null;this.src='{{ $defaultImage }}';">

                <div class="destination-overlay">
                    <div class="destination-name">
                        {{ $popularDestination->name ?? 'Belum ada data wisata' }}
                    </div>
                    <div class="destination-sub">
                        {{ number_format($popularDestination->total_tiket ?? 0, 0, ',', '.') }}
                        tiket terjual
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="mini-table-card">
                <div class="mini-table-header">
                    <h3 class="mini-table-title">Transaksi Terakhir</h3>
                    <a href="{{ url('/admin/transaksi') }}" class="see-all">Lihat Semua</a>
                </div>

                <div class="table-responsive">
                    <table class="mini-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAMA PEMBELI</th>
                                <th>DESTINASI</th>
                                <th>STATUS</th>
                                <th>NOMINAL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($latestTransactions ?? [] as $trx)
                                @php
                                    $status = strtolower($trx->status_pembayaran ?? 'pending');

                                    $statusClass = match ($status) {
                                        'paid', 'settlement', 'capture', 'success' => 'status-success',
                                        'failed', 'expire', 'cancel', 'deny' => 'status-danger',
                                        default => 'status-warning',
                                    };

                                    $statusLabel = match ($status) {
                                        'paid', 'settlement', 'capture', 'success' => 'Berhasil',
                                        'failed', 'expire', 'cancel', 'deny' => 'Gagal',
                                        default => 'Pending',
                                    };

                                    $namaUser = $trx->nama_user ?? 'User';
                                    $words = collect(explode(' ', $namaUser))
                                        ->filter()
                                        ->values();

                                    $initial = $words->take(2)->map(function ($word) {
                                        return strtoupper(substr($word, 0, 1));
                                    })->implode('');

                                    if (!$initial) {
                                        $initial = 'U';
                                    }

                                    $nominal = $trx->grand_total ?? $trx->total_harga ?? 0;
                                @endphp

                                <tr>
                                    <td>
                                        {{ $trx->kode_pesanan ?? $trx->kode_booking ?? $trx->id_transaksi }}
                                    </td>
                                    <td>
                                        <span class="user-badge">
                                            <span class="user-avatar-mini">{{ $initial }}</span>
                                            {{ $namaUser }}
                                        </span>
                                    </td>
                                    <td>{{ $trx->nama_wisata ?? '-' }}</td>
                                    <td class="{{ $statusClass }}">{{ $statusLabel }}</td>
                                    <td class="nominal-text">
                                        Rp {{ number_format($nominal, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="empty-text">
                                        Belum ada transaksi
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
@php
    $chartMonthlyTickets = $monthlyTickets ?? array_fill(0, 12, 0);
    $chartMonthlyTransactions = $monthlyTransactions ?? array_fill(0, 12, 0);
@endphp

<script>
    const chartElement = document.getElementById('monthlySalesChart');

    if (chartElement) {
        const ctx = chartElement.getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [
                    {
                        label: 'Tiket Terjual',
                        data: @json($chartMonthlyTickets),
                        borderColor: '#155c43',
                        backgroundColor: 'rgba(21, 92, 67, 0.10)',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#155c43',
                        pointBorderColor: '#155c43',
                        borderWidth: 3
                    },
                    {
                        label: 'Total Transaksi',
                        data: @json($chartMonthlyTransactions),
                        borderColor: '#b28b45',
                        backgroundColor: 'rgba(178, 139, 69, 0.04)',
                        fill: false,
                        tension: 0.4,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        pointBackgroundColor: '#b28b45',
                        pointBorderColor: '#b28b45',
                        borderWidth: 3
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            pointStyle: 'circle',
                            boxWidth: 8,
                            color: '#6b7280',
                            font: {
                                size: 12,
                                weight: '600'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#ffffff',
                        titleColor: '#111827',
                        bodyColor: '#374151',
                        borderColor: '#e5e7eb',
                        borderWidth: 1,
                        padding: 12,
                        titleFont: {
                            weight: '700'
                        },
                        bodyFont: {
                            size: 12
                        },
                        displayColors: true
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#9aa3af',
                            font: {
                                size: 12
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#f1f5f9'
                        },
                        ticks: {
                            color: '#9aa3af',
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });
    }
</script>
@endsection