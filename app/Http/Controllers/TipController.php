<?php

namespace App\Http\Controllers;

use App\Aspect;
use App\Imports\TipImport;
use App\Tip;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspects = Aspect::with(['tips'])->orderBy('created_at', 'DESC')->get();
        $index = 0;
        // $tips = Tip::with(['aspect'])->get();
        return view('admin.tip.index', compact('aspects', 'index'));
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
        // dd($request);
        $request->validate([
            'aspect_id' => 'required',
            'tips' => 'required|min:15',
            'tipe' => 'required'
        ]);
        // dd(geip((int)$request->aspect_id));
        $aspect_id = (int)$request->aspect_id;
        // dd($aspect_id);
        Tip::create([
            'aspect_id' => $aspect_id,
            'tips' => $request->tips,
            'tipe' => $request->tipe
        ]);

        return redirect('admin/tip')->withSuccess('data berhasil ditambahkan');
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
    public function edit(Tip $tip)
    {
        $aspects = Aspect::get();
        return view('admin.tip.edit', compact('aspects', 'tip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tip $tip)
    {
        $request->validate([
            'aspect_id' => 'required',
            'tips' => 'required|min:15',
        ]);
        $tip->update([
            'aspect_id' => (int)$request->aspect_id,
            'tips' => $request->tips,
            'type' => $request->type
        ]);

        return redirect('admin/tip')->withSuccess('data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tip $tip)
    {
        $tip->delete();
        return redirect('admin/tip')->withSuccess('data berhasil dihapus');
    }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xls,xlsx'
        ]);
        Excel::import(new TipImport, $request->file('excel'));
        return redirect('admin/tip')->withSuccess('upload file berhasil');
    }
}
