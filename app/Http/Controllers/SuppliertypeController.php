<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Suppliertype;
use Illuminate\Http\Request;

class SuppliertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliertype = Suppliertype::all();
        return view('SupplierSetup.suppliertype.index',compact('suppliertype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SupplierSetup.suppliertype.create');
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
            'suppliertype'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        Suppliertype::create([
            'suppliertype'=>request()->get('suppliertype'),
            'suppliertype_code'=>request()->get('suppliertype_code'),
            'detail'=>request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);
        return redirect()->route('suppliertype.index')->with('success','Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $stype_id
     * @return \Illuminate\Http\Response
     */
    public function show($stype_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $stype_id
     * @return \Illuminate\Http\Response
     */
    public function edit($stype_id)
    {
        $suppliertype = Suppliertype::find($stype_id);
        return view('SupplierSetup.suppliertype.update', compact('suppliertype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $stype_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $stype_id)
    {
        $supcategory = Suppliertype::findorfail($stype_id);

        $supcategory->update([
            'suppliertype'=>request()->get('suppliertype'),
            'suppliertype_code'=>request()->get('suppliertype_code'),
            'detail'=>request()->get('detail'),
            'is_active' =>  $request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('suppliertype.index')->with('success','Create successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $stype_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($stype_id)
    {
        //
    }
}
