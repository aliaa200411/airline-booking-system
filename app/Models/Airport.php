<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    use HasFactory;

    public function originFlights()
    {
        return $this->hasMany(Flight::class, 'origin_airport_id');
    }

    public function destinationFlights()
    {
        return $this->hasMany(Flight::class, 'destination_airport_id');
    }
}
