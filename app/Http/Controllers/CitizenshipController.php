<?php

namespace App\Http\Controllers;

use App\Models\Citizenship;
use Illuminate\Http\Request;

class CitizenshipController extends Controller
{
   
    public function index()
    {
        $citizenships = Citizenship::latest()->paginate();
        return view('generalsetup.citizenship.index',compact('citizenships'))->with(request()->input('page'));
    }
    
    public function create()
    {
        return view('generalsetup.citizenship.create');
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
            'citizenship'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Citizenship::create([
            'citizenship' => request()->get('citizenship'),
            'citizenship_code' => request()->get('citizenship_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('citizenship.index')->with('success','Manage successfully');
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
