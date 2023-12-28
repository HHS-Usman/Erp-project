<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_Type;
class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes =Product_Type::latest()->paginate();
        return view('productsetup.producttype.index',compact('producttypes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productsetup.producttype.create');
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
            'product_type'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
         //create a new product in database
         Product_Type::create([ 
            'product_type' => request()->get('product_type'),
            'product_type_code' => request()->get('product_type_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
            ]);
            return redirect()->route('producttype.index')->with('success','Manage successfully');
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
        $producttype = Product_Type::find($id);
        return vieW('productsetup.producttype.update',compact('producttype'));
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
        $product_type = Product_Type::findOrFail($id);
         //create a new product in database
        $product_type->update([ 
            'product_type' => request()->get('product_type'),
            'product_type_code' => request()->get('product_type_code'),
            'detail' => request()->get('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
            ]);
        return redirect()->route('producttype.index')->with('success','Manage successfully');    
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
