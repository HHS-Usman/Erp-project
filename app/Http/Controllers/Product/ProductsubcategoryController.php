<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product_sub_category;
class ProductSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsbctgries = Product_sub_category::latest()->paginate();
        return view('productsetup.product1sbctgry.index',compact('productsbctgries'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $product= Product_sub_category::all();
       return view('productsetup.product1sbctgry.create',compact('product'));
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
         Product_sub_category::create([
            'product1stsbctgry'=> request()->get('product1stsbctgry'),
            'product1stsbctgry_code' => request()->get('product1stsbctgry_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
            ]);
        return redirect()->route('product_sub_category.index')->with('success','Manage successfully');
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
        $product1stsbctgry = Product_sub_category::find($id);
        return view('productsetup.product1sbctgry.update', compact('product1stsbctgry'));
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
        $product_category = Product_sub_category::findOrFail($id);

         //create a new product in database
         $product_category->update([
            'product1stsbctgry'=> request()->get('product1stsbctgry'),
            'product1stsbctgry_code' => request()->get('product1stsbctgry_code'),
            'detail' => request()->get('detail'),
            'is_active' => $request->has('is_active') ? 1 : 0,
            ]);
            return redirect()->route('product_sub_category.index')->with('success','Manage successfully');
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
