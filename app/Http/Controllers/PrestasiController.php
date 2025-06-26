<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::orderBy('tanggal', 'desc')->paginate(10);
        return view('prestasi.index', compact('prestasis'));
    }

    public function show($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)->firstOrFail();
        return view('prestasi.show', compact('prestasi'));
    }
}
