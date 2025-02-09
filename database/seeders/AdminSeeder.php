<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create(
            [
                'name' => 'naja',
                'email' => 'najadinda@gmail.com',
                'password' => Hash::make('098765432'),
            ],
            // [
            //     'name' => 'admin',
            //     'email' => 'admin@gmail.com',
            //     'password' => Hash::make('23456789'),
            // ]
        );
    }
}
