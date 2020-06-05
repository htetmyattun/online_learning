<?php
namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class studentController extends Controller
{
    protected $redirectTo = '/home';    
    public function __construct()
    {
        $this->middleware('guest:student')->except('logout');
    }    
    public function showLoginForm()
    {
        return view('auth.student.login');
    }       
    public function showSignupForm()
    {
        return view('auth.student.signup');
    }
    public function login(Request $request)
    {
     
        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password])) {
           Auth::guard('lecturer')->logout();
            Auth::guard('management')->logout();
     
            return redirect()->intended('/student/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function signup(Request $request)
    {
        $student=new Student;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->password=Hash::make($request['password']);
        $student->phone_no=$request->phoneno;
        $student->father_name=$request->fathername;
        $student->nrc_no=$request->nrcno;
        $student->profile="/images/default-profile.png";
        $student->type="online";
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
        
         return redirect('/student/login');
    }
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        return redirect('student/home');
    }
}