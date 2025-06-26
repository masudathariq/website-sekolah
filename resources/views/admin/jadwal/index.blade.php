@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10">
    <h1 class="text-2xl font-bold mb-4">Jadwal Pelajaran</h1>

    <a href="{{ route('admin.jadwal.create') }}" class="mb-4 inline-block bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">+ Tambah Jadwal</a>

    <div class="overflow-x-auto bg-white rounded shadow">
        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-3 border">Kelas</th>
                    <th class="p-3 border">Hari</th>
                    <th class="p-3 border">Jam</th>
                    <th class="p-3 border">Mata Pelajaran</th>
                    <th class="p-3 border">Guru</th>
                    <th class="p-3 border w-32">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jadwalList as $jadwal)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border">{{ $jadwal->kelas->tingkat }} {{ $jadwal->kelas->nama }}</td>
                    <td class="p-3 border">{{ $jadwal->hari }}</td>
                    <td class="p-3 border">{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</td>
                    <td class="p-3 border">{{ $jadwal->mata_pelajaran }}</td>
                    <td class="p-3 border">{{ $jadwal->guru->nama ?? 'Guru tidak ditemukan' }}</td>
                    <td class="p-3 border">
                        <a href="{{ route('admin.jadwal.edit', $jadwal) }}" class="text-yellow-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.jadwal.destroy', $jadwal) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin hapus?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @if($jadwalList->isEmpty())
                <tr>
                    <td colspan="6" class="p-3 border text-center text-gray-500">Belum ada jadwal.</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
