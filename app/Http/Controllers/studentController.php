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
class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }    
    public function index()
    {
        $count = Course::count();
        $skip = 1;
        $limit = $count - $skip;

    	$courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
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
        $lecturers=Lecturer::get();
        return view('student.pages.home',['first_course'=>$first_course,'courses' => $courses,'lecturers'=>$lecturers]);
    }
     public function index1($id)
    {
        $count = Course::count();
        $skip = 1;
        $limit = $count - $skip;
        if($id=="1")
        {

        $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('courses.category','=','Software Engineering')->where('student_course.student_id','=',Auth::id());
                    })
                ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access')
                ->orderBy('courses.created_at','DESC')
                ->skip($skip)
                ->take($limit)
                ->get();

        $first_course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                    ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('courses.category','=','Software Engineering')->where('student_course.student_id','=',Auth::id());
                    })
                    ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access')
                    ->orderBy('courses.created_at','DESC')
                    ->first();
            }
        $lecturers=Lecturer::get();
        return view('student.pages.home',['first_course'=>$first_course,'courses' => $courses,'lecturers'=>$lecturers]);
    }
    public function detail_course($id)
    {
        $r_courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('student_course.student_id','=',Auth::id());
                    })
                ->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','student_course.id as sid','student_course.access as access')
                ->get();
        $course=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')
                ->where('courses.id','=',$id)
                ->leftJoin('student_course',function($join){
                    $join->on('student_course.course_id','=','courses.id')
                         ->where('student_course.student_id','=',Auth::id());
                    })
                ->select('courses.*', 'lecturers.name as lecturer_name','student_course.id as sid','student_course.access as access')
                ->first();
        return view('student.pages.detail-course',['r_courses' => $r_courses],['course'=>$course]);
    }
    public function enrollment(Request $request){
        $Student_course=new Student_course;
        $Student_course->student_id=Auth::id();
        $Student_course->course_id = $request->course_id;
        $Student_course->payment_method = $request->payment_method;
        $Student_course->amount=$request->amount;
        $Student_course->access=0;
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
            $sections = Section::where('course_id', '=', $id)->get();
            $course_contents = Course_content::get();
            return view('student.pages.course-resource',[ 'sections' => $sections],['course_contents' => $course_contents]);
        }
        echo "You cannot access to this course or the course information could not get.";
    }
    public function course_content($c_id, $id)
    {
        $course = Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')->whereColumn('courses.id','student_course.course_id')->where([['student_id', '=', Auth::id()], ['course_id', '=', $c_id], ['access', '=', 1]])->get()->first();

        if($course)
        {
            $sections = Section::where('course_id', '=', $c_id)->get();
            $course_content = null;
            if($sections) {
                $course_contents = Course_content::get();
                $course_content = Course_content::leftJoin('sections', 'sections.id','=','course_contents.section_id')->selectRaw('sections.*, course_contents.* ,sections.title AS sec_tit')->whereColumn('sections.id','course_contents.section_id')->where('course_contents.id','=', $id)->get()->first();
                $videos=Course_content::where('video_url','!=','');
            }
            return view('student.pages.course-content',['course' => $course, 'sections' => $sections, 'course_contents' => $course_contents, 'course_content' => $course_content,'videos'=>$videos]);
        }
        echo "You cannot access to this course or the course information could not get.";
    }
    public function myclass()
    {
        $student_courses = Student_course::leftJoin('courses', 'courses.id','=','student_course.course_id')->leftJoin('lecturers', 'lecturers.id','=','courses.lecturer_id')->whereColumn('courses.id','student_course.course_id')->select('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id')->where([['student_id', '=', Auth::id()]])->get();
        // print($student_courses);
        // foreach ($student_courses as $key) {
        // }
        
        // $studednt_courses=Student_course::where('student_id',Auth::id())->get();
        return view('student.pages.myclass',['student_courses' => $student_courses]);
    }
    public function assignment()
    {
        
        return view('student.pages.assignment');
    }
    public function profile()
    {
        
        return view('student.pages.profile');
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
                $student->nrc_photo="/img/nrc/".strval($id).".".$request->file('nrc_photo')->getClientOriginalExtension();
                $imageName = strval($id).'.'.$request->file('nrc_photo')->getClientOriginalExtension();
                $request->file('nrc_photo')->move(public_path('/img/nrc'), $imageName);
            }
        
        $student->save();
        return redirect()->route('student_profile');
    }
    public function chat()
    {
        // $users = Lecturer::orderBy('name', 'asc')->get();
        // $users = Lecturer::leftJoin('messages', function($join) {
        //     $join->on('messages.lecturer_id','=','lecturers.id');
        // })->groupBy('messages.lecturer_id')->whereColumn('lecturers.id','messages.lecturer_id')->where('messages.student_id','=',1)->where('messages.status', '=', 1)->get();
        $users = Lecturer::leftJoin('messages', 'messages.lecturer_id','=','lecturers.id')->whereColumn('lecturers.id','messages.lecturer_id')->where('messages.student_id','=',Auth::id())->groupBy('lecturers.id')->selectRaw('sum(unread_s) as pending, messages.*, lecturers.*')->orderBy('pending','desc')->get();
        $lecturers = Lecturer::orderBy('name')->get();
        // print $users;
        // print count($users);
        // return view('student.pages.chat', [
            // 'users' => $users]);
        return view('student.pages.chat', [
            'users' => $users, 'lecturers' => $lecturers]);
    }

    public function view_message($user_id)
    {
        Message::where(['student_id' => Auth::id(), 'lecturer_id' => $user_id])->update(['unread_s'=>0]);
        // Message::where('student_id',Auth::id())->where('lecturer_id',$user_id)->update(['unread_s' => 0]);
        $messages = Message::where('student_id',Auth::id())->where('lecturer_id',$user_id)->get();
        return view('student.partials.chat-msg',['messages' => $messages]);
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
        $message->save();

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

        $data = ['student_id' => Auth::id(), 'lecturer_id' => $request->lecturer_id, 'status' => 0]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);

        // $messages = Message::where('student',Auth::id())->where('lecturer',$user_id)->get();
        // return $request;
    }
}