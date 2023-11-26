<?php

namespace App\Http\Controllers;

use App\Models\Modeofpayment;
use Illuminate\Http\Request;

class ModeofpaymentController extends Controller
{
    public function index()
    {  
         $modeofpayments = Modeofpayment::latest()->paginate();
        return view('generalsetup.modeofpayment.index',compact('modeofpayments'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('generalsetup.modeofpayment.create');
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
            'modeofpayment' =>'required',
            'is_active' => 'integer|in:0,1'

        ]);
        //create a new product in database
        Modeofpayment::create([
            'modeofpayment' => request()->get('modeofpayment'),
            'modeofpayment_code' => request()->get('modeofpayment_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('modeofpayment.index')->with('success','Manage successfully');
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
    public function edit(Modeofpayment $modeofpayment)
    {
        return view('generalsetup.modeofpayment.update',compact('modeofpayment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Modeofpayment $modeofpayment)
    {
         // validate the input
        $request->validate([
            'modeofpayment' =>'required',
            'modeofpayment_code' => 'nullable',
            'detail' => 'nullable',
            'is_active' => 'integer|in:0,1'

        ]);
        $modeofpayment->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('modeofpayment.index')->with('success','Updated Mode of Payment successfully');
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
