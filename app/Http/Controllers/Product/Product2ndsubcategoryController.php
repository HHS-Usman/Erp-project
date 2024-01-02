<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_2nd_sub_category;
class Product2ndsubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product2ndsbctgries = Product_2nd_sub_category::latest()->paginate();
        return view('productsetup.product2sbctgry.index',compact('product2ndsbctgries'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('productsetup.product2sbctgry.create');
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
            'product1stsbctgry'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
         //create a new product in database
         Product_2nd_sub_category::create([
            'product1stsbctgry'=> request()->get('product1stsbctgry'),
            'product2ndsbctgry_code' => request()->get('product2ndsbctgry_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
            ]);
        return redirect()->route('product_2nd_sub_category.index')->with('success','Manage successfully');
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
        $product2ndsbctgry = Product_2nd_sub_category::find($id);
        return view('productsetup.product2sbctgry.update', compact('product2ndsbctgry'));
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
        $product_category = Product_2nd_sub_category::findOrFail($id);

         //create a new product in database
         $product_category->update([
            'product1stsbctgry'=> request()->get('product1stsbctgry'),
            'product2ndsbctgry_code' => request()->get('product2ndsbctgry_code'),
            'detail' => request()->get('detail'),
            'is_active' => $request->has('is_active') ? 1 : 0,
            ]);
            return redirect()->route('product_2nd_sub_category.index')->with('success','Manage successfully');
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
