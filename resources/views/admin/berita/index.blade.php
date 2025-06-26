@extends('layouts.admin')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Daftar Berita</h1>
    <a href="{{ route('admin.berita.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md shadow hover:bg-indigo-700 transition">Tambah Berita</a>
</div>

@if(session('success'))
    <div class="mb-4 p-4 bg-green-200 text-green-800 rounded-md shadow">
        {{ session('success') }}
    </div>
@endif

<div class="overflow-x-auto">
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead class="bg-indigo-600 text-white">
            <tr>
                <th class="border-b-2 border-gray-200 px-6 py-3 text-left text-sm font-medium">Judul</th>
                <th class="border-b-2 border-gray-200 px-6 py-3 text-left text-sm font-medium">Tanggal</th>
                <th class="border-b-2 border-gray-200 px-6 py-3 text-left text-sm font-medium">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($beritas as $berita)
            <tr class="hover:bg-gray-100 transition duration-200">
                <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-800">{{ $berita->judul }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm text-gray-600">{{ $berita->created_at->format('d M Y') }}</td>
                <td class="border-b border-gray-200 px-6 py-4 text-sm">
                    <a href="{{ route('admin.berita.edit', $berita->id) }}" class="text-indigo-600 hover:underline mr-2">Edit</a>
                    <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus berita ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $beritas->links() }}
</div>
@endsection