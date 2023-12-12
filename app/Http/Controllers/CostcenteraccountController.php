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
        $selectedParentCoa = $request->get('parentcostcenter');
        $parentCoa = Costcenteraccount::find($selectedParentCoa);
        $maxId = Costcenteraccount::max('id');
        $nextID = $maxId+1;
        // Determine the level and parent code based on the selected COA
         if ($parentCoa) {
            $parentCode = $parentCoa->costcenter_code;
            // $level = $parentCoa->level + 1;
        } else {
            $parentCode = '';
             //$level = 1; If there is no parent, set the level to 1
        }
        // Generate the hierarchical account code based on the parent COA's information and child count
        $childCount = Costcenteraccount::where('parentid', $selectedParentCoa)->count() + 1;
        $newAccountCode = $parentCode . '-' . $childCount;

        // Extract levels from the coacode
        $coaLevels = explode('-', $newAccountCode);
        $request->validate([
            'operation' => 'integer|in:0,1',
        ]);
        //create a new product in database
        $coa = new Costcenteraccount([
            'operation' => request()->get('operation', 0),
            'costcenter_code' =>  $newAccountCode,
            'costcentername' => request()->get('costcenter_name'),
            'parentid' =>  $selectedParentCoa,
            'parentcode' => $parentCode, 
            'costcentertype' => request()->get('costcentertype'),
            'costcentermapping' => request()->get('costcentermapping'),
        ]);
         // Assign levels dynamically
         for ($i = 1; $i <= 7; $i++) {
            $coa["Level-$i"] = $i <= count($coaLevels) ? $coaLevels[$i - 1] : 0;
        }
        $coa->save();    
        //redirect the user and send friendly message
        return redirect()->route('costcenteraccount.index')->with('nextID',  $nextID)->with('success', 'Manage successfully');
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
