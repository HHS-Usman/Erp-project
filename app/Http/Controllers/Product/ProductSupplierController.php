<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_supplier;
class ProductSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsuppliers =Product_supplier::latest()->paginate();
        return vieW('productsetup.productsupplier.index',compact('productsuppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return vieW('productsetup.productsupplier.create');
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
            'product_supplier'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
         //create a new product in database
         Product_supplier::create([ 
            'product_supplier' => request()->get('product_supplier'),
            'product_supplier_code' => request()->get('product_supplier_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
            ]);
            return redirect()->route('productsupplier.index')->with('success','Manage successfully');
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
        $productsupplier = Product_supplier::find($id);
        return vieW('productsetup.productsupplier.update',compact('productsupplier'));
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
        $product_supplier = Product_supplier::findOrFail($id);
       
         //create a new product in database
         $product_supplier->update([ 
            'product_supplier' => request()->get('product_supplier'),
            'product_supplier_code' => request()->get('product_supplier_code'),
            'detail' => request()->get('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
            ]);
            return redirect()->route('productsupplier.index')->with('success','Manage successfully');
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
