<?php

namespace App\Http\Controllers;

use App\Models\Gazetedholiday;
use Illuminate\Http\Request;

class GazetedholidayController extends Controller
{
        public function index()
        {  
             $gazetedholidays = Gazetedholiday::latest()->paginate();
            return view('organizationsetup.gazetedholiday.index',compact('gazetedholidays'))->with(request()->input('page'));
        }
        public function create()
        {
            return view('organizationsetup.gazetedholiday.create');
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
                    'event' => $date['event'] ?? null,
                    
                ]);
            }
            //redirect the user and send friendly message
            return redirect()->route('gazetedholiday.index')->with('success','Record inserted  successfully');
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
