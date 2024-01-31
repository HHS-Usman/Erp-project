<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand_Selection;
use App\Models\BuyerCategory;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Modetype;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use App\Models\PurchaseDetail;
use App\Models\Purchaserequisition;
use App\Models\Unit_selection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psy\Readline\Hoa\Console;

class PurchasereuquisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Prdata = Purchaserequisition::all();
        return view('purchaserequisition.index',compact('Prdata'));
    }
    // Declare function getfirstCategory for fetching data on basis on product category for first category by Abrar
    public function getfirstCategory($pc_id){
        $subcategory = Product_sub_category::where('pc_id',$pc_id)->get();
        return response()->json($subcategory);
    }
    public function purchasedata($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['error' => 'Product Not found'], 404);
        }
        $uom = Unit_selection::find($product->product_uom_id);
        $minqty = $product->min_qty;
        $maxqty = $product->max_qty;
        if (!$uom) {
            return response()->json(['error' => 'UOM not found'], 404);
        }
        return response()->json(
            [
                'uom' => $uom->uom,
                'minqty' => $minqty,
                'maxqty' => $maxqty,
            ]
        );
    }
    public function categorydata($id)
    {
        $pcategory = Product_category::find($id);
        if (!$pcategory) {
            return response()->json(['error' => 'Product Category Not found'], 404);
        }
        $firstcategory = Product_sub_category::find($pcategory->product_sub_category_id);
        if (!$firstcategory) {
            return response()->json(['error' => 'Product Category not found'], 404);
        }
        return response()->json(
            [
                'firstcategory' =>  $firstcategory->product1stsbctgry,
            ]
        );
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deaprtment = Department::all();
        $employee = Employee::all();
        $pcategory = Product_category::all();
        $product = Product::all();
        $brand = Brand_Selection::all();
        $uom = Unit_selection::all();
        $modetype = Modetype::all();
        $subcategory = Product_sub_category::all();
        $counterid = Purchaserequisition::count("pr_id");
        $pr = $counterid + 1;
        return view('purchaserequisition.create', compact('deaprtment', 'employee', 'pcategory', 'product', 'uom', 'pr','brand','modetype','subcategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $qtyproduct = $request->input('qtyproduct');
            $totalnoproduct = $request->input('totalnoproduct');
            // $names = request()->input('names');
            $id = Purchaserequisition::count("pr_id");
            $file = $request->file('filename')->getClientOriginalName();
            $filepath = "PR_" . $id . "_" . $file;
            Log::info('Purchase Requisition created successfully');
            Purchaserequisition::create([
                'doc_ref_no' =>request()->get('doc_ref_no'),
                'date_picker' =>request()->get('date_picker'),
                'pr_detail' =>request()->get('pr_remarks'),
                'file' => $filepath,
                't_no_product'=> $totalnoproduct,
                't_qty_product'=>$qtyproduct,
                'modet_id' => request()->get('mt_id'),
                'depart_id' => request()->get('depart_id'),
                'emp_id' => request()->get('emp_id'),
            ]);
        //     foreach ($names as $key => $name) {
        //         if ($request->has('subcategory')) {
                    
        //             PurchaseDetail::create([
        //                 'sub_category' => $request->input('subcategory')[$key],
        //                 'UOM' => $request->input('UOM')[$key],
        //                 'current_stock' => $request->input('currentstock')[$key],
        //                 'qty_required' => $request->input('qty_required')[$key],
        //                 'last_purchase' => $request->input('last_purchase')[$key],
        //                 'min_stock' => $request->input('minstock')[$key],
        //                 'max_stock' => $request->input('maxstock')[$key],
        //                 'history' => $request->input('history')[$key],
        //                 'p_prequisition_id' => $id 
        //             ]);
        //         } else {
        //             // Handle the case where one or more input fields are missing or null
        //             return response()->json(['error' => 'One or more required input fields are missing or null'], 400);
        //         }
        //     }
        //     return response()->json(['success' => true]);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
        return redirect()->route('purchaserequisition.create')->with('success', 'Create successfully');
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
        //
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
