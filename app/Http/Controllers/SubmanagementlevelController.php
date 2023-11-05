<?php

namespace App\Http\Controllers;

use App\Models\Submanagementlevel;
use Illuminate\Http\Request;

class SubmanagementlevelController extends Controller
{
    public function index()
    {  
         $submanagementlevels = Submanagementlevel::latest()->paginate();
        return view('organizationsetup.submanagementlevel.index',compact('submanagementlevels'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.submanagementlevel.create');
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
            'submanagementlevel' =>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Submanagementlevel::create([
            'submanagementlevel' => request()->get('submanagementlevel'),
            'submanagementlevel_code' => request()->get('submanagementlevel_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('submanagement.index')->with('success','Record inserted  successfully');
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
