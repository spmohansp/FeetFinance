<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['ownerName', 'vehicleNumber', 'vehicleName', 'vehicleType', 'clientid'];
    protected $gaurded = ['created_at', 'updated_at'];

    public function documents(){
        return $this->hasMany(Document::class, 'vehicleId', 'id');
    }
}
