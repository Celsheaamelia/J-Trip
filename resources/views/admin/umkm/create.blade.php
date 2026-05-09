@extends('layout.app')

@section('content')

<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-success mb-1">Tambah UMKM</h4>
            <small class="text-muted">Tambahkan data UMKM baru ke sistem JTrip</small>
        </div>

        <a href="{{ route('admin.umkm.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="formTambahUmkm" action="{{ route('admin.umkm.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama UMKM</label>
            <input
                type="text"
                name="nama"
                class="form-control"
                value="{{ old('nama') }}"
                placeholder="Contoh: Warung Papuma"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pemilik</label>
            <input
                type="text"
                name="pemilik"
                class="form-control"
                value="{{ old('pemilik') }}"
                placeholder="Nama pemilik UMKM"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea
                name="deskripsi"
                class="form-control"
                rows="4"
                placeholder="Deskripsi singkat UMKM">{{ old('deskripsi') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi Wisata Terkait</label>
            <select name="id_wisata" class="form-control">
                <option value="">Tidak terhubung ke wisata</option>

                @foreach ($wisata as $item)
                    <option value="{{ $item->id_wisata }}"
                        {{ old('id_wisata') == $item->id_wisata ? 'selected' : '' }}>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Latitude</label>
                <input
                    type="text"
                    name="latitude"
                    class="form-control"
                    value="{{ old('latitude') }}"
                    placeholder="-8.123456">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label">Longitude</label>
                <input
                    type="text"
                    name="longitude"
                    class="form-control"
                    value="{{ old('longitude') }}"
                    placeholder="113.123456">
            </div>
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" id="btnSubmitUmkm" class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('admin.umkm.index') }}" class="btn btn-outline-secondary">
                Batal
            </a>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('formTambahUmkm');
    const btn = document.getElementById('btnSubmitUmkm');

    if (form && btn) {
        form.addEventListener('submit', function () {
            btn.disabled = true;
            btn.innerText = 'Menyimpan...';
        });
    }
});
</script>

@endsection