<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Student_course;

class managementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:management');
    }    
    public function index()
    {
    	$students=Student::select('name','phone_no','nrc_no','father_name','email')->get();
        return view('management.pages.home',['students'=>$students]);
    }
    public function view_request()
    {
 
    	$requests=Student_course::leftJoin('students','students.id','=','student_course.student_id')->leftJoin('courses','courses.id','=','student_course.course_id')->where('student_course.access','=',0)->paginate(12, array('courses.name as cname','student_course.amount as amount','student_course.payment_photo as photo','students.name as name','student_course.id as id','student_course.payment_method as payment_method'));
    	return view('management.pages.requested',['requests'=>$requests]);
    }
    public function allow_request($id)
    {
    	 Student_course::where('id',$id)
            ->update(['access' => 1]);
$requests=Student_course::leftJoin('students','students.id','=','student_course.student_id')->leftJoin('courses','courses.id','=','student_course.course_id')->where('student_course.access','=',0)->paginate(12, array('courses.name as cname','student_course.amount as amount','student_course.payment_photo as photo','students.name as name','student_course.id as id','student_course.payment_method as payment_method'));
    	return view('management.pages.requested',['requests'=>$requests]);
    }
}
