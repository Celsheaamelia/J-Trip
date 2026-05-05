<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\GaleriWisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    private function generateWisataId()
    {
        $last = Wisata::orderBy('id_wisata', 'desc')->first();

        if (!$last) {
            return 'WST001';
        }

        $num = (int) substr($last->id_wisata, 3) + 1;

        return 'WST' . str_pad($num, 3, '0', STR_PAD_LEFT);
    }

    private function generateGaleriId()
    {
        $last = GaleriWisata::orderBy('id', 'desc')->first();

        if (!$last) {
            return 'GLR001';
        }

        $num = (int) substr($last->id, 3) + 1;

        return 'GLR' . str_pad($num, 3, '0', STR_PAD_LEFT);
    }

    public function index()
    {
        $wisata = Wisata::with('galeri')->orderBy('created_at', 'desc')->get();

        return view('admin.wisata.index', compact('wisata'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'kuota_harian' => 'required|integer',
            'location_name' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp',
            'galeri.*' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        $imageName = time() . '_' . $request->image->getClientOriginalName();
        $request->image->move(public_path('uploads/wisata'), $imageName);

        $idWisata = $this->generateWisataId();

        $wisata = Wisata::create([
            'id_wisata' => $idWisata,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'kuota_harian' => $request->kuota_harian,
            'biaya_parkir' => $request->biaya_parkir ?? 0,
            'pajak_persen' => $request->pajak_persen ?? 0,
            'include_parkir' => $request->has('include_parkir') ? 1 : 0,
            'include_pajak' => $request->has('include_pajak') ? 1 : 0,
            'location_name' => $request->location_name,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $imageName,
        ]);

        if ($request->hasFile('galeri')) {
            foreach ($request->file('galeri') as $file) {
                $galeriName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/galeri_wisata'), $galeriName);

                GaleriWisata::create([
                    'id' => $this->generateGaleriId(),
                    'id_wisata' => $wisata->id_wisata,
                    'gambar' => $galeriName,
                    'created_at' => now(),
                ]);
            }
        }

        return redirect('/admin/wisata')->with('success', 'Data wisata berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $wisata = Wisata::where('id_wisata', $id)->firstOrFail();

        GaleriWisata::where('id_wisata', $id)->delete();

        $wisata->delete();

        return redirect('/admin/wisata')->with('success', 'Data wisata berhasil dihapus');
    }
}
