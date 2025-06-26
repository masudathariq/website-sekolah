<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JadwalPelajaran;
use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;

class JadwalPelajaranController extends Controller
{
    // TAMPILKAN SEMUA JADWAL
    public function index()
    {
        $jadwalList = JadwalPelajaran::with('kelas', 'guru')
                        ->orderBy('hari')
                        ->orderBy('jam_mulai')
                        ->get();

        return view('admin.jadwal.index', compact('jadwalList'));
    }

    // TAMPILKAN FORM TAMBAH
    public function create()
    {
        return view('admin.jadwal.create', [
            'kelas' => Kelas::all(),
            'guruList' => Guru::all(),
        ]);
    }

    // SIMPAN DATA BARU
    public function store(Request $request)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'mata_pelajaran' => 'required|string|max:255',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        JadwalPelajaran::create([
            'kelas_id' => $request->kelas_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'mata_pelajaran' => $request->mata_pelajaran,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal berhasil ditambahkan.');
    }

    // TAMPILKAN FORM EDIT
    public function edit(JadwalPelajaran $jadwal)
    {
        return view('admin.jadwal.edit', [
            'jadwal' => $jadwal,
            'kelas' => Kelas::all(),
            'guruList' => Guru::all(),
        ]);
    }

    // UPDATE DATA
    public function update(Request $request, JadwalPelajaran $jadwal)
    {
        $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'mata_pelajaran' => 'required|string|max:255',
            'guru_id' => 'required|exists:gurus,id',
        ]);

        $jadwal->update([
            'kelas_id' => $request->kelas_id,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'mata_pelajaran' => $request->mata_pelajaran,
            'guru_id' => $request->guru_id,
        ]);

        return redirect()->route('admin.jadwal.index')
                         ->with('success', 'Jadwal berhasil diperbarui.');
    }

    // HAPUS DATA
    public function destroy(JadwalPelajaran $jadwal)
    {
        $jadwal->delete();

        return back()->with('success', 'Jadwal berhasil dihapus.');
    }
}
