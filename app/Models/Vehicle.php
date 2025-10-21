<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'type',
        'brand',
        'model',
        'license_plate',
        'year',
        'color',
        'transmission',
        'fuel_type',
        'seats',
        'daily_price',
        'hourly_price',
        'deposit_amount',
        'description',
        'is_available',
        'status',
    ];

    protected $casts = [
        'is_available' => 'boolean',
        'daily_price' => 'decimal:2',
        'hourly_price' => 'decimal:2',
        'deposit_amount' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
