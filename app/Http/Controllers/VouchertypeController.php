<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Coa;
use App\Models\Vouchertype;
use Illuminate\Http\Request;

class VouchertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Accounts.vouchertype.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branch = Branch::all();
        $maxID = Vouchertype::max('vouchertype_id');
        $maxID = $maxID+1;
        $coa = Coa::all()->where('operational',1);
        return view('Accounts.vouchertype.create',compact('maxID','coa','branch'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'is_active' => 'integer|in:0,1',
        ]);
        Vouchertype::create([
            'vouchertitle' => request()->get('vouchertitle'),
            'voucherprefix' => request()->get('voucherprefix'),
            'vouchertype' => request()->get('vouchertype'),
            'transactiontype' => request()->get('trnasactiontype'), 
            'branch_id'=>request()->get('companyunits'), 
            'coa_id'=>request()->get('coadata'), 
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('vouchertype.create')->with('success','Manage successfully');
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
