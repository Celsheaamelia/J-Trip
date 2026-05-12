@extends('layout.app')

@section('content')

<div class="card shadow-sm p-4">
    <h4 class="fw-bold mb-4">Edit Wisata</h4>

    <form action="/admin/wisata/{{ $wisata->id_wisata }}/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Wisata</label>
            <input type="text" name="name" class="form-control" value="{{ $wisata->name }}" required>
        </div>

        <div class="mb-3">
            <label>Kategori</label>
            <select name="kategori" class="form-control" required>
                <option value="Pantai" {{ $wisata->kategori == 'Pantai' ? 'selected' : '' }}>Pantai</option>
                <option value="Bukit" {{ $wisata->kategori == 'Bukit' ? 'selected' : '' }}>Bukit</option>
                <option value="Kebun" {{ $wisata->kategori == 'Kebun' ? 'selected' : '' }}>Kebun</option>
                <option value="Air Terjun" {{ $wisata->kategori == 'Air Terjun' ? 'selected' : '' }}>Air Terjun</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $wisata->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Harga Tiket</label>
            <input type="number" name="price" class="form-control" value="{{ $wisata->price }}" required>
        </div>

        <div class="mb-3">
            <label>Kuota Harian</label>
            <input type="number" name="kuota_harian" class="form-control" value="{{ $wisata->kuota_harian }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Lokasi</label>
            <input type="text" name="location_name" class="form-control" value="{{ $wisata->location_name }}" required>
        </div>

        <div class="mb-3">
            <label>Latitude</label>
            <input type="text" name="latitude" class="form-control" value="{{ $wisata->latitude }}">
        </div>

        <div class="mb-3">
            <label>Longitude</label>
            <input type="text" name="longitude" class="form-control" value="{{ $wisata->longitude }}">
        </div>

        <div class="mb-3">
            <label>Biaya Parkir</label>
            <input type="number" name="biaya_parkir" class="form-control" value="{{ $wisata->biaya_parkir }}">
        </div>

        <div class="mb-3">
            <label>Pajak Persen</label>
            <input type="number" name="pajak_persen" class="form-control" value="{{ $wisata->pajak_persen }}">
        </div>

        <div class="form-check mb-2">
            <input type="checkbox" name="include_parkir" class="form-check-input" {{ $wisata->include_parkir ? 'checked' : '' }}>
            <label class="form-check-label">Harga termasuk parkir</label>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="include_pajak" class="form-check-input" {{ $wisata->include_pajak ? 'checked' : '' }}>
            <label class="form-check-label">Harga termasuk pajak</label>
        </div>

        <div class="mb-3">
            <label>Gambar Saat Ini</label><br>
            <img src="{{ asset('uploads/wisata/' . $wisata->image) }}" width="120" class="rounded mb-2">
            <input type="file" name="image" class="form-control">
        </div>

        <a href="/admin/wisata" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>

@endsection
