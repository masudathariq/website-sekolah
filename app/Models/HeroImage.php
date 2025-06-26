<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroImage extends Model
{
    protected $fillable = [
        'image_url',  // path relatif di storage/app/public/hero_images/xxx.jpg
        'order',
        'active',
    ];

    protected $casts = [
        'active' => 'boolean',
        'order' => 'integer',
    ];

    public $timestamps = true;

    // Accessor untuk mengembalikan URL lengkap dari path yang disimpan
    public function getImageUrlAttribute($value)
    {
        return asset('storage/' . $value);
    }

    // Scope untuk hanya mengambil yang aktif
    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
