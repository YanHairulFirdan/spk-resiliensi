<?php

namespace App\Http\Controllers;

// use Auth;

use App\Aspect;
use App\Score;
use App\Teacher;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{

    use AuthenticatesUsers;
    protected $redirecTo = '/teacher';
    protected $maxAttempt = 3;
    protected $deacayMinute = 2;
    public function __construct()
    {
        // $this->middleware('auth:teacher')->except('postLogout');
    }
    public function index()
    {
        /** @var \App\Teacher $teacher */
        $teacher = Auth()->guard('teacher')->user();
        $aspects = Aspect::get();
        $dataScores = $teacher->getStudents('scores.aspect:id,aspect');

        return view('teacher.index', compact('dataScores', 'aspects'));
    }
    protected function guard()
    {
        return Auth::guard('teacher');
    }
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
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
        ]);

        if (auth()->guard('teacher')->attempt($request->only(['username', 'password']))) {
            $request->session()->regenerate();
            // dd('ok');
            return redirect('/teacher');
        } else {
            return redirect()->back()->withErrors(['username atau password anda salah']);
        }
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'username' => 'required|min:5',
            'nip' => 'required|min:8',
            'class' => 'required',
            'subject' => 'required|min:6',
            'password' => 'required|min:8',
        ]);
        $teacher = Teacher::create($request->except(['_token']));
        Auth::login($teacher);
        return redirect('/teacher');
    }

    public function download()
    {
       /** @var \App\Teacher $teacher */
       $teacher = Auth()->guard('teacher')->user();
       $aspects = Aspect::get();
       $dataScores = $teacher->getStudents('scores.aspect:id,aspect');

        $pdf = PDF::loadview('teacher.download', ['dataScores' => $dataScores, 'aspects' => $aspects]);
        return $pdf->download('laporan-skor-test.pdf');
    }

    public function postLogout()
    {
        Auth::guard('teacher')->logout();
        return redirect('/teacher');
    }
    protected function username()
    {
        return 'username';
    }
}
