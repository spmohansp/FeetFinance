<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
   protected $fillable = ['name', 'mobile1', 'mobile2', 'address', 'licenceNumber', 'type', 'clientid'];
    protected $gaurded = ['id', 'created_at', 'updated_at'];
}
