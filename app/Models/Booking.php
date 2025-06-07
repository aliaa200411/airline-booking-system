<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function passengers()
    {
        return $this->belongsToMany(Passenger::class);
    }

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }
}
