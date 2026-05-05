<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;

class WisataUserController extends Controller
{
    public function index(Request $request)
{
    $query = Wisata::with('galeri');

    if ($request->search) {
        $query->where('name', 'like', '%' . $request->search . '%');
    }

    $wisata = $query->orderBy('created_at', 'desc')->get();

    return view('user.wisata', compact('wisata'));
}

}
