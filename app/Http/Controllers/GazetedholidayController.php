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
            $request->validate([
                'gazetedholiday'=>'required',
                'is_active' => 'integer|in:0,1'
            ]);
            //create a new product in database
            Gazetedholiday::create([
                'gazetedholiday' => request()->get('gazetedholiday'),
                'gazetedholiday_code' => request()->get('gazetedholiday_code'),
                'detail' => request()->get('detail'),
                'is_active' => request()->get('is_active', 0),
            ]);
    
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
