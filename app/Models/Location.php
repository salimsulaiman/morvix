<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'address',
        'map_url'
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
