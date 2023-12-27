<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_Activity;
class ProductActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productactivities =Product_Activity::latest()->paginate();
        return vieW('productsetup.productactivity.index',compact('productactivities'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return vieW('productsetup.productactivity.create');
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
            'product_activity'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
         //create a new product in database
         Product_Activity::create([ 
            'product_activity' => request()->get('product_activity'),
            'product_activity_code' => request()->get('product_activity_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
            ]);
            return redirect()->route('packingactivity.index')->with('success','Manage successfully');
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
        $productactivity = Product_Activity::find($id);
        return view('productsetup.productactivity.edit');
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
        $product_activity = Product_Activity::findOrFail($id);
         //create a new product in database
         $product_activity->update([ 
            'packing_type' => request()->get('packing_type'),
            'packing_type_code' => request()->get('packing_type_code'),
            'detail' => request()->get('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
        ]);
        return redirect()->route('packing_type.index')->with('success','Manage successfully');
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
