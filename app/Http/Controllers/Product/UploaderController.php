<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use App\Rules\FileOptionMatch;
use Illuminate\Support\Facades\Validator;
use PhpParser\Builder\Function_;
use League\Csv\Reader;
use App\Models\Product;
use App\Models\Unit_selection;
use App\Models\Packing_Type;
use App\Models\Country;
use App\Models\Stock_Type;
use App\Models\Product_Activity;
use App\Models\Warehouse;
use App\Models\Classification;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use App\Models\Product_2nd_sub_category;
use App\Models\Product_Type;
use App\Models\Product_supplier;
use App\Models\Product_Status;
use App\Models\Brand_Selection;
use App\Exports\CsvExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExcelExport;

class UploaderController extends Controller
{
    public function index()
    {
        return view('productsetup.productuploader.create');
    }
    public function store(Request $request)
    {
        if ($request->key == 'Product') {
            $request->validate([
                'file' => 'required|mimes:csv,xlsx',
                'key' => 'required|in:Functiondata',
             ]);
            $file = $request->file('file');
            $valuegetting = $request->input('filedatainfor');
            if ($extension === 'csv') {
                // Check if the selected file type matches the expected type
                if (($valuegetting == "1" && $extension != 'csv') ||
                   ($valuegetting == "2" && $extension != 'xlsx')
                ) {

                   return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
                } elseif ($valuegetting == "0") {
                   return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
                }

                $csv = Reader::createFromPath($file->getPathname(), 'r');
                $csv->setHeaderOffset(0);
                $data = $csv->getRecords();
             } elseif ($extension == 'xlsx') {
                // i will implement logic of excel
                // here will use library like Maatwebsite\Excel to handle Excel files
                return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
            }
            if ($request->has('Overwrite')) {
                Product::truncate();
            }
            foreach ($data as $value) {
                $foreignRecord = Unit_selection::firstOrCreate(['uom' => $value['product_uom_id']]);
                $record = Unit_selection::firstOrCreate(['uom' => $value['other_uom_id']]);
                $packingtype = Packing_Type::firstorCreate(['packing_type' =>$value['bulk_packing_id']]);
                $country = Country::firstorCreate(['country' =>$value['origin_id']]);
                $stocktype = Stock_Type::firstorCreate(['stocktype' =>$value['stock_type_id']]);
                $proact = Product_Activity::firstorCreate(['product_activity' =>$value['product_activity_id']]);
                $wrhs = Warehouse::firstorCreate(['warehouse' =>$value['warehousing_id']]);
                $bs = Brand_selection::firstorCreate(['brand_selection' =>$value['product_brand_id']]);
                $cs = Classification::firstorCreate(['classification' =>$value['product_classification_id']]);
                $pc = Product_category::firstorCreate(['product_category' =>$value['product_category_id']]);
                $psc = Product_sub_category::firstorCreate(['product1stsbctgry' =>$value['product_1stcategory_id']]);
                $pscs = Product_2nd_sub_category::firstorCreate(['product1stsbctgry' =>$value['product_2ndcategory_id']]);
                $pt = Product_Type::firstorCreate(['product_type' =>$value['product_type_id']]);
                $psd = Product_supplier::firstorCreate(['product_supplier' =>$value['product_supplier_id']]);
                $status = Product_Status::firstorCreate(['product_status' =>$value['product_status_id']]);
                $product = new Product();
                $product->product_code= $value['product_code'];
                $product->name = $value['name'];
                $product->article_no = $value['article_no'];
                $product->product_uom_id = $foreignRecord->id;
                $product->product_description = $value['product_description'];
                $product->product_barcode = $value['product_barcode'];
                $product->other_uom_id = $record->id;
                $product->other_unit = $value['other_unit'];
                $product->bulk_packing_id = $packingtype->id;
                $product->blk_pkg_flt = $value['blk_pkg_flt'];
                $product->blk_pkg = $value['blk_pkg'];
                $product->batch_coding	 = $value['batch_coding'];
                $product->batch_code = $value['batch_code'];
                $product->btch_code = $value['btch_code'];
                $product->product_color = $value['product_color'];
                $product->origin_id = $country->id;
                $product->locality = $value['locality'];
                $product->reorder_type = $value['reorder_type'];
                $product->min_qty = $value['min_qty'];
                $product->max_qty = $value['max_qty'];
                $product->stock_type_id = $stocktype->id;
                $product->product_activity_id = $proact->id;
                $product->warehousing_id = $wrhs->id;
                $product->expiry = $value['expiry'];
                $product->expiry_ap = $value['expiry_ap'];
                $product->expiry_n = $value['expiry_n'];
                $product->product_brand_id = $bs->id;
                $product->product_classification_id = $cs->id ;
                $product->product_category_id = $pc->id ;
                $product->product_1stcategory_id = $psc->id;
                $product->product_2ndcategory_id = $pscs->id ;
                $product->product_type_id =$pt->id;
                $product->service = $value['service'];
                $product->fixedasset = $value['fixedasset'];
                $product->general_product = $value['general_product'];
                $product->product_active = $value['product_active'];
                $product->pqc_required = $value['pqc_required'];
                $product->product_supplier_id = $psd->id;
                $product->product_status_id = $status->id;
                $product->price_per_unit = $value['price_per_unit'];
                $product->sale_price = $value['sale_price'];
                $product->float_value = $value['float_value'];
                $product->float = $value['float'];
                $product->product_value = $value['product_value'];
                $product->product_profit = $value['product_profit'];
                $product->product_mrp = $value['product_mrp'];
                $product->fur_itm_tax = $value['fur_itm_tax'];
                $product->fur_item_tax = $value['fur_item_tax'];
                $product->calculation_type = $value['calculation_type'];
                $product->applicable = $value['applicable'];
                $product->itm_cost_method = $value['itm_cost_method'];
                $product->direct_tax = $value['direct_tax'];
                $product->product_image = $value['product_image'];
                $product->save();
            }


            return redirect()->route('productuploader.index')->with('success', 'Create successfully');
        }
    }

    public function downloadCsv()
    {
        $path = public_path('csvfile/products.csv');
        return response()->download($path);
    }

    public function downloadExcel()
    {
        $path = public_path('file/products.xlsx');
        return response()->download($path);
    }
}
