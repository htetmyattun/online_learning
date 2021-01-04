<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Storage;
use Pusher\Pusher;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Course;
use App\Models\Coupon;
use App\Models\Notes;
use App\Models\Message;
use App\Models\Group_chat;
use App\Models\Group_chat_detail;
use App\Models\Group_chat_message;
use App\Models\Progress;
use App\Models\Lecturer;
use App\Models\Student_course;
use App\Models\Section;
use App\Models\Course_content;
use App\Models\Assignment;
use App\Models\Reviews;
use App\Models\Question;
use App\Models\Student_quiz;
use App\Models\Attendance;
use App\Models\Certificate;
use App\Models\Management_message;
use App\Models\Exam;
use App\Models\Exam_quiz;
use App\Models\Student_exam_quiz;
use App\Models\Exam_assignment;

use Illuminate\Support\Facades\Hash;
class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }   

    public static function show_image($img)
    {

        $s3 = \Storage::disk('spaces');
        $client = $s3->getDriver()->getAdapter()->getClient();
        $expiry = "+10 minutes";
        $command = $client->getCommand('GetObject', [
            'Bucket' => \Config::get('filesystems.disks.spaces.bucket'),
            'Key'    => $img
        ]);

        $request = $client->createPresignedRequest($command, $expiry);
        return ((string)$request->getUri());
    } 
    public function fetch_coupon()
    {
      $coupon = Coupon::get();

      // Return as json
      return json_encode(array('coupon'=>$coupon));
    }
    public function fetch_password(Request $request)
    {
      if (Auth::guard('student')->attempt(['id' => Auth::id(), 'password' => $request->old_pass]))
      {
        return response()->json(['success'=>'success']);
      }
      else{
        return response()->json(['success'=>'invalid']);
      }

      // Return as json
      
    }
    public function update_password(Request $request){
        $stu=Student::where('id','=',Auth::id())->first();
        $stu->password=Hash::make($request['new_pass']);
        $stu->save();
        
        Auth::guard('student')->logout();
        return redirect()->back();

    }
    public function image(){
        return view('student.pages.image');
    }
    public function index()
    {
        $count = Course::count();
        if ($count)
        {
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
            return view('student.pages.home',['first_course'=>$first_course,'courses' => $courses,'first_lec'=>$first_lec,'lecturers'=>$lecturers]);
        }
        else {
            return view('student.pages.home');


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
        return view('student.pages.home',['first_course'=>$first_course,'courses' => $courses,'cate_course'=>$cate_course,'first_lec'=>$first_lec,'lecturers'=>$lecturers]);
    }
    public function detail_course($id)
    {
        $r_courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('student_course.student_id','=',Auth::id());
                    })
                ->leftJoin('reviews','reviews.course_id','=','courses.id')
                ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                ->groupBy('courses.id')
                ->get();

        $course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                ->where('courses.id','=',$id)
                ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('student_course.student_id','=',Auth::id());
                    })
                ->leftJoin('reviews','reviews.course_id','=','courses.id')
                ->select('courses.*', 'lecturers.name as lecturer_name','student_course.id as sid','student_course.access as access',DB::raw('AVG(reviews.stars) as avg'))
                ->first();
        $reviews=Reviews::leftJoin('courses','courses.id','=','reviews.course_id')
                ->leftJoin('students','reviews.student_id','=','students.id')
                ->where('courses.id','=',$id)
                ->get();
        return view('student.pages.detail-course',['r_courses' => $r_courses,'course'=>$course,'reviews'=>$reviews]);
    }
    public function enrollment(Request $request){
        $Student_course=new Student_course;
        $Student_course->student_id=Auth::id();
        $Student_course->course_id = $request->course_id;
        $Student_course->payment_method = $request->payment_method;
        $Student_course->amount=$request->amount;
        $Student_course->access=0;
        $Student_course->coupon=$request->validcoupon;
        $Student_course->save();
        if ($Student_course->save()) {

            $Student_course
            ->where('id',$Student_course->max('id'))
            ->update(['payment_photo' => "/img/payment/".strval($Student_course->id).".".$request->file('payment_photo')->getClientOriginalExtension()]);

            $imageName = strval($Student_course->id).'.'.$request->file('payment_photo')->getClientOriginalExtension();
            $request->file('payment_photo')->move(public_path('/img/payment'), $imageName);
            $Student_course->save();
        };

        toast('Your Post as been submited!<br>Please Wait Our Confirmation!','success');
        return redirect()->route('student_home');
    }

    public function course_resource($id)
    {
        $course = Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')->whereColumn('courses.id','student_course.course_id')->where([['student_id', '=', Auth::id()], ['course_id', '=', $id], ['access', '=', 1]])->get()->first();
        if($course)
        {   
            $sections = Section::select('sections.*','sections.id as sec_id')->where('course_id', '=', $id)->get();
            $course_contents = Course_content::leftJoin('assignments', 'course_contents.id','=','assignments.course_content_id')
                ->leftJoin('question','course_contents.id','=','question.course_content_id')
                ->leftJoin('progress','progress.content_id','=','course_contents.id')
                ->select('assignments.*', 'course_contents.*','progress.status as status','assignments.assignment_url as assignment_url_posted',DB::raw('count(question.id) as no_quiz'))
                ->orderBy('course_contents.id')
                ->groupBy('course_contents.id')
                ->get();
            $course_info=Course::where('id','=',$id)->first();

            return view('student.pages.course-resource',[ 'sections' => $sections,'course_contents' => $course_contents,'course_info'=>$course_info]);
        }
        echo "You cannot access to this course or the course information could not get.";
    }
    public function quiz($c_id,$id){
        $course = Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')->whereColumn('courses.id','student_course.course_id')->where([['student_id', '=', Auth::id()], ['course_id', '=', $c_id], ['access', '=', 1]])->get()->first();
        if($course){
            $sections = Section::where('course_id', '=', $c_id)->get();
            $course_content = null;
            if($sections) {
              
                $course_contents = Course_content::leftJoin('progress', function($join) { 
                    $join->on('progress.content_id','=','course_contents.id')
                    ->where('progress.student_id', '=',Auth::id());
                    })
                    ->leftJoin('question','course_contents.id','=','question.course_content_id')
                    ->select('course_contents.*','progress.*','course_contents.id as cid',DB::raw('count(question.id) as no_quiz'))

                    ->groupBy('course_contents.id')
                    ->get();
              //  DB::enableQueryLog();
                $course_content = Course_content::leftJoin('sections', 'sections.id','=','course_contents.section_id')
                    ->leftJoin('notes','notes.content_id','=','course_contents.id')
                    ->leftJoin('question','course_contents.id','=','question.course_content_id')
                    ->select('sections.*', 'course_contents.*','sections.title AS sec_tit','notes.note as note','notes.id as nid',DB::raw('count(question.id) as no_quiz'))
                    ->where('course_contents.id','=', $id)
                    ->get()
                    ->first();
             //   dd(DB::getQueryLog());
                $videos=Course_content::leftJoin('sections', 'sections.id','=','course_contents.section_id')->select('sections.*', 'course_contents.*' , 'course_contents.id AS cc_id')->where([['video_url','!=',''],['course_id', '=', $c_id]])->get();

                $quiz=Question::leftJoin('course_contents','course_contents.id','=','question.course_content_id')
                    ->where('question.course_content_id','=',$id)
                    ->select('question.*')
                    ->get();
                $flag=Student_quiz::where('course_content_id','=',$id)->where('student_id','=',Auth::guard('student')->user()->id)->count();
                $quiz_mark=Student_quiz::where('course_content_id','=',$id)->where('student_id','=',Auth::guard('student')->user()->id)->first();

            }
            return view('student.pages.quiz',['course' => $course, 'sections' => $sections, 'course_contents' => $course_contents, 'course_content' => $course_content,'quiz'=>$quiz,'flag'=>$flag,'quiz_mark'=>$quiz_mark]);
        }
        else {
            echo "You cannot access to this course or the course information could not get.";
        }
    }
    public function answer_quiz(Request $request){
        $answer=Question::where('course_content_id','=',$request->course_content_id)->get();
        $count=0;
        foreach($answer as $a){
            if($request->input('answer_'.$a->id)==$a->answer){
                $count++;
            }
        }
        $student_quiz=new Student_quiz;
        $student_quiz->student_id=Auth::guard('student')->user()->id;
        $student_quiz->course_content_id=$request->course_content_id;
        $student_quiz->marks=$count;
        $student_quiz->save();

        $flag=Student_quiz::where('course_content_id','=',$request->course_content_id)->where('student_id','=',Auth::guard('student')->user()->id)->count();

            $progress=new Progress;
            $progress->student_id=Auth::id();
            $progress->content_id=$request->course_content_id;
            $progress->status=1;
            //DB::enableQueryLog();
            $progress->save();
        return back();
    }
    public function course_content($c_id, $id,$p,$l=0)
    {
        if($id!=$l)
        {
        $course = Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')->whereColumn('courses.id','student_course.course_id')->where([['student_id', '=', Auth::id()], ['course_id', '=', $c_id], ['access', '=', 1]])->get()->first();

        if($course) {
            $reviews=Reviews::leftJoin('courses','courses.id','=','reviews.course_id')
                ->leftJoin('students','reviews.student_id','=','students.id')
                ->get();
            $sections = Section::where('course_id', '=', $c_id)->get();
            $course_content = null;
            if($sections) {
              
                $course_contents = Course_content::leftJoin('progress', function($join) { 
                    $join->on('progress.content_id','=','course_contents.id')
                    ->where('progress.student_id', '=',Auth::id());
                    })
                    ->leftJoin('question','course_contents.id','=','question.course_content_id')
                    ->select('course_contents.*','progress.*','course_contents.id as cid',DB::raw('count(question.id) as no_quiz'))

                    ->groupBy('course_contents.id')
                    ->get();
              
                $course_content = Course_content::leftJoin('sections', 'sections.id','=','course_contents.section_id')
                    ->leftJoin('notes','notes.content_id','=','course_contents.id')
                    ->leftJoin('question','course_contents.id','=','question.course_content_id')
                    ->select('sections.*', 'course_contents.*' ,'sections.title AS sec_tit','notes.note as note','notes.id as nid',DB::raw('count(question.id) as no_quiz'))
                    ->where('course_contents.id','=', $id)
                    ->get()
                    ->first();
                $progress=Progress::where('progress.student_id','=',Auth::id())->select('progress.status as status')->where('content_id','=', $id)->get();
                //DB::enableQueryLog();
                $videos=Course_content::leftJoin('sections', 'sections.id','=','course_contents.section_id')
                    ->select('sections.*', 'course_contents.*' , 'course_contents.id AS cc_id')->where([['video_url','!=',''],['course_id', '=', $c_id]])
                    ->orWhere([['quiz','!=',''],['course_id', '=', $c_id]])
                    ->orderBy('section_id')
                    ->orderBy('course_contents.id')
                    ->get();
                   // dd(DB::getQueryLog());
                $quiz=Question::leftJoin('course_contents','course_contents.id','=','question.course_content_id')
                    ->where('question.course_content_id','=',$id)
                    ->select('question.*')
                    ->get();
                $flag=Student_quiz::where('course_content_id','=',$id)->where('student_id','=',Auth::guard('student')->user()->id)->count();
                $quiz_mark=Student_quiz::where('course_content_id','=',$id)->where('student_id','=',Auth::guard('student')->user()->id)->first();
 
            }
            //DB::raw("CREATE TEMPORARY TABLE progress AS ('select * from progress where student_id=1');"),'progress.content_id','=','course_contents.id'
          /*  $projects = Project::leftJoin('projectnotes', function($join) { 
        $join->on('projectnotes.project_id', '=', 'projects.id')
             ->on('projectnotes.id', '=', DB::raw("(SELECT max(id) from projectnotes WHERE projectnotes.project_id = projects.id)")); 
        })
        ->select(array('projects.*', 'projectnotes.note as note'))*/
            // echo $videos;->where('progress.student_id',Auth::id())

        if($p==1&&$l!=0)
        {
           
    if(Progress::where('content_id','=',$id)->where('student_id','=',Auth::id())->count()==0)
    {
         $progress=new Progress;
            $progress->student_id=Auth::id();
            $progress->content_id=$l;
            $progress->status=1;
            //DB::enableQueryLog();
            $progress->save();
            //dd(DB::getQueryLog());
            $p=2;
            return redirect('/student/course-content/'.$c_id.'&'.$id.'&'.$p);
    }
        }

            return view('student.pages.course-content',['course' => $course, 'sections' => $sections, 'course_contents' => $course_contents, 'course_content' => $course_content,'videos'=>$videos, 'reviews'=>$reviews,'flag'=>$flag,'quiz'=>$quiz,'quiz_mark'=>$quiz_mark,'progress'=>$progress]);
        }
        else {
            echo "You cannot access to this course or the course information could not get.";
        }
    }
    else
    {

$course = Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')->whereColumn('courses.id','student_course.course_id')->where([['student_id', '=', Auth::id()], ['course_id', '=', $c_id], ['access', '=', 1]])->get()->first();

        if($course) {
            $reviews=Reviews::leftJoin('courses','courses.id','=','reviews.course_id')
                ->leftJoin('students','reviews.student_id','=','students.id')
                ->get();
            $sections = Section::where('course_id', '=', $c_id)->get();
            $course_content = null;
            if($sections) {
              
                $course_contents = Course_content::leftJoin('progress', function($join) { 
                    $join->on('progress.content_id','=','course_contents.id')
                    ->where('progress.student_id', '=',Auth::id());
                    })
                    ->leftJoin('question','course_contents.id','=','question.course_content_id')
                    ->select('course_contents.*','progress.*','course_contents.id as cid',DB::raw('count(question.id) as no_quiz'))

                    ->groupBy('course_contents.id')
                    ->get();
              //  DB::enableQueryLog();
                $course_content = Course_content::leftJoin('sections', 'sections.id','=','course_contents.section_id')
                    ->leftJoin('notes','notes.content_id','=','course_contents.id')
                    ->selectRaw('sections.*, course_contents.* ,sections.title AS sec_tit,notes.note as note,notes.id as nid')
                    ->where('course_contents.id','=', $id)
                    ->get()
                    ->first();
             //   dd(DB::getQueryLog());
                $videos=Course_content::leftJoin('sections', 'sections.id','=','course_contents.section_id')->select('sections.*', 'course_contents.*' , 'course_contents.id AS cc_id')->where([['video_url','!=',''],['course_id', '=', $c_id]])->get();
            }
            //DB::raw("CREATE TEMPORARY TABLE progress AS ('select * from progress where student_id=1');"),'progress.content_id','=','course_contents.id'
          /*  $projects = Project::leftJoin('projectnotes', function($join) { 
        $join->on('projectnotes.project_id', '=', 'projects.id')
             ->on('projectnotes.id', '=', DB::raw("(SELECT max(id) from projectnotes WHERE projectnotes.project_id = projects.id)")); 
        })
        ->select(array('projects.*', 'projectnotes.note as note'))*/
            // echo $videos;->where('progress.student_id',Auth::id())
if($p==1&&$l!=0)
        {
           
    if(Progress::where('content_id','=',$id)->where('student_id','=',Auth::id())->count()==0)
    {
         $progress=new Progress;
            $progress->student_id=Auth::id();
            $progress->content_id=$l;
            $progress->status=1;
            //DB::enableQueryLog();
            $progress->save();
            //dd(DB::getQueryLog());
            $p=2;
            return redirect('/student/course-content/'.$c_id.'&'.$l.'&'.$p);
    }
        }
        else if(($p==2&&$l!=0))
        {
            $p=2;
            return redirect('/student/course-content/'.$c_id.'&'.$l.'&'.$p);
        }

            return view('student.pages.course-content',['course' => $course, 'sections' => $sections, 'course_contents' => $course_contents, 'course_content' => $course_content,'videos'=>$videos, 'reviews'=>$reviews]);
        }
        else {
            echo "You cannot access to this course or the course information could not get.";
        }











        
         

    }
    }
    public function myclass()
    {
        $student_courses = Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')
        ->leftJoin('sections','sections.course_id','=','courses.id')->leftJoin('course_contents','course_contents.section_id','=','sections.id')
        ->leftJoin('progress','progress.content_id','=','course_contents.id')
        ->leftJoin('lecturers', 'lecturers.id','=','courses.lecturer_id')
        ->leftJoin('reviews','reviews.course_id','=','courses.id')
        ->leftJoin('certificate','certificate.course_id','=','student_course.course_id')
        ->select('courses.name as cname',DB::raw('count(course_contents.id) as finish1'), 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.course_id','student_course.access',DB::raw('count(progress.id) as finish'),DB::raw('AVG(reviews.stars) as avg'),'certificate.id as cer_id','certificate.certificate_photo as certificate')
        ->where('student_course.student_id', '=', Auth::id())
        ->where('course_contents.presentation_url','=',null)
        ->groupBy('courses.id')
        ->get();
        // print($student_courses);
        // foreach ($student_courses as $key) {
        // }
        //->select(DB::raw('count(course_contents.id) as all'))
        //, DB::raw(''),DB::raw('count(course_contents.id) as all')
        // $studednt_courses=Student_course::where('student_id',Auth::id())->get();
       
     /*   $progresses=Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')->leftJoin('course_contents','course_contents.course_id','=','courses.id')->leftJoin('progress','progress.content_id','=','course_contents.id')->groupByRaw('courses.id')->select('courses.id', DB::raw('SUM(progress.id) as finish',DB::raw('SUM(course_contents.id) as all'))->where('student_id', '=', Auth::id());
 */
 //      dd($progresses);

        return view('student.pages.myclass',['student_courses' => $student_courses]);
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
        return view('student.pages.all-courses',['courses' => $courses,'cate_count'=>$cate_count]);
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
        return view('student.pages.all-courses',['search_courses' => $search_courses,'cate_count'=>$cate_count,'name'=>$name]);
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
        return view('student.pages.all-courses',['cate_course'=>$cate_course,'cate_count'=>$cate_count,'cate'=>$cate]);
    }
    public function assignment($id)
    {
        $course = Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')->whereColumn('courses.id','student_course.course_id')->where([['student_id', '=', Auth::id()], ['course_id', '=', $id], ['access', '=', 1]])->get()->first();
        if($course) {
            // echo $id;
            $sections = Section::leftJoin('courses', 'courses.id', '=', 'sections.course_id')->leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as c_id','sections.id as sec_id','sections.*','sections.title')->where('sections.course_id', '=', $id)->get();
            // echo $sections;
            $course_contents = Course_content::leftJoin('assignments', 'course_contents.id','=','assignments.course_content_id')->select('assignments.*', 'course_contents.*','assignments.id as assignment_id','assignments.assignment_url as assignment_url_posted','assignments.updated_at as assignment_url_posted_at')->get();
            // echo $course_contents;
            return view('student.pages.assignment',['sections' => $sections, 'course_contents' => $course_contents]);
        }
        else {
            return "You cannot access to this course or the course information could not get.";
        }
    }
    public function assignment_upload(Request $request)
    {
        
        if ($request->file('assignment') == null) {
            $file = "";
            return "nofile";
        }
        else{
            // return $request;
            $name = 'sid_'.Auth::id().'cid_'.$request->course_content;
            $assignment=new Assignment;
            $assignment->student_id=Auth::id();
            $assignment->course_content_id = $request->course_content;
            $assignment->assignment_url="img/assignment/".$name.".".$request->file('assignment')->getClientOriginalExtension();
            $assignment->save();
            $file = $request->file('assignment');
            $filePath = "/img/assignment/".$name.".".$request->file('assignment')->getClientOriginalExtension();
            Storage::disk('spaces')->put($filePath, file_get_contents($file));
            if(Progress::where('content_id','=',$request->course_content)->where('student_id','=',Auth::id())->count()==0)
    {
         $progress=new Progress;
            $progress->student_id=Auth::id();
            $progress->content_id=$request->course_content;
            $progress->status=1;
            //DB::enableQueryLog();
            $progress->save();
            //dd(DB::getQueryLog());
            $p=2;
    }
        

            return "Success";
        }
    }
    public function profile()
    {
        $student_course=Student_course::where('student_id','=',Auth::id())
                        ->leftJoin('courses','student_course.course_id','=','courses.id')
                        ->select('student_course.*','courses.name','courses.id as c_id')
                        ->get();

        $certificate=Certificate::where('student_id','=',Auth::id())
                    ->leftJoin('courses','certificate.course_id','=','courses.id')
                    ->get();
        $type=Student::where('id','=',Auth::id())->select('students.type')->first();
        if($type->type=='college'){
            $attendance=Attendance::where('student_id','=',Auth::id())->get();
            return view('student.pages.profile',['student_course'=>$student_course,'attendance'=>$attendance,'certificate'=>$certificate]);
        }
        else{
            return view('student.pages.profile',['student_course'=>$student_course,'certificate'=>$certificate]);
        }
        
    }
    public function edit_profile()
    {
        
        return view('student.pages.edit-profile');
    }
     public function editprofile(Request $request)
    {
        $id=Auth::user()->id;
        $student = Student::where('id','=', $id)->first();
        $student->name=$request->name;
        $student->father_name=$request->father_name;
        $student->email=$request->email;
        $student->phone_no=$request->phoneno;
        $student->nrc_no=$request->nrc_no;
        if ($request->file('nrc_photo') == null) {
            $file = "";
        }
        else{
            $student->nrc_photo="img/nrc/".strval($id).".".$request->file('nrc_photo')->getClientOriginalExtension();
            $file = $request->file('nrc_photo');
            $filePath = "/img/nrc/".strval($id).".".$request->file('nrc_photo')->getClientOriginalExtension();
            Storage::disk('spaces')->put($filePath, file_get_contents($file));
                
        }
        if ($request->file('profile') == null) {
            $file = "";
        }
        else{
            $student->profile="img/student-profile/".strval($id).".".$request->file('profile')->getClientOriginalExtension();
            $file = $request->file('profile');
            $filePath = "/img/student-profile/".strval($id).".".$request->file('profile')->getClientOriginalExtension();
            Storage::disk('spaces')->put($filePath, file_get_contents($file));
        }
        
        $student->save();
        return redirect()->route('student_profile');
    }

    public function review(Request $request){
        $review = new Reviews;
        $r = Reviews::where('student_id','=', Auth::id())
            ->where('course_id','=',$request->course_id)
            ->first();
        if(isset($r)){
            $r->stars=$request->rating;
            $r->review=$request->review;
            $r->save();
        }
        else{
            $review->course_id=$request->course_id;
            $review->student_id=Auth::id();
            $review->stars=$request->rating;
            $review->review=$request->review;
            $review->save();
        }
        return back();
    }
    public function chat()
    {
        $messages = Message::whereIn('id', Message::selectRaw('max(id)')->where('student_id','=',Auth::id())->groupBy('lecturer_id')->orderBy('id')->get())->orderBy('id','desc')->get();
        $students = [];
        $lecturers = [];

        $lecturers = Lecturer::orderBy('name')->get();
        if ($messages) {
            foreach ($messages as $key => $value) {
                $pending =  Message::where([['student_id',Auth::id()],['lecturer_id','=',$value['lecturer_id']]])->orderBy('id','desc')->groupBy('lecturer_id')->sum('unread_s');
                $messages[$key]['pending'] = $pending;
            }
        }
        if (Auth::user()->type == 'college')
        {
            $students = Student::where([['type','=','college'],['id','!=',Auth::id()]])->orderBy('name')->get();
        }
        $group_chat_detail = Group_chat_detail::where('member_id','=',Auth::id())->orderBy('updated_at','desc')->get();
        if ($group_chat_detail) {
            foreach ($group_chat_detail as $key => $value) {
                
                $group_chat_detail[$key]['group_name'] = ucwords(Group_chat::where('id', '=',$group_chat_detail[$key]['group_chat_id'])->first()->name);
                // $group_chat_detail
                $group_chat_detail[$key]['last_update'] = $group_chat_detail[$key]['updated_at'];
                $group_chat_message = Group_chat_message::where([['group_chat_id','=',$value['group_chat_id']]])->orderBy('id','desc')->first();
                $group_chat_detail[$key]['type'] = null;
                
                if ($group_chat_message) {
                    $group_chat_detail[$key]['message'] = $group_chat_message->message;
                    $group_chat_detail[$key]['type'] = $group_chat_message->type;
                    $group_chat_detail[$key]['last_update'] = $group_chat_message->created_at;
                }
            }
        }
        $management = Management_message::where('student_id','=',Auth::id())->orderBy('id','desc')->first();
        return view('student.pages.chat', ['messages' => $messages, 'lecturers' => $lecturers, 'students' => $students, 'groups' => $group_chat_detail, 'management' => $management]);
    }
    public function view_group_message($group_id)
    {
        Group_chat_detail::where([['member_id','=',Auth::id()],['group_chat_id','=',$group_id]])->update(['status'=>0]);
        // Group_chat_message::where(['student_id' => Auth::id(), 'lecturer_id' => $user_id])->update(['unread_s'=>0]);
        // Message::where('student_id',Auth::id())->where('lecturer_id',$user_id)->update(['unread_s' => 0]);
        $group_messages = Group_chat_message::where('group_chat_id', '=', $group_id)->leftJoin('students', 'group_chat_message.sender_id', '=', 'students.id')->select('group_chat_message.*','students.*','group_chat_message.type as type')->get();
        $members = Group_chat_detail::where('group_chat_id', '=', $group_id)->leftJoin('students', 'group_chat_detail.member_id', '=', 'students.id')->select('group_chat_detail.*','students.*','group_chat_detail.id as id','group_chat_detail.type as type')->get();
        $admin = Group_chat_detail::where([['group_chat_id', '=', $group_id],['type','=',1]])->first();
        $non_members = Student::whereNotIn('id', Group_chat_detail::where('group_chat_id', '=', $group_id)->pluck('member_id'))->where('type','=','college')->get();
        return view('student.partials.chat-msg',['group_messages' => $group_messages, 'type' => 'group', 'members' => $members, 'non_members' => $non_members, 'group_id' => $group_id, 'admin' => $admin]);
    }
    public function view_message($user_id)
    {
        Message::where(['student_id' => Auth::id(), 'lecturer_id' => $user_id])->update(['unread_s'=>0]);
        // Message::where('student_id',Auth::id())->where('lecturer_id',$user_id)->update(['unread_s' => 0]);
        $messages = Message::where('student_id',Auth::id())->where('lecturer_id',$user_id)->get();
        return view('student.partials.chat-msg',['messages' => $messages,'type' => 'lecturer']);
    }
    public function view_management_message()
    {
        Management_message::where('student_id','=', Auth::id())->update(['unread_s'=>0]);
        // Group_chat_detail::where([['member_id','=',Auth::id()],['group_chat_id','=',$group_id]])->update(['status'=>0]);
        // Group_chat_message::where(['student_id' => Auth::id(), 'lecturer_id' => $user_id])->update(['unread_s'=>0]);
        // Message::where('student_id',Auth::id())->where('lecturer_id',$user_id)->update(['unread_s' => 0]);
        $messages = Management_message::where('student_id', '=', Auth::id())->get();
        return view('student.partials.chat-msg',['messages' => $messages, 'type' => 'management']);
    }
    public function save_note(Request $request)
    {
        Notes::where('id','=',$request->nid)->delete();
        $note=new Notes;
        $note->student_id = Auth::id();
        $note->content_id=$request->ccid;
        $note->note=$request->note;
        $note->save();
        return redirect('/student/course-content/'.$request->cid.'&'.$request->ccid.'&1');

    }
    public function create_group(Request $request) {
        // foreach ($request->student_ids as $key => $val)
        // {
        //     print($val);
        // }
        $group_chat = new Group_chat;
        $group_chat->name = $request->group_name;
        $group_chat->save();
        if ($group_chat->id) {
            $group_chat_detail = new Group_chat_detail;
            $group_chat_detail->member_id = Auth::id();
            $group_chat_detail->status = 0;
            $group_chat_detail->type = 1;
            $group_chat_detail->group_chat_id = $group_chat->id;
            $group_chat_detail->save();

            foreach ($request->student_ids as $key => $value) {
                $group_chat_detail = new Group_chat_detail;
                $group_chat_detail->member_id = $value;
                $group_chat_detail->status = 1;
                $group_chat_detail->type = 0;
                $group_chat_detail->group_chat_id = $group_chat->id;
                $group_chat_detail->save();
            }
        }
        return "Success";
    }
    public function delete_group_member(Request $request) {
        $data = Group_chat_detail::where('id','=',$request->id)->delete();
        return $data;
    }
    public function add_group_member(Request $request) {
        foreach ($request->student_ids as $key => $value) {
            $group_chat_detail = new Group_chat_detail;
            $group_chat_detail->member_id = $value;
            $group_chat_detail->status = 1;
            $group_chat_detail->type = 0;
            $group_chat_detail->group_chat_id = $request->group_chat_id;
            $group_chat_detail->save();
        }
        return "success";
        // $data = Group_chat_detail::where('id','=',$request->id)->delete();
    }
    function str_starts_with(string $haystack, string $needle): bool {
        return \strncmp($haystack, $needle, \strlen($needle)) === 0;
    }
    public function send_group_message(Request $request)
    {
        Group_chat_detail::where([['member_id','=',Auth::id()],['group_chat_id','=',$request->group_id]])->update(['status'=>0]);
        Group_chat_detail::where([['member_id','!=',Auth::id()],['group_chat_id','=',$request->group_id]])->update(['status'=>1]);
        $group_chat_message = new Group_chat_message;
        $group_chat_message->group_chat_id = $request->group_id;
        $group_chat_message->message = $request->message;
        $group_chat_message->sender_id = Auth::id();
        $group_chat_message->type = 0;
        $group_chat_message->src = '';
        $group_chat_message->save();
        $id = $group_chat_message->id;
        if ($request->hasFile('chat_file')) {
            $group_chat_message = Group_chat_message::where('id','=',$id)->first();
            if($this->str_starts_with($request->file('chat_file')->getMimetype(),'image')) {
                $group_chat_message->type = 1;
            }
            else if($this->str_starts_with($request->file('chat_file')->getMimetype(),'audio')) {
                $group_chat_message->type = 1;
            }
            else if($this->str_starts_with($request->file('chat_file')->getMimetype(),'video')) {
                $group_chat_message->type = 3;
            }
            else {
                $group_chat_message->filename = $request->file('chat_file')->getClientOriginalName().'.'.$request->file('chat_file')->getClientOriginalExtension();
                $group_chat_message->type = 2;
            }
            $group_chat_message->src = "/files/group-chat-file/".strval($id).".".$request->file('chat_file')->getClientOriginalExtension();
            $file = $request->file('chat_file');
            $filePath = "/files/group-chat-file/".strval($id).".".$request->file('chat_file')->getClientOriginalExtension();
            Storage::disk('spaces')->put($filePath, file_get_contents($file));
            $group_chat_message->save();
        }

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['group_chat_id' => $request->group_id,'student_id' => Auth::id(), 'message' => Str::limit($request->message, 25), 'type'=> $group_chat_message->type, 'group' => 1]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
        return "Success";
    }
    
    public function send_message(Request $request)
    {
        $message = new Message;
        $message->student_id = Auth::id();
        $message->lecturer_id = $request->lecturer_id;
        $message->message = $request->message;
        $message->status = 0;
        $message->unread_l = 1;
        $message->unread_s = 0;
        $message->type = 0;
        $message->src = '';
        $message->save();
        $id = $message->id;
        if ($request->hasFile('chat_file')) {
            $message = Message::where('id','=',$id)->first();
            if($this->str_starts_with($request->file('chat_file')->getMimetype(),'image')) {
                $message->type = 1;
            }
            else if($this->str_starts_with($request->file('chat_file')->getMimetype(),'audio')) {
                $message->type = 1;
            }
            else if($this->str_starts_with($request->file('chat_file')->getMimetype(),'video')) {
                $message->type = 3;
            }
            else {
                $message->filename = $request->file('chat_file')->getClientOriginalName().'.'.$request->file('chat_file')->getClientOriginalExtension();
                $message->type = 2;
            }
            $message->src = "/files/chat-file/".strval($id).".".$request->file('chat_file')->getClientOriginalExtension();
            $file = $request->file('chat_file');
            $filePath = "/files/chat-file/".strval($id).".".$request->file('chat_file')->getClientOriginalExtension();
            Storage::disk('spaces')->put($filePath, file_get_contents($file));
            $message->save();
        }

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['student_id' => Auth::id(), 'lecturer_id' => $request->lecturer_id, 'status' => 0, 'message' => Str::limit($request->message, 25), 'type'=> $message->type, 'group' => 0]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
        return "Success";
    }
    public function send_management_message(Request $request)
    {
        $message = new Management_message;
        $message->student_id = Auth::id();
        $message->message = $request->message;
        $message->status = 0;
        $message->unread_m = 1;
        $message->unread_s = 0;
        $message->type = 0;
        $message->src = '';
        $message->save();
        $id = $message->id;
        if ($request->hasFile('chat_file')) {
            $message = Message::where('id','=',$id)->first();
            if($this->str_starts_with($request->file('chat_file')->getMimetype(),'image')) {
                $message->type = 1;
            }
            else if($this->str_starts_with($request->file('chat_file')->getMimetype(),'audio')) {
                $message->type = 1;
            }
            else if($this->str_starts_with($request->file('chat_file')->getMimetype(),'video')) {
                $message->type = 3;
            }
            else {
                $message->filename = $request->file('chat_file')->getClientOriginalName().'.'.$request->file('chat_file')->getClientOriginalExtension();
                $message->type = 2;
            }
            $message->src = "/files/chat-file/".strval($id).".".$request->file('chat_file')->getClientOriginalExtension();
            $file = $request->file('chat_file');
            $filePath = "/files/chat-file/".strval($id).".".$request->file('chat_file')->getClientOriginalExtension();
            Storage::disk('spaces')->put($filePath, file_get_contents($file));
            $message->save();
        }

        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['student_id' => Auth::id(), 'status' => 0, 'message' => Str::limit($request->message, 25), 'type'=> $message->type, 'group' => 2]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
        return "Success";
    }

    public function view_exam(){
        $count=Exam::count();
        $SE_count=Exam::where('subject','=','Software Engineering')->count();
        $Net_count=Exam::where('subject','=','Networking')->count();
        $Cyber_count=Exam::where('subject','=','Cyber Security')->count();
        $Emb_count=Exam::where('subject','=','Embedded System')->count();
        $Bus_count=Exam::where('subject','=','Business IT')->count();
        $cate_count=array('count'=>$count,'SE'=>$SE_count,'Net'=>$Net_count,'Cyber'=>$Cyber_count,'Emb'=>$Emb_count,'Bus'=>$Bus_count);
        $exams=Exam::leftJoin('lecturers','exam.lecturer_id','=','lecturers.id')
                    ->leftJoin('exam_assignments',function($join){
                        $join->on('exam_assignments.exam_id','=','exam.id')
                             ->where('exam_assignments.student_id','=',Auth::id());
                    })
                    ->select('exam.*','lecturers.*','lecturers.id as lid','exam.id as eid','exam.updated_at as date','exam_assignments.*','exam_assignments.id as esid','exam_assignments.updated_at as assignment_url_posted_at','exam.assignment_url as ass')
                    ->orderBy('date','desc')
                    ->get();

        return view('student.pages.exam',['exams'=>$exams,'cate_count'=>$cate_count]);
    }
    public function view_exam1($id){
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
        $count=Exam::count();
        $SE_count=Exam::where('subject','=','Software Engineering')->count();
        $Net_count=Exam::where('subject','=','Networking')->count();
        $Cyber_count=Exam::where('subject','=','Cyber Security')->count();
        $Emb_count=Exam::where('subject','=','Embedded System')->count();
        $Bus_count=Exam::where('subject','=','Business IT')->count();
        $cate_count=array('count'=>$count,'SE'=>$SE_count,'Net'=>$Net_count,'Cyber'=>$Cyber_count,'Emb'=>$Emb_count,'Bus'=>$Bus_count);
        $exams=Exam::leftJoin('lecturers','exam.lecturer_id','=','lecturers.id')
                    ->leftJoin('exam_assignments',function($join){
                        $join->on('exam_assignments.exam_id','=','exam.id')
                             ->where('exam_assignments.student_id','=',Auth::id());
                    })
                    ->where('subject','=',$cate)
                    ->select('exam.*','lecturers.*','lecturers.id as lid','exam.id as eid','exam.updated_at as date','exam_assignments.*','exam_assignments.id as esid','exam_assignments.updated_at as assignment_url_posted_at','exam.assignment_url as ass')
                    ->orderBy('date','desc')
                    ->get();
        return view('student.pages.exam',['exams'=>$exams,'cate_count'=>$cate_count]);
    }

    public function exam_quiz($id){
        $exam=Exam::where('id','=',$id)->first();
        $no_quiz=Exam_quiz::where('exam_id','=',$id)->count();
        $quiz=Exam_quiz::leftJoin('exam','exam.id','=','exam_quiz.exam_id')
                    ->select('exam.*','exam_quiz.*','exam_quiz.id as eid')
                    ->where('exam_quiz.exam_id','=',$id)
                    ->get();
        $flag=Student_exam_quiz::where('exam_id','=',$id)->where('student_id','=',Auth::guard('student')->user()->id)->count();
        $quiz_mark=Student_exam_quiz::where('exam_id','=',$id)->where('student_id','=',Auth::guard('student')->user()->id)->first();
        return view('student.pages.exam-quiz', ['quiz'=>$quiz,'flag'=>$flag,'quiz_mark'=>$quiz_mark,'exam'=>$exam,'no_quiz'=>$no_quiz]);
        
    }
    public function answer_exam_quiz(Request $request){
        $answer=Exam_quiz::where('exam_id','=',$request->exam_id)->get();
        $count=0;
        foreach($answer as $a){
            if($request->input('answer_'.$a->id)==$a->answer){
                $count++;
            }
        }
        $student_quiz=new Student_exam_quiz;
        $student_quiz->student_id=Auth::guard('student')->user()->id;
        $student_quiz->exam_id=$request->exam_id;
        $student_quiz->marks=$count;
        $student_quiz->save();

        $flag=Student_exam_quiz::where('exam_id','=',$request->exam_id)->where('student_id','=',Auth::guard('student')->user()->id)->count();

        return back();
    }
    public function exam_assignment_upload(Request $request)
    {
        
        if ($request->file('assignment') == null) {
            $file = "";
            return "nofile";
        }
        else{
            // return $request;
            $name = 'sid_'.Auth::id().'eid_'.$request->exam_id;
            $assignment=new Exam_assignment;
            $assignment->student_id=Auth::id();
            $assignment->exam_id= $request->exam_id;
            $assignment->assignment_url="img/exam-assignment/".$name.".".$request->file('assignment')->getClientOriginalExtension();
            $assignment->save();

            $file = $request->file('assignment');
            $filePath ="img/exam-assignment/".$name.".".$request->file('assignment')->getClientOriginalExtension();
            Storage::disk('spaces')->put($filePath, file_get_contents($file));
            return "Success";
        }
    }

    public function request_certificate($id){
        $certificate=new Certificate;
        $certificate->student_id=Auth::id();
        $certificate->course_id=$id;
        $certificate->save();
        return redirect()->back()->with('success',"Successfully requested!!!");
    }
}