<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComfortCategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('comfort_categories')->insert([
            ['name' => 'Эконом', 'level' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Комфорт', 'level' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Бизнес', 'level' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Представительский', 'level' => 4, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
