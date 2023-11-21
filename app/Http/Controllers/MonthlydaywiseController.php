<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Monthlydaywise;
use App\Models\Country;
use App\Models\Religion;
use App\Models\Group;
use App\Models\State;

class MonthlydaywiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('organizationsetup.weekoffday.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $dates = $request->input('dates');

        if (!is_array($dates)) {
            // Handle the case where $dates is not an array
            // You can log or return an error response
        }

        foreach ($dates as $date) {
            Monthlydaywise::create([
                'year' => $date['year'] ?? null,
                'month' => $date['month'] ?? null,
                'date' => $date['date'] ?? null, // Check if 'date' is the correct key
                'day' => $date['day'] ?? null,
                'country' => $date['country'] ?? null,
                'religion' => $date['religion'] ?? null,
                'group' => $date['group'] ?? null,
                'state' => $date['state'] ?? null,
                // Add more columns as needed
            ]);
        }

        return redirect()->route('weekoffday.create')->with('success', 'Records saved successfully');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getCountries()
    {
         $countries = Country::all(); // Assuming you have a "countries" table

         return response()->json($countries);
    }
    public function getReligion()
    {
         $religions = Religion::all(); // Assuming you have a "countries" table

         return response()->json($religions);
    }
    public function getGroup()
    {
         $groups = Group::all(); // Assuming you have a "countries" table

         return response()->json($groups);
    }
    public function getState()
    {
         $states = State::all(); // Assuming you have a "countries" table

         return response()->json($states);
    }   
}
