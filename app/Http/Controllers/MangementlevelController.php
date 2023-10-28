<?php

namespace App\Http\Controllers;

use App\Models\Managementlevel;
use Illuminate\Http\Request;

class MangementlevelController extends Controller
{
    public function index()
    {  
         $managementlevels = Managementlevel::latest()->paginate(15);
        return view('organizationsetup.managementlevel.index',compact('managementlevels'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.managementlevel.create');
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
            'name'=>'required',
        ]);
        //create a new product in database
        Managementlevel::create($request->all());

        //redirect the user and send friendly message
        return redirect()->route('management.index')->with('success','Manage successfully');
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
