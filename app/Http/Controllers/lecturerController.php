<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Section;
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
    	$courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->paginate(12, array('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id'));
        return view('lecturer.pages.home',['courses' => $courses]);
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
    public function view_course($id)
    {
        $courses=Course::leftJoin('lecturers', 'courses.lecturer_id', '=', 'lecturers.id')->where('courses.id','=',$id)->paginate(12, array('courses.name as cname', 'lecturers.name as lecturer_name','courses.price as price','courses.discount_price as discount_price','courses.photo as photo','courses.id as id','courses.start_date as start_date','courses.duration as duration','courses.description as description','courses.entry_requirements as entry_requirements','courses.exam_information as exam_information','courses.career as career'));
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
    public function delete_section($id)
    {
        Section::where('id', '=', $id)->delete();
        $sections=Section::all();
        return view('lecturer.pages.add-section',['sections'=>$sections,'id'=>$id]);
    }
    public function edit_section($id)
    {
         
         $edit_sections=Section::where('id', '=', $id)->get();
       /*  @foreach($edit_sections as $edit_section)
            $course_id=$edit_section->course_id;
        @endforeach*/
         $sections=Section::where('course_id','=',$edit_sections->pluck('course_id'))->get();
        return view('lecturer.pages.edit-section',['sections'=>$sections,'edit_sections'=>$edit_sections]);
    }
    public function edit_section_save(Request $request)
    {
        Section::where('id',$request->id)->update(['title'=>$request->section_name]);
        $sections=Section::where('course_id','=',$request->course_id)->get();
        return view('lecturer.pages.add-section',['sections'=>$sections,'id'=>$request->course_id]);
    }
    public function add_content()
    {
        
        return view('lecturer.pages.add-content');
    }
    public function edit_content()
    {
        
        return view('lecturer.pages.edit-content');
    }
    public function assignment_list()
    {
        
        return view('lecturer.pages.assignment-list');
    }
    public function check_assignment()
    {
        
        return view('lecturer.pages.check-assignment');
    }
}
