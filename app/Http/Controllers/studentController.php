<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use Pusher\Pusher;

use App\Models\Course;
use App\Models\Message;
use App\Models\Lecturer;
class studentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:student');
    }    
    public function index()
    {
    	
        return view('student.pages.home');
    }
    public function detail_course()
    {
        
        $courses=Course::where('id',1)->get();
            return view('student.pages.detail-course',['courses' => $courses]);
    }
    public function course_resource()
    {
        
        return view('student.pages.course-resource');
    }
    public function course_content()
    {
    	
        return view('student.pages.course-content');
    }
    public function myclass()
    {
        
        return view('student.pages.myclass');
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