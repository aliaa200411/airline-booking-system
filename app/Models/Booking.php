<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use App\Models\Passenger;
use App\Models\Flight;

class Booking extends Model
{
    use HasFactory;
  
protected $fillable = [
        'flight_id',
        'booking_date',
    ];
    public function passengers(): BelongsToMany
{
    return $this->belongsToMany(Passenger::class, 'booking_passenger', 'booking_id', 'passenger_id');
}

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }
    public function flight()
{
    return $this->belongsTo(Flight::class);
}
}
