<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    public function flights()
    {
        return $this->hasMany(Flight::class);
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}

