<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Vehicle extends Model
{
    protected $fillable = [
        'code',
        'vehicle_model_id',

        'license_plate',
        'year',
        'color',

        'transmission',
        'fuel_type',

        'fuel_tank_capacity',
        'battery_capacity_kwh',

        'seats',
        'daily_price',
        'hourly_price',
        'deposit_amount',

        'location_id',
        'description',
        'status',
    ];

    protected $casts = [
        'year' => 'integer',
        'fuel_tank_capacity' => 'decimal:1',
        'battery_capacity_kwh' => 'decimal:1',
        'daily_price' => 'decimal:2',
        'hourly_price' => 'decimal:2',
        'deposit_amount' => 'decimal:2',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function vehicleModel()
    {
        return $this->belongsTo(VehicleModel::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function images()
    {
        return $this->hasMany(VehicleImage::class);
    }

    public function discounts()
    {
        return $this->belongsToMany(
            Discount::class,
            'discount_vehicles'
        );
    }

    public function activeDiscounts()
    {
        return $this->discounts()
            ->where('is_active', true)
            ->where(function ($q) {
                $q->whereNull('start_at')
                    ->orWhere('start_at', '<=', Carbon::now('Asia/Jakarta'));
            })
            ->where(function ($q) {
                $q->whereNull('end_at')
                    ->orWhere('end_at', '>=', Carbon::now('Asia/Jakarta'));
            });
    }

    public function getFinalDailyPriceAttribute(): float
    {
        $price = (float) $this->daily_price;

        $discount = $this->activeDiscounts()
            ->orderByDesc('value')
            ->first();

        if (! $discount) {
            return $price;
        }


        return $discount->type === 'percentage'
            ? round($price - ($price * ($discount->value / 100)), 2)
            : max(0, $price - (float) $discount->value);
    }

    protected static function booted()
    {
        static::creating(function ($vehicle) {
            if (!$vehicle->code) {
                $vehicle->code = static::generateVehicleCode($vehicle);
            }
        });
    }

    protected static function generateVehicleCode($vehicle)
    {
        $brand = $vehicle->vehicleModel->brand->name ?? 'UNK';
        $brandCode = strtoupper(substr($brand, 0, 3));

        $type = strtoupper($vehicle->vehicleModel->type ?? 'CAR'); // default CAR
        $typeCode = $type === 'motorcycle' ? 'MTR' : 'CAR';

        do {
            $randomNumber = mt_rand(1000, 9999);
            $code = "{$brandCode}-{$typeCode}-{$randomNumber}";
        } while (self::where('code', $code)->exists()); // pastikan unik

        return $code;
    }
}
