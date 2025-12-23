<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSim extends Model
{
    protected $fillable = [
        'user_id',
        'sim_number',
        'sim_type',
        'sim_photo',
        'expired_at',
        'is_active',
    ];

    protected $casts = [
        'expired_at' => 'date',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
