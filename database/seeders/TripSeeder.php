<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TripSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('trips')->insert([
            'user_id' => 1,
            'car_id' => 2,
            'start_time' => now()->addDay()->setHour(10)->setMinute(0),
            'end_time' => now()->addDay()->setHour(12)->setMinute(0),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
