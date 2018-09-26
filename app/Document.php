<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
     protected $fillable = ['type', 'duedate', 'notifyBefore', 'interval', 'issuingCompany', 'amount', 'notes', 'vehicleId'];
    protected $gaurded = ['id', 'created_at', 'updated_at'];
}
