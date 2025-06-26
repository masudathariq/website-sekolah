@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Daftar Prestasi</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.prestasi.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6 inline-block">Tambah Prestasi</a>

    <table class="min-w-full bg-white shadow rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-blue-600 text-white text-left">
                <th class="py-3 px-6">Judul</th>
                <th class="py-3 px-6">Nama Siswa</th>
                <th class="py-3 px-6">Tanggal</th>
                <th class="py-3 px-6">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($prestasis as $prestasi)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-6">{{ $prestasi->judul }}</td>
                    <td class="py-3 px-6">{{ $prestasi->nama_siswa }}</td>
                    <td class="py-3 px-6">{{ $prestasi->tanggal->format('d M Y') }}</td>
                    <td class="py-3 px-6 space-x-2">
                        <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus prestasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data prestasi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $prestasis->links() }}
    </div>
</div>
@endsection
