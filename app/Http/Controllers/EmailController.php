<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function index()
    {  
         $emails = Email::latest()->paginate();
        return view('generalsetup.email.index',compact('emails'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('generalsetup.email.create');
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
            'email'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Email::create([
            'email' => request()->get('email'),
            'email_code' => request()->get('email_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('email.index')->with('success','Manage successfully');
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
    public function edit(Email $email)
    {
        return view('generalsetup.email.update',compact('email'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Email $email)
    {
         // validate the input
        $request->validate([
            'email'=>'required',
            'email_code' => 'nullable',
            'detail' =>'nullable',
            'is_active' => 'integer|in:0,1'
        ]);
        $email->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('email.index')->with('success','Updated Email successfully');
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
