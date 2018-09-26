<?php

namespace App;

use App\Notifications\ClientResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile', 'transportName', 'address', 'wallet'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ClientResetPassword($token));
    }
    public function customers(){
        return $this->hasMany(Customer::class, 'clientid', 'id');
    }

    public function vehicles(){
        return $this->hasMany(Vehicle::class, 'clientid', 'id');
    }

    public function staffs(){
        return $this->hasMany(Staff::class, 'clientid', 'id');
    }

    public function entries(){
        return $this->hasMany(Entry::class, 'clientid', 'id');
    }
}
