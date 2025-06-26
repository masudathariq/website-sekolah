<?php

namespace App\Http\Controllers;

use App\Models\KalenderAkademik;
use Illuminate\Http\Request;

class KalenderAkademikController extends Controller
{
    public function index()
    {
        $events = KalenderAkademik::all();

        // Kita buat array baru yang sudah siap di-convert ke JSON
        $eventsJson = $events->map(function($e) {
            return [
                'id' => $e->id,
                'judul' => $e->judul,
                'isi' => $e->isi,
                'tanggal' => $e->tanggal->format('Y-m-d'), // pastikan tanggal sudah Carbon instance
            ];
        });

        // Kirim ke view dengan variabel $eventsJson
        return view('kalender-akademik.index', compact('eventsJson'));
    }
}

