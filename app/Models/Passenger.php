<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger extends Model
{
    use HasFactory;

    public function flights()
    {
        return $this->belongsToMany(Flight::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(Booking::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
