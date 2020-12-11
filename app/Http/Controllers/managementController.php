<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Pusher\Pusher;
use App\Models\Student;
use App\Models\Course;
use App\Models\Coupon;
use App\Models\Student_course;
use App\Models\Attendance;
use App\Models\Reviews;
use App\Models\Certificate;
use App\Models\Management_message;

class managementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:management');
    }    
    public function index()
    {
    	$students=Student::select('id','name','phone_no','nrc_no','father_name','email')->get();
        return view('management.pages.home',['students'=>$students]);
    }
    public function add_new_student()
    {
        
        return view('management.pages.add_new_student');
    }
     public function save_new_student(Request $request)
    {
        $student=new Student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->password=Hash::make($request['password']);
        $student->phone_no=$request->phoneno;
        $student->father_name=$request->fathername;
        $student->nrc_no=$request->nrcno;
        $student->profile="/images/default-profile.png";
        $student->type="college";
        $student->save();
        if ($student->save()) {

            if ($request->file('nrcphoto') != null) {
                     $student
            ->where('id',$student->max('id'))
            ->update(['nrc_photo' => "/img/nrc/".strval($student->id).".".$request->file('nrcphoto')->getClientOriginalExtension()]);

                $imageName = strval($student->id).'.'.$request->file('nrcphoto')->getClientOriginalExtension();
                $request->file('nrcphoto')->move(public_path('/img/nrc'), $imageName);
                $student->save();
            }
          
        
        };
        return redirect()->back()->with('status','New college student added!');
    }
    public function delete_student($id)
    {
        
         Student::where('id','=',$id)->delete();
         return back();
    }
    public function online()
    {
        $students=Student::select('id','name','phone_no','nrc_no','father_name','email')->where('type','=','online')->get();
        return view('management.pages.online',['students'=>$students]);
    }
    public function college()
    {
        $students=Student::select('id','name','phone_no','nrc_no','father_name','email')->where('type','=','college')->get();

        return view('management.pages.college',['students'=>$students]);
    }
    public function view_request()
    {
 
    	$requests=Student_course::leftJoin('students','students.id','=','student_course.student_id')->leftJoin('courses','courses.id','=','student_course.course_id')->where('student_course.access','=',0)->paginate(12, array('courses.name as cname','student_course.amount as amount','student_course.payment_photo as photo','students.name as name','student_course.id as id','student_course.payment_method as payment_method','students.phone_no as phno','student_course.coupon as coupon','student_course.updated_at as date'));
    	return view('management.pages.requested',['requests'=>$requests]);
    }
    public function attended_students()
    {
        $requests=Student_course::leftJoin('students','students.id','=','student_course.student_id')->leftJoin('courses','courses.id','=','student_course.course_id')->where('student_course.access','=',1)->paginate(12, array('courses.name as cname','student_course.amount as amount','student_course.payment_photo as photo','students.name as name','student_course.id as id','student_course.payment_method as payment_method','students.email as email','student_course.coupon as coupon','student_course.updated_at as date'));
        return view('management.pages.attended_students',['requests'=>$requests]);
    }
    public function allow_request($id)
    {
    	 Student_course::where('id',$id)
            ->update(['access' => 1]);
$requests=Student_course::leftJoin('students','students.id','=','student_course.student_id')->leftJoin('courses','courses.id','=','student_course.course_id')->where('student_course.access','=',0)->paginate(12, array('courses.name as cname','student_course.amount as amount','student_course.payment_photo as photo','students.name as name','student_course.id as id','student_course.payment_method as payment_method'));
    	return view('management.pages.requested',['requests'=>$requests]);
    }
    public function add_coupon()
    {
        return view('management.pages.add_coupon');
    }
    public function save_coupon(Request $request)
    {
        $coupon=new Coupon;
        $coupon->code=$request->code;
        $coupon->expired_date=$request->expired_date;
        $coupon->amount=$request->amount;
        $coupon->save();
        return redirect()->back()->with('status','New coupon added!');
    }
    public function all_coupons()
    {
        $coupons=Coupon::all();
        return view('management.pages.all-coupons',['coupons'=>$coupons]);
    }
    public function delete_coupon($id)
    {
        
         Coupon::where('id','=',$id)->delete();
         return back();
    }
    public function add_attendance()
    {
        $college_students=Student::where('type','=','college')->get();
        return view('management.pages.add_attendance',['college_students'=>$college_students]);
    }
    public function save_attendance(Request $request)
    {
        $id=Student::where('email','=',$request->student_email)->first();
        $time = strtotime($request->attendance_date);
        $date=date('Y-m-d',$time);
        $attendance=new Attendance;
        $attendance->student_id=$id->id;
        $attendance->attendance_date=$date;
        $attendance->total=$request->total;
        $attendance->attendance=$request->attendance;
        $attendance->save();
        return redirect()->back()->with('status','Attendance added!');
    }
    public function reviews()
    {
        $reviews=Reviews::leftJoin('students','reviews.student_id','=','students.id')
            ->leftJoin('courses','courses.id','=','reviews.course_id')
            ->select('students.name as sname','reviews.id as rid','courses.*','reviews.*')
            ->get();
        return view('management.pages.reviews',['reviews'=>$reviews]);
    }
    public function delete_review($id)
    {
        
         Reviews::where('id','=',$id)->delete();
         return back();
    }
    public function certificate()
    {
        $certificate=Certificate::whereNull('certificate_photo')
                    ->leftJoin('students','certificate.student_id','=','students.id')
                    ->leftJoin('courses','certificate.course_id','=','courses.id')
                    ->select('certificate.*','certificate.id as cid','students.*','students.name as sname','courses.*','courses.name as cname')
                    ->get();
        $certificate1=Certificate::whereNotNull('certificate_photo')
                    ->leftJoin('students','certificate.student_id','=','students.id')
                    ->leftJoin('courses','certificate.course_id','=','courses.id')
                    ->select('certificate.*','certificate.id as cid','students.*','students.name as sname','courses.*','courses.name as cname')
                    ->get();
        return view('management.pages.certificate',['certificate'=>$certificate,'certificate1'=>$certificate1]);
    }
    public function save_certificate(Request $request){
        $certificate=new Certificate();
        $certificate->where('id',$request->certificate_id)
                    ->update(['certificate_photo' => "img/certificate/".strval($request->certificate_id).".".$request->file('certificate_photo')->getClientOriginalExtension()]);
            /*$file = $request->file('certificate_photo');
            $name = strval($request->certificate_id).'.'.$request->file('certificate_photo')->getClientOriginalExtension();
            $filePath = '/img/certificate/' . $name;
            Storage::disk('spaces')->put($filePath, file_get_contents($file));*/
       
        return redirect()->back()->with('status','Certificate added!');
    }
    function str_starts_with(string $haystack, string $needle): bool {
        return \strncmp($haystack, $needle, \strlen($needle)) === 0;
    }
    public function chat()
    {
        $students = Management_message::leftJoin('students','management_message.student_id','=','students.id')->groupBy('student_id')->orderBy('id','desc')->get();
        if ($students) {
            foreach ($students as $key => $student) {
                $message = Management_message::where('student_id','=',$student->id)->orderBy('id','desc')->first();
                $pending =  Management_message::where('student_id','=',$student->id)->groupBy('student_id')->sum('unread_s');
                $students[$key]['pending'] = $pending;
                // $students[$key]['message'] = $message->message;
                if ($message) {
                    $students[$key]['message'] = $message->message;
                    $students[$key]['type'] = $message->type;
                    $students[$key]['last_chat'] = $message->created_at;
                }
            }
        }
        return view('management.pages.chat',['students' => $students]);
    }

    public function view_message($user_id)
    {
        Management_message::where('student_id','=', $user_id)->update(['unread_m'=>0]);
        $management_messages = Management_message::where('student_id',$user_id)->get();
        return view('management.partials.chat-msg',['management_messages' => $management_messages,'student_id' => $user_id]);
    }
    public function send_message(Request $request)
    {
        $message = new Management_message;
        $message->student_id = $request->student_id;
        $message->message = $request->message;
        $message->status = 1;
        $message->unread_m = 0;
        $message->unread_s = 1;
        $message->type = 0;
        $message->src = '';
        $message->save();
        $id = $message->id;
        if ($request->hasFile('chat_file')) {
            $message = Management_message::where('id','=',$id)->first();
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
            $fileName = strval($id).'.'.$request->file('chat_file')->getClientOriginalExtension();
            $request->file('chat_file')->move(public_path('/files/chat-file'), $fileName);
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

        $data = ['student_id' => $request->student_id, 'status' => 1, 'message' => Str::limit($request->message, 25), 'type'=> $message->type, 'group' => 2]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
        return "Success";
    }

}
