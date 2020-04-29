<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student_course extends Model
{
    protected $guard = 'student';
    protected $table = 'student_course';

     protected $fillable = [
        'student_id', 'course_id', 'payment_method', 'payment_photo', 'amount', 'access'
    ];

    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

}