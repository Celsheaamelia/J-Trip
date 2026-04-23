<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataController extends Controller
{
    public function index(Request $request)
    {
        $query = Wisata::query();

        if ($request->filled('search')) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $wisatas = $query->latest()->paginate(6)->withQueryString();

        return view('user.wisata', compact('wisatas'));
    }

    public function show($id)
    {
        $wisata = Wisata::findOrFail($id);
        return view('user.wisata', compact('wisatas'));
    }
}