<?php

namespace App\Http\Controllers;

use App\Models\Accountcategory;
use App\Models\Parentcoa;
use App\Http\Controllers\Controller;
use App\Models\Coa;
use App\Models\Costcenter;
use App\Models\Costcenteraccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coas = Coa::latest()->paginate();
    return view('Accounts.coa.index', compact('coas'))->with(request()->input('page'));
    }
    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accountCategory = Accountcategory::all();
        $prentcoa =  Coa::where('operation', 0)->get();
        return view('Accounts.coa.create', compact('prentcoa', 'accountCategory'));
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
        $parentCoa = Coa::find($selectedParentCoa);

        $maxId = DB::table('coas')->max('id');
        dd($maxId);

        // Determine the level and parent code based on the selected COA
        if ($parentCoa) {
            $parentCode = $parentCoa->coacode;
            // $level = $parentCoa->level + 1;
        } else {
            $parentCode = '';
             //$level = 1; If there is no parent, set the level to 1
        }
    
        // Generate the hierarchical account code based on the parent COA's information and child count
        $childCount = Coa::where('parentid', $selectedParentCoa)->count() + 1;
        $newAccountCode = $parentCode . '-' . $childCount;
    
        // Extract levels from the coacode
        $coaLevels = explode('-', $newAccountCode);
        // Create a new record in the database with dynamically assigned levels
        $coa = new Coa([
            'operation' => $request->get('operation', 0),
            'parentcoacode' => $parentCode,
            'coacategory' => $request->get('accountcategory'),
            'coaname' => $request->get('accountname'),
            'coacode' => $newAccountCode,
            'refaccode' => $request->get('refaccode'),
            'accountype' => $request->get('accountype'),
            'openbalance' => $request->get('openbalance'),
            'openingdate' => $request->get('openingdate'),
            'parentid' => $selectedParentCoa,
        ]);
        // Assign levels dynamically
        for ($i = 1; $i <= 7; $i++) {
            $coa["Level-$i"] = $i <= count($coaLevels) ? $coaLevels[$i - 1] : 0;
        }
    
        $coa->save();
    
        return redirect()->route('coa.index')->with('success', 'Managed successfully');
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
