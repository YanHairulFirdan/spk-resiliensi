<?php

namespace App\Http\Controllers;

use App\Aspect;
use Illuminate\Http\Request;

class AspectController extends Controller
{
    public function index()
    {
        $aspects = Aspect::orderBy('created_at', 'DESC')->get();

        return view('admin.aspect.index', compact('aspects'));
    }

    public function create()
    {
        $aspect = new Aspect();

        return view('admin.aspect.create', compact('aspect'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aspect' => 'required|max:100',
            'descriptions' => 'required:max:255',
            'quote' => 'required:max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $aspect = new Aspect($request->only(['aspect', 'descriptions', 'quote']));

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/aspects');
            $image->move($destinationPath, $name);
            $aspect->image = $name;
        }

        $aspect->save();

        return redirect()->route('admin.aspect.index')->with('success', 'aspek ' . $aspect->aspect . ' telah ditambahkan');
    }

    public function edit(Aspect $aspect)
    {
        return view('admin.aspect.edit', compact('aspect'));
    }

    public function update(Aspect $aspect, Request $request)
    {
        $request->validate([
            'aspect' => 'required|max:100',
            'descriptions' => 'required:max:255',
            'quote' => 'required:max:255',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $aspect->fill($request->only(['aspect', 'descriptions', 'quote']));


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/aspects');
            $image->move($destinationPath, $name);
            $aspect->image = $name;
        }

        $aspect->save();

        return redirect()->back()->with('success', 'aspek ' . $aspect->aspect . ' telah diperbaharui');
    }

    public function destroy(Aspect $aspect)
    {
        $aspect->delete();

        return redirect()->route('admin.aspect.index')->with('success', 'aspek ' . $aspect->aspect . ' telah dihapus');
    }
}
