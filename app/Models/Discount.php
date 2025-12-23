<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'name',
        'type',
        'value',
        'start_at',
        'end_at',
        'is_active',
    ];
    protected $casts = [
        'start_at' => 'datetime',
        'end_at'   => 'datetime',
        'is_active' => 'boolean',
    ];

    public function vehicles()
    {
        return $this->belongsToMany(
            Vehicle::class,
            'discount_vehicles'
        );
    }
}
