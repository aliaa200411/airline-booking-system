<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    public function run()
    {
        $flights = [
            [
                'flight_number' => 'SA101',
                'origin' => 'Jeddah',
                'destination' => 'Dubai',
                'departure_time' => now()->addDays(3)->setTime(10, 30),
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'EK202',
                'origin' => 'Dubai',
                'destination' => 'Cairo',
                'departure_time' => now()->addDays(5)->setTime(14, 45),
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'QA303',
                'origin' => 'Doha',
                'destination' => 'Muscat',
                'departure_time' => now()->addDays(7)->setTime(9, 15),
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'RJ404',
                'origin' => 'Amman',
                'destination' => 'Beirut',
                'departure_time' => now()->addDays(4)->setTime(16, 0),
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('flights')->insert($flights);
    }
}
