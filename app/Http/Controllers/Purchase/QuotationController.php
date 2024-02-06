<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;
use App\Models\Brand_Selection;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Modetype;
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
        return view('quotation.create', compact('branch','deaprtment','suplier'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate the input
         $request->validate([
            'remarks'=>'required',

        ]);
        //create a new Quotation in database
        Quotation::create([
            'remarks' => request()->get('qremarks'),
            'branch_id' => request()->get('b_id'),
            'depart_id' => request()->get('d_id'),
            'supplier_id' => request()->get('s_id')
        ]);

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
        $quotationDetails = QuotationDetail::with('quotation')->get();
        return view('quotation.approval' , ['quotationDetails' => $quotationDetails]);
    }
    public function updateApproval(Request $request)
    {
        $ids = $request->input('ids', []);
        $approvalValue = $request->input('approval', 0);

        // Validate or sanitize $ids as needed

        Quotation::whereIn('id', $ids)->update(['doc_status' => $approvalValue]);

        return response()->json(['message' => 'Approval status updated successfully']);
    }
    public function comparitive()
    {

        $quotationDetails = QuotationDetail::with('quotation')->get();
         return view('quotation.comparitive', ['quotationDetails' => $quotationDetails]);
    }
    public function getquotations()
    {
        $quotation= Quotation::all();
        return response()->json($quotation);
    }
}
