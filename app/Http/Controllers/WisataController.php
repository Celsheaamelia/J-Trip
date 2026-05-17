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

    public function edit($id)
{
    $wisata = \App\Models\Wisata::where('id_wisata', $id)->firstOrFail();

    return view('admin.wisata.edit', compact('wisata'));
}

public function update(Request $request, $id)
{
    $wisata = \App\Models\Wisata::where('id_wisata', $id)->firstOrFail();

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'kuota_harian' => 'required|integer|min:0',
        'location_name' => 'required|string|max:255',
        'latitude' => 'nullable|numeric',
        'longitude' => 'nullable|numeric',
        'biaya_parkir' => 'nullable|numeric|min:0',
        'pajak_persen' => 'nullable|numeric|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
    ]);

    $data = [
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'kuota_harian' => $request->kuota_harian,
        'location_name' => $request->location_name,
        'latitude' => $request->latitude,
        'longitude' => $request->longitude,
        'biaya_parkir' => $request->biaya_parkir ?? 0,
        'pajak_persen' => $request->pajak_persen ?? 0,
        'include_parkir' => $request->has('include_parkir') ? 1 : 0,
        'include_pajak' => $request->has('include_pajak') ? 1 : 0,
    ];

    if ($request->hasFile('image')) {
        if ($wisata->image && file_exists(public_path('uploads/wisata/' . $wisata->image))) {
            unlink(public_path('uploads/wisata/' . $wisata->image));
        }

        $image = $request->file('image');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/wisata'), $imageName);

        $data['image'] = $imageName;
    }

    $wisata->update($data);

    return redirect()
        ->route('admin.wisata.index')
        ->with('success', 'Data wisata berhasil diperbarui');
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
            'kategori' => 'required',
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
            'kategori' => $request->kategori,
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
