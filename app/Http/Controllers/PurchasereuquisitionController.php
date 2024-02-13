<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\A_Transaction;
use App\Models\Activity_Transaction;
use App\Models\Branch;
use App\Models\Brand_Selection;
use App\Models\BuyerCategory;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Modetype;
use App\Models\PageAction;
use App\Models\Pr_detail;
use App\Models\Product;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use App\Models\PurchaseDetail;
use App\Models\Purchaserequisition;
use App\Models\Unit_selection;
use Dflydev\DotAccessData\Data;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Psy\Readline\Hoa\Console;
use Symfony\Component\Console\Input\Input;

class PurchasereuquisitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Prdatas = Pr_detail::with('purchaserequisition')->get();
        return view('purchaserequisition.index', ['Prdatas' => $Prdatas]);
    }
    // Declare function getfirstCategory for fetching data on basis on brand selection for first category by Abrar
    public function getbrandselection($psubc_id)
    {
        $brandselection = Brand_Selection::where('psubc_id', $psubc_id)->get();
        return response()->json($brandselection);
    }
    // Declare function getfirstCategory for fetching data on basis on product category for first category by Abrar
    public function getfirstCategory($pc_id)
    {
        $subcategory = Product_sub_category::where('pc_id', $pc_id)->get();
        return response()->json($subcategory);
    }
    // Declare function getproduct for fetching data on basis on brand selection for product by Abrar
    public function getproduct($brand_id)
    {
        $productgetdata = Product::where('product_brand_id', $brand_id)->get();
        return response()->json($productgetdata);
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
        // Get the IP address of the user

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
        $location = Location::all();
        $branch = Branch::all();
        return view('purchaserequisition.create', compact('deaprtment', 'employee', 'pcategory', 'product', 'uom', 'pr', 'brand', 'modetype', 'subcategory', 'location', 'branch'));
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
            'doc_create_date' => 'required',
            'required_date'=>'required',
            'depart_id'=>'required'
        ]);
        // this function implement for user 3 check field
        $quotationrequired = request()->get('quotationrequired');
        $podirectcreation = request()->get('directpocreations');
        $directpurchaserequired = request()->get('directpurchase');
        if ($quotationrequired == "1") {
            $podirectcreation = 0;
            $directpurchaserequired = 0;
        } 
        elseif ($podirectcreation == "0") {
            $podirectcreation = "1";
            $quotationrequired = "0";
            $directpurchaserequired = "0";
        }
        elseif($directpurchaserequired == "0") {
            $podirectcreation = "0";
            $quotationrequired = "0";
            $directpurchaserequired = "1";
        }
        // this employee id is for created user id
        // getting id of user which is login with application
        $employeeId = Auth::id();
        $id = Purchaserequisition::count("pr_id");
        $maxid =  $id + 1;
        $file = $request->file('filename')->getClientOriginalName();
        $filepath = "PR_" . $id . "_" . $file;
        Log::info('Purchase Requisition created successfully');
        Purchaserequisition::create([
            'pr_doc_no' => request()->get('prdoc_no'),
            'doc_ref_no' => request()->get('doc_ref_no'),
            'mode_type_id' => request()->get('mt_id'),
            'pr_req_date' => request()->get('required_date'),
            'pr_doc_date' => request()->get('doc_create_date'),
            'remarks' => request()->get('pr_remarks'),
            't_no_product' => request()->get('totalnoproduct'),
            't_qty_product' => request()->get('qtyproduct'),
            'attachment' => $filepath,
            'req_by_br_id' => request()->get('branches_id'),
            'req_by_location_id' => request()->get('location_id'),
            'req_by_depart_id' => request()->get('depart_id'),
            'req_by_emp_id' => request()->get('emp_id'),
            'doc_status' => 2,
            'active' => 1,
            'approve_by'=>null,
            'quotation_required' => $quotationrequired,
            'direct_po_required' => $podirectcreation,
            'direct_purchase_required' => $directpurchaserequired,
            'create_emp_id' => $employeeId,
            'update_emp_id'=>null,
            'delete_emp_id'=>null,
            'approve_at'=>null,
            'delete_at'=>null,
        ]);
        // Store pr_details data
        foreach ($request->input('minstock') as $index => $minstock) {
            Pr_detail::create([
                'pr_id' => $maxid,
                'p_id' => $request->input('product')[$index],
                'p_description' => null,
                'order_qty' => $request->input('qty_required')[$index],
                'approve_qty' => null,
                'received_qty' => null,
                'pending_qty' => null,
                'min_stock' => $minstock,
                'max_stock' => $request->input('maxstock')[$index],
                'uom' => null,
                'p_subc_id' => $request->input('subcategory')[$index],
                'brand_id' => $request->input('brand')[$index],
                // 'pc_id' => $request->input('account')[$index],
                'last_received_rate' => null,
                'last_received_date' => null,
            ]);
        }
        // transaction activity table PR Creation
        Activity_Transaction::create([
            'p_action_id' => 1,
            'doc_status_id' => 2,
            'doc_type_id' => 1,
            'emp_id' => $employeeId,
            'pr_id' => $maxid,
            'ip' => '12',
            'mac' => '10'
        ]);
        return redirect()->back()->with('success', 'Data stored successfully.'); 
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
    public function approval()
    {
        $Prdatas = Pr_detail::with('purchaserequisition')->get();
        return view('purchaserequisition.approval', ['Prdatas' => $Prdatas]);
    }
    public function updateApproval(Request $request)
    {
        $ids = $request->input('ids', []);
        $approvalValue = $request->input('approval', 0);

        // Validate or sanitize $ids as needed

        Purchaserequisition::whereIn('id', $ids)->update(['doc_status' => $approvalValue]);

        return response()->json(['message' => 'Approval status updated successfully']);
    }
}
