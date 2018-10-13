<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoadType extends Model
{
    protected $fillable = ['loadType'];
    protected $gaurded = ['id', 'created_at', 'updated_at'];
}
