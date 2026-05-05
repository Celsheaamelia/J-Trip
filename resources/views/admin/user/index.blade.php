@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="fw-bold text-success">Data User</h2>
        <small class="text-muted">
            Kelola hak akses dan informasi pengguna sistem JTrip
        </small>
    </div>

    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahUser">
        + Tambah User
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- CARD STATISTIK --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card p-3 shadow-sm bg-success text-white">
            <h6>Total User</h6>
            <h3>{{ $users->count() }}</h3>
            <small>Total pengguna terdaftar</small>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h6>Administrator</h6>
            <h3>{{ $users->where('role', 'admin')->count() }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h6>User Aktif</h6>
            <h3>{{ $users->where('status', 'aktif')->count() }}</h3>

            <div class="progress mt-2" style="height:6px;">
                <div class="progress-bar bg-success" style="width:70%"></div>
            </div>
        </div>
    </div>
</div>

{{-- FILTER --}}
<div class="card p-2 mb-3 shadow-sm d-flex flex-row gap-2">

    <a href="/admin/user"
       class="btn btn-sm {{ request('role') == null ? 'btn-success' : 'btn-outline-secondary' }}">
        Semua
    </a>

    <a href="/admin/user?role=admin"
       class="btn btn-sm {{ request('role') == 'admin' ? 'btn-success' : 'btn-outline-secondary' }}">
        Admin
    </a>

    <a href="/admin/user?role=user"
       class="btn btn-sm {{ request('role') == 'user' ? 'btn-success' : 'btn-outline-secondary' }}">
        User
    </a>

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
                <th width="120">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="d-flex align-items-center gap-2">
                        <div class="rounded-circle bg-success text-white d-flex justify-content-center align-items-center"
                             style="width:35px;height:35px;">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>

                        <div>
                            <strong>{{ $user->name }}</strong><br>
                            <small class="text-muted">
                                Terdaftar: {{ $user->created_at->format('M Y') }}
                            </small>
                        </div>
                    </td>

                    <td>{{ $user->email }}</td>

                    <td>
                        <span class="badge {{ $user->role == 'admin' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </td>

                    <td>
                        <span class="badge {{ $user->status == 'aktif' ? 'bg-success' : 'bg-danger' }}">
                            {{ ucfirst($user->status) }}
                        </span>
                    </td>

                    <td>
                        <div class="d-flex gap-2">
                            <a href="/admin/user/{{ $user->id_user }}/edit" class="btn btn-sm btn-warning">
                                <img src="{{ asset('assets/icons/edit.png') }}" alt="Edit" width="16">
                            </a>

                            <form action="/admin/user/{{ $user->id_user }}/delete" method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">
                                    <img src="{{ asset('assets/icons/delete.png') }}" alt="Hapus" width="16">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- MODAL TAMBAH USER --}}
<div class="modal fade" id="modalTambahUser" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/user/store" method="POST">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">No Telepon</label>
                        <input type="text" name="no_telp" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-control" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
