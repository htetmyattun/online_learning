<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Student extends Authenticatable
{
	use Notifiable;
    protected $guard = 'student';
    protected $table = 'students';

     protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthPassword()
    {
     return $this->password;
    }
}