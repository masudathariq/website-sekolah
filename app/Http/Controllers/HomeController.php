<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\HeroImage;
use App\Models\Prestasi;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil 3 gambar hero aktif, urutkan sesuai kolom order
        $heroImages = HeroImage::where('active', true)->orderBy('order')->take(3)->get();

        // Ambil 4 berita terbaru saja untuk homepage
        $beritas = Berita::latest()->take(3)->get();

        // Ambil 4 prestasi terbaru untuk homepage
        $prestasis = Prestasi::orderBy('tanggal', 'desc')->take(4)->get();

        return view('home', compact('heroImages', 'beritas', 'prestasis'));
    }
}
