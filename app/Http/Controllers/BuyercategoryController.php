<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BuyerCategory;
use Illuminate\Http\Request;

class BuyercategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyerCAtegory = BuyerCategory::all();
        return view('buyersetup.buyercategory.index',compact('buyerCAtegory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyersetup.buyercategory.create');
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
            'buyercategory'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        BuyerCategory::create([
            'buyercategory'=>request()->get('buyercategory'),
            'buyercategory_Code'=>request()->get('buyercategorycode'),
            'detail'=>request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        return redirect()->route('buyercategory.index')->with('success','Create successfully');
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
        $buyerCAtegory  = BuyerCategory::find($id);
        return view('buyersetup.buyercategory.update',compact('buyerCAtegory'));
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
        $buyercategories = BuyerCategory::findOrFail($id);

         //create a new product in database
         $buyercategories->update([
            'buyercategory'=>request()->get('buyercategory'),
            'buyercategory_Code'=>request()->get('buyercategorycode'),
            'detail'=>request()->get('detail'),
            'is_active' => $request->has('is_active') ? 1 : 0,
            ]);
            return redirect()->route('buyercategory.index')->with('success','Manage successfully');
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
