<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Costcenteraccount;
use App\Models\Department;
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
    $costcenter = Costcenteraccount::with('department')->get();
    return view('Accounts.costcenter.index', compact('costcenter'));
}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maping = Department::all();
        $costcenter = Costcenteraccount::where('operational', 0)
        ->where('parentid', '>=', 0)
        ->get();            
        $prentcoa = Costcenteraccount::where('operational', 0)->withCount('children')->get();
        return view('Accounts.costcenter.create', compact('costcenter', 'maping', 'prentcoa'));
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
        // $maxId = Costcenteraccount::max('id');
        // $nextID = $maxId + 1;
        // Determine the level and parent code based on the selected COA
        if ($parentCoa) {
            $parentCode = $parentCoa->costcenter_code;

            // $level = $parentCoa->level + 1;
        } else {
            $parentCode = '1';
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
        $departId = $request->get('costcentermapping');
        //create a new product in database
        //create a new product in database
        if ($selectedParentCoa == "default") {
            $levelcounts = Costcenteraccount::max('Level-1');
            $costcentercode = $levelcounts + 1; 
            $coa = new Costcenteraccount([
                'operational' => request()->get('operation', 0),
                'costcenter_code' => $costcentercode,
                'costcentername' => request()->get('costcenter_name'),
                'parentid' =>  0,
                'parentcode' => 0,
                'costcentertype' => request()->get('costcentertype'),
                'depart_id' => $departId,
                'is_active' => request()->get('is_active', 0),
                'Level-1'=>$costcentercode,
                'Level-2'=>0,
                'Level-3'=>0,
                'Level-4'=>0,
                'Level-5'=>0,
                'Level-6'=>0,
                'Level-7'=>0,
            ]);
            // Assign levels dynamically
            // for ($i = 1; $i <= 7; $i++) {
            //     $coa["Level-$i"] = $i <= count($coaLevels) ? $coaLevels[$i - 1] : 0;
            // }
            $coa->save();
        } else {
            $coa = new Costcenteraccount([
                'operational' => request()->get('operation', 0),
                'costcenter_code' =>  $newAccountCode,
                'costcentername' => request()->get('costcenter_name'),
                'parentid' =>  is_numeric($selectedParentCoa) ? $selectedParentCoa : null,
                'parentcode' => $parentCode,
                'costcentertype' => request()->get('costcentertype'),
                'depart_id' => $departId,
                'is_active' => request()->get('is_active', 0),
            ]);
            // Assign levels dynamically
            for ($i = 1; $i <= 7; $i++) {
                $coa["Level-$i"] = $i <= count($coaLevels) ? $coaLevels[$i - 1] : 0;
            }
            $coa->save();
        }
        
        //redirect the user and send friendly message
        return redirect()->route('costcenteraccount.create')
        ->with('nextID')
        ->with('success', 'Cost Center created successfully');
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
