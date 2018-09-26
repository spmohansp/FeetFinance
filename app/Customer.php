<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'mobile', 'address', 'type', 'clientid'];
    protected $gaurded = ['id','created_at', 'updated_at'];
}
