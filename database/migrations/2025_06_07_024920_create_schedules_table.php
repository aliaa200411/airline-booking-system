<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('flight_id')->constrained()->onDelete('cascade');
            $table->datetime('scheduled_time');
            $table->string('gate')->nullable();
            $table->timestamps();
        });
    }
    

    
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};