<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Management extends Authenticatable
{
    use Notifiable;
    protected $guard = 'management';
    protected $table = 'management';
    
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
