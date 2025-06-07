<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public function bookings()
    {
        return $this->belongsTo(Booking::class);
    }

    public function tickets()
    {
        return $this->belongsTo(Ticket::class);
    }
}
