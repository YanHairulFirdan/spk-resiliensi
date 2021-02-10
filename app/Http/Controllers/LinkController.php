<?php

namespace App\Http\Controllers;

use App\Aspect;
use App\Imports\LinkImport;
use App\Link;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::with(['aspect'])->get();
        $aspects = Aspect::get();
        // $statements = Statement::with(['links'])->orderBy('created_at', 'DESC')->get();

        // dd($statements);
        return view('admin.link.index', compact('links', 'aspects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'aspect_id' => 'required',
            'link' => 'required|min:25',
            'judul' => 'required:min:10'
        ]);
        // dd($request);

        $id = (int)$request->aspect_id;
        Link::create([
            'aspect_id' => $id,
            'link' => $request->link,
            'judul' => $request->judul
        ]);
        session()->flash('success', 'link berhasil ditambah');
        return redirect('/admin/link');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Link $link)
    {
        $aspects = Aspect::get();
        return view('admin.link.edit', compact('link', 'aspects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Link $link)
    {
        $request->validate([
            'aspect_id' => 'required',
            'link' => 'required|min:25',
            'judul' => 'required:min:10'
        ]);
        $id = (int)$request->aspect_id;
        $link->update([
            'aspect_id' => $id,
            'link' => $request->link,
            'judul' => $request->judul
        ]);
        session()->flash('success', 'link berhasil diperbaharui');
        return redirect('/admin/link');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Link $link)
    {
        $link->delete();
        session()->flash('success', 'link berhasil dihapus');
        return redirect('/admin/link');
    }


    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xlsx'
        ]);

        Excel::import(new LinkImport(), $request->file('excel'));
        return back()->with('success', 'link-link baru berhasil diimport');
    }
}
