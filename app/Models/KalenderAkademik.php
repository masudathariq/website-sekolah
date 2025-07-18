<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KalenderAkademik extends Model
{
    protected $table = 'kalender_akademik';

    protected $fillable = [
        'judul', 'tanggal', 'deskripsi'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}
