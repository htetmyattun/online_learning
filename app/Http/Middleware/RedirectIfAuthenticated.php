<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            foreach (config('auth.guards') as $key => $value) {
                if($key == $guard) {
                   
                    if($value['provider']=="students")
                    {
                         return redirect()->route('student_home');
                    }
                     else if($value['provider']=="lecturers")
                    {
                         return redirect()->route('lecturer_home');
                    }
                     else if($value['provider']=="management")
                    {
                         return redirect()->route('management_home');
                    }
                }
            }
        }

        return $next($request);
    }
}
