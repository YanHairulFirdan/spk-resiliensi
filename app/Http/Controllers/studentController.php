<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class studentController extends Controller
{
    public function index()
    {
        $students = User::select('name', 'username', 'class', 'phoneNumber')->paginate(20);
        return view('admin.student.index', compact('students'));
    }
    public function download()
    {
        return Excel::download(new UserExport, 'data siswa.xlsx');
    }
}
