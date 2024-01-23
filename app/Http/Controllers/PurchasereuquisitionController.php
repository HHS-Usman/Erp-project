<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand_Selection;
use App\Models\BuyerCategory;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Purchaserequisition;
use App\Models\Unit_selection;
use Illuminate\Http\Request;

class PurchasereuquisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('purchaserequisition.index');
    }
    public function getUOM($id)
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
        return response()->json([
            'uom' => $uom->uom,
            'minqty' => $minqty,
            'maxqty' => $maxqty,
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
        $counterid = Purchaserequisition::count("purchase_id");
        $pr = $counterid+1;
        return view('purchaserequisition.create', compact('deaprtment', 'employee', 'pcategory', 'product', 'brand', 'uom','pr'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'file' => 'required|mimes:jpeg,png,jpg,gif,txt,pdf,xlsx,csv|max:2048',
        // ]);
        // getting primary id
        $id = Purchaserequisition::count("purchase_id");
        $file = $request->file('filename')->getClientOriginalName();
        $filepath = "PR_".$id."_".$file;
        Purchaserequisition::create([
            'doc_ref_no'=>request()->get('doc_ref_no'),
            'model_type'=>request()->get('mode_type'),
            'date_picker'=>request()->get('date_picker'),
            'pr_detail'=>request()->get('pr_remarks'),
            'file'=> $filepath,
            'depart_id'=>request()->get('depart_id'),
            'emp_id'=>request()->get('emp_id'),

        ]);
        return redirect()->route('purchaserequisition.create')->with('success','Create successfully');
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
