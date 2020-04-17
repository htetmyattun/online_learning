<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
            if (! $request->expectsJson()) {
            if ($request->is('student') || $request->is('student/*')) {
            
                return route('student_login');
            }
            if ($request->is('lecturer') || $request->is('lecturer/*')) {
                return route('lecturer_login');
            }
            if ($request->is('management') || $request->is('management/*')) {
                return route('management_login');
            }
           
        }
    }
}
