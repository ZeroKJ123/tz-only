<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PositionComfortCategorySeeder extends Seeder
{
    public function run(): void
    {
        $permissions = [
            1 => [1, 2],
            2 => [2, 3],
            3 => [2, 3],
            4 => [3, 4],
        ];

        foreach ($permissions as $positionId => $categoryIds) {
            foreach ($categoryIds as $categoryId) {
                DB::table('position_comfort_category')->insert([
                    'position_id' => $positionId,
                    'comfort_category_id' => $categoryId,
                ]);
            }
        }
    }
}
