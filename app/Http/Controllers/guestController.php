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
                    ->leftJoin('reviews','reviews.course_id','=','courses.id')
                    ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                    ->orderBy('courses.created_at','DESC')
                    ->groupBy('courses.id')
                    ->skip($skip)
                    ->take($limit)
                    ->get();

            $first_course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                        ->leftJoin('student_course',function($join){
                        $join->on('student_course.course_id','=','courses.id')
                             ->where('student_course.student_id','=',Auth::id());
                        })
                        ->leftJoin('reviews','reviews.course_id','=','courses.id')
                        ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                        ->orderBy('courses.created_at','DESC')
                        ->groupBy('courses.id')
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
        $skip = 1;
        $limit = $count - $skip;
        if($id=="1")
        {
            $cate="Software Engineering";
        }
        elseif($id=="2"){
            $cate="Networking";
        }
        elseif($id=="3"){
            $cate="Cyber Security";
        }
        elseif($id=="4"){
            $cate="Embedded System";
        }
        elseif($id=="5"){
            $cate="Business IT";
        }
        $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('student_course.student_id','=',Auth::id());
                    })
                ->leftJoin('reviews','reviews.course_id','=','courses.id')
                ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                ->where('courses.category','!=',$cate)
                ->orderBy('courses.created_at','DESC')
                ->groupBy('courses.id')
                ->get();

        $first_course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                    ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                    ->where('student_course.student_id','=',Auth::id());
                    })
                    ->leftJoin('reviews','reviews.course_id','=','courses.id')
                    ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                    ->where('courses.category','=',$cate)
                    ->orderBy('courses.created_at','DESC')
                    ->groupBy('courses.id')
                    ->first();

        $cate_course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                    ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                    ->where('student_course.student_id','=',Auth::id());
                    })
                    ->leftJoin('reviews','reviews.course_id','=','courses.id')
                    ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                    ->where('courses.category','=',$cate)
                    ->orderBy('courses.created_at','DESC')
                    ->groupBy('courses.id')
                    ->skip($skip)
                    ->take($limit)
                    ->get();

        $first_lec=Lecturer::first();
        $lecturers=Lecturer::skip($skip)
                ->take($limit)
                ->get();
        return view('index',['first_course'=>$first_course,'courses' => $courses,'cate_course'=>$cate_course,'first_lec'=>$first_lec,'lecturers'=>$lecturers]);
    }

    public function all_courses()
    {
        $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('student_course.student_id','=',Auth::id());
                    })
                ->leftJoin('reviews','reviews.course_id','=','courses.id')
                ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                ->orderBy('courses.created_at','DESC')
                ->groupBy('courses.id')
                ->get();
        $count=Course::count();
        $SE_count=Course::where('category','=','Software Engineering')->count();
        $Net_count=Course::where('category','=','Networking')->count();
        $Cyber_count=Course::where('category','=','Cyber Security')->count();
        $Emb_count=Course::where('category','=','Embedded System')->count();
        $Bus_count=Course::where('category','=','Business IT')->count();
        $cate_count=array('count'=>$count,'SE'=>$SE_count,'Net'=>$Net_count,'Cyber'=>$Cyber_count,'Emb'=>$Emb_count,'Bus'=>$Bus_count);
        return view('all-courses',['courses' => $courses,'cate_count'=>$cate_count]);
    }
    public function all_courses2(Request $request){
        $name=$request->search;
        $search_courses=Course::where('courses.name','like','%'.$name.'%')
                ->leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('student_course.student_id','=',Auth::id());
                    })
                ->leftJoin('reviews','reviews.course_id','=','courses.id')
                ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                ->orderBy('courses.created_at','DESC')
                ->groupBy('courses.id')
                ->get();
        $count=Course::count();
        $SE_count=Course::where('category','=','Software Engineering')->count();
        $Net_count=Course::where('category','=','Networking')->count();
        $Cyber_count=Course::where('category','=','Cyber Security')->count();
        $Emb_count=Course::where('category','=','Embedded System')->count();
        $Bus_count=Course::where('category','=','Business IT')->count();
        $cate_count=array('count'=>$count,'SE'=>$SE_count,'Net'=>$Net_count,'Cyber'=>$Cyber_count,'Emb'=>$Emb_count,'Bus'=>$Bus_count);
        return view('all-courses',['search_courses' => $search_courses,'cate_count'=>$cate_count,'name'=>$name]);
    }
    public function all_courses1($id)
    {
        if($id==1)
        {
            $cate="Software Engineering";
        }
        elseif($id==2){
            $cate="Networking";
        }
        elseif($id==3){
            $cate="Cyber Security";
        }
        elseif($id==4){
            $cate="Embedded System";
        }
        elseif($id==5){
            $cate="Business IT";
        }
        $cate_course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                    ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                    ->where('student_course.student_id','=',Auth::id());
                    })
                    ->leftJoin('reviews','reviews.course_id','=','courses.id')
                    ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                    ->where('courses.category','=',$cate)
                    ->orderBy('courses.created_at','DESC')
                    ->groupBy('courses.id')
                    ->get();
        $count=Course::count();
        $SE_count=Course::where('category','=','Software Engineering')->count();
        $Net_count=Course::where('category','=','Networking')->count();
        $Cyber_count=Course::where('category','=','Cyber Security')->count();
        $Emb_count=Course::where('category','=','Embedded System')->count();
        $Bus_count=Course::where('category','=','Business IT')->count();
        $cate_count=array('count'=>$count,'SE'=>$SE_count,'Net'=>$Net_count,'Cyber'=>$Cyber_count,'Emb'=>$Emb_count,'Bus'=>$Bus_count);
        return view('all-courses',['cate_course'=>$cate_course,'cate_count'=>$cate_count,'cate'=>$cate]);
    }
}