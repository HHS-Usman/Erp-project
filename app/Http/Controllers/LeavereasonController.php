<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leavereason;

class LeavereasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaveresons = Leavereason::latest()->paginate();
        return view('organizationsetup.leavereson.index',compact('leaveresons'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizationsetup.leavereson.create');
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
            'leavingreason'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
        //create a new product in database
        Leavereason::create([
            'leavingreason' => request()->get('leavingreason'),
            'leavingreason_code' => request()->get('leavingreason_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('leavereson.index')->with('success','leave Reason made  successfully ');
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
}
