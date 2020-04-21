<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class lecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lecturer');
    }    
    public function index()
    {
    	
        return view('lecturer.pages.home');
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

            if ($request->file('preview_video') != null) {
                     $course
            ->where('id',$course->max('id'))
            ->update(['preview' => "/img/preview/".strval($course->id).".".$request->file('preview_video')->getClientOriginalExtension()]);

                $imageName = strval($course->id).'.'.$request->file('preview_video')->getClientOriginalExtension();
                $request->file('preview_video')->move(public_path('/img/preview'), $imageName);
                $course->save();
            }
              if ($request->file('course_photo') != null) {
                     $course
            ->where('id',$course->max('id'))
            ->update(['photo' => "/img/course/".strval($course->id).".".$request->file('course_photo')->getClientOriginalExtension()]);

                $imageName = strval($course->id).'.'.$request->file('course_photo')->getClientOriginalExtension();
                $request->file('course_photo')->move(public_path('/img/course'), $imageName);
                $course->save();
            }
          
        
        };
         

          
          
        
      
        return redirect('/lecturer/home');
    }
    public function view_course()
    {
        
        return view('lecturer.pages.view-course');
    }
    public function edit_course()
    {
        
        return view('lecturer.pages.edit-course');
    }
    public function add_section()
    {
        
        return view('lecturer.pages.add-section');
    }
    public function add_content()
    {
        
        return view('lecturer.pages.add-content');
    }
}
