<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Message extends Model
{
    use Notifiable;
    protected $fillable = ['student_id', 'lecturer_id', 'message', 'status', 'unread_s','unread_l','src','type','filename'];
    protected $table = 'messages';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}
