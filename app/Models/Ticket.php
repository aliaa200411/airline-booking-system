<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
     protected $fillable = [
        'passenger_id',
        'flight_id',
        'admin_id',
        'seat_number',
        'status',
        'seats_booked',
    ];

    public function passengers()
    {
        return $this->belongsTo(Passenger::class);
    }
   public function passenger()
{
    return $this->belongsTo(\App\Models\Passenger::class);
}

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }
    
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
    public function booking()
{
    return $this->belongsTo(Booking::class);
}
}
