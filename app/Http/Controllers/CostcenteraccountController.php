<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Costcenteraccount;
use Illuminate\Http\Request;

class CostcenteraccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costcenter = Costcenteraccount::latest()->paginate();
        return view('Accounts.costcenter.index',compact('costcenter'))->with(request()->input('page'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costcenter =  Costcenteraccount::where('operation', 0)->get();
        return view('Accounts.costcenter.create',compact('costcenter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $selectedParentCoa = $request->get('parentcoa');
        $costcenter = Costcenteraccount::where('costcenter_id', $selectedParentCoa)->value('costcenter_code');
        // dd($costcenter);
        $request->validate([
            'operation' => 'integer|in:0,1',
        ]);
        //create a new product in database
        Costcenteraccount::create([
            'operation' => request()->get('operation', 0),
            'costcenter_code' => request()->get('costcenter_code'),
            'costcentername' => request()->get('costcenter_name'),
            'parentid' =>  $selectedParentCoa,
            'parentcode' => $costcenter,
            'costcentertype' => request()->get('costcentertype'),
            'costcentermapping' => request()->get('costcentermapping'),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('costcenteraccount.index')->with('success','Manage successfully');
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
