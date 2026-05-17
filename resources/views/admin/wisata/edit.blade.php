@extends('layout.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="fw-bold">Edit Wisata</h2>
        <small class="text-muted">
            Perbarui data destinasi wisata
        </small>
    </div>

    <a href="{{ route('admin.wisata.index') }}" class="btn btn-secondary">
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

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('admin.wisata.update', $wisata->id_wisata) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Wisata</label>
                <input type="text"
                       name="name"
                       class="form-control"
                       value="{{ old('name', $wisata->name) }}"
                       required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description"
                          class="form-control"
                          rows="4"
                          required>{{ old('description', $wisata->description) }}</textarea>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Tiket</label>
                    <input type="number"
                           name="price"
                           class="form-control"
                           value="{{ old('price', $wisata->price) }}"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kuota Harian</label>
                    <input type="number"
                           name="kuota_harian"
                           class="form-control"
                           value="{{ old('kuota_harian', $wisata->kuota_harian) }}"
                           required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Nama Lokasi</label>
                <input type="text"
                       name="location_name"
                       class="form-control"
                       value="{{ old('location_name', $wisata->location_name) }}"
                       required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Latitude</label>
                    <input type="text"
                           name="latitude"
                           class="form-control"
                           value="{{ old('latitude', $wisata->latitude) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Longitude</label>
                    <input type="text"
                           name="longitude"
                           class="form-control"
                           value="{{ old('longitude', $wisata->longitude) }}">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Biaya Parkir</label>
                    <input type="number"
                           name="biaya_parkir"
                           class="form-control"
                           value="{{ old('biaya_parkir', $wisata->biaya_parkir ?? 0) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Pajak Persen</label>
                    <input type="number"
                           name="pajak_persen"
                           class="form-control"
                           value="{{ old('pajak_persen', $wisata->pajak_persen ?? 0) }}">
                </div>
            </div>

            <div class="form-check mb-2">
                <input type="checkbox"
                       name="include_parkir"
                       class="form-check-input"
                       id="include_parkir"
                       {{ old('include_parkir', $wisata->include_parkir) ? 'checked' : '' }}>
                <label class="form-check-label" for="include_parkir">
                    Harga termasuk parkir
                </label>
            </div>

            <div class="form-check mb-3">
                <input type="checkbox"
                       name="include_pajak"
                       class="form-check-input"
                       id="include_pajak"
                       {{ old('include_pajak', $wisata->include_pajak) ? 'checked' : '' }}>
                <label class="form-check-label" for="include_pajak">
                    Harga termasuk pajak
                </label>
            </div>

            <div class="mb-3">
                <label class="form-label">Gambar Saat Ini</label><br>

                @if ($wisata->image)
                    <img src="{{ asset('uploads/wisata/' . $wisata->image) }}"
                         alt="{{ $wisata->name }}"
                         class="rounded mb-2"
                         width="180"
                         height="110"
                         style="object-fit: cover;">
                @else
                    <div class="text-muted">Belum ada gambar</div>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label">Ganti Gambar Utama</label>
                <input type="file"
                       name="image"
                       class="form-control"
                       accept="image/*">
                <small class="text-muted">
                    Kosongkan jika tidak ingin mengganti gambar.
                </small>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.wisata.index') }}" class="btn btn-light">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

@endsection