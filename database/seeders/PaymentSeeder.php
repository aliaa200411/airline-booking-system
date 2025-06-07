<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $payments = [
            [
                'method' => 'Credit Card',
                'amount' => 150.00,
                'booking_id' => 1,
                'ticket_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'method' => 'PayPal',
                'amount' => 200.50,
                'booking_id' => null,
                'ticket_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'method' => 'Cash',
                'amount' => 120.00,
                'booking_id' => 3,
                'ticket_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'method' => 'Credit Card',
                'amount' => 180.75,
                'booking_id' => null,
                'ticket_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('payments')->insert($payments);
    }
}
