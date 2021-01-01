<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Exam_assignment extends Model
{
    use Notifiable;
    protected $guard = ['lecturer','student'];

    protected $table = 'exam_assignments';
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
