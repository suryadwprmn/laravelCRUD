<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Student::create([
            'nama' => 'John Doe',
            'tgl_lahir' => '2000-01-01',
            'alamat' => 'Jl. Raya',
            'cita_cita' => 'Software Engineer'
        ]);
    }
}
