<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    protected $table = 'jadwal_pelajaran';

    protected $fillable = [
    'kelas_id', 'hari', 'jam_mulai', 'jam_selesai', 'mata_pelajaran', 'guru_id' // ✅ BENAR
    ];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function guru()
{
    return $this->belongsTo(Guru::class);
}

}
