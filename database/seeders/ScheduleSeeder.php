<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $schedules = [
            [
                'flight_id' => 1,
                'scheduled_time' => '2025-06-10 08:30:00',
                'gate' => 'A1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_id' => 2,
                'scheduled_time' => '2025-06-11 13:45:00',
                'gate' => 'B3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_id' => 3,
                'scheduled_time' => '2025-06-12 17:00:00',
                'gate' => 'C7',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'flight_id' => 1,
                'scheduled_time' => '2025-06-15 09:15:00',
                'gate' => 'A4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('schedules')->insert($schedules);
    }
}
