<?php

namespace App\Http\Controllers;

use App\Aspect;
use App\Imports\StatementImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AspectController extends Controller
{
    public function index()
    {
        $aspects = Aspect::orderBy('created_at', 'DESC')->get();
        return view('admin.aspect.index', compact('aspects'));
    }
    public function edit(Aspect $aspect)
    {
        return view('admin.aspect.edit', compact('aspect'));
    }

    public function update(Aspect $aspect, Request $request)
    {
        $request->validate([
            'aspect' => 'required|min:5',
            'strength_suggestion'  => 'required|min:20',
            'weak_suggestion'  => 'required|min:20',
        ]);

        $aspect->update($request->only(['aspect', 'strength_suggestion', 'weak_suggestion']));

        return redirect('/aspect')->with('success', 'aspek' . $aspect->aspect . ' telah diperbaharui');
    }
}
