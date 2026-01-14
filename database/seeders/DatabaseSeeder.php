<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ComfortCategorySeeder::class,
            PositionSeeder::class,
            DriverSeeder::class,

            UserSeeder::class,
            CarSeeder::class,

            PositionComfortCategorySeeder::class,
            TripSeeder::class,
        ]);
    }
}
