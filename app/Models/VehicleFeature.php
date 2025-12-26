<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleFeature extends Model
{
    protected $fillable = [
        'vehicle_id',
        'feature_id',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
