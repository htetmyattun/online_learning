<?php
namespace App\Http\Controllers\Auth\Login;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;

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
    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        return redirect('student/home');
    }
}