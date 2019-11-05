<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $table = 'vehicles';

    protected $guarded = ['name'];

    public function trips()
    {
        return $this->hasMany(Trip::class, 'vehicle_id');
    }

    public function summary()
    {
        return $this->hasOne(Summary::class, 'vehicle_id');
    }

    public function duration()
    {
        return $this->hasOne(Duration::class, 'vehicle_id');
    }
}
