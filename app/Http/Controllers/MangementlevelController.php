<?php

namespace App\Http\Controllers;

use App\Models\Managementlevel;
use Illuminate\Http\Request;

class MangementlevelController extends Controller
{
    public function index()
    {  
         $managementlevels = Managementlevel::latest()->paginate();
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
            'managementlevel'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
        //create a new product in database
        managementlevel::create([
            'managementlevel' => request()->get('managementlevel'),
            'managementlevel_code' => request()->get('managementlevel_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

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
    public function edit(Managementlevel $management)
    {
        return view('organizationsetup.managementlevel.update',compact('management'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Managementlevel $management)
    {
          // validate the input
        $request->validate([
            'managementlevel'=>'required',
            'managementlevel_code' => 'nullable',
            'detail' => 'nullable',
            'is_active' => 'integer|in:0,1'
        ]);
        $management->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('management.index')->with('success','Management Updated updated successfully');
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
