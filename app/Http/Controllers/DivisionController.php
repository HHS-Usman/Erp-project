<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

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
            'is_active' => 'boolean',
        ]);
        //create a new product in database
        Division::create([
            'division' => request()->get('division'),
            'division_code' => request()->get('division_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active'),
            'status' => 'DEACTIVE',
        ]);

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
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         //validate the input
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
