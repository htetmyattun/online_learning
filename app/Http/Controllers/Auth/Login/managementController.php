<?php

namespace App\Http\Controllers\Auth\Login;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class managementController extends Controller
{
    protected $redirectTo = '/home';    
    public function __construct()
    {
        $this->middleware('guest:management')->except('logout');
    }    
    public function showLoginForm()
    {
        return view('auth.management.login');
    }       
  
    public function login(Request $request)
    {
        if (Auth::guard('management')->attempt(['email' => $request->email, 'password' => $request->password])) {
           
     		Auth::guard('student')->logout();
     		Auth::guard('lecturer')->logout();
            return redirect()->intended('/management/home');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    public function logout(Request $request)
    {
        Auth::guard('management')->logout();
        return redirect('management/home');
    }
}
