<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = [
        'name',
        'description',
        'icon',
    ];

    public function vehicles()
    {
        return $this->belongsToMany(
            Vehicle::class,
            'vehicle_features'
        );
    }
}
