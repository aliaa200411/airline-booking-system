<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admins = [
            [
                'name' => 'Omar Khaled',
                'email' => 'omarkhaled@gmail.com',
                'password' => Hash::make('omar1234'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Laila Ahmad',
                'email' => 'lailaahmad@gmail.com',
                'password' => Hash::make('laila123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mohammed Zaid',
                'email' => 'mohammedzaid@gmail.com',
                'password' => Hash::make('zaid123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('admins')->insert($admins);
    }
}
