<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherLoginController extends Controller
{
    public function login()
    {
        return view('teacher.login');
    }

    public function register()
    {
        return view('teacher.register');
    }
    public function postLogin(Request $request)
    {
        // dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->guard('teacher')->attempt($request->only(['email', 'password']))) {
            $request->session()->regenerate();

            return redirect('/teacher');
        } else {
            return redirect()->back()->withErrors(['email atau password anda salah']);
        }
    }
}
