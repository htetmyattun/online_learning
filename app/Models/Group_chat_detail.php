<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group_chat_detail extends Model
{
    //
    protected $fillable = ['member_id','status','type','group_chat_id'];
    protected $table = 'group_chat_detail';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
}
