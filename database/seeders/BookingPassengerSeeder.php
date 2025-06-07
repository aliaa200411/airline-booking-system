<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingPassengerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['booking_id' => 1, 'passenger_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['booking_id' => 1, 'passenger_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['booking_id' => 2, 'passenger_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['booking_id' => 3, 'passenger_id' => 4, 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('booking_passenger')->insert($data);
    }
}
