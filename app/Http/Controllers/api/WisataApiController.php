<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataApiController extends Controller
{
    public function index(Request $request)
    {
        $baseUrl = 'https://' . $request->getHost();

        $wisata = Wisata::orderBy('id_wisata', 'desc')
            ->get()
            ->map(function ($item) use ($baseUrl) {
                return [
                    'id_wisata' => $item->id_wisata,
                    'nama' => $item->name ?? $item->nama ?? 'Wisata',
                    'lokasi' => $item->location_name ?? $item->lokasi ?? '',
                    'kategori' => $item->category ?? $item->kategori ?? 'Wisata',
                    'harga' => (int) ($item->price ?? $item->harga ?? 0),
                    'deskripsi' => $item->description ?? $item->deskripsi ?? '',
                     'latitude' => $item->latitude ? (float) $item->latitude : null,
                    'longitude' => $item->longitude ? (float) $item->longitude : null,

                    'foto' => $item->image
                        ? $baseUrl . '/uploads/wisata/' . rawurlencode($item->image)
                        : null,
                ];
            });

        return response()->json([
            'success' => true,
            'message' => 'Data wisata berhasil diambil',
            'data' => $wisata,
        ]);
    }
    public function populer(Request $request)
{
    $baseUrl = 'https://' . $request->getHost();

    $wisata = Wisata::withCount([
            'tiket as jumlah_pemesanan' => function ($query) {
                $query->whereIn('status', ['paid', 'used']);
            }
        ])
        ->orderByDesc('jumlah_pemesanan')
        ->limit(5)
        ->get()
        ->filter(function ($item) {
            return $item->jumlah_pemesanan > 0;
        })
        ->values()
        ->map(function ($item) use ($baseUrl) {
            return [
                'id_wisata' => $item->id_wisata,
                'nama' => $item->name ?? $item->nama ?? 'Wisata',
                'lokasi' => $item->location_name ?? $item->lokasi ?? '',
                'kategori' => $item->category ?? $item->kategori ?? 'Wisata',
                'harga' => (int) ($item->price ?? $item->harga ?? 0),
                'deskripsi' => $item->description ?? $item->deskripsi ?? '',
                'jumlah_pemesanan' => $item->jumlah_pemesanan,

                'latitude' => $item->latitude ? (float) $item->latitude : null,
                'longitude' => $item->longitude ? (float) $item->longitude : null,

                'foto' => $item->image
                    ? $baseUrl . '/uploads/wisata/' . rawurlencode($item->image)
                    : null,
            ];
        });

    return response()->json([
        'success' => true,
        'message' => 'Data wisata populer berhasil diambil',
        'data' => $wisata,
    ]);
}
}