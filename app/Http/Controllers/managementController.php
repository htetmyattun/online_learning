<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Student_course;
use Illuminate\Support\Facades\Hash;

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
         return redirect('/management/add_new_student');
    }
    public function online()
    {
        $students=Student::select('name','phone_no','nrc_no','father_name','email')->where('type','=','online')->get();
        return view('management.pages.online',['students'=>$students]);
    }
    public function college()
    {
        $students=Student::select('name','phone_no','nrc_no','father_name','email')->where('type','=','college')->get();

        return view('management.pages.college',['students'=>$students]);
    }
    public function view_request()
    {
 
    	$requests=Student_course::leftJoin('students','students.id','=','student_course.student_id')->leftJoin('courses','courses.id','=','student_course.course_id')->where('student_course.access','=',0)->paginate(12, array('courses.name as cname','student_course.amount as amount','student_course.payment_photo as photo','students.name as name','student_course.id as id','student_course.payment_method as payment_method','students.phone_no as phno'));
    	return view('management.pages.requested',['requests'=>$requests]);
    }
    public function attended_students()
    {
        $requests=Student_course::leftJoin('students','students.id','=','student_course.student_id')->leftJoin('courses','courses.id','=','student_course.course_id')->where('student_course.access','=',1)->paginate(12, array('courses.name as cname','student_course.amount as amount','student_course.payment_photo as photo','students.name as name','student_course.id as id','student_course.payment_method as payment_method','students.phone_no as phno'));
        return view('management.pages.attended_students',['requests'=>$requests]);
    }
    public function allow_request($id)
    {
    	 Student_course::where('id',$id)
            ->update(['access' => 1]);
$requests=Student_course::leftJoin('students','students.id','=','student_course.student_id')->leftJoin('courses','courses.id','=','student_course.course_id')->where('student_course.access','=',0)->paginate(12, array('courses.name as cname','student_course.amount as amount','student_course.payment_photo as photo','students.name as name','student_course.id as id','student_course.payment_method as payment_method'));
    	return view('management.pages.requested',['requests'=>$requests]);
    }
}
