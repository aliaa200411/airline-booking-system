<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AirportSeeder::class,
            AdminSeeder::class,
            PassengerSeeder::class,
            BookingSeeder::class,
            FlightSeeder::class,
            TicketSeeder::class,
            PaymentSeeder::class,
            ScheduleSeeder::class,
            BookingPassengerSeeder::class,
            FlightPassengerSeeder::class,
            AirportFlightSeeder::class,
        ]);
    }
}
