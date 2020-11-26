<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_quiz extends Model
{
    protected $guard = 'student';
    protected $table = 'student_quiz';

    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
