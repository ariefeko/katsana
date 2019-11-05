<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trips';

    protected $fillable = ['vehicle_id', 'start', 'end', 'distance', 'duration', 'max_speed', 'average_speed', 'idle_duration', 'score', 'idles'];

    // relationship
    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
