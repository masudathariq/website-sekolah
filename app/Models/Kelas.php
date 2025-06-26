<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['tingkatan', 'nama', 'tahun_ajaran', 'is_active'];

    public function getLabelAttribute()
    {
        return "{$this->tingkatan} {$this->nama}";
    }
}
