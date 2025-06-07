<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TicketSeeder extends Seeder
{
    public function run()
    {
        $tickets = [
            [
                'passenger_id' => 1,
                'flight_id' => 1,
                'admin_id' => 1,
                'seat_number' => '12A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'passenger_id' => 2,
                'flight_id' => 2,
                'admin_id' => 1,
                'seat_number' => '14B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'passenger_id' => 3,
                'flight_id' => 1,
                'admin_id' => 2,
                'seat_number' => '10C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'passenger_id' => 4,
                'flight_id' => 3,
                'admin_id' => 1,
                'seat_number' => '22D',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tickets')->insert($tickets);
    }
}
