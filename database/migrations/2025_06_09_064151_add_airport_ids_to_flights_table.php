<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAirportIdsToFlightsTable extends Migration
{
    public function up()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->unsignedBigInteger('origin_airport_id')->nullable()->after('flight_number');
            $table->unsignedBigInteger('destination_airport_id')->nullable()->after('origin_airport_id');

        });
    }

    public function down()
    {
        Schema::table('flights', function (Blueprint $table) {
            $table->dropColumn(['origin_airport_id', 'destination_airport_id']);
        });
    }
}
