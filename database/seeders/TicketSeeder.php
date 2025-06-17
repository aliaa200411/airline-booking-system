<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Flight;
use App\Models\Passenger;
use App\Models\Admin;

class TicketSeeder extends Seeder
{
    public function run()
    {
        DB::table('tickets')->delete();

        $flights = Flight::take(3)->get();
        $passengers = Passenger::take(3)->get();
        $admin = Admin::first();

        if ($flights->isEmpty() || $passengers->isEmpty() || !$admin) return;

        $tickets = [
            [
                'passenger_id' => $passengers[0]->id,
                'flight_id' => $flights[0]->id,
                'admin_id' => $admin->id,
                'seat_number' => '10A',
                'status' => 'confirmed',
                'seats_booked' => 1,
            ],
            [
                'passenger_id' => $passengers[1]->id,
                'flight_id' => $flights[0]->id,
                'admin_id' => $admin->id,
                'seat_number' => '10B',
                'status' => 'pending',
                'seats_booked' => 1,
            ],
            [
                'passenger_id' => $passengers[2]->id,
                'flight_id' => $flights[1]->id,
                'admin_id' => $admin->id,
                'seat_number' => '15C',
                'status' => 'confirmed',
                'seats_booked' => 2,
            ],
            [
                'passenger_id' => $passengers[0]->id,
                'flight_id' => $flights[1]->id,
                'admin_id' => $admin->id,
                'seat_number' => '15D',
                'status' => 'cancelled',
                'seats_booked' => 1,
            ],
            [
                'passenger_id' => $passengers[1]->id,
                'flight_id' => $flights[2]->id,
                'admin_id' => $admin->id,
                'seat_number' => '20A',
                'status' => 'confirmed',
                'seats_booked' => 1,
            ],
            [
                'passenger_id' => $passengers[2]->id,
                'flight_id' => $flights[2]->id,
                'admin_id' => $admin->id,
                'seat_number' => '20B',
                'status' => 'pending',
                'seats_booked' => 1,
            ],
        ];

        foreach ($tickets as &$ticket) {
            $ticket['created_at'] = now();
            $ticket['updated_at'] = now();
        }

        DB::table('tickets')->insert($tickets);
    }
}
