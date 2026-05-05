<?php

namespace App\Http\Controllers;

use App\Models\Wisata;

class HomeController extends Controller
{
    public function index()
{
    $wisata = Wisata::with('galeri')
        ->orderBy('created_at', 'desc')
        ->take(3)
        ->get();

    return view('user.home', compact('wisata'));
}
}
