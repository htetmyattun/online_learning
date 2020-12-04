<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group_chat extends Model
{
    //
    protected $fillable = ['name'];
    protected $table = 'group_chat';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
