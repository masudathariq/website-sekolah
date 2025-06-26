<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prestasi extends Model
{
    protected $fillable = ['judul', 'slug', 'nama_siswa', 'isi', 'tanggal', 'gambar'];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Buat slug otomatis saat data disimpan
    public static function boot()
    {
        parent::boot();

        static::creating(function ($prestasi) {
            $prestasi->slug = Str::slug($prestasi->judul);
        });

        static::updating(function ($prestasi) {
            $prestasi->slug = Str::slug($prestasi->judul);
        });
    }


}
