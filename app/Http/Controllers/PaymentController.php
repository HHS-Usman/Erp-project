<?php

namespace App\Http\Controllers;

use App\Models\Paymentterm;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {  
         $paymentterms = Paymentterm::latest()->paginate();
        return view('generalsetup.paymentterm.index',compact('paymentterms'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('generalsetup.paymentterm.create');
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
            'paymentterm' =>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Paymentterm::create([ 
            'paymentterm' => request()->get('paymentterm'),
            'paymentterm_code' => request()->get('paymentterm_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('paymentterm.index')->with('success','Manage successfully');
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
    public function edit(Paymentterm $paymentterm)
    {
        return view('generalsetup.paymentterm.update',compact('paymentterm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $paymentterm = Paymentterm::findOrFail($id);
        $paymentterm->update([
            'paymentterm' => $request->input('paymentterm'),
            'paymentterm_code'      => $request->input('paymentterm_code'),
            'detail'        => $request->input('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
        ]);
        //redirect the user and send friendly message
        return redirect()->route('paymentterm.index')->with('success','Payment Term Updated successfully');
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
