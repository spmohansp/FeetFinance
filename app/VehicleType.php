<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleType extends Model
{
    protected $fillable = ['vehicleType'];
    protected $gaurded = ['id', 'created_at', 'updated_at'];
}
