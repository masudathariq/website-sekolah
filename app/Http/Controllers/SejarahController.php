<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarah = Sejarah::latest()->first(); // ambil data sejarah terbaru
        return view('sejarah', compact('sejarah'));
    }
}
