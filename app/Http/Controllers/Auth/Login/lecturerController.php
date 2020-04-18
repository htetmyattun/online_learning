<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Hash;
class lecturerController extends Controller
{
    protected $redirectTo = '/home';    
    public function __construct()
    {
        $this->middleware('guest:lecturer')->except('logout');
    }    
    public function showLoginForm()
    {
        return view('auth.lecturer.login');
    }       
    public function showSignupForm()
    {
        return view('auth.lecturer.signup');
    }
    public function login(Request $request)
    {
        if (Auth::guard('lecturer')->attempt(['email' => $request->email, 'password' => $request->password])) {
           
            Auth::guard('student')->logout();
            Auth::guard('management')->logout();
            return redirect()->intended('/lecturer/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function signup(Request $request)
    {
        $lecturer=new Lecturer;
        $lecturer->name=$request->name;
        $lecturer->email=$request->email;
        $lecturer->password=Hash::make($request['password']);
        $lecturer->phone_no=$request->phoneno;
        $lecturer->education=$request->education;
        $lecturer->description=$request->description;
        $lecturer->short_story=$request->short_story;
        $lecturer->save();
        if ($lecturer->save()) {

            if ($request->file('photo') != null) {
                     $lecturer
            ->where('id',$lecturer->max('id'))
            ->update(['photo' => "/img/lecturer/".strval($lecturer->id).".".$request->file('photo')->getClientOriginalExtension()]);

                $imageName = strval($lecturer->id).'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move(public_path('/img/lecturer'), $imageName);
                $lecturer->save();
            }
          
        
        };
        
         return redirect('/lecturer/login');
    }
    public function logout(Request $request)
    {
        Auth::guard('lecturer')->logout();
        return redirect('lecturer/home');
    }
}
