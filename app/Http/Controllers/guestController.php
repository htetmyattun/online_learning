<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Course;
use App\Models\Message;
use App\Models\Lecturer;
use App\Models\Student_course;
use App\Models\Section;
use App\Models\Course_content;
class guestController extends Controller
{
	public function index()
    {
        $count = Course::count();
        if ($count) {
            $skip = 1;
            $limit = $count - $skip;

            $courses = Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                    ->leftJoin('student_course',function($join){
                        $join->on('student_course.course_id','=','courses.id')
                             ->where('student_course.student_id','=',Auth::id());
                        })
                    ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access')
                    ->orderBy('courses.created_at','DESC')
                    ->skip($skip)
                    ->take($limit)
                    ->get();

            $first_course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                        ->leftJoin('student_course',function($join){
                        $join->on('student_course.course_id','=','courses.id')
                             ->where('student_course.student_id','=',Auth::id());
                        })
                        ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access')
                        ->orderBy('courses.created_at','DESC')
                        ->first();
            $first_lec=Lecturer::first();
            $lecturers=Lecturer::skip($skip)
                    ->take($limit)
                    ->get();
            return view('index',['first_course'=>$first_course,'courses' => $courses,'first_lec'=>$first_lec,'lecturers'=>$lecturers]);
        }
        else
        {
            return view('index');
        }
        
        
    }
    public function index1($id)
    {
        $count = Course::count();
        if ($count) {
            $skip = 1;
            $limit = $count - $skip;
            if($id=="1")
            {
                $cate="Software Engineering";
            }
            elseif($id="2"){
                $cate="Networking";
            }
            elseif($id="3"){
                $cate="Cyber Security";
            }
            elseif($id="4"){
                $cate="Embedded System";
            }
            elseif($id="5"){
                $cate="Business IT";
            }
            $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                    ->leftJoin('student_course',function($join){
                        $join->on('student_course.course_id','=','courses.id')
                             ->where('student_course.student_id','=',Auth::id());
                        })
                    ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access')
                    ->where('courses.category','!=',$cate)
                    ->orderBy('courses.created_at','DESC')
                    ->get();

            $first_course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                        ->leftJoin('student_course',function($join){
                        $join->on('student_course.course_id','=','courses.id')
                        ->where('student_course.student_id','=',Auth::id());
                        })
                        ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access')
                        ->where('courses.category','=',$cate)
                        ->orderBy('courses.created_at','DESC')
                        ->first();

            $cate_course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                        ->leftJoin('student_course',function($join){
                        $join->on('student_course.course_id','=','courses.id')
                        ->where('student_course.student_id','=',Auth::id());
                        })
                        ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access')
                        ->where('courses.category','=',$cate)
                        ->orderBy('courses.created_at','DESC')
                        ->skip($skip)
                        ->take($limit)
                        ->get();

            $first_lec=Lecturer::first();
            $lecturers=Lecturer::skip($skip)
                    ->take($limit)
                    ->get();
            return view('student.pages.home',['first_course'=>$first_course,'courses' => $courses,'cate_course'=>$cate_course,'first_lec'=>$first_lec,'lecturers'=>$lecturers]);
        }
        else {
            return view('student.pages.home');

        }
    }
}