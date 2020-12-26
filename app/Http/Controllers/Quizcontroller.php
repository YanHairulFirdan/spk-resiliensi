<?php

namespace App\Http\Controllers;

use App\Aspect;
use App\Statement;
use Illuminate\Http\Request;

class Quizcontroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $aspects = Aspect::with(['statements'])->get();

        return view('kuisioners.kuisioner', compact(['aspects']));
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
