<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $casts = Cast::latest()->paginate();
        return view('generalsetup.cast.index',compact('casts'))->with(request()->input('page'));
    }
    
    public function create()
    {
        return view('generalsetup.cast.create');
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
            'cast'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Cast::create([
            'cast' => request()->get('cast'),
            'cast_code' => request()->get('cast_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('cast.index')->with('success','Manage successfully');
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
    public function edit(Cast $cast)
    {
        return view('generalsetup.cast.update',compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Cast $cast)
    {
         // validate the input
         $request->validate([
            'cast'=>'required',
            'cast_code' => 'nullable',
            'detail' => 'nullable',
            'is_active' => 'integer|in:0,1'
            
        ]);
        $cast->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('cast.index')->with('success','Cast Updated successfully');
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
