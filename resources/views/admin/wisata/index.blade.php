@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="fw-bold">Manajemen Wisata</h2>
        <small class="text-muted">
            Kelola seluruh daftar destinasi wisata, harga tiket dan status operasional
        </small>
    </div>
    <button class="btn btn-success">+ Tambah Wisata</button>
</div>

{{-- CARD STATISTIK --}}
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h4>42</h4>
            <small>Total Destinasi</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h4>38</h4>
            <small>Status Aktif</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h4>12k</h4>
            <small>Tiket Terjual</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h4>12k</h4>
            <small>Pendapatan</small>
        </div>
    </div>
</div>

{{-- TABEL --}}
<div class="card shadow-sm p-3">
    <table class="table align-middle">
        <thead class="table-light">
            <tr>
                <th>Nama Wisata</th>
                <th>Harga</th>
                <th>Lokasi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="d-flex align-items-center gap-2">
                    <img src="https://via.placeholder.com/50" class="rounded">
                    <div>
                        <strong>Pantai Papuma</strong><br>
                        <small class="text-muted">Wisata Alam</small>
                    </div>
                </td>

                <td>Rp 25.000</td>
                <td>Wuluhan, Jember</td>

                <td>
                    <span class="badge bg-success">Aktif</span>
                </td>

                <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>

            <tr>
                <td class="d-flex align-items-center gap-2">
                    <img src="https://via.placeholder.com/50" class="rounded">
                    <div>
                        <strong>Pantai Papuma</strong><br>
                        <small class="text-muted">Wisata Alam</small>
                    </div>
                </td>

                <td>Rp 25.000</td>
                <td>Wuluhan, Jember</td>

                <td>
                    <span class="badge bg-warning text-dark">Perbaikan</span>
                </td>

                <td>
                    <button class="btn btn-sm btn-warning">Edit</button>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
