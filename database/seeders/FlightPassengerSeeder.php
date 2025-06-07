<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightPassengerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['flight_id' => 1, 'passenger_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['flight_id' => 1, 'passenger_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['flight_id' => 2, 'passenger_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['flight_id' => 3, 'passenger_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('flight_passenger')->insert($data);
    }
}
