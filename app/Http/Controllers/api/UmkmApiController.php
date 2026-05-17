<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmApiController extends Controller
{
    public function index(Request $request)
    {
        $umkms = Umkm::with('wisata')
            ->latest('dibuat_pada')
            ->get()
            ->map(function ($item) {
                return [
                    'id_umkm' => $item->id_umkm,
                    'nama' => $item->nama ?? 'UMKM',
                    'pemilik' => $item->pemilik ?? '-',
                    'deskripsi' => $item->deskripsi ?? '',
                    'id_wisata' => $item->id_wisata,
                    'latitude' => $item->latitude ? (float) $item->latitude : null,
                    'longitude' => $item->longitude ? (float) $item->longitude : null,

                    'wisata' => [
                        'id_wisata' => $item->wisata->id_wisata ?? null,
                        'nama' => $item->wisata->name ?? null,
                        'lokasi' => $item->wisata->location_name ?? null,
                    ],
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Data UMKM berhasil diambil',
            'data' => $umkms,
        ]);
    }
}