<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SejarahController extends Controller
{
    public function index()
    {
        $sejarahs = Sejarah::paginate(10);
        return view('admin.sejarah.index', compact('sejarahs'));
    }

    public function create()
    {
        return view('admin.sejarah.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('sejarah_images', 'public');
            $validated['gambar'] = $path;
        }

        Sejarah::create($validated);

        return redirect()->route('admin.sejarah.index')->with('success', 'Data sejarah berhasil disimpan.');
    }

    public function edit(Sejarah $sejarah)
    {
        return view('admin.sejarah.edit', compact('sejarah'));
    }

    public function update(Request $request, Sejarah $sejarah)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($sejarah->gambar && Storage::disk('public')->exists($sejarah->gambar)) {
                Storage::disk('public')->delete($sejarah->gambar);
            }

            $path = $request->file('gambar')->store('sejarah_images', 'public');
            $validated['gambar'] = $path;
        }

        $sejarah->update($validated);

        return redirect()->route('admin.sejarah.index')->with('success', 'Data sejarah berhasil diperbarui.');
    }

    public function destroy(Sejarah $sejarah)
    {
        if ($sejarah->gambar && Storage::disk('public')->exists($sejarah->gambar)) {
            Storage::disk('public')->delete($sejarah->gambar);
        }

        $sejarah->delete();

        return redirect()->route('admin.sejarah.index')->with('success', 'Data sejarah berhasil dihapus.');
    }
}
