<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
  
    public function index()
    {
        $countries = Country::latest()->paginate();
        return view('generalsetup.country.index',compact('countries'))->with(request()->input('page'));
    }
    
    public function create()
    {
        return view('generalsetup.country.create');
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
            'country'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Country::create([
            'country' => request()->get('country'),
            'country_code' => request()->get('country_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('country.index')->with('success','Manage successfully');
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
    public function edit(Country $country)
    {
        return view('generalsetup.country.update',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Country $country)
    {
          // validate the input
          $request->validate([
            'country'=>'required',
            'country_code' => 'nullable',
            'detail' => 'nullable',
            'is_active' => 'integer|in:0,1'
            
        ]);
        $country->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('country.index')->with('success','Country Updated successfully');
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
