<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Storage;
use App\Models\Course;
use App\Models\Section;
use App\Models\Course_content;
use App\Models\Lecturer;
use App\Models\Message;
use App\Models\Student;
use App\Models\Assignment;
use App\Models\Progress;
use App\Models\Notes;

use Pusher\Pusher;

class lecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }    
    public function index()
    {

    	$courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->where('courses.lecturer_id','=',Auth::user()->id)->paginate(12, array('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id'));
        return view('lecturer.pages.home',['courses' => $courses]);
    }
    public static function show_image($img)
    {

        $s3 = \Storage::disk('s3');
$client = $s3->getDriver()->getAdapter()->getClient();
$expiry = "+10 minutes";

$command = $client->getCommand('GetObject', [
    'Bucket' => \Config::get('filesystems.disks.s3.bucket'),
    'Key'    => $img
]);

$request = $client->createPresignedRequest($command, $expiry);
return ((string)$request->getUri());
    }
    public function add_course()
    {
    	
        return view('lecturer.pages.add-course');
    }
     public function addCourse(Request $request)
    {
        $course=new Course;
        $course->name=$request->course_name;
        $course->lecturer_id=Auth::guard('lecturer')->user()->id;
        $course->price=$request->price;
        $course->discount_price=$request->discount_price;
        $course->description=$request->description;
        $course->entry_requirements=$request->entry_req;
        $course->start_date=$request->start_date;
        $course->duration=$request->duration;
        $course->category=$request->radioinline;
        $course->career=$request->career;
        $course->exam_information=$request->exam_info;
        $course->live_id=$request->live_id;
        $course->save();

        if ($course->save()) {

            
              if ($request->file('course_photo') != null) {
                     $course
            ->where('id',$course->max('id'))
            ->update(['photo' => "img/course/".strval($course->id).".".$request->file('course_photo')->getClientOriginalExtension()]);


                 $file = $request->file('course_photo');
                 $name = strval($course->id).'.'.$request->file('course_photo')->getClientOriginalExtension();
            $filePath = '/img/course/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
                $course->save();
            }
          if ($request->file('preview_video') != null) {
                     $course
            ->where('id',$course->max('id'))
            ->update(['preview' => "img/preview/".strval($course->id).".".$request->file('preview_video')->getClientOriginalExtension()]);

                 $file = $request->file('preview_video');
                 $name = strval($course->id).'.'.$request->file('preview_video')->getClientOriginalExtension();
            $filePath = '/img/preview/' . $name;
            Storage::disk('s3')->put($filePath, file_get_contents($file));
               
          //      $request->file('preview_video')->move(public_path('/img/preview'), $imageName);
                $course->save();
            }
        
        };
        return redirect('/lecturer/home');
    }
    public function view_course($id)
    {
        $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->where('courses.id','=',$id)->paginate(12, array('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','courses.start_date as start_date','courses.duration as duration','courses.description as description','courses.entry_requirements as entry_requirements','courses.exam_information as exam_information','courses.career as career','courses.preview as preview'));
            return view('lecturer.pages.view-course',['courses' => $courses]);
    }
    public function edit_course($id)
    {
         $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->where('courses.id','=',$id)->paginate(12, array('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','courses.start_date as start_date','courses.duration as duration','courses.description as description','courses.entry_requirements as entry_requirements','courses.exam_information as exam_information','courses.career as career','courses.live_id as live_id'));
            return view('lecturer.pages.edit-course',['courses' => $courses]);
    }
      public function save_edit_course(Request $request)
    {
       $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->where('courses.id','=',$request->id)->paginate(12, array('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','courses.start_date as start_date','courses.duration as duration','courses.description as description','courses.entry_requirements as entry_requirements','courses.exam_information as exam_information','courses.career as career'));
            return view('lecturer.pages.view-course',['courses' => $courses]);
    }
    public function add_section($id)
    {

        $sections=Section::where('course_id','=',$id)->get();
        return view('lecturer.pages.add-section',['sections'=>$sections,'id'=>$id]);
    }
    public function add_section_save(Request $request)
    {
        $section=new Section;
        $section->title=$request->section_name;
        $section->course_id=$request->course_id;
        $section->save();
        $sections=Section::where('course_id','=',$request->course_id)->get();
        return view('lecturer.pages.add-section',['sections'=>$sections,'id'=>$request->course_id]);

    }
    public function delete_content($id,$sid)
    {
        Progress::where('content_id','=',$id)->delete();
        Notes::where('content_id','=',$id)->delete();
        Course_content::where('id','=',$id)->delete();
        return redirect('/lecturer/add-content/'.$sid);

    }
    public function delete_section($id)
    {
      $sections=Section::where('id','=',$id)->first();
        $course_id=$sections->course_id;
        //$content=Course_content::where('section_id','=',$id)->first();
        //Progress::where('content_id','=',$)->delete();
        //Notes::where('content_id','=',$id)->delete();
       // dd($course_id);
       // Course_content::where('section_id','=',$id)->delete();

        Section::where('id', '=', $id)->delete();
     //   $sections=Section::all();
      //  return view('lecturer.pages.add-section',['sections'=>$sections,'id'=>$course_id[0]]);
        return redirect('/lecturer/add-section/'.$course_id);
    }
    public function edit_section($id)
    {
         
         $edit_sections=Section::where('id', '=', $id)->get();
         $sections=Section::where('course_id','=',$edit_sections->pluck('course_id'))->get();
        return view('lecturer.pages.edit-section',['sections'=>$sections,'edit_sections'=>$edit_sections]);
    }
    public function edit_section_save(Request $request)
    {
        Section::where('id',$request->id)->update(['title'=>$request->section_name]);
        $sections=Section::where('course_id','=',$request->course_id)->get();
        return view('lecturer.pages.add-section',['sections'=>$sections,'id'=>$request->course_id]);
    }
    public function add_content($id)
    {
        $course_contents=Course_content::where('section_id','=',$id)->get();
        return view('lecturer.pages.add-content',['course_contents'=>$course_contents,'id'=>$id]);
    }
    public function add_content_save(Request $request)
    {
        $course_content=new Course_content;
        $course_content->title=$request->title;
        $course_content->section_id=$request->section_id;
        $course_content->length=$request->length;
        $course_content->save();
        if($course_content->save())
        {
        if($request->type=="1")
        {
           $id1=$course_content->max('id');
             $course_content
            ->where('id',$id1)
            ->update(['video_url' => "img/course/video/".strval($course_content->id).".".$request->file('file')->getClientOriginalExtension()]);

                $file = $request->file('file');
                $name = strval($course_content->id).'.'.$file->getClientOriginalExtension();
                $filePath = 'img/course/video/' . $name;
                Storage::disk('s3')->put($filePath, file_get_contents($file));
                $course_content->save();
               
        }
        else if($request->type=="2")
        {
          // $course_content->assignment_url=
             $course_content
            ->where('id',$course_content->max('id'))
            ->update(['assignment_url' => "/img/course/assignment/".strval($course_content->id).".".$request->file('file')->getClientOriginalExtension()]);

                $file = $request->file('file');
                $name = strval($course_content->id).'.'.$file->getClientOriginalExtension();
                $filePath = 'img/course/assignment/' . $name;
                Storage::disk('s3')->put($filePath, file_get_contents($file));
                $course_content->save();
        }
        else if($request->type=="3")
        {
           // $course_content->presentation_url=
             $course_content
            ->where('id',$course_content->max('id'))
            ->update(['presentation_url' => "/img/course/presentation/".strval($course_content->id).".".$request->file('file')->getClientOriginalExtension()]);

                $file = $request->file('file');
                $name = strval($course_content->id).'.'.$file->getClientOriginalExtension();
                $filePath = 'img/course/presentation/' . $name;
                Storage::disk('s3')->put($filePath, file_get_contents($file));
                $course_content->save();
        }
        else{
            $course_content
            ->where('id',$course_content->max('id'))
            ->update(['quiz' => 1]);
            $course_content->save();
        }
    }
        $course_contents=Course_content::where('section_id','=',$request->section_id)->get();
        return view('lecturer.pages.add-content',['course_contents'=>$course_contents,'id'=>$request->section_id]);
    }
    public function edit_content_save(Request $request)
    {
        $course_content=new Course_content;
        if($request->type=="1")
        {
           
             $course_content
            ->where('id',$request->id)
            ->update(['video_url' => "/img/course/video/".strval($course_content->id).".".$request->file('file')->getClientOriginalExtension(),'title'=>$request->title,'assignment_url'=>"",'presentation_url'=>""]);

                $imageName = strval($course_content->id).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/img/course/video'), $imageName);
                $course_content->save();
        }
        else if($request->type=="2")
        {
          // $course_content->assignment_url=
             $course_content
            ->where('id',$request->id)
            ->update(['assignment_url' => "/img/course/assignment/".strval($course_content->id).".".$request->file('file')->getClientOriginalExtension(),'title'=>$request->title,'video_url'=>"",'presentation_url'=>""]);

                $imageName = strval($course_content->id).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/img/course/assignment'), $imageName);
                $course_content->save();
        }
        else 
        {
           // $course_content->presentation_url=
            $course_content
            ->where('id',$request->id)
            ->update(['presentation_url' => "/img/course/presentation/".strval($course_content->id).".".$request->file('file')->getClientOriginalExtension(),'title'=>$request->title,'video_url'=>"",'assignment_url'=>""]);

                $imageName = strval($course_content->id).'.'.$request->file('file')->getClientOriginalExtension();
                $request->file('file')->move(public_path('/img/course/presentation'), $imageName);
                $course_content->save();
        }
    
        $course_contents=Course_content::where('section_id','=',$request->section_id)->get();
        return view('lecturer.pages.add-content',['course_contents'=>$course_contents,'id'=>$request->section_id]);
    }
    public function edit_content($id)
    {
        $edit_contents=Course_content::where('id','=',$id)->get();
        $course_contents=Course_content::where('section_id','=',$edit_contents->pluck('section_id'))->get();
        return view('lecturer.pages.edit-content',['edit_contents'=>$edit_contents,'course_contents'=>$course_contents]);
    }
    public function add_quiz(){
        return view('lecturer.pages.add-quiz');
    }
    public function assignment_list()
    {
        $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->where('courses.lecturer_id','=',Auth::user()->id)->paginate(12, array('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id'));
        //  dd($courses);
        return view('lecturer.pages.assignment-list',['courses'=>$courses]);
    }
    public function assignment_by_course($id)
    {
        // $assignments=Course::join('sections', 'courses.id', '=', 'sections.course_id')->join('course_contents','sections.id','=','course_contents.section_id')->paginate(12, array('courses.id as id','course_contents.title as title'))->where('id','=',$id);
        $course = Course::where([['lecturer_id', '=', Auth::id()], ['id', '=', $id]])->get();
        if ($course)
        {
            $sections = Section::where('course_id', '=', $id)->get();
            $course_contents = Course_content::leftJoin('assignments', 'course_contents.id','=','assignments.course_content_id')->select('assignments.*', 'course_contents.*','assignments.id as assignment_id','assignments.assignment_url as assignment_url_posted','assignments.updated_at as assignment_url_posted_at')->get();
            // echo $course_contents;
            return view('lecturer.pages.assignment-by-course',['sections' => $sections,'course_contents' => $course_contents, 'course_id' => $id]);
        }
        else {
            echo "You cannot access to this course or the course information could not get.";
        }
        // $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->where('courses.lecturer_id','=',Auth::user()->id)->paginate(12, array('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id'));
    //    DB::enableQueryLog();
      //  dd($assignments);
    }
    public function check_assignment($id, $cid)
    {
        $course = Course::where([['lecturer_id', '=', Auth::id()], ['id', '=', $id]])->get();
        if ($course)
        {
            $assignments = Course_content::leftJoin('assignments', 'course_contents.id','=','assignments.course_content_id')->leftJoin('students', 'students.id','=','assignments.student_id')->select('assignments.*','students.*', 'course_contents.*','assignments.id as assignment_id','assignments.assignment_url as assignment_url_posted','assignments.updated_at as assignment_url_posted_at')->where('course_content_id','=',$id)->get();

            return view('lecturer.pages.check-assignment',['course_id' => $id, 'assignments' => $assignments, 'course_id' => $cid]);
        }
        else {
            echo "You cannot access to this course or the course information could not get.";
        }
    }
    public function add_assignment_marks(Request $request)
    {
        Assignment::where('id', $request->a_id)->update(['marks' => $request->marks,'comment' => $request->comment]);
        return back()->withInput();
    }
    public function profile()
    {
        
        return view('lecturer.pages.profile');
    }
    public function edit_profile()
    {
        
        return view('lecturer.pages.edit-profile');
    }
    public function editprofile(Request $request)
    {
        $id=Auth::user()->id;
        $lecturer = Lecturer::where('id','=', $id)->first();
        $lecturer->name=$request->name;
        $lecturer->email=$request->email;
        $lecturer->phone_no=$request->phoneno;
        $lecturer->education=$request->education;
        $lecturer->description=$request->description;
        $lecturer->short_story=$request->short_story;
            if ($request->file('photo') == null) {
                $file = "";
            }
            else{
                $lecturer->photo="/img/lecturer/".strval($id).".".$request->file('photo')->getClientOriginalExtension();
                $imageName = strval($id).'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move(public_path('/img/lecturer'), $imageName);
            }
        
        $lecturer->save();
        return redirect()->route('lecturer_profile');
    }
    public function chat()
    {
        $messages = Message::whereIn('id', Message::selectRaw('max(id)')->where('lecturer_id','=',Auth::id())->groupBy('student_id')->orderBy('id')->get())->orderBy('id','desc')->get();
        if ($messages) {
            foreach ($messages as $key => $value) {
                $pending =  Message::where([['lecturer_id',Auth::id()],['student_id','=',$value['student_id']]])->orderBy('id','desc')->groupBy('student_id')->sum('unread_l');
                $messages[$key]['pending'] = $pending;
            }
        }
        $students = Student::orderBy('name')->get();
        return view('lecturer.pages.chat', ['messages' => $messages, 'students' => $students]);
    }
    
    public function view_message($user_id)
    {
        Message::where(['lecturer_id' => Auth::id(), 'student_id' => $user_id])->update(['unread_l'=>0]);
        // Message::where('student_id',Auth::id())->where('lecturer_id',$user_id)->update(['unread_s' => 0]);
        $messages = Message::where('lecturer_id',Auth::id())->where('student_id',$user_id)->get();
        return view('lecturer.partials.chat-msg',['messages' => $messages]);
    }

    public function send_message(Request $request)
    {
        $message = new Message;
        $message->lecturer_id = Auth::id();
        $message->student_id = $request->student_id;
        $message->message = $request->message;

        $message->status = 1;
        $message->unread_l = 0;
        $message->unread_s = 1;
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

        $data = ['lecturer_id' => Auth::id(), 'student_id' => $request->student_id, 'status' => 1, 'message' => Str::limit($request->message, 25)]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
