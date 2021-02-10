<?php

namespace App\Http\Controllers;

use App\Answear;
use App\Aspect;
use App\Exports\AnswearExport;
use App\Exports\scoreExport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AnswearController extends Controller
{
    public function index()
    {
        $answears = Answear::with('user')->paginate(10);
        return view('admin.answear.index', compact('answears'));
    }

    public function export()
    {
        return Excel::download(new AnswearExport, 'jawaban kuisioner.xlsx');
    }
    public function exportscore()
    {
        return Excel::download(new scoreExport, 'skor resiliensi.xlsx');
    }
    public function score()
    {
        $aspects = Aspect::get()->pluck('aspect');
        $users = User::with('score')->get();
        // dd($users);
        return view('admin.answear.score', compact('aspects', 'users'));
    }
}
