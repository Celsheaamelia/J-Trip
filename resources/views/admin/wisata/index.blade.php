@extends('layout.app')

@section('content')

@php
    use Illuminate\Support\Str;
@endphp

<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="fw-bold">Manajemen Wisata</h2>
        <small class="text-muted">
            Kelola seluruh daftar destinasi wisata, harga tiket dan status operasional
        </small>
    </div>

    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalTambahWisata">
        + Tambah Wisata
    </button>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- CARD STATISTIK --}}
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h4>{{ $wisata->count() }}</h4>
            <small>Total Destinasi</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h4>{{ $wisata->count() }}</h4>
            <small>Status Aktif</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h4>0</h4>
            <small>Tiket Terjual</small>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 shadow-sm">
            <h4>Rp 0</h4>
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
                <th>Kuota</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($wisata as $item)
                <tr>
                    <td class="d-flex align-items-center gap-2">
                        <img src="{{ asset('uploads/wisata/' . $item->image) }}"
                             class="rounded"
                             width="55"
                             height="55"
                             style="object-fit: cover;">

                        <div>
                            <strong>{{ $item->name }}</strong><br>
                            <small class="text-muted">
                                {{ Str::limit($item->description, 35) }}
                            </small>
                        </div>
                    </td>

                    <td>Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>{{ $item->location_name }}</td>
                    <td>{{ $item->kuota_harian }}</td>

                    <td>
                        <div class="d-flex gap-2">
                            <a href="/admin/wisata/{{ $item->id_wisata }}/edit" class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <form action="/admin/wisata/{{ $item->id_wisata }}/delete" method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus wisata ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Belum ada data wisata
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- MODAL TAMBAH WISATA --}}
<div class="modal fade" id="modalTambahWisata" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/admin/wisata/store" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title fw-bold text-success">Tambah Wisata</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nama Wisata</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Harga Tiket</label>
                            <input type="number" name="price" class="form-control" required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kuota Harian</label>
                            <input type="number" name="kuota_harian" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Lokasi</label>
                        <input type="text" name="location_name" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Latitude</label>
                            <input type="text" name="latitude" class="form-control">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Longitude</label>
                            <input type="text" name="longitude" class="form-control">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Biaya Parkir</label>
                        <input type="number" name="biaya_parkir" class="form-control" value="0">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pajak Persen</label>
                        <input type="number" name="pajak_persen" class="form-control" value="0">
                    </div>

                    <div class="form-check mb-2">
                        <input type="checkbox" name="include_parkir" class="form-check-input" id="include_parkir">
                        <label class="form-check-label" for="include_parkir">Harga termasuk parkir</label>
                    </div>

                    <div class="form-check mb-3">
                        <input type="checkbox" name="include_pajak" class="form-check-input" id="include_pajak">
                        <label class="form-check-label" for="include_pajak">Harga termasuk pajak</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gambar Utama</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Galeri Wisata</label>
                        <input type="file" name="galeri[]" class="form-control" multiple>
                        <small class="text-muted">Bisa pilih lebih dari satu gambar</small>
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
