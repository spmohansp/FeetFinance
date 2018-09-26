<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $fillable = ['dateFrom', 'dateTo','vehicleId','customerId','startKm','endKm','total','locationFrom','locationTo','loadType','ton','billAmount','advance','comission','loadingMamool','unLoadingMamool','balance','clientid'];
    protected $gaurded = ['id', 'created_at', 'updated_at'];

    public function vehicles(){
    	return $this->belongsTo(Vehicle::class, 'vehicleId');
  	}

  	public function customers(){
    	return $this->belongsTo(Customer::class, 'customerId');
  	}

  	public function getAllStaffs(){
    	return $this->hasMany(StaffsWork::class, 'entryId','id');
  	}
}
