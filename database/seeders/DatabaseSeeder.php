<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ktp;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Aldhi Bagas',
            'email' => 'aldhi@gmail.com',
            'password' => Hash::make('password'),
            'nik' => '333209001312'
        ]);

        Ktp::create([
            'user_id' => $user -> id,
            'nik' => $user -> nik
        ]);
    }
}
