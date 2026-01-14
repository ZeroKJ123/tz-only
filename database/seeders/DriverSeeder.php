<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('drivers')->insert([
            ['full_name' => 'Иванов Петр Сергеевич', 'birth_date' => '1985-10-20', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Сидоров Василий Игоревич', 'birth_date' => '1990-01-15', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Петров Алексей Дмитриевич', 'birth_date' => '1982-05-30', 'created_at' => now(), 'updated_at' => now()],
            ['full_name' => 'Максимов Денис Олегович', 'birth_date' => '1995-11-01', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
