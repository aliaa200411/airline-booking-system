<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Flight;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        DB::table('schedules')->delete();

        $flights = Flight::all();

        $schedules = [];

        foreach ($flights as $flight) {
            $schedules[] = [
                'flight_id' => $flight->id,
                'scheduled_time' => $flight->departure_time,
                'gate' => 'A1', 
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $schedules[] = [
                'flight_id' => $flight->id,
                'scheduled_time' => Carbon::parse($flight->departure_time)->addDay(),
                'gate' => 'B2', 
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('schedules')->insert($schedules);
    }
}
