<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wisata;

class WisataApiController extends Controller
{
    public function index()
    {
        $wisata = Wisata::orderBy('id_wisata', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'id_wisata' => $item->id_wisata,
                    'nama' => $item->nama ?? $item->name ?? '',
                    'lokasi' => $item->location_name ?? $item->location_name ?? '',
                    'kategori' => $item->kategori ?? $item->category ?? 'Wisata',
                    'harga' => (int) ($item->harga ?? $item->price ?? 0),
                    'deskripsi' => $item->deskripsi ?? $item->description ?? '',

                    'foto' => $item->image
                        ? asset('assets/images/' . $item->image)
                        : null,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Data wisata berhasil diambil',
            'data' => $wisata,
        ]);
    }
}