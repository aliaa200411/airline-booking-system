<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'flight_id',
        'scheduled_time',
        'gate',
    ];


    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
