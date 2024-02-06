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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PgSql\Lob;

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
        
      
        $maxidquotation = Quotation::count('id');
        try {
            // Start a database transaction
            DB::beginTransaction();

            // Extract data from the request
            $data = $request->all();

            // Loop through the data to save each row to the database
            foreach ($data['prnumber'] as $index => $prNumber) {
                QuotationDetail::create([
                    'pr_no' => $prNumber,
                    'product_item' => $data['product'][$index],
                    'product_wise_description' => $data['product_description'][$index],
                    'uom' => $data['uom'][$index],
                    'qty' => $data['qty_required'][$index],
                    'last_receivedate' => $data['last_received_date'][$index],
                    'last_receive_rate' => $data['last_received_rate'][$index],
                    'rate' => $data['rate'][$index],
                    'tax' => $data['tax_percentage'][$index],
                    'tax_amount' => $data['tax_amount'][$index],
                    'amount' => $data['amount'][$index],
                    'discount' => $data['discountpercentage'][$index],
                    'discount_amount' => $data['discountamount'][$index],
                    'netamount' => $data['netamount'][$index],
                    // Adjust foreign key value if necessary
                    'quo_id' =>  $maxidquotation,
                ]);
            }

            // Commit the transaction
            DB::commit();

            // Return a success response
            return response()->json(['message' => 'Quotation details saved successfully']);
        } catch (\Exception $e) {
            // If an error occurs, rollback the transaction
            DB::rollBack();

            // Log the error for further investigation
            Log::error('Error saving data: ' . $e->getMessage());

            // Return an error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
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
