@extends('layout.app')

@section('content')

<h2>Data Pengguna</h2>

{{-- CARD STATISTIK --}}
<div class="row my-3">

    <div class="col-md-4">
        <div class="card p-3 bg-success text-white shadow">
            <h6>Total Pengguna</h6>
            <h3>1,248</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow">
            <h6>Administrator</h6>
            <h3>14</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow">
            <h6>Pengguna Aktif</h6>
            <h3>892</h3>
        </div>
    </div>

</div>

{{-- BUTTON ACTION --}}
<div class="mb-3">
    <a href="#" class="btn btn-success">+ Tambah Pengguna</a>
</div>

{{-- TABLE USER --}}
<div class="card shadow p-3">

    <table class="table table-bordered table-hover">

        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td>1</td>
                <td>Ahmad</td>
                <td>ahmad@gmail.com</td>
                <td><span class="badge bg-primary">Admin</span></td>
                <td><span class="badge bg-success">Aktif</span></td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>

            <tr>
                <td>2</td>
                <td>Siti</td>
                <td>siti@gmail.com</td>
                <td><span class="badge bg-secondary">User</span></td>
                <td><span class="badge bg-success">Aktif</span></td>
                <td>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>

        </tbody>

    </table>

</div>

@endsection
