<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Berita extends Model
{
    protected $fillable = ['judul', 'slug', 'konten', 'gambar'];

    
    // Buat slug otomatis jika belum ada
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($berita) {
            $berita->slug = Str::slug($berita->judul);
        });
    }
}
