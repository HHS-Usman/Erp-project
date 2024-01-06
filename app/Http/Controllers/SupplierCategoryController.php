<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SupplierCategory;
use Illuminate\Http\Request;

class SupplierCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supcategory =SupplierCategory::all();
        return view('SupplierSetup.supliercategory.index',compact('supcategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SupplierSetup.supliercategory.create');
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
            'suplliercategoty'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        SupplierCategory::create([
            'suplliercategoty'=>request()->get('suplliercategoty'),
            'suppliercategoty_Code'=>request()->get('suppliercategoty_Code'),
            'detail'=>request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);
        return redirect()->route('scategory.index')->with('success','Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($supliercatg_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $supliercatg_id
     * @return \Illuminate\Http\Response
     */
    public function edit($supliercatg_id)
    {
        $supcategory =SupplierCategory::find($supliercatg_id);
        return view('SupplierSetup.supliercategory.update',compact('supcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $supliercatg_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $supliercatg_id)
    {
        $supcategory = SupplierCategory::findorfail($supliercatg_id);

        $supcategory->update([
            'suplliercategoty'=>request()->get('suplliercategoty'),
            'suppliercategoty_Code'=>request()->get('suppliercategoty_Code'),
            'detail'=>request()->get('detail'),
            'is_active' =>  $request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('scategory.index')->with('success','Create successfully');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $supliercatg_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($supliercatg_id)
    {
        //
    }
}
