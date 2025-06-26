<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Berita::query();

        // Filter tanggal mulai
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }

        // Filter tanggal akhir
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Filter search kata kunci di judul dan konten
        if ($request->filled('search')) {
            $keyword = $request->search;
            $query->where(function ($q) use ($keyword) {
                $q->where('judul', 'like', "%{$keyword}%")
                  ->orWhere('konten', 'like', "%{$keyword}%");
            });
        }

        // Ambil data dengan pagination 5 per halaman, urut terbaru
        $beritas = $query->orderBy('created_at', 'desc')->paginate(5)->withQueryString();

        return view('berita.index', compact('beritas'));
    }

    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('berita.show', compact('berita'));
    }
}
