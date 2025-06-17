<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('flights', function (Blueprint $table) {
        $table->decimal('price', 8, 2)->after('arrival_time');
        $table->integer('seats_available')->after('price');
    });
}

public function down()
{
    Schema::table('flights', function (Blueprint $table) {
        $table->dropColumn(['price', 'seats_available']);
    });
}

};
