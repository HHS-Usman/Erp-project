<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Saleperson;
use Illuminate\Http\Request;
use App\Models\Salespersontype;
use App\Models\Employee;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SalespersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saleperson=Saleperson::latest()->paginate();
        return view('salesperson.saleperson.index',compact('saleperson'))->with(request()->input('page'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spt = Salespersontype::all();
        $emp = Employee::all();
        return view('salesperson.saleperson.create',compact('spt','emp'));
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
            'persontype' => 'required',
            'employee' => 'required',
            'is_active' => 'integer|in:0,1',
        ]);
        Saleperson::create([
            'saleperson_code' => request()->get('saleperson_code'),
            'persontype' => request()->get('persontype'),
            'employee' => request()->get('employee'),
            'detail' => request()->get('detail', null), // Use null instead of ,
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('salesperson.index')->with('success','Manage successfully');
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
    public function edit($id)
    {   
        $spt = Salespersontype::all();
        $emp = Employee::all();
        $saleperson = Saleperson::findOrFail($id);
        return view('salesperson.saleperson.update',compact('emp','spt','saleperson'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Saleperson $saleperson)
{
    $request->validate([
        'saleperson_code' => 'required',
        'persontype' => 'required',
        'employee' => 'required',
        'detail' => 'nullable', // Use 'nullable' to make the field optional
        'is_active' => 'integer|in:0,1',
    ]);
    $saleperson->update([
        'saleperson_code' => $request->input('saleperson_code'),
        'persontype' => $request->input('persontype'),
        'employee' => $request->input('employee'),
        'detail' => $request->input('detail', null),
        'is_active' => $request->input('is_active', 0),
    ]);

    // Redirect the user and send a friendly message
    return redirect()->route('salesperson.index')->with('success', 'Updated successfully');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
