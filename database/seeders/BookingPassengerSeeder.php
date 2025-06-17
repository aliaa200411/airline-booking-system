<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Passenger;

class BookingPassengerSeeder extends Seeder
{
    public function run()
    {
        DB::table('booking_passenger')->delete();

        $bookings = Booking::all();
        $passengers = Passenger::all();

        $records = [];

        foreach ($bookings as $booking) {
            $randomPassengers = $passengers->random(rand(1, 3));

            foreach ($randomPassengers as $passenger) {
                $records[] = [
                    'booking_id' => $booking->id,
                    'passenger_id' => $passenger->id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('booking_passenger')->insert($records);
    }
}
