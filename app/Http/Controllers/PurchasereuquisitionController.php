<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\A_Transaction;
use App\Models\Activity_Transaction;
use App\Models\Branch;
use App\Models\Brand_Selection;
use App\Models\BuyerCategory;
use App\Models\Department;
use App\Models\Documentstatus;
use App\Models\Employee;
use App\Models\Location;
use App\Models\Modetype;
use App\Models\PageAction;
use App\Models\Pr_detail;
use App\Models\Product;
use App\Http\Controllers\findOrFail;
use App\Models\Product_category;
use App\Models\Product_sub_category;
use App\Models\PurchaseDetail;
use App\Models\Purchaserequisition;
use App\Models\Unit_selection;
use Carbon\Carbon;
use Dflydev\DotAccessData\Data;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
        $prdata = Purchaserequisition::all();
        $documentstatus = Documentstatus::all();
        return view('purchaserequisition.index', compact('documentstatus', 'prdata'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // Common method to fetch data
    private function getCommonData()
    {
        $data = [
            'deaprtment' => Department::all(),
            'employee' => Employee::all(),
            'pcategory' => Product_category::all(),
            'product' => Product::all(),
            'brand' => Brand_Selection::all(),
            'uom' => Unit_selection::all(),
            'modetype' => Modetype::all(),
            'subcategory' => Product_sub_category::all(),
            'counterid' => Purchaserequisition::count("pr_id"),
            'location' => Location::all(),
            'branch' => Branch::all(),
        ];

        $data['pr'] = $data['counterid'] + 1;

        return $data;
    }
    public function create()
    {
        $data = $this->getCommonData();
        return view('purchaserequisition.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // this function declare for both store pr_main and and define prmain in approval
    public function pr_pr_detaildatacommon(Request $request)
    {
        $request->validate([
            'doc_create_date' => 'required',
            'required_date' => 'required',
            'depart_id' => 'required'
        ]);
        // this function implement for user 3 check field
        $quotationrequired = request()->get('quotationrequired');
        $podirectcreation = request()->get('directpocreations');
        $directpurchaserequired = request()->get('directpurchase');
        if ($quotationrequired == "1") {
            $podirectcreation = 0;
            $directpurchaserequired = 0;
        } elseif ($podirectcreation == "0") {
            $podirectcreation = "1";
            $quotationrequired = "0";
            $directpurchaserequired = "0";
        } elseif ($directpurchaserequired == "0") {
            $podirectcreation = "0";
            $quotationrequired = "0";
            $directpurchaserequired = "1";
        }
        // this employee id is for created user id
        // getting id of user which is login with application
        $employeeId = Auth::id();
        $id = Purchaserequisition::count("pr_id");
        $maxid =  $id + 1;
        $prno = Purchaserequisition::where('pr_id', $maxid)->value('pr_doc_no');
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
            'approve_by' => null,
            'quotation_required' => $quotationrequired,
            'direct_po_required' => $podirectcreation,
            'direct_purchase_required' => $directpurchaserequired,
            'create_by' => $employeeId,
            'update_by' => null,
            'delete_by' => null,
            'approve_at' => null,
            'delete_at' => null,
            'draft_by' => null
        ]);
        // Store pr_details data
        foreach ($request->input('minstock') as $index => $minstock) {
            Pr_detail::create([
                'pr_id' => $maxid,
                'p_id' => $request->input('product')[$index],
                'p_description' => $request->input('p_description')[$index],
                'req_qty' => $request->input('qty_required')[$index],
                'approve_qty_for_quotation' => 0.0,
                'receive_qty_for_quotation' => 0.0,
                'pending_qty_for_quotation' => 0.0,
                'approve_qty_for_po' => 0.0,
                'receive_qty_for_po' => 0.0,
                'pending_qty_for_po' => 0.0,
                'approved_qty_for_direct_inv' => 0.0,
                'receive_qty_for_direct_inv' => 0.0,
                'pending_qty_for_direct_inv' => 0.0,
                'req_min_stock' => $minstock,
                'req_max_stock' => $request->input('maxstock')[$index],
                'uom' => 'uom-1',
                'p_main_cat' => 1,
                'p_subc_cat' => $request->input('subcategory')[$index],
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
            'doc_no' => $prno,
            'ip' => '00',
            'mac' => '00'
        ]);
    }
    public function store(Request $request)
    {
        // Retrieve the value of the button's ID from the submitted form data
        $buttonId = $request->input('button_id');
        // Check if the value is received
        if ($buttonId == "submit") {
            $this->pr_pr_detaildatacommon($request);
            $message =  "Purchase-Requestion Created Sucessfully";
            return redirect()->route('purchaserequisition.create')->with('message', $message);
        } elseif ($buttonId ==  "draft") {
            $message =  "Purchase-Requestion Drafted Sucessfully";
            $employeeId = Auth::id();
            $currentDateTime = Date::now();
            $this->pr_pr_detaildatacommon($request);
            $lastInsertedId = Purchaserequisition::latest('pr_id')->pluck('pr_id')->first();
            Purchaserequisition::where('pr_id', $lastInsertedId)->update([
                'draft_by' => $employeeId,
                'doc_status' => 1,
                'draft_at' => $currentDateTime
            ]);
            $lasttransactionId = Activity_Transaction::latest('a_transaction_id')->pluck('a_transaction_id')->first();
            Activity_Transaction::where('a_transaction_id', $lasttransactionId)->update([
                'doc_status_id' => 1
            ]);
            return redirect()->route('purchaserequisition.create')->with('message', $message);
        } else {
            dd("Button ID not found in request.");
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
    public function destroy(Request $request, $id)
    {
        $deleteValue = $request->input('delete');
        $closeValue = $request->input('closeval');
        if ($deleteValue == "0") {
            // user connected with application 
            $employeeId = Auth::id();
            $currentDateTime = Date::now();
            $message = "";
            $record = Purchaserequisition::findOrFail($id);
            if ($record->doc_status == 1 || $record->doc_status == 2 || $record->doc_status == 8) {
                // $record->delete();
                Purchaserequisition::where('pr_id', $id)->update([
                    'delete_by' => $employeeId,
                    'delete_at' => $currentDateTime,
                    'active' => 0,
                    'doc_status' => 9
                ]);
                // transaction activity table PR Creation
                $id = Purchaserequisition::count("pr_id");
                $maxid =  $id + 1;
                $prno = Purchaserequisition::where('pr_id', $maxid)->value('pr_doc_no');
                Activity_Transaction::create([
                    'p_action_id' => 4,
                    'doc_status_id' => 9,
                    'doc_type_id' => 5,
                    'emp_id' => $employeeId,
                    'doc_no' => $prno,
                    'ip' => '0.0',
                    'mac' => '0.0'
                ]);
                $message = "Deleted Record Successfully";
                return redirect()->route('purchaserequisition.index')->with('message', $message);
            } else {
                $message = "Can not Deleted Record";
                return redirect()->route('purchaserequisition.index')->with('message', $message);
            }
        } elseif ($closeValue == "1") {
            // user connected with application 
            $employeeId = Auth::id();
            $currentDateTime = Date::now();
            $message = "";
            $record = Purchaserequisition::findOrFail($id);
            if ($record->doc_status == 4 || $record->doc_status == 6 || $record->doc_status == 9) {
                $message = "Can not Closed Record";
                return redirect()->route('purchaserequisition.index')->with('message', $message);
            } else {
                // $record->delete();
                Purchaserequisition::where('pr_id', $id)->update([
                    'close_by' => $employeeId,
                    'close_at' => $currentDateTime,
                    'doc_status' => 7
                ]);
                // transaction activity table PR Creation
                $id = Purchaserequisition::count("pr_id");
                $maxid =  $id + 1;
                $prno = Purchaserequisition::where('pr_id', $maxid)->value('pr_doc_no');
                Activity_Transaction::create([
                    'p_action_id' => 2,
                    'doc_status_id' => 7,
                    'doc_type_id' => 7,
                    'emp_id' => $employeeId,
                    'doc_no' => $prno,
                    'ip' => '00',
                    'mac' => '00'
                ]);
                $message = "Closed Record Successfully";
                return redirect()->route('purchaserequisition.index')->with('message', $message);
            }
        }
    }
    // getting data from purchase requisition main but using approval form

    // -----------------------------------All Ajax Request here----------------------------
    // this is function in web route for fetching data of purchase requisition base on document selection 
    public function getpurchaserequisitiondata(Request $request)
    {
        $selectedIds = $request->input('doucmentstatus_id');
        $data = [];
        if ($selectedIds == "-1") {
            $prdata = Purchaserequisition::all();
        } else {
            $prdata = Purchaserequisition::where('doc_status', $selectedIds)->get();
        }
        // Iterate through each Pr_detail and append product name
        $prdata->each(function ($item) {
            // Access the department using the relationship defined in Purchaserequisition model
            $department = $item->department;
            $employee = $item->employee;
            $documentstatus = $item->documentstatus;
            // If the relationship is defined correctly, $department will hold the department related to the requisition
            $item->required_by_depart_id = $department->department;
            $item->req_by_emp_id = $employee->employee;
            $item->doc_status = $documentstatus->documentstatus;
        });
        // Merge the data for current ID into the main data array
        $data = array_merge($data, $prdata->toArray());
        return response()->json($data);
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
    public function fetch_approval_purchase(Request $request)
    {
        $prId = $request->input('pr_id');
        $purchaserequisitions = Purchaserequisition::where('pr_id', $prId)->get();
        foreach ($purchaserequisitions as $item) {
            // getting value from reference relation table data;
            $department = $item->department;
            $employe = $item->employee;
            $branch = $item->branch;
            // $location = $item->location;

            //  replacing value base id reference id
            $item->req_by_br_id = $branch->name;
            $item->req_by_emp_id = $employe->employee_name;
            $item->req_by_depart_id = $department->department;
            // $item->req_by_location_id = $location->Location;
        }
        // Fetch data for each ID
        $data = [$purchaserequisitions];
        foreach ($purchaserequisitions as $pr) {
            // Retrieve Pr_detail for the current Purchaserequisition
            $prDetails = Pr_detail::where('pr_id', $pr->pr_id)->get();
            foreach ($prDetails as $item) {
                $pcategory = $item->productcategory;
                $bselection = $item->productsubcategory;
                $brand = $item->brandselection;
                $product = $item->product;

                $item->brand_id = $brand->brand_selection;
                $item->p_main_cat = $pcategory->product_category;
                $item->p_subc_cat = $bselection->product1stsbctgry;
                $item->p_id = $product->name;
            }

            // Merge the data for current Purchaserequisition into the main data array
            $data = array_merge($data, $prDetails->toArray());
        }
        return response()->json($data);
    }
    // purchase requisition in Approval page 
    public function postprmainapproval(Request $request)
    {
        $directpocreationInput = $request->input('poquantity', []);
        $directpurchaseInput = $request->input('directpurchase_qty', []);
        $quotationQty = $request->input('quotationqty', []);
        $qoutationrequired = $request->input('quotationrequired');

        $prDocno = $request->input('prdoc_no');
        $requiredDate = $request->input('required_date');
        $pr_remarks = $request->input('pr_remarks');
        $directpocreations = $request->input('directpocreations');
        $directpurchase = $request->input('directpurchase');
        $allpartialmethod = $request->input('allpartialmethod');

        $currentRecord = Purchaserequisition::where('pr_doc_no', $prDocno)->first();
        $prId = $currentRecord->pr_id;
        $requiredDateChangeda = $requiredDate != $currentRecord->pr_req_date;
        $remarksChanged = $pr_remarks != $currentRecord->remarks;
        $updateData = [];
        // Conditions
        // reuireddata update by Abrar
        if ($requiredDateChangeda) {
            $updateData['pr_req_date'] = $requiredDate;
        }
        // Remarks update by Abrar
        if ($remarksChanged) {
            $updateData['remarks'] = $pr_remarks;
        }
        if ($qoutationrequired == "1") {
            // Update database by Abrar 
            Purchaserequisition::where('pr_doc_no', $prDocno)->update($updateData);
            foreach ($quotationQty as $index => $qQty) {
                // Assuming each $qQty corresponds to a specific pr_detail row
                $prDetail = Pr_detail::where('pr_id', $prId)->skip($index)->first();
                if ($prDetail) {
                    $prDetail->update([
                        'approve_qty_for_quotation' => $qQty
                    ]);
                }
            }
        }
        // direct po creation update by Abrar
        if ($directpocreations == "2") {
            $updateData['direct_po_required'] = '1';
            // Update database by Abrar 
            Purchaserequisition::where('pr_doc_no', $prDocno)->update($updateData);
            foreach ($directpocreationInput as $index => $directpo) {
                // Assuming each $directPurchase corresponds to a specific pr_detail row
                $directpoDetail = Pr_detail::where('pr_id', $prId)->skip($index)->first();
                if ($directpoDetail) {
                    $directpoDetail->update([
                        'approve_qty_for_po' => $directpo
                    ]);
                }
            }
        }
        //Direct Purchase creation update by Abrar
        if ($directpurchase == "3") {
            $updateData['direct_purchase_required'] = '1';
            // Update database by Abrar 
            Purchaserequisition::where('pr_doc_no', $prDocno)->update($updateData);
            foreach ($directpurchaseInput as $index => $directPurchase) {
                // Assuming each $directPurchase corresponds to a specific pr_detail row
                $directPurchaseDetail = Pr_detail::where('pr_id', $prId)->skip($index)->first();
                if ($directPurchaseDetail) {
                    $directPurchaseDetail->update([
                        'approved_qty_for_direct_inv' => $directPurchase
                    ]);
                }
            }
        }
        //all partial method creation update by Abrar
        if ($allpartialmethod == "4") {
            $updateData['direct_purchase_required'] = '1';
            $updateData['direct_po_required'] = '1';
            $updateData['quotation_required'] = '1';
            // Update database by Abrar 
            Purchaserequisition::where('pr_doc_no', $prDocno)->update($updateData);
            foreach ($directpocreationInput as $index => $directpo) {
                // Assuming each $directPurchase corresponds to a specific pr_detail row
                $directpoDetail = Pr_detail::where('pr_id', $prId)->skip($index)->first();
                if ($directpoDetail) {
                    $directpoDetail->update([
                        'approve_qty_for_po' => $directpo,
                    ]);
                }
            }
            foreach ($directpurchaseInput as $index => $directPurchase) {
                // Assuming each $directPurchase corresponds to a specific pr_detail row
                $directPurchaseDetail = Pr_detail::where('pr_id', $prId)->skip($index)->first();
                if ($directPurchaseDetail) {
                    $directPurchaseDetail->update([
                        'approved_qty_for_direct_inv' => $directPurchase
                    ]);
                }
            }
            Purchaserequisition::where('pr_doc_no', $prDocno)->update($updateData);
            foreach ($quotationQty as $index => $qQty) {
                // Assuming each $qQty corresponds to a specific pr_detail row
                $prDetail = Pr_detail::where('pr_id', $prId)->skip($index)->first();
                if ($prDetail) {
                    $prDetail->update([
                        'approve_qty_for_quotation' => $qQty
                    ]); 
                }
            }
        }
         $id = Purchaserequisition::count("pr_id");
         $maxid =  $id + 1;
         $prno = Purchaserequisition::where('pr_id', $maxid)->value('pr_doc_no');
         // seesion id user login with application id
         $employeeId = Auth::id();
        Activity_Transaction::create([
            'p_action_id' => 2,
            'doc_status_id' => 4,
            'doc_type_id' => 4,
            'emp_id' => $employeeId,
            'doc_no' => $prno,
            'ip' => '0.0',
            'mac' => '0.0'
        ]);
    }
    public function render_pr_approval_data(Request $request)
    {
        $selectedIds = $request->input('doucmentstatus_id');
        // $actionId = $request->input('action_id');

        $data = [];
        // getting data from purchase requisition base on two column (Note: use get() methodt o retrieve the data as a collection and then convert it to an array, you should call get()
        $prdata = Purchaserequisition::where('doc_status', $selectedIds)->get();
        // Iterate through each Pr_detail and append product name
        $prdata->each(function ($item) {
            // Access the department using the relationship defined in Purchaserequisition model
            $department = $item->department;
            $employee = $item->employee;
            // $documentstatus = $item->documentstatus;
            $doc_value =  $item->doc_status_value;
            // If the relationship is defined correctly, $department will hold the department related to the requisition
            $item->required_by_depart_id = $department->department;
            $item->req_by_emp_id = $employee->employee;
            // $item->doc_status = $documentstatus->documentstatus;
        });
        // Merge the data for current ID into the main data array
        $data = array_merge($data, $prdata->toArray());
        return response()->json($data);
    }
    // Method for approval
    public function approval(Request $request)
    {
        // $this->pr_pr_detaildata($request);
        $prdata = Purchaserequisition::where('doc_status', 2)->get();
        $data = $this->getCommonData();
        return view('purchaserequisition.approval', array_merge(compact('prdata'), $data));
    }
    public function PR_List_Approval(Request $request)
    {
        // Carbon Library to get current date time formate like( 2024-02-14 09:54:57)
        $currentDateTime = Carbon::now();
        $id = Purchaserequisition::count("pr_id");
        $maxid =  $id + 1;
        $prno = Purchaserequisition::where('pr_id', $maxid)->value('pr_doc_no');
        // seesion id user login with application id
        $employeeId = Auth::id();
        $documentstatus_id  = $request->input('doucmentstatus_id');
        if ($documentstatus_id == "2") {
        } elseif ($documentstatus_id == "3") {
            $purchaseRequisitions = PurchaseRequisition::where('doc_status', 3)->get();
            // Iterate over each purchase requisition
            foreach ($purchaseRequisitions as $purchaseRequisition) {
                // to update each prDetail associated with the purchase requisition:
                foreach ($purchaseRequisition->Pr_detail as $prDetail) {
                    $req_qty = $prDetail->req_qty;
                    $approved_qty_for_quotation = $prDetail->approve_qty_for_quotation;
                    $pending_qty_for_quotation = $prDetail->pending_qty_for_quotation;
                    $approved_qty_for_po = $prDetail->approve_qty_for_po;
                    $approved_qty_for_direct_inv = $prDetail->approved_qty_for_direct_inv;
                    $new_approved_qty_for_quotation = $req_qty - ($approved_qty_for_quotation + $approved_qty_for_po + $approved_qty_for_direct_inv);
                    $approved_qty_for_quotation = $new_approved_qty_for_quotation + $approved_qty_for_quotation;
                    $new_pending_qty_for_quotation = $pending_qty_for_quotation + $new_approved_qty_for_quotation;
                    // Update the prDetail or do whatever you need to do
                    $prDetail->update([
                        'approve_qty_for_quotation' => $new_pending_qty_for_quotation,
                        'pending_qty_for_quotation' =>  $new_approved_qty_for_quotation
                    ]);
                    Purchaserequisition::whereIn('pr_id', 3)->update([
                        'doc_status' => 4,
                        'approve_by' => $employeeId,
                        'approve_at' => $currentDateTime,
                    ]);
                    Activity_Transaction::create([
                        'p_action_id' => 5,
                        'doc_status_id' => 4,
                        'doc_type_id' => 2,
                        'emp_id' => $employeeId,
                        'doc_no' => $prno,
                        'ip' => '0.0',
                        'mac' => '0.0'
                    ]);
                }
            }
        } elseif ($documentstatus_id == "4") {
        } else {
        }

        $ids = $request->input('ids', []);
        // Validate or sanitize $ids as needed
        Purchaserequisition::whereIn('pr_id', $ids)->update([
            'doc_status' => 4,
            'approve_by' => $employeeId,
            'approve_at' => $currentDateTime,
        ]);
        Pr_detail::whereIn('pr_id', $ids)->update([
            'approve_qty_for_quotation' => DB::raw('req_qty')
        ]);
        return response()->json(['message' => 'Approval status updated successfully']);
    }
}
