@extends('layout.app')

@section('content')

<div class="card shadow-sm p-4">
    <h4 class="fw-bold text-success mb-3">Edit User</h4>

    <form action="/admin/user/{{ $user->id_user }}/update" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">No Telepon</label>
            <input type="text" name="no_telp" class="form-control" value="{{ $user->no_telp }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password Baru</label>
            <input type="password" name="password" class="form-control">
            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
        </div>

        <div class="mb-3">
            <label class="form-label">Role</label>
            <select name="role" class="form-control" required>
                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="aktif" {{ $user->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="nonaktif" {{ $user->status == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        <div class="d-flex gap-2">
            <a href="/admin/user" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>

@endsection
