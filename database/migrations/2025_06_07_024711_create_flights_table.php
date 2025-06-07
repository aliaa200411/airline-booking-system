<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::create('flights', function (Blueprint $table) {
        $table->id();
        $table->string('flight_number');
        $table->string('destination');
        $table->string('origin');
        $table->datetime('departure_time');
        $table->unsignedBigInteger('admin_id');
        $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
        $table->timestamps();
    });
}

    
    public function down(): void
    {
        Schema::dropIfExists('flights');
    }
};