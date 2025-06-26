<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroImageController extends Controller
{
    public function index()
    {
        $heroImages = HeroImage::orderBy('order')->get();
        return view('admin.hero_images.index', compact('heroImages'));
    }

    public function create()
    {
        return view('admin.hero_images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:5120',
            'order' => 'required|integer',
            'active' => 'required|boolean',
        ]);

        // Upload file ke storage/app/public/hero_images
        $path = $request->file('image')->store('hero_images', 'public');

        HeroImage::create([
            'image_url' => $path,  // simpan path relatif saja
            'order' => $request->order,
            'active' => $request->active,
        ]);

        return redirect()->route('admin.hero_images.index')->with('success', 'Hero image berhasil ditambahkan.');
    }

    public function edit(HeroImage $heroImage)
    {
        return view('admin.hero_images.edit', compact('heroImage'));
    }

    public function update(Request $request, HeroImage $heroImage)
    {
        $request->validate([
            'image' => 'nullable|image|max:2048',
            'order' => 'required|integer',
            'active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            // Hapus file lama
            Storage::disk('public')->delete($heroImage->image_url);

            // Upload file baru
            $path = $request->file('image')->store('hero_images', 'public');
            $heroImage->image_url = $path;
        }

        $heroImage->order = $request->order;
        $heroImage->active = $request->active;
        $heroImage->save();

        return redirect()->route('admin.hero_images.index')->with('success', 'Hero image berhasil diupdate.');
    }

    public function destroy(HeroImage $heroImage)
    {
        // Hapus file gambar
        Storage::disk('public')->delete($heroImage->image_url);

        $heroImage->delete();

        return redirect()->route('admin.hero_images.index')->with('success', 'Hero image berhasil dihapus.');
    }
}
