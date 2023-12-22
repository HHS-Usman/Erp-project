<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coamainheadlevel;
use Illuminate\Http\Request;
use App\Models\Accountcategory;
use App\Models\Branch;
use App\Models\Coa;

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
        $branch = Branch::all();
        $accountcategory = Accountcategory::all();
        return view('Accounts.coamainheadlevel.create',compact('accountcategory','branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $maxID = Coa::max('id');
        $maxID = $maxID+1;
        $coa = new Coa([
            'operational'=> 0,
            'coacode'=> $maxID,
            'coaname'=> request()->get('headname'),
            'accountcategory_id'=> request()->get('accountcategory'),
            'branch_id'=> request()->get('branchname'),
            'operational'=> 'System',
            'operational'=> 0,
            'parentid'=> 0,
            'parentcoacode' => 0,
            'Level-1' => $maxID,
            'Level-2'=>0,
            'Level-3'=>0,
            'Level-4'=>0,
            'Level-5'=>0,
            'Level-6'=>0,
            'Level-7'=>0,
           
        ]);
        $coa->save();
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
