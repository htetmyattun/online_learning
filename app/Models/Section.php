<?php

namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
     use Notifiable;
    protected $table = 'sections';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
