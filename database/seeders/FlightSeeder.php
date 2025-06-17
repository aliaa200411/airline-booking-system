<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Airport;

class FlightSeeder extends Seeder
{
    public function run()
    {
        DB::table('flights')->delete();

        $airports = Airport::pluck('id', 'name');

        $flights = [
            [
                'flight_number' => 'SA101',
                'origin_airport_id' => $airports['King Abdulaziz International Airport'] ?? null,
                'destination_airport_id' => $airports['Dubai International Airport'] ?? null,
                'departure_time' => Carbon::now()->addDays(3)->setTime(10, 30),
                'arrival_time' => Carbon::now()->addDays(3)->setTime(12, 30),
                'seats_available' => 150,
                'price' => 750.00,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'EK202',
                'origin_airport_id' => $airports['Dubai International Airport'] ?? null,
                'destination_airport_id' => $airports['Cairo International Airport'] ?? null,
                'departure_time' => Carbon::now()->addDays(5)->setTime(14, 45),
                'arrival_time' => Carbon::now()->addDays(5)->setTime(16, 30),
                'seats_available' => 180,
                'price' => 680.00,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'QA303',
                'origin_airport_id' => $airports['Hamad International Airport'] ?? null,
                'destination_airport_id' => $airports['Muscat International Airport'] ?? null,
                'departure_time' => Carbon::now()->addDays(7)->setTime(9, 15),
                'arrival_time' => Carbon::now()->addDays(7)->setTime(10, 45),
                'seats_available' => 120,
                'price' => 540.00,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_number' => 'RJ404',
                'origin_airport_id' => $airports['Queen Alia International Airport'] ?? null,
                'destination_airport_id' => $airports['Beirut Rafic Hariri International Airport'] ?? null,
                'departure_time' => Carbon::now()->addDays(4)->setTime(16, 0),
                'arrival_time' => Carbon::now()->addDays(4)->setTime(17, 30),
                'seats_available' => 100,
                'price' => 460.00,
                'admin_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('flights')->insert($flights);
    }
}
