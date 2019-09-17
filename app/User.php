<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
    'name', 'email', 'password',
    ];

    protected $hidden = [
    'password', 'remember_token',
    ];

    public function faculty(){
        return $this->belongsTo('App\Faculty', 'faculty_id');
    }

    public function department(){
        return $this->belongsTo(Department::class);
    }

    public function ecclaims()
    {
        return $this->hasMany(EcClaim::class);
    }
}
