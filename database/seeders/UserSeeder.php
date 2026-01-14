<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Тестовый Менеджер',
            'email' => 'manager@example.com',
            'password' => Hash::make('password'),
            'position_id' => 1,
        ]);

        User::create([
            'name' => 'Тестовый Директор',
            'email' => 'director@example.com',
            'password' => Hash::make('password'),
            'position_id' => 4,
        ]);
    }
}
