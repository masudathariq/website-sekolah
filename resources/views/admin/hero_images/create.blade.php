@extends('layouts.admin')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Hero Image</h1>

<form action="{{ route('admin.hero_images.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md">
    @csrf

    <label class="block mb-2">Upload Gambar</label>
    <input type="file" name="image" required class="mb-4" accept="image/*" />
    @error('image')
        <div class="text-red-600">{{ $message }}</div>
    @enderror

    <label class="block mb-2">Order</label>
    <input type="number" name="order" value="0" required class="mb-4 border p-2 rounded w-full" />
    @error('order')
        <div class="text-red-600">{{ $message }}</div>
    @enderror

    <label class="block mb-2">Aktifkan?</label>
    <select name="active" required class="mb-4 border p-2 rounded w-full">
        <option value="1" selected>Ya</option>
        <option value="0">Tidak</option>
    </select>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
