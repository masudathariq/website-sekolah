<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Atribut yang bisa diisi secara massal (mass assignable)
     *
     * @var array<int, string>
     */
    protected $fillable = [
    'username',
    'password',
    'is_admin',    // tambahkan ini
    ];



    /**
     * Atribut yang disembunyikan saat serialisasi (misalnya saat return JSON)
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Atribut yang perlu di-casting ke tipe data lain
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
    return [
        'password' => 'hashed',
        'is_admin' => 'boolean',   // tambahkan ini supaya otomatis casting ke bool
    ];
    }

}
