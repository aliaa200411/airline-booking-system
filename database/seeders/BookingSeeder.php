<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Flight;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bookings')->delete();

        $flights = Flight::all();

        $bookings = [];

        foreach ($flights as $flight) {
            $bookings[] = [
                'flight_id' => $flight->id,
                'booking_date' => Carbon::now()->subDays(rand(1, 10)),
                 'created_at' => now(),
                'updated_at' => now(),
            ];

            $bookings[] = [
                'flight_id' => $flight->id,
                'booking_date' => Carbon::now()->subDays(rand(11, 20)), 
                'created_at' => now(),
                'updated_at' => now(),
            ];
             $bookings[] = [
                'flight_id' => $flight->id,
                'booking_date' => Carbon::now()->subDays(rand(9, 11)), 
                'created_at' => now(),
                'updated_at' => now(),
            ]; $bookings[] = [
                'flight_id' => $flight->id,
                'booking_date' => Carbon::now()->subDays(rand(5, 14)), 
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('bookings')->insert($bookings);
    }
}
