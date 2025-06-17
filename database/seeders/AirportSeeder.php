<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AirportSeeder extends Seeder
{
    public function run()
    {
        DB::table('airports')->delete();

        $airports = [
            [
                'name' => 'King Abdulaziz International Airport',
                'code' => 'JED',
                'location' => 'Jeddah, Saudi Arabia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Queen Alia International Airport',
                'code' => 'AMM',
                'location' => 'Amman, Jordan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dubai International Airport',
                'code' => 'DXB',
                'location' => 'Dubai, United Arab Emirates',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Cairo International Airport',
                'code' => 'CAI',
                'location' => 'Cairo, Egypt',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Beirut Rafic Hariri International Airport',
                'code' => 'BEY',
                'location' => 'Beirut, Lebanon',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bahrain International Airport',
                'code' => 'BAH',
                'location' => 'Manama, Bahrain',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hamad International Airport',
                'code' => 'DOH',
                'location' => 'Doha, Qatar',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muscat International Airport',
                'code' => 'MCT',
                'location' => 'Muscat, Oman',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('airports')->insert($airports);
    }
}
