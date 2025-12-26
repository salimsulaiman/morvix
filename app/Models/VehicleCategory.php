<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
    ];

    public function vehicleModels()
    {
        return $this->hasMany(VehicleModel::class, 'vehicle_category_id');
    }
}
