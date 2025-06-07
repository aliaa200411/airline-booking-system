<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function passengers()
    {
        return $this->belongsTo(Passenger::class);
    }

    public function payments()
    {
        return $this->hasOne(Payment::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
}
