<?php

namespace App\Http\Controllers;

use App\Models\Nationality;
use Illuminate\Http\Request;

class NationalityController extends Controller
{
    public function index()
    {
        $nationalities = Nationality::latest()->paginate();
        return view('generalsetup.nationality.index',compact('nationalities'))->with(request()->input('page'));
    }
    
    public function create()
    {
        return view('generalsetup.nationality.create');
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
            'nationality' =>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Nationality::create([
            'nationality' => request()->get('nationality'),
            'nationality_code' => request()->get('nationality_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('nationality.index')->with('success','Manage successfully');
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
    public function edit(Nationality $nationality)
    {
        return view('generalsetup.nationality.update',compact('nationality'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $nationality = Nationality::findorfail($id);
        $nationality ->update([
            'nationality'=>$request->input('nationality'),
            'nationality_code'=>$request->input('nationality_code'),
            'detail'=>$request->input('detail'),
            'is_active'=>$request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('nationality.index')->with('success','Nationality updated successfully');
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
