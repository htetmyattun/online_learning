<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Hash;

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
        $course->lecturer_id=$request->
        $course->price=
        $course->discount_price=
        $course->description=
        $course->entry_requirements=
        $course->start_date=
        $course->duration=
        $course->category=
        $course->career=
        $course->exam_information=
        $course->live_id=
        $course->save();
        if ($course->save()) {

            if ($request->file('photo') != null) {
                     $lecturer
            ->where('id',$lecturer->max('id'))
            ->update(['photo' => "/img/lecturer/".strval($lecturer->id).".".$request->file('photo')->getClientOriginalExtension()]);

                $imageName = strval($lecturer->id).'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move(public_path('/img/lecturer'), $imageName);
                $lecturer->save();
            }
          
        
        };
        
         return redirect('/lecturer/home');
    }
    public function view_course()
    {
        
        return view('lecturer.pages.view-course');
    }
}
