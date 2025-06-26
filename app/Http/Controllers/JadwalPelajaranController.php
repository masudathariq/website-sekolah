<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    public function index(Request $request)
    {
        $kelasList = Kelas::orderBy('tingkatan')->orderBy('nama')->get();

        $jadwals = JadwalPelajaran::query()
            ->with(['kelas', 'guru']) // <--- tambahkan relasi guru
            ->when($request->kelas_id, fn($q) => $q->where('kelas_id', $request->kelas_id))
            ->orderBy('hari')
            ->orderBy('jam_mulai')
            ->get();

        return view('jadwal.index', compact('jadwals', 'kelasList'));
    }
    public function kelasList()
{
    $kelasList = Kelas::orderBy('tingkatan')->orderBy('nama')->get();
    return view('jadwal.index', compact('kelasList'));
}

public function show(Kelas $kelas)
{
    $jadwals = JadwalPelajaran::with('guru')
        ->where('kelas_id', $kelas->id)
        ->orderBy('hari')
        ->orderBy('jam_mulai')
        ->get();

    return view('jadwal.show', compact('kelas', 'jadwals'));
}
}
