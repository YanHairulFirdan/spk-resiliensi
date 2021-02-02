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

    public function saveNaswear(Request $request)
    {
    }
    public function export()
    {
        return Excel::download(new AnswearExport, 'jawaban kuisioner.xlsx');
    }
    protected function checkOldAnswear($user_id)
    {
        $answears = Answear::where('user_id', '=', $user_id)->get();
        if ($answears) {
            $answears->delete();
            return true;
        } else {
            return false;
        }
    }
}
