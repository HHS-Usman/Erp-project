<?php

namespace App\Http\Controllers;

use App\Models\Subdepartment;
use Illuminate\Http\Request;

class SubdepartmentController extends Controller
{
    public function index()
    {  
        $subdepartments = Subdepartment::latest()->paginate();
        return view('organizationsetup.subdepartment.index',compact('subdepartments'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.subdepartment.create');
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
            'subdepartment' =>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Subdepartment::create([
            'subdepartment' => request()->get('subdepartment'),
            'subdepartment_code' => request()->get('subdepartment_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('subdepartment.index')->with('success','subdepartment made  successfully ');
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
    public function edit(Subdepartment $subdepartment)
    {
        return view('organizationsetup.subdepartment.update',compact('subdepartment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subdepartment = Subdepartment::findOrFail($id);
        $subdepartment->update([
            'subdepartment_code' => $request->input('subdepartment_code'),
            'subdepartment'      => $request->input('subdepartment'),
            'detail'        => $request->input('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
        ]);
        //redirect the user and send friendly message
        return redirect()->route('subdepartment.index')->with('success','subdepartment updated successfully ');
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
