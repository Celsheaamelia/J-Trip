<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
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
        return view('admin.umkm.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pemilik' => 'required',
        ]);

        Umkm::create([
            'id_umkm' => strtoupper(Str::random(6)),
            'nama' => $request->nama,
            'pemilik' => $request->pemilik,
            'deskripsi' => $request->deskripsi,
            'id_wisata' => $request->id_wisata,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil ditambahkan');
    }

    public function edit($id)
    {
        $umkm = Umkm::findOrFail($id);
        return view('admin.umkm.edit', compact('umkm'));
    }

    public function update(Request $request, $id)
    {
        $umkm = Umkm::findOrFail($id);

        $umkm->update([
            'nama' => $request->nama,
            'pemilik' => $request->pemilik,
            'deskripsi' => $request->deskripsi,
            'id_wisata' => $request->id_wisata,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        return redirect()->route('umkm.index')->with('success', 'UMKM berhasil diupdate');
    }

    public function destroy($id)
    {
        Umkm::destroy($id);
        return back()->with('success', 'UMKM berhasil dihapus');
    }
}
