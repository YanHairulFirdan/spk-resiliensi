<?php

namespace App\Http\Controllers;

use App\Aspect;
use App\Imports\StatementImport;
use App\Statement;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use StatementSeeder;

class statementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aspects = Aspect::get();
        $statements = Statement::with(['aspect'])->get();

        // dd($statements);
        return view('admin.statement.index', compact('statements', 'aspects'));
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
            'statement' => 'required|min:25',
        ]);

        Statement::create(
            $request->only([
                'aspect_id',
                'statement'
            ])
        );
        session()->flash('success', 'data berhasil ditambah');
        return redirect('/admin/statement');
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
    public function edit(Statement $statement)
    {
        $aspects = Aspect::get();
        return view('admin.statement.edit', compact('statement', 'aspects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statement $statement)
    {
        $request->validate([
            'aspect_id' => 'required',
            'statement' => 'required|min:25',
        ]);
        $statement->update(
            $request->only([
                'aspect_id',
                'statement'
            ])
        );
        session()->flash('success', 'data berhasil diperbaharui');
        return redirect('/admin/statement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statement $statement)
    {
        $statement->delete();
        session()->flash('success', 'data berhasil dihapus');
        return redirect('/admin/statement');
    }


    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xlsx'
        ]);

        Excel::import(new StatementImport, $request->file('excel'));
        return back()->with('success', 'data baru berhasil diimport');
    }
}
