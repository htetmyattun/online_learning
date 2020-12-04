<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group_chat_message extends Model
{
    //
    protected $fillable = ['sender_id','message','type','type','src','filename','group_chat_id'];
    protected $table = 'group_chat_message';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
