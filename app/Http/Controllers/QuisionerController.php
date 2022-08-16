<?php

namespace App\Http\Controllers;

use App\Imports\QuisionerImport;
use App\Quisioner;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class QuisionerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quisioners = Quisioner::get();
        return view('admin.quisioner.index', compact('quisioners'));
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
            'question' => 'required|min:12'
        ]);
        Quisioner::create($request->only(['question']));
        return redirect('/admin/quisioner')->with('success', 'Data kuisioner baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quisioner  $quisioner
     * @return \Illuminate\Http\Response
     */
    public function show(Quisioner $quisioner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quisioner  $quisioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Quisioner $quisioner)
    {
        return view('admin.quisioner.edit', compact('quisioner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quisioner  $quisioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quisioner $quisioner)
    {
        $request->validate([
            'question' => 'required|min:12'
        ]);
        $quisioner->update($request->only(['question']));
        return redirect('/admin/quisioner')->with('success', 'Data kuisioner berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quisioner  $quisioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quisioner $quisioner)
    {
        $quisioner->delete();
        return redirect('/admin/quisioner')->with('success', 'Data kuisioner berhasil dihapus');
    }

    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required'
        ]);

        Excel::import(new QuisionerImport, $request->file('excel'));
        return back()->with('success', 'data baru berhasil diimport');
    }
}
