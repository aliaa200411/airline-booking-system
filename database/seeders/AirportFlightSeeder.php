<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportFlightSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['airport_id' => 1, 'flight_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['airport_id' => 2, 'flight_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['airport_id' => 3, 'flight_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['airport_id' => 1, 'flight_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('airport_flight')->insert($data);
    }
}
