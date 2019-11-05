<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';

    protected $fillable = ['latitude', 'longitude', 'tracked_at', 'speed', 'voltage', 'distance', 'trip_id'];

    // accessor
    public function getTrackedAtAttribute($value)
    {
        return date('jS F, Y h:ia',strtotime($value));
    }

    public function getSpeedAttribute($value)
    {
        return $value * 1.852;
    }

    public function getDistanceAttribute($value)
    {
        return $value * 1000;
    }

    // mutator
    
    // relationships
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}
