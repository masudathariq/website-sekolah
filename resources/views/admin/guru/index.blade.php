@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-5xl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Daftar Guru</h1>
        <a href="{{ route('admin.guru.create') }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Tambah Guru</a>
    </div>

    @if(session('success'))
    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
        {{ session('success') }}
    </div>
    @endif

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-yellow-100">
                <th class="border border-gray-300 px-4 py-2">Foto</th>
                <th class="border border-gray-300 px-4 py-2">Nama</th>
                <th class="border border-gray-300 px-4 py-2">Mata Pelajaran</th>
                <th class="border border-gray-300 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($gurus as $guru)
            <tr>
                <td class="border border-gray-300 p-2 text-center">
                    @if ($guru->foto)
                    <img src="{{ asset('storage/' . $guru->foto) }}" alt="Foto {{ $guru->nama }}" class="w-16 h-16 object-cover rounded">
                    @else
                    <span class="text-gray-500 italic">Tidak ada foto</span>
                    @endif
                </td>
                <td class="border border-gray-300 px-4 py-2">{{ $guru->nama }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $guru->mata_pelajaran }}</td>
                <td class="border border-gray-300 px-4 py-2 space-x-2">
                    <a href="{{ route('admin.guru.edit', $guru->id) }}" class="text-yellow-600 hover:underline">Edit</a>
                    <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus guru ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center p-4 text-gray-500">Belum ada data guru.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $gurus->links() }}
    </div>
</div>
@endsection
