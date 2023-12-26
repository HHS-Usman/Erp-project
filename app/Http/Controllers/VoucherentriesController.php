<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Coa;
use App\Models\Company;
use App\Models\Voucherentires;
use App\Models\Vouchertype;
use Illuminate\Http\Request;

class VoucherentriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $voucherprefix = Vouchertype::where('voucherprefix', 'EV')->value('voucherprefix');
        $vtypeCount = Voucherentires::where('v_type',2)->count();
        $jvdata = $voucherprefix .'-'. $vtypeCount+1;
        $branch = Branch::all();
        $company = Company::all();
        $coas = Coa::where('operational', 1)->get();
        return view('Accounts.voucherenteries.create', compact('branch', 'coas', 'jvdata','company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vtypeCount = Voucherentires::where('v_type',2)->count();
        $vtypeCount = $vtypeCount+1;
        Voucherentires::create([
            'v_docNo' => $vtypeCount,
            'v_type' => 2,
            'memo' => $request->input('bulkMemo'),
            'doc_create_date' => $request->input('jvdate'),
            'debit_total' => $request->input('totalDebit'),
            'credit_total' => $request->input('totalCredit'),
            'jvdate' => $request->input('jvdate'),
            'tvoucher_id' => 1,
            'branch_id' => $request->input('branch'),
            'company_id' => 1,
        ]);
        return redirect()->route('voucherentry.create')->with('success','Manage successfully');
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
