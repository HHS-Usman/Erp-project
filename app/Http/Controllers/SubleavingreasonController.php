<?php

namespace App\Http\Controllers;

use App\Models\Subleavingreason;
use Illuminate\Http\Request;

class SubleavingreasonController extends Controller
{
    public function index()
    {  
         $subleavingreasons = Subleavingreason::latest()->paginate();
        return view('organizationsetup.subleavingreason.index',compact('subleavingreasons'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.subleavingreason.create');
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
            'subleavingreason' =>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Subleavingreason::create([
            'subleavingreason' => request()->get('subleavingreason'),
            'subleavingreason_code' => request()->get('subleavingreason_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('subleavingreason.index')->with('success','Record inserted  successfully');
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
