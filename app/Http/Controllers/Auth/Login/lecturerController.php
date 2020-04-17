<?php

namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

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
  
    public function login(Request $request)
    {
        if (Auth::guard('lecturer')->attempt(['email' => $request->email, 'password' => $request->password])) {
           
            Auth::guard('student')->logout();
            Auth::guard('management')->logout();
            return redirect()->intended('/lecturer/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('lecturer')->logout();
        return redirect('lecturer/home');
    }
}
