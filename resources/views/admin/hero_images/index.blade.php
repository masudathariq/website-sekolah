@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-5xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-xl md:text-2xl font-bold text-gray-800">Daftar Hero Images</h1>
        <a href="{{ route('admin.hero_images.create') }}" 
           class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition duration-200">
            Tambah Hero Image
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 text-green-600 text-sm bg-green-100 p-3 rounded-lg">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse bg-white rounded-lg shadow-sm">
            <thead>
                <tr class="bg-gray-50">
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Gambar</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Order</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Status</th>
                    <th class="px-4 py-2 text-left text-sm font-semibold text-gray-600">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($heroImages as $image)
                <tr class="hover:bg-gray-50 transition duration-150">
                    <td class="border-t border-gray-200 px-4 py-3">
                        <img src="{{ $image->image_url }}" alt="Hero Image" class="h-16 object-cover rounded">
                    </td>
                    <td class="border-t border-gray-200 px-4 py-3 text-sm text-gray-700">{{ $image->order }}</td>
                    <td class="border-t border-gray-200 px-4 py-3 text-sm text-gray-700">{{ $image->active ? 'Aktif' : 'Tidak Aktif' }}</td>
                    <td class="border-t border-gray-200 px-4 py-3 flex gap-2">
                        <a href="{{ route('admin.hero_images.edit', $image) }}" 
                           class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-sm font-medium transition duration-200">
                            Edit
                        </a>
                        <form action="{{ route('admin.hero_images.destroy', $image) }}" method="POST" onsubmit="return confirm('Hapus gambar ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm font-medium transition duration-200">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection