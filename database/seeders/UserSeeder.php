<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin123',
            'password' => 'password123',  // password akan otomatis di-hash oleh cast di model
        ]);
    }
}
