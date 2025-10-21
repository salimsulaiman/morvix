<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleMaintenance extends Model
{
    protected $fillable = [
        'vehicle_id',
        'maintenance_type',
        'description',
        'cost',
        'start_date',
        'end_date',
        'status',
    ];

    protected $casts = [
        'cost' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}
