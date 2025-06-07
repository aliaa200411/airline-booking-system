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

    public function airports()
    {
        return $this->belongsToMany(Airport::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function admins()
    {
        return $this->belongsTo(Admin::class);
    }
}
