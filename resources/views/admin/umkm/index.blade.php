@extends('layout.app')
@php
    use Illuminate\Support\Str;
@endphp

@section('styles')
<style>
    .umkm-page {
        padding: 8px 6px;
    }

    .breadcrumb-text {
        font-size: 12px;
        color: #9aa3af;
        margin-bottom: 8px;
    }

    .breadcrumb-text span {
        color: #1f7a5c;
        font-weight: 600;
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

    .top-btn {
        background: #155c43;
        color: #fff;
        border: none;
        border-radius: 14px;
        padding: 12px 20px;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 6px 18px rgba(21, 92, 67, 0.18);
    }

    .top-btn:hover {
        background: #124b37;
        color: #fff;
    }

    .stat-card {
        background: #fff;
        border-radius: 18px;
        padding: 22px;
        min-height: 150px;
        border: 1px solid #efefef;
        box-shadow: 0 8px 22px rgba(0,0,0,0.05);
    }

    .stat-icon {
        width: 42px;
        height: 42px;
        border-radius: 12px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        font-weight: 700;
        margin-bottom: 16px;
    }

    .icon-green {
        background: #dff3e8;
        color: #1f7a5c;
    }

    .icon-blue {
        background: #dfeafe;
        color: #356ae6;
    }

    .icon-orange {
        background: #fbe8d4;
        color: #e67e22;
    }

    .icon-darkgreen {
        background: #dff0e7;
        color: #155c43;
    }

    .stat-title {
        font-size: 13px;
        color: #7b7f86;
        margin-bottom: 8px;
    }

    .stat-value {
        font-size: 34px;
        font-weight: 700;
        color: #1f2937;
        line-height: 1.1;
        margin-bottom: 6px;
    }

    .stat-sub {
        font-size: 12px;
        color: #9aa3af;
    }

    .stat-sub.green {
        color: #22a06b;
    }

    .stat-sub.orange {
        color: #e67e22;
    }

    .table-card {
        background: #fff;
        border-radius: 22px;
        overflow: hidden;
        border: 1px solid #efefef;
        box-shadow: 0 8px 24px rgba(0,0,0,0.05);
    }

    .table-card-header {
        padding: 18px 22px;
        border-bottom: 1px solid #f1f1f1;
    }

    .tab-btn {
        background: transparent;
        border: none;
        color: #7b7f86;
        font-size: 14px;
        font-weight: 600;
        padding: 10px 16px;
        border-radius: 999px;
    }

    .tab-btn.active {
        background: #dff3e8;
        color: #1f7a5c;
    }

    .header-action-btn {
        background: #fff;
        border: 1px solid #e5e7eb;
        color: #4b5563;
        border-radius: 12px;
        padding: 10px 16px;
        font-size: 13px;
        font-weight: 500;
    }

    .header-action-btn:hover {
        background: #f9fafb;
    }

    .custom-table thead th {
        background: #fff;
        border: 0;
        border-bottom: 1px solid #f1f1f1;
        padding: 16px 18px;
        font-size: 11px;
        font-weight: 700;
        color: #9aa3af;
        white-space: nowrap;
    }

    .custom-table tbody td {
        padding: 18px;
        font-size: 14px;
        vertical-align: middle;
        border-top: 1px solid #f5f5f5;
    }

    .umkm-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .umkm-logo {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        object-fit: cover;
        background: #f3f4f6;
    }

    .umkm-name {
        font-size: 15px;
        font-weight: 700;
        color: #1f2937;
        line-height: 1.2;
    }

    .umkm-sub {
        font-size: 12px;
        color: #9aa3af;
    }

    .owner-name {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        line-height: 1.2;
    }

    .owner-phone {
        font-size: 12px;
        color: #9aa3af;
    }

    .wisata-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 999px;
        background: #e8f5ec;
        color: #1f7a5c;
        font-size: 12px;
        font-weight: 600;
    }

    .status-badge {
        display: inline-block;
        padding: 6px 14px;
        border-radius: 999px;
        font-size: 12px;
        font-weight: 700;
        text-align: center;
        min-width: 76px;
    }

    .status-active {
        background: #e6f6ec;
        color: #1f7a5c;
    }

    .status-review {
        background: #fff1e8;
        color: #e67e22;
    }

    .aksi-wrap {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .aksi-link {
        text-decoration: none;
        font-size: 15px;
        font-weight: 700;
    }

    .aksi-edit {
        color: #356ae6;
    }

    .aksi-delete {
        color: #e3342f;
    }

    .table-footer {
        padding: 16px 22px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        border-top: 1px solid #f3f4f6;
        background: #fff;
    }

    .footer-text {
        font-size: 13px;
        color: #7b7f86;
    }

    .pagination-wrap {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .page-ui {
        width: 32px;
        height: 32px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        color: #6b7280;
        background: #fff;
        border: 1px solid #ececec;
        font-weight: 600;
    }

    .page-ui.active {
        background: #155c43;
        color: #fff;
        border-color: #155c43;
    }

    @media (max-width: 768px) {
        .page-title {
            font-size: 30px;
        }
    }
</style>
@endsection

@section('content')

<div class="umkm-page">

    <div class="breadcrumb-text">
        Master Data > <span>UMKM</span>
    </div>

    <div class="d-flex justify-content-between align-items-start flex-wrap mb-4">
        <div>
            <h1 class="page-title mb-2">Manajemen UMKM</h1>
            <p class="page-subtitle mb-0">
                Kelola data mitra usaha mikro, kecil, dan menengah di sekitar destinasi wisata.
            </p>
        </div>

        <div class="mt-3 mt-md-0">
            <a href="{{ route('admin.umkm.create') }}" class="btn top-btn">
    + Tambah UMKM
</a>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card h-100">
                <div class="stat-icon icon-green">🏪</div>
                <div class="stat-title">Total UMKM</div>
                <div class="stat-value">{{ number_format($total) }}</div>
                <div class="stat-sub green">↗ +12% bulan ini</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card h-100">
                <div class="stat-icon icon-blue">🛡</div>
                <div class="stat-title">UMKM Terverifikasi</div>
                <div class="stat-value">{{ number_format($total) }}</div>
                <div class="stat-sub">87% dari total data</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card h-100">
                <div class="stat-icon icon-orange">•••</div>
                <div class="stat-title">Menunggu Review</div>
                <div class="stat-value">0</div>
                <div class="stat-sub orange">Membutuhkan tindakan</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="stat-card h-100">
                <div class="stat-icon icon-darkgreen">🏷</div>
                <div class="stat-title">Kategori Terbanyak</div>
                <div class="stat-value">-</div>
<div class="stat-sub">Belum ada kategori</div>
            </div>
        </div>
    </div>

    <div class="table-card">
        <div class="table-card-header d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex gap-2 mb-3 mb-md-0">
                <button class="tab-btn active">Semua</button>
                <button class="tab-btn">Aktif</button>
                <button class="tab-btn">Non-Aktif</button>
            </div>

            <div class="d-flex gap-2">
                <button class="btn header-action-btn">Filter Wisata</button>
                <button class="btn header-action-btn">Export Excel</button>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table custom-table mb-0">
                <thead>
                    <tr>
                        <th>NAMA UMKM</th>
                        <th>OWNER</th>
                        <th>WISATA TERKAIT</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
@forelse ($umkms as $umkm)
<tr>
    <td>
        <div class="umkm-info">
            <img
                src="{{ $umkm->gambar ? asset('storage/'.$umkm->gambar) : 'https://via.placeholder.com/46' }}"
                class="umkm-logo"
            >
            <div>
                <div class="umkm-name">{{ $umkm->nama }}</div>
                <div class="umkm-sub">
                    {{ Str::limit($umkm->deskripsi, 40) ?? '-' }}
                </div>
            </div>
        </div>
    </td>

    <td>
        <div class="owner-name">{{ $umkm->pemilik }}</div>
        <div class="owner-phone">-</div>
    </td>

    <td>
        <span class="wisata-badge">
            📍 {{ $umkm->wisata->nama ?? 'Tidak ada wisata' }}
        </span>
    </td>

    <td>
        <span class="status-badge status-active">Aktif</span>
    </td>

    <td>
        <div class="aksi-wrap">
            <a href="{{ route('admin.umkm.edit', $umkm->id_umkm) }}" class="aksi-link aksi-edit">✏</a>

            <form action="{{ route('admin.umkm.delete', $umkm->id_umkm) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="aksi-link aksi-delete" style="border:none;background:none;">🗑</button>
            </form>
        </div>
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center text-muted py-4">
        Data UMKM belum ada
    </td>
</tr>
@endforelse
</tbody>
            </table>
        </div>

        <div class="table-footer">
            <div class="footer-text">
                Menampilkan {{ $umkms->firstItem() }} - {{ $umkms->lastItem() }}
dari <strong>{{ $umkms->total() }}</strong> UMKM
            </div>

            <div>
    {{ $umkms->links() }}
</div>
        </div>
    </div>

</div>

@endsection
