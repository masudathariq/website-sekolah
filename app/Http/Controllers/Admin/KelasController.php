<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::latest()->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }  

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tingkatan' => 'required|string',
            'nama' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        Kelas::create($validated);
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kela)
    {
        return view('admin.kelas.edit', ['kelas' => $kela]);
    }

    public function update(Request $request, Kelas $kela)
    {
        $validated = $request->validate([
            'tingkatan' => 'required|string',
            'nama' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'is_active' => 'nullable|boolean',
        ]);

        $kela->update($validated);
        return redirect()->route('admin.kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();
        return back()->with('success', 'Kelas berhasil dihapus.');
    }
}
