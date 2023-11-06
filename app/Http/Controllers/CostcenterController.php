<?php


namespace App\Http\Controllers;

use App\Models\Costcenter;
use Illuminate\Http\Request;

class CostcenterController extends Controller
{
    public function index()
        {  
             $costcenters = Costcenter::latest()->paginate();
            return view('organizationsetup.costcenter.index',compact('costcenters'))->with(request()->input('page'));
        }
        public function create()
        {
            return view('organizationsetup.costcenter.create');
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
                'costcenter'=>'required',
                'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Costcenter::create([
            'costcenter' => request()->get('costcenter'),
            'costcenter_code' => request()->get('costcenter_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);
    
            //redirect the user and send friendly message
            return redirect()->route('costcenter.index')->with('success','Record inserted  successfully');
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
