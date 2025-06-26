<div class="mb-4">
    <label class="block">Tingkatan</label>
    <input type="text" name="tingkatan" value="{{ old('tingkatan', $kelas->tingkatan ?? '') }}" class="border rounded w-full p-2">
</div>

<div class="mb-4">
    <label class="block">Nama</label>
    <input type="text" name="nama" value="{{ old('nama', $kelas->nama ?? '') }}" class="border rounded w-full p-2">
</div>

<div class="mb-4">
    <label class="block">Tahun Ajaran</label>
    <input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran', $kelas->tahun_ajaran ?? '') }}" class="border rounded w-full p-2">
</div>

<div class="mb-4">
    <label class="block">
        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $kelas->is_active ?? false) ? 'checked' : '' }}>
        Aktifkan kelas ini?
    </label>
</div>
