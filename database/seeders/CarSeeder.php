<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cars')->insert([
            [
                'model' => 'Lada Granta',
                'registration_plate' => 'A111AA77',
                'driver_id' => 1,
                'comfort_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'model' => 'Kia Rio',
                'registration_plate' => 'B222BB77',
                'driver_id' => 2,
                'comfort_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'model' => 'Toyota Camry',
                'registration_plate' => 'C333CC77',
                'driver_id' => 3,
                'comfort_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'model' => 'Mercedes-Benz S-Class',
                'registration_plate' => 'D444DD77',
                'driver_id' => 4,
                'comfort_category_id' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
