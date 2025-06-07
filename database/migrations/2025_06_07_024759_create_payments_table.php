<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::create('payments', function (Blueprint $table) {
        $table->id();
        $table->string('method');
        $table->decimal('amount', 8, 2);
        $table->foreignId('booking_id')->nullable()->constrained()->onDelete('cascade');
        $table->foreignId('ticket_id')->nullable()->constrained()->onDelete('cascade');
        $table->timestamps();
    });
}


   
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};