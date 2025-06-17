<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Booking;

class Passenger extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'date_of_birth',
        'gender',
        'passport_number',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function flights()
    {
        return $this->belongsToMany(Flight::class, 'flight_passenger', 'passenger_id', 'flight_id');
    }
    
    public function bookings(): BelongsToMany
{
    return $this->belongsToMany(Booking::class, 'booking_passenger', 'passenger_id', 'booking_id');
}
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function user()
{
    return $this->belongsTo(User::class);
}

}
