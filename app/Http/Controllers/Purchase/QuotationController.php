<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Brand_Selection;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Modetype;
use App\Models\Pr_detail;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use App\Models\Purchaserequisition;
use App\Models\Quotation;
use App\Models\QuotationDetail;
use App\Models\Supplier;
use App\Models\Unit_selection;


class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $quotationDetails = QuotationDetail::with('quotation')->get();
        return view('quotation.index', ['quotationDetails' => $quotationDetails]);
    }
    public function fetchData(Request $request)
    {
        $input = $request->input('prs');
        // Split the input string into an array of IDs
        $ids = explode(',', $input);
        // Trim each ID to remove any extra whitespace
        $ids = array_map('trim', $ids);
        
        // Fetch data for each ID
        $data = [];
        foreach ($ids as $id) {
            $prDetails = Pr_detail::where('pre_id', $id)->get();
            // Iterate through each Pr_detail and append product name
            $prDetails->each(function ($item) {
                // Access the product using the relationship defined in Pr_detail model
                $product = $item->product;
                // Append the product name to the item
                $item->product_name = $product->name; // Assuming 'name' is the column for product name in the products table
            });
            // Merge the data for current ID into the main data array
            $data = array_merge($data, $prDetails->toArray());
        }
        
        return response()->json($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deaprtment = Department::all();
        $branch = Branch::all();
        $suplier = Supplier::all();
        $q = Quotation::count('id');
        $qcounter = $q + 1;
        return view('quotation.create', compact('branch', 'deaprtment', 'suplier', 'qcounter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create a new Quotation in database
        Quotation::create([
            'remarks' => request()->get('qremarks'),
            'prs' => request()->get('prs'),
            'total_no_product' => request()->get('total_no_product'),
            'total_qty_product' => request()->get('total_qty_product'),
            'total_tax_amount' => request()->get('total_tax_amount'),
            'total_discount_amount' => request()->get('total_discount_amount'),
            'gross_amount' => request()->get('gross_amount'),
            'invoice_discount' => request()->get('invoice_discount'),
            'net_amount' => request()->get('net_amount'),
            'branch_id' => request()->get('branchs_id'),
            'depart_id' => request()->get('depart_id'),
            'supplier_id' => request()->get('supplier_id')
        ]);
        return redirect()->route('quotation.create')->with('success', 'Create successfully');
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
    public function approval(Request $request)
    {
        return view('quotation.approval');
    }
}
