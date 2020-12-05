<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Management_message extends Model
{
    // use Notifiable;
    protected $fillable = ['student_id', 'message', 'status', 'unread_s','unread_m','src','type','filename'];
    protected $table = 'management_message';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
