<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\Csv\Reader;
use App\Models\Product;
use App\Models\Unit_selection;

class UploaderController extends Controller
{
    public function index()
    {
        return view('productsetup.productuploader.create');
    }
    public function store(Request $request)
    {
        if ($request->key == 'Product') {
            $file = $request->file('file');
            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            if ($request->has('Overwrite')) {
                Product::truncate();
            }
            foreach ($data as $value) {
                $foreignRecord = Unit_selection::firstOrCreate(['uom' => $value['product_uom_id']]);
                $record = Unit_selection::firstOrCreate(['uom' => $value['other_uom_id']]);
                $supplier = new Product();
                $supplier->product_code= $value['product_code'];
                $supplier->name = $value['name'];
                $supplier->article_no = $value['article_no'];
                $supplier->product_uom_id = $foreignRecord->id;
                $supplier->product_description = $value['product_description'];
                $supplier->product_barcode = $value['product_barcode'];
                $supplier->other_uom_id = $record->id;
                $supplier->other_unit = $value['other_unit'];
                $supplier->bulk_packing_id = $value['bulk_packing_id'];
                $supplier->blk_pkg_flt = $value['blk_pkg_flt'];
                $supplier->blk_pkg = $value['blk_pkg'];
                $supplier->batch_coding	 = $value['batch_coding'];
                $supplier->batch_code = $value['batch_code'];
                $supplier->btch_code = $value['btch_code'];
                $supplier->product_color = $value['product_color'];
                $supplier->origin_id = $value['origin_id'];
                $supplier->locality = $value['locality'];
                $supplier->reorder_type = $value['reorder_type'];
                $supplier->min_qty = $value['min_qty'];
                $supplier->max_qty = $value['max_qty'];
                $supplier->stock_type_id = $value['stock_type_id'];
                $supplier->product_activity_id = $value['product_activity_id'];
                $supplier->withouttax_perc_age = $value['withouttax_perc_age'];
                $supplier->warehousing_id = $value['warehousing_id'];
                $supplier->expiry = $value['expiry'];
                $supplier->expiry_ap = $value['expiry_ap'];
                $supplier->expiry_n = $value['expiry_n'];
                $supplier->product_brand_id = $value['product_brand_id'];
                $supplier->product_classification_id = $value['product_classification_id'];
                $supplier->product_category_id = $value['product_category_id'];
                $supplier->product_1stcategory_id = $value['product_1stcategory_id'];
                $supplier->product_2ndcategory_id = $value['product_2ndcategory_id'];
                $supplier->product_type_id = $value['product_type_id'];
                $supplier->service = $value['service'];
                $supplier->fixedasset = $value['fixedasset'];
                $supplier->general_product = $value['general_product'];
                $supplier->product_active = $value['product_active'];
                $supplier->pqc_required = $value['pqc_required'];
                $supplier->product_supplier_id = $value['product_supplier_id'];
                $supplier->product_status_id = $value['product_status_id'];
                $supplier->price_per_unit = $value['price_per_unit'];
                $supplier->dis_percentage = $value['dis_percentage'];
                $supplier->dis_value = $value['dis_value'];
                $supplier->dis_afterdis = $value['dis_afterdis'];
                $supplier->sale_price = $value['sale_price'];
                $supplier->float_value = $value['float_value'];
                $supplier->float = $value['float'];
                $supplier->product_value = $value['product_value'];
                $supplier->product_profit = $value['product_profit'];
                $supplier->product_mrp = $value['product_mrp'];
                $supplier->fur_itm_tax = $value['fur_itm_tax'];
                $supplier->fur_item_tax = $value['fur_item_tax'];
                $supplier->calculation_type = $value['calculation_type'];
                $supplier->applicable = $value['applicable'];
                $supplier->itm_cost_method = $value['itm_cost_method'];
                $supplier->direct_tax = $value['direct_tax'];
                $supplier->coa_id = $value['coa_id'];
                $supplier->created_at = $value['created_at'];
                $supplier->updated_at = $value['updated_at'];
            }
            $supplier->save();

            return redirect()->route('productuploader.index')->with('success', 'Create successfully');
        }
    }
}
