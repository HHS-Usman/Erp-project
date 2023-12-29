<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand_Selection;

class BrandSelectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandselections = Brand_Selection::latest()->paginate();
      return view('productsetup.brandselection.index',compact('brandselections'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productsetup.brandselection.create');
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
            'brand_selection'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
         //create a new product in database
         Brand_Selection::create([ 
            'brand_selection' => request()->get('brand_selection'),
            'brand_selection_code' => request()->get('brand_selection_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
            ]);
            return redirect()->route('brand_selection.index')->with('success','Manage successfully');
            //redirect the user and send friendly message
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
        $brand_selection = Brand_selection::find($id);
        return view('productsetup.brandselection.update',compact('brand_selection'));
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
        $brand_selection = Brand_selection::findOrFail($id);
        $brand_selection->update([
            'brand_selection' => request()->get('brand_selection'),
            'brand_selection_code' => request()->get('brand_selection_code'),
            'detail' => request()->get('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
        ]);
        return redirect()->route('brand_selection.index')->with('success','division made  successfully ');
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
