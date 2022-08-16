<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function redirectTo()
    {
        $targetRoute = '';

        if (Auth::user()->role == '' || auth()->user()->role == '') {
            $targetRoute = session('target-route')[0] ?? '/';
        } else {
            $targetRoute = '/admin/aspect';
        }
        // dd($targetRoute);
        Session::remove('target-route');

        return $targetRoute;
        // return (Auth::user()->role == '')? '/motivation' : '/admin/aspect';
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        Session::push('target-route', request()->getSession()->get('_previous')['url']);

        return view('auth.login');
    }

    protected function username()
    {
        return 'username';
    }
}
