<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use Notifiable;
    protected $guard = 'teacher';
    protected $fillable = [
        'name',
        'username',
        'email',
        'nip',
        'class',
        'subject',
        'password'
    ];

    protected function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }
}
