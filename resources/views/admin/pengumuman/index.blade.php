@extends('layouts.admin')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Pengumuman</h1>
        <a href="{{ route('admin.pengumuman.create') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow">+ Tambah Pengumuman</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow rounded overflow-x-auto">
        <table class="w-full table-auto border-collapse">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="p-3 border">Judul</th>
                    <th class="p-3 border">Tanggal</th>
                    <th class="p-3 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengumumanList as $pengumuman)
                    <tr class="hover:bg-gray-50">
                        <td class="p-3 border">{{ $pengumuman->judul }}</td>
                        <td class="p-3 border">{{ \Carbon\Carbon::parse($pengumuman->tanggal)->format('d M Y') }}</td>
                        <td class="p-3 border">
                            <a href="{{ route('admin.pengumuman.edit', $pengumuman) }}" class="text-blue-600 hover:underline">Edit</a>
                            <form action="{{ route('admin.pengumuman.destroy', $pengumuman) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pengumuman ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600 hover:underline ml-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="3" class="p-3 text-center text-gray-500">Belum ada pengumuman.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
