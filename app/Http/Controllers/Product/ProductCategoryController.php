<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_category;
use App\Models\Product_sub_category;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productcategories =Product_category::latest()->paginate();
        return vieW('productsetup.productcategory.index',compact('productcategories'))->with(request()->input('page'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategory = Product_sub_category::all();
        return vieW('productsetup.productcategory.create',compact('subcategory'));
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
            'product_category'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
         //create a new product in database
         Product_category::create([
            'product_category' => request()->get('product_category'),
            'product_category_code' => request()->get('product_category_code'),
            'detail' => request()->get('detail'),
            'psubc_id' => request()->get('psubc_id'),
            'is_active' => request()->get('is_active', 0),
            ]);
            return redirect()->route('productcategory.index')->with('success','Manage successfully');
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
        $productcategory = Product_category::find($id);
        return vieW('productsetup.productcategory.update',compact('productcategory'));
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
        $product_category = Product_category::findOrFail($id);

         //create a new product in database
         $product_category->update([
            'product_category' => request()->get('product_category'),
            'product_category_code' => request()->get('product_category_code'),
            'detail' => request()->get('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0,
            ]);
            return redirect()->route('productcategory.index')->with('success','Manage successfully');
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
