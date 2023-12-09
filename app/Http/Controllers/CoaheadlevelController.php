<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coamainheadlevel;
use Illuminate\Http\Request;
use App\Models\Accountcategory;

class CoaheadlevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $saleperson=Coamainheadlevel::latest()->paginate();
        // return view('salesperson.saleperson.index',compact('saleperson'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountcategory = Accountcategory::all();
        return view('Accounts.coamainheadlevel.create',compact('accountcategory'));
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
            'headname' => 'required',
            'account_code'=>'required'
        ]);
        //create a new product in database
        Coamainheadlevel::create([
            'headname' => request()->get('headname'),
            'account_code' => request()->get('account_code'),
            'transctiontype' => request()->get('transctiontype',),
            'accountcategory' => request()->get('accountcategory',),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('coamainheaderlevel.create')->with('success', 'Record inserted  successfully');
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