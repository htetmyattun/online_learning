<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
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
        
        $courses=Course::where('id',4)->get();
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
}