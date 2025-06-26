<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasis = Prestasi::latest()->paginate(10);
        return view('admin.prestasi.index', compact('prestasis'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:5120',
        ]);

        // Tambahkan slug otomatis dari judul
        $validated['slug'] = Str::slug($validated['judul']);

        // Simpan gambar jika ada
        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('prestasi_images', 'public');
            $validated['gambar'] = $path;
        }

        Prestasi::create($validated);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil disimpan!');
    }

    public function show(Prestasi $prestasi)
    {
        return view('admin.prestasi.show', compact('prestasi'));
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'isi' => 'required|string',
            'tanggal' => 'required|date',
            'gambar' => 'nullable|image|max:5120',
        ]);

        // Perbarui slug jika judul diubah
        $validated['slug'] = Str::slug($validated['judul']);

        // Jika ada gambar baru, hapus gambar lama dan simpan yang baru
        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar && Storage::disk('public')->exists($prestasi->gambar)) {
                Storage::disk('public')->delete($prestasi->gambar);
            }

            $path = $request->file('gambar')->store('prestasi_images', 'public');
            $validated['gambar'] = $path;
        }

        $prestasi->update($validated);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        // Hapus gambar jika ada
        if ($prestasi->gambar && Storage::disk('public')->exists($prestasi->gambar)) {
            Storage::disk('public')->delete($prestasi->gambar);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}
