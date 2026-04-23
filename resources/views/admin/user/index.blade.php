@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="fw-bold text-success">Data User</h2>
        <small class="text-muted">
            Kelola hak akses dan informasi pengguna sistem JTrip
        </small>
    </div>
    <button class="btn btn-success">+ Tambah User</button>
</div>

{{-- CARD STATISTIK --}}
<div class="row mb-4">

    <div class="col-md-4">
        <div class="card p-3 shadow-sm bg-success text-white">
            <h6>Total User</h6>
            <h3>1,248</h3>
            <small>+12% bulan ini</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h6>Administrator</h6>
            <h3>14</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h6>User Aktif</h6>
            <h3>892</h3>

            <div class="progress mt-2" style="height:6px;">
                <div class="progress-bar bg-success" style="width:70%"></div>
            </div>
        </div>
    </div>

</div>

{{-- FILTER --}}
<div class="card p-2 mb-3 shadow-sm d-flex flex-row gap-2">
    <button class="btn btn-sm btn-success">Semua</button>
    <button class="btn btn-sm btn-outline-secondary">Admin</button>
    <button class="btn btn-sm btn-outline-secondary">User</button>
</div>

{{-- TABLE --}}
<div class="card shadow-sm p-3">

    <table class="table align-middle">

        <thead class="table-light">
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td class="d-flex align-items-center gap-2">
                    <div class="rounded-circle bg-warning text-white d-flex justify-content-center align-items-center"
                         style="width:35px;height:35px;">
                        AH
                    </div>
                    <div>
                        <strong>Ahmad Hidayat</strong><br>
                        <small class="text-muted">Terdaftar: Jan 2024</small>
                    </div>
                </td>

                <td>ahmad@email.com</td>

                <td>
                    <span class="badge bg-success">Admin</span>
                </td>

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
                    <div class="rounded-circle bg-primary text-white d-flex justify-content-center align-items-center"
                         style="width:35px;height:35px;">
                        SA
                    </div>
                    <div>
                        <strong>Siti Aminah</strong><br>
                        <small class="text-muted">Terdaftar: Feb 2024</small>
                    </div>
                </td>

                <td>siti@email.com</td>

                <td>
                    <span class="badge bg-secondary">User</span>
                </td>

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
                    <div class="rounded-circle bg-dark text-white d-flex justify-content-center align-items-center"
                         style="width:35px;height:35px;">
                        BW
                    </div>
                    <div>
                        <strong>Bambang Wijaya</strong><br>
                        <small class="text-muted">Terdaftar: Mar 2024</small>
                    </div>
                </td>

                <td>bambang@email.com</td>

                <td>
                    <span class="badge bg-secondary">User</span>
                </td>

                <td>
                    <span class="badge bg-danger">Nonaktif</span>
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
