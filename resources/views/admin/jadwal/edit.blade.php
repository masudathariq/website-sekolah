@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-10 max-w-2xl">
    <h1 class="text-2xl font-bold mb-6">Edit Jadwal Pelajaran</h1>

    <form action="{{ route('admin.jadwal.update', $jadwal) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Kelas</label>
            <select name="kelas_id" class="w-full border-gray-300 rounded shadow-sm">
                <option value="">-- Pilih Kelas --</option>
                @foreach ($kelas as $item)
                    <option value="{{ $item->id }}" {{ old('kelas_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->tingkat }} {{ $item->nama }}
                    </option>
                @endforeach
            </select>
            @error('kelas_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block mb-1">Hari</label>
            <select name="hari" class="w-full border-gray-300 rounded shadow-sm">
                @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $hari)
                <option value="{{ $hari }}" @selected($jadwal->hari === $hari)>{{ $hari }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Jam Mulai</label>
            <input type="time" name="jam_mulai" class="w-full border-gray-300 rounded shadow-sm" value="{{ $jadwal->jam_mulai }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Jam Selesai</label>
            <input type="time" name="jam_selesai" class="w-full border-gray-300 rounded shadow-sm" value="{{ $jadwal->jam_selesai }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Mata Pelajaran</label>
            <input type="text" name="mata_pelajaran" class="w-full border-gray-300 rounded shadow-sm" value="{{ $jadwal->mata_pelajaran }}">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Guru</label>
            <select name="guru_id" class="w-full border-gray-300 rounded shadow-sm">
                <option value="">-- Pilih Guru --</option>
                @foreach ($guruList as $guru)
                    <option value="{{ $guru->id }}" {{ old('guru_id') == $guru->id ? 'selected' : '' }}>
                        {{ $guru->nama }} - {{ $guru->mata_pelajaran }}
                    </option>
                @endforeach
            </select>
            @error('guru_id')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update</button>
        <a href="{{ route('admin.jadwal.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
    </form>
</div>
@endsection
