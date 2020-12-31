<?php

namespace App\Http\Controllers;

use App\Answear;
use App\Exports\AnswearExport;
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
        // return [
        //     (new AnswearExport),
        //     'jawaban kuisioner.xlsx'
        // ];
    }

    public function test()
    {
        $data = DB::table('users')->join('answears', 'users.id', '=', 'answears.user_id')
            ->select('users.name', 'users.class', 'answears.answear_1', 'answears.answear_2', 'answears.answear_3', 'answears.answear_4', 'answears.answear_5', 'answears.answear_6', 'answears.answear_7')->get();
        dd($data);
    }
}
