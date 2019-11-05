<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Summary extends Model
{
    protected $table = 'summaries';

    protected $guarded = ['vehicle_id', 'max_speed', 'distance', 'violation'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
