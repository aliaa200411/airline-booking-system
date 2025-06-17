<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class);

    }
    public function passenger()
    {
        return $this->belongsToMany(Passenger::class, 'flight_passenger', 'flight_id', 'passenger_id');
    }
     public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

     public function originAirport()
    {
        return $this->belongsTo(Airport::class, 'origin_airport_id');
    }

    public function destinationAirport()
    {
        return $this->belongsTo(Airport::class, 'destination_airport_id');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
