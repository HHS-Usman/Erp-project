<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use File;
use Illuminate\Support\Facades\DB;
use App\Models\Brand_Selection;
use App\Models\Classification;
use App\Models\Packing_Type;
use App\Models\Product_Status;
use App\Models\Product_Activity;
use App\Models\Product_supplier;
use App\Models\Product_Type;
use App\Models\Stock_Type;
use App\Models\Country;
use App\Models\Product_category;
use App\Models\Unit_selection;
use App\Models\Coa;
use App\Models\Warehouse;
use App\Models\Product_sub_category;
use App\Models\Product_2nd_sub_category;
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
        $brandselections = Brand_Selection::latest()->paginate();
        $classifications =Classification::latest()->paginate();
        $packingtypes =Packing_Type::latest()->paginate();
        $productcategories =Product_category::latest()->paginate();
        $productstatuses =Product_Status::latest()->paginate();
        $productsuppliers =Product_supplier::latest()->paginate();
        $producttypes =Product_Type::latest()->paginate();
        $stocktypes =Stock_Type::latest()->paginate();
        $uoms =Unit_Selection::latest()->paginate();
        $countries = Country::latest()->paginate();
        $productactivities = Product_Activity::latest()->paginate();
        $productsubs = Product_sub_category::latest()->paginate();
        $product2subs = Product_2nd_sub_category::latest()->paginate();
        $coas = Coa::latest()->paginate();
        $warehouses = Warehouse::latest()->paginate();
        $nextId = DB::table('products')->max('id') + 1;
        return view('productsetup.product.create',compact('nextId'
        ,'brandselections','countries','coas'
        ,'classifications','packingtypes'
        ,'productcategories','productstatuses'
        ,'productsuppliers','producttypes'
        ,'productsubs' ,'product2subs','uoms'
        ,'warehouses'
        ,'stocktypes','productactivities'));
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
            'expiry' => 'nullable|in:Yes,No',
            'expiry_n' => 'nullable|in:Yes,No',
            'service' => 'nullable|in:Yes,No',
            'fixedasset' => 'nullable|in:Yes,No',
            'general_product' => 'nullable|in:Yes,No',
            'product_active' => 'nullable|in:Yes,No',
            'pqc_required' => 'nullable|in:Yes,No',
            'other_unit' => 'nullable|numeric',
            'blk_pkg_flt' => 'nullable|numeric',
            'reorder_type' => 'nullable|numeric',
            'min_qty' => 'nullable|numeric',
            'max_qty' => 'nullable|numeric',
            'price_per_unit' => 'nullable|numeric',

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
                'product_uom_id' => request()->get('product_uom_id'),
                'product_description' => request()->get('product_description'),
                'product_barcode' => request()->get('product_barcode'),
                'other_uom_id' => request()->get('other_uom_id'),
                'other_unit' => request()->get('other_unit'), // float
                'bulk_packing_id' => request()->get('bulk_packing_id'),
                'blk_pkg_flt' => request()->get('blk_pkg_flt'), // float
                'blk_pkg' => request()->get('blk_pkg'),
                'batch_coding' => request()->get('batch_coding'),
                'batch_code' => request()->get('batch_code'),
                'btch_code' => request()->get('btch_code'),
                'product_color' => request()->get('product_color'),
                'origin_id' => request()->get('origin_id'),
                'locality' => request()->get('locality'),
                'reorder_type' => request()->get('reorder_type'), // float
                'min_qty' => request()->get('min_qty'), // float
                'max_qty' => request()->get('max_qty'), // float
                'stock_type_id' => request()->get('stock_type_id'),
                'product_activity_id' => request()->get('product_activity_id'),
                'warehousing_id' => request()->get('warehousing_id'),
                'expiry' => request()->get('expiry', 'No'),
                'expiry_ap' => request()->get('expiry_ap'),
                'expiry_n' => request()->get('expiry_n', 'No'),
                'product_brand_id' => request()->get('product_brand_id'),
                'product_classification_id' => request()->get('product_classification_id'),
                'product_category_id' => request()->get('product_category_id'),
                'product_1stcategory_id' => request()->get('product_1stcategory_id'),
                'product_2ndcategory_id' => request()->get('product_2ndcategory_id'),
                'product_type_id' => request()->get('product_type_id'),
                'service' => request()->get('service', 'No'),
                'fixedasset' => request()->get('fixedasset', 'No'),
                'general_product' => request()->get('general_product', 'No'),
                'product_active' => request()->get('product_active', 'No'),
                'pqc_required' => request()->get('pqc_required', 'No'),
                'product_supplier_id' => request()->get('product_supplier_id'),
                'product_status_id' => request()->get('product_status'),
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
                'coa_id' => request()->get('coa_id'),
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
