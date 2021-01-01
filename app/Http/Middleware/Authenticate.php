<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

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
        // dd();
        if (!$request->expectsJson()) {
            if ($request->is('teacher/*') || $request->is('teacher')) {
                // dd('you trying to access teacher pages');
                return route('teacher.login');
            } else {
                return route('login');
            }
        }
    }
}
