<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use PDO;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::latest()->paginate();
        return view('organizationsetup.division.index',compact('divisions'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.division.create');
    }
    public function uploader(){
        return view('organizationsetup.division.uploader');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the input
        $request->validate([
            'division'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        // dd(request()->get('is_active',0));
        Division::create([
            'division' => request()->get('division'),
            'division_code' => request()->get('division_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);
        ;
        //redirect the user and send friendly message
        return redirect()->route('division.index')->with('success','division made  successfully ');
    }

    /**
     * Display the specified resource.
     *

     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $division = Division::find($id);
        return view('organizationsetup.division.update',compact('division'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id )
    {
        $division = Division::findOrFail($id);
        $division->update([
            'division_code' => $request->input('division_code'),
            'division'      => $request->input('division'),
            'detail'        => $request->input('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('division.index')->with('success','division made  successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
