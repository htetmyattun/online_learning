<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

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
}
