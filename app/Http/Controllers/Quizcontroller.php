<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Quizcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('kuisioners.kuisioner');
    }
    public function saveQuiz()
    {
        return redirect('/hasil');
    }
    public function motivationForm()
    {
        return view('kuisioners.motivasi');
    }
    public function savemotivationForm()
    {
        return redirect('/kuisioner');
    }

    public function result()
    {
        return view('kuisioners.result');
    }
}
