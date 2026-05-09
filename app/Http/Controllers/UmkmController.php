<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UmkmController extends Controller
{
    public function index()
    {
        $umkms = Umkm::with('wisata')->latest()->paginate(10);
        $total = Umkm::count();

        return view('admin.umkm.index', compact('umkms', 'total'));
    }

    public function create()
    {
        $wisata = Wisata::orderBy('name', 'asc')->get();

        return view('admin.umkm.create', compact('wisata'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'id_wisata' => 'nullable|exists:wisata,id_wisata',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);
        $exists = Umkm::where('nama', $request->nama)
    ->where('pemilik', $request->pemilik)
    ->where('id_wisata', $request->id_wisata)
    ->exists();

if ($exists) {
    return redirect()
        ->route('admin.umkm.index')
        ->with('success', 'Data UMKM sudah ada, tidak ditambahkan ulang.');
}
        Umkm::create([
            'id_umkm' => $this->generateUmkmId(),
            'nama' => $request->nama,
            'pemilik' => $request->pemilik,
            'deskripsi' => $request->deskripsi,
            'id_wisata' => $request->id_wisata,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()
            ->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil ditambahkan');
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        $wisata = Wisata::orderBy('name', 'asc')->get();

        return view('admin.umkm.edit', compact('umkm', 'wisata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'pemilik' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'id_wisata' => 'nullable|exists:wisata,id_wisata',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $umkm = Umkm::findOrFail($id);

        $umkm->update([
            'nama' => $request->nama,
            'pemilik' => $request->pemilik,
            'deskripsi' => $request->deskripsi,
            'id_wisata' => $request->id_wisata,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()
            ->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil diupdate');
    }

    public function destroy($id)
    {
        $umkm = Umkm::findOrFail($id);
        $umkm->delete();

        return redirect()
            ->route('admin.umkm.index')
            ->with('success', 'UMKM berhasil dihapus');
    }

    private function generateUmkmId()
    {
        $last = Umkm::orderBy('id_umkm', 'desc')->first();

        if (!$last) {
            return 'UMK001';
        }

        $number = (int) substr($last->id_umkm, 3);
        $number++;

        return 'UMK' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
}