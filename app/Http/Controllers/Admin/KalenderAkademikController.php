<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KalenderAkademik;

class KalenderAkademikController extends Controller
{
    public function index()
    {
        $events = KalenderAkademik::orderBy('tanggal')->paginate(10);
        return view('admin.kalender_akademik.index', compact('events'));
    }

    public function create()
    {
        return view('admin.kalender_akademik.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        KalenderAkademik::create($validated);

        return redirect()->route('admin.kalender_akademik.index')->with('success', 'Event berhasil ditambahkan');
    }

    public function show(KalenderAkademik $kalenderAkademik)
    {
        return view('admin.kalender_akademik.show', compact('kalenderAkademik'));
    }

    public function edit(KalenderAkademik $kalenderAkademik)
    {
        return view('admin.kalender_akademik.edit', compact('kalenderAkademik'));
    }

    public function update(Request $request, KalenderAkademik $kalenderAkademik)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        $kalenderAkademik->update($validated);

        return redirect()->route('admin.kalender_akademik.index')->with('success', 'Event berhasil diperbarui');
    }

    public function destroy(KalenderAkademik $kalenderAkademik)
    {
        $kalenderAkademik->delete();

        return redirect()->route('admin.kalender_akademik.index')->with('success', 'Event berhasil dihapus');
    }
}
