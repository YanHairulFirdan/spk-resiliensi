<?php

namespace App\Http\Controllers;

use App\Exports\UserExport;
use App\Imports\UserImport;
use App\User;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class studentController extends Controller
{
    public function index()
    {
        $students = User::select('id', 'name', 'username', 'class', 'phoneNumber')->paginate(20);
        return view('admin.student.index', compact('students'));
    }
    public function edit(User $user)
    {
        $class = [
            "X IPA I",
            "X IPA II",
            "X IPA III",
            "X IPA IV",
            "X IPA V",
            "X IPA VI",
        ];
        return view('admin.student.edit', compact('user', 'class'));
    }

    public function update(Request $request, User $user)
    {
        if (($request->username == $user->username) && ($request->email == $user->email)) {

            $request->validate([
                'name' => 'required|string|max:255',
                'class' => 'required',
                'phoneNumber' => 'required'
            ]);
        } else if (($request->username != $user->username) && ($request->email == $user->email)) {

            $request->validate([
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'class' => 'required',
                'phoneNumber' => 'required'
            ]);
        } else if (($request->username == $user->username) && ($request->email != $user->email)) {

            $request->validate([
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'class' => 'required',
                'phoneNumber' => 'required'
            ]);
        } else {

            $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|string|max:255|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'class' => 'required',
                'phoneNumber' => 'required'
            ]);
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->class = $request->class;
        $user->phoneNumber = $request->phoneNumber;
        $user->save();
        return redirect('/admin/student')->with('success', 'data siswa berhasil diubah');
    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('admin/student')->withSuccess('data berhasil dihapus');
    }
    public function download()
    {
        return Excel::download(new UserExport, 'data siswa.xlsx');
    }
}
