@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Hero Image</h1>

<form action="{{ route('admin.hero_images.update', $heroImage) }}" method="POST" enctype="multipart/form-data" class="max-w-md">
    @csrf
    @method('PUT')

    <img src="{{ $heroImage->image_url }}" alt="Current Image" class="mb-4 h-40 object-cover" />

    <label class="block mb-2">Ganti Gambar (optional)</label>
    <input type="file" name="image" class="mb-4" accept="image/*" />
    @error('image')
        <div class="text-red-600">{{ $message }}</div>
    @enderror

    <label class="block mb-2">Order</label>
    <input type="number" name="order" value="{{ old('order', $heroImage->order) }}" required class="mb-4 border p-2 rounded w-full" />
    @error('order')
        <div class="text-red-600">{{ $message }}</div>
    @enderror

    <label class="block mb-2">Aktifkan?</label>
    <select name="active" required class="mb-4 border p-2 rounded w-full">
        <option value="1" {{ $heroImage->active ? 'selected' : '' }}>Ya</option>
        <option value="0" {{ !$heroImage->active ? 'selected' : '' }}>Tidak</option>
    </select>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
