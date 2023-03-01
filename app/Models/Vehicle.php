<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    public function photos()
    {
        return $this->hasMany(VehiclePhotos::class, 'vehicle_id', 'id')->orderBy('order', 'ASC');
    }
}
