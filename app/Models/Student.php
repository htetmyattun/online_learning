<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Notifications\Notifiable;
class Student extends Model
{
	use Notifiable;
    protected $guard = 'student';
    protected $table = 'students';
    protected $guarded = ['id'];   

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