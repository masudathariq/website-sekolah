<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengumuman extends Model
{
    protected $table = 'pengumuman';
    protected $fillable = ['judul', 'slug', 'isi', 'tanggal'];
    protected $casts = ['tanggal' => 'date'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->slug = Str::slug($model->judul);
        });

        static::updating(function ($model) {
            $model->slug = Str::slug($model->judul);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
