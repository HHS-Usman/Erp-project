<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('productsetup.product.create');
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
            'name' => 'required',
            'expiry' => 'in:Yes,No',
            'expiry_n' => 'in:Yes,No',
            'service' => 'in:Yes,No',
            'fixedasset' => 'in:Yes,No',
            'general_product' => 'in:Yes,No',
            'product_active' => 'in:Yes,No',
            'pqc_required' => 'in:Yes,No',
            'other_unit' => 'nullable|numeric',
            'blk_pkg_flt' => 'nullable|numeric',
            'reorder_type' => 'nullable|numeric',
            'min_qty' => 'nullable|numeric',
            'max_qty' => 'nullable|numeric',
            'price_per_unit' => 'nullable|numeric',
            'dis_percentage' => 'nullable|numeric',
            'dis_value' => 'nullable|numeric',
            'dis_afterdis' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'float' => 'nullable|numeric',
            'float_value' => 'nullable|numeric',
            'product_profit' => 'nullable|numeric',
            'product_mrp' => 'nullable|numeric',
            'fur_itm_tax' => 'nullable|numeric',
            'fur_item_tax' => 'nullable|numeric',
        ]);
        
        $fileName = null;
        if ($request->hasFile('product_image')) 
        {
            $file = $request->file('product_image');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $fileName);
        }
        
        $productData = [
            'product_code' => $request->get('product_code'),
            'name' => $request->get('name'),
                'article_no' => request()->get('article_no'),
                'product_uom' => request()->get('product_uom'),
                'product_description' => request()->get('product_description'),
                'product_barcode' => request()->get('product_barcode'),
                'other_uom' => request()->get('other_uom'),
                'other_unit' => request()->get('other_unit'), // float
                'bulk_packing' => request()->get('bulk_packing'),
                'blk_pkg_flt' => request()->get('blk_pkg_flt'), // float
                'blk_pkg' => request()->get('blk_pkg'),
                'batch_coding' => request()->get('batch_coding'),
                'batch_code' => request()->get('batch_code'),
                'btch_code' => request()->get('btch_code'),
                'product_color' => request()->get('product_color'),
                'origin' => request()->get('origin'),
                'locality' => request()->get('locality'),
                'reorder_type' => request()->get('reorder_type'), // float
                'min_qty' => request()->get('min_qty'), // float
                'max_qty' => request()->get('max_qty'), // float
                'stock_type' => request()->get('stock_type'), 
                'product_activity' => request()->get('product_activity'),
                'warehousing' => request()->get('warehousing'),
                'expiry' => request()->get('expiry', 'No'),
                'expiry_ap' => request()->get('expiry_ap'),
                'expiry_n' => request()->get('expiry_n', 'No'),
                'product_brand' => request()->get('product_brand'),
                'product_classification' => request()->get('product_classification'),
                'product_category' => request()->get('product_category'),
                'product_1stcategory' => request()->get('product_1stcategory'),
                'product_2ndcategory' => request()->get('product_2ndcategory'),
                'product_type' => request()->get('product_type'),
                'service' => request()->get('service', 'No'),
                'fixedasset' => request()->get('fixedasset', 'No'),
                'general_product' => request()->get('general_product', 'No'),
                'product_active' => request()->get('product_active', 'No'),
                'pqc_required' => request()->get('pqc_required', 'No'),
                'product_supplier' => request()->get('product_supplier'),
                'product_status' => request()->get('product_status'),
                'price_per_unit' => request()->get('price_per_unit'), // float
                'dis_percentage' => request()->get('dis_percentage'), // float
                'dis_value' => request()->get('dis_value'),  // float
                'dis_afterdis' => request()->get('dis_afterdis'), // float
                'sale_price' => request()->get('sale_price'), // float
                'float' => request()->get('float'), // float
                'float_value' => request()->get('float_value'), // float
                'product_value' => request()->get('product_value'),
                'product_profit' => request()->get('product_profit'), // float
                'product_mrp' => request()->get('product_mrp'), // float
                'fur_itm_tax' => request()->get('fur_itm_tax'), // float
                'fur_item_tax' => request()->get('fur_item_tax'), // float
                'calculation_type' => request()->get('calculation_type'),
                'applicable' => request()->get('applicable'),
                'itm_cost_method' => request()->get('itm_cost_method'),
                'direct_tax' => request()->get('direct_tax'),
                'coa' => request()->get('coa'),
                'product_image' => $fileName,
            ];
            Product::create($productData);

            $notification = [
                'message' => 'Record Inserted Successfully!',
                'alert-type' => 'success',
            ];
            return redirect()->route('product.create')->with($notification);
           
    }
    // 'author_img' => 'required|mimes:png,jpg,jpeg,gif|max:2048';
         //  $fileName = null;
    	 // if (request()->hasFile('author_img')) 
    	 // {
         
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
        return view('productsetup.product.create');
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
        //
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
