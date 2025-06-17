<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->enum('status', ['confirmed', 'cancelled', 'pending'])->default('pending')->after('seat_number');
            $table->unsignedInteger('seats_booked')->default(1)->after('status');
            $table->unique(['flight_id', 'seat_number'], 'tickets_flight_id_seat_number_unique');
        });
    }

    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropUnique('tickets_flight_id_seat_number_unique');
            $table->dropColumn('status');
            $table->dropColumn('seats_booked');
        });
    }
};
