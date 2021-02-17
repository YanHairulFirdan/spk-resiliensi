<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class teacherManagement extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(10);
        // dd($teachers);s
        return view('admin.teacher.index', compact('teachers'));
    }
    public function edit(Teacher $teacher)
    {
        $class = [
            "X IPA I",
            "X IPA II",
            "X IPA III",
            "X IPA IV",
            "X IPA V",
            "X IPA VI",
        ];
        return view('admin.teacher.edit', compact('teacher', 'class'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
            'username' => 'required|min:5',
            'nip' => 'required|min:8',
            'class' => 'required',
            'subject' => 'required|min:6',
        ]);

        $teacher->name = $request->name;
        $teacher->username = $request->username;
        $teacher->email = $request->email;
        $teacher->class = $request->class;
        $teacher->nip = $request->nip;
        $teacher->subject = $request->subject;
        $teacher->save();
        return redirect('/admin/teacher')->with('success', 'data guru berhasil diubah');
    }
}
