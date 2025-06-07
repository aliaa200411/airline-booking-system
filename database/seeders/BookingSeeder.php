<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookingSeeder extends Seeder
{
    public function run()
    {
        $bookings = [
            [
                'booking_date' => '2025-06-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_date' => '2025-06-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_date' => '2025-06-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'booking_date' => '2025-06-20',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('bookings')->insert($bookings);
    }
}
