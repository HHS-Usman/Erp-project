<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::latest()->paginate();
        return view('generalsetup.city.index',compact('cities'))->with(request()->input('page'));
    }
    
    public function create()
    {
        return view('generalsetup.city.create');
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
            'city'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        City::create([
            'city' => request()->get('city'),
            'city_code' => request()->get('city_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('city.index')->with('success','Manage successfully');
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
    public function edit(City $city)
    {
        return view('generalsetup.city.update',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $city = City::findorfail($id);
        $city ->update([
            'city'=>$request->input('city'),
            'city_code'=>$request->input('city_code'),
            'detail'=>$request->input('detail'),
            'is_active'=>$request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('city.index')->with('success','City Update successfully');
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
