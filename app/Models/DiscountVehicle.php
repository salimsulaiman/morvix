<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountVehicle extends Model
{
    protected $fillable = [
        'vehicle_id',
        'discount_id',
    ];
}
