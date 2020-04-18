<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    	
        return view('student.pages.detail-course');
    }
    public function course_content()
    {
    	
        return view('student.pages.course-content');
    }
}