<?php

namespace App\Http\Controllers;

use App\Models\Guru;

class GuruController extends Controller
{
    /**
     * Tampilkan daftar guru untuk halaman publik dengan pagination.
     */
    public function index()
    {
        // Ambil data guru, 12 data per halaman
        $gurus = Guru::paginate(12);

        // Tampilkan view 'guru.index' dengan data guru
        return view('guru.index', compact('gurus'));
    }
}
