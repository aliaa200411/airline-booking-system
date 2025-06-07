<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PassengerSeeder extends Seeder
{
    public function run()
    {
        $passengers = [
            [
                'full_name' => 'Ahmad Salem',
                'email' => 'ahmadsalem@gmail.com',
                'phone' => '+962790123456',
                'date_of_birth' => '1990-05-12',
                'gender' => 'male',
                'passport_number' => 'P1234567',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Fatima Hassan',
                'email' => 'fatima.hassan@gmail.com',
                'phone' => '+962798765432',
                'date_of_birth' => '1994-09-20',
                'gender' => 'female',
                'passport_number' => 'P7654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Youssef Nabil',
                'email' => 'youssef.nabil@gmail.com',
                'phone' => '+962795551234',
                'date_of_birth' => '1988-02-15',
                'gender' => 'male',
                'passport_number' => 'P1122334',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'full_name' => 'Sara Ali',
                'email' => 'sara.ali@gmail.com',
                'phone' => '+962792223344',
                'date_of_birth' => '1996-11-03',
                'gender' => 'female',
                'passport_number' => 'P9988776',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('passengers')->insert($passengers);
    }
}
