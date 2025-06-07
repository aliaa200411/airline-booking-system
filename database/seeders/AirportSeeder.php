<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportSeeder extends Seeder
{
    public function run()
    {
        $airports = [
            ['name' => 'King Abdulaziz International Airport', 'location' => 'Jeddah, Saudi Arabia', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Dubai International Airport', 'location' => 'Dubai, United Arab Emirates', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cairo International Airport', 'location' => 'Cairo, Egypt', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Beirut Rafic Hariri International Airport', 'location' => 'Beirut, Lebanon', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bahrain International Airport', 'location' => 'Manama, Bahrain', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Hamad International Airport', 'location' => 'Doha, Qatar', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Muscat International Airport', 'location' => 'Muscat, Oman', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('airports')->insert($airports);
    }
}
