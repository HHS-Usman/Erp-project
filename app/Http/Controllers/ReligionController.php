<?php

namespace App\Http\Controllers;

use App\Models\Religion;
use Illuminate\Http\Request;

class ReligionController extends Controller
{
    public function index()
    {  
         $religions = Religion::latest()->paginate();
        return view('organizationsetup.religion.index',compact('religions'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.religion.create');
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
            'religion' =>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Religion::create([
            'religion' => request()->get('religion'),
            'religion_code' => request()->get('religion_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('religion.index')->with('success','Record inserted  successfully');
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
    public function edit(Religion $religion)
    {
        return view('organizationsetup.religion.update',compact('religion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $religion = Religion::findOrFail($id);
        $religion->update([
            'religion'=>$request->input('religion'),
            'religion_code'=>$request->input('religion_code'),
            'detail'=>$request->input('detail'),
            'is_active'=>$request->has('is_active') ? 1 : 0, 
        ]);
         return redirect()->route('religion.index')->with('success','Updated inserted  successfully');
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
