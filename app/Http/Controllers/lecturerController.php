<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    public function view_course()
    {
        
        return view('lecturer.pages.view-course');
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
