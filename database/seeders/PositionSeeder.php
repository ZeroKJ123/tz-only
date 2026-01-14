<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('positions')->insert([
            ['name' => 'Менеджер', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Старший менеджер', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Руководитель отдела', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Директор', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
