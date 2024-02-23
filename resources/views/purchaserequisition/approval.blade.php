@extends('layout.master')
@section('page-tab')
    Purchase Requisition Approval
@endsection
@section('content')
    <section id="main" class="main" style="padding-top: 0vh;">
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="pagetitle" style="margin-left: 20px;">
            <h1>Purchase Requisition Approval</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a>Purchase Requisition Approval</a></li>
                </ol>
            </nav>
        </div>
        <div style="background-color: lightgray;opacity: 0.9;">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab">Date Range</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab">time Range</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab">Property Name</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab">Property Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab">Property ID & conditional Filter</a>
                </li>
            </ul>
        </div>
        <br>
        <div class="row justify-content-start">
            <div class="d-flex col-md-3 col-sm-12 col-xs-12">
                <label for="">Dropdown Selection</label>
                <select name="doucmentstatus_id" id="doucmentstatus_id" class="form-control">
                    <option value="2">Created(Pending for Approval)</option>
                    <option value="3">Partial Approved</option>
                    <option value="4">Approved</option>
                </select>
            </div>
        </div>
        <br><br>
        <div class="row justify-content-center">
            <div class="card-body">
                <table id="myTable" class="table table-border datatable" style="border: 1px solid black">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" id="selectAll" class=""
                                    onclick="toggleSelectAll()">
                            </th>
                            <th scope="col">S.no</th>
                            <th scope="col">Document no</th>
                            <th scope="col">PR Required By Department</th>
                            <th scope="col">PR Required By Employee</th>
                            <th scope="col">PR Required Date</th>
                            <th scope="col">Document status</th>
                            <th scope="col">PR Creation Date time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        @foreach ($prdata as $pr => $item)
                            <tr>
                                <td><input type="checkbox" class="check" name="ids[]" value="{{ $item->pr_id }}">
                                </td>
                                <th>{{ $pr + 1 }}</th>
                                <td>{{ $item->pr_doc_no }}</td>
                                <td>{{ $item->department->department }}</td>
                                <td>{{ $item->employee->employee_name }}</td>
                                <td>{{ $item->pr_req_date }}</td>
                                <td>{{ $item->documentstatus->doc_status }}</td>
                                <td>
                                    {{ $item->created_at }}
                                </td>
                                <td>
                                    <a class="btn btn-info" href="">Show</a>
                                    <a class="btn btn-primary" href="">Edit</a>
                                    <a class="btn btn-danger">Delete</a>
                                    <button type="button" class="openModalBtn btn"
                                        onclick="addRow('{{ $item->pr_id }}')">Approval</button>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="myModal" class="modal">
                    <div class=""
                        style="position: relative;padding: 30px; margin:10px 50px 10px 50px;background-color: #f8f9fa;border-radius: 10px;box-shadow">
                        <span class="close">&times;</span>
                        <form action="{{ route('prmainapproval.postprmainapproval') }}" method="POST" id="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="wrapper">

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <strong>PR Doc#<span style="color:#DC3545">*</span></strong>
                                        <input type="text" class="form-control" value="" id="prdocnumber"
                                            name="prdoc_no" placeholder="PR Doc#" readonly>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong for="attachment">Doc Ref No</strong>
                                        <input type="text" class="form-control" id="doc_ref_no" name="doc_ref_no"
                                            placeholder="Doc Ref No" value="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>PR Document<span style="color:#DC3545">*</span></strong>
                                        <input type="date" class="form-control" id="doc_creation"
                                            name="doc_create_date" placeholder="Date">
                                        @if ($errors->has('doc_create_date'))
                                            <div class="alert alert-danger" class="timererror" style="margin-top:10px">
                                                {{ $errors->first('doc_create_date') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Select Mode Type<span style="color:#DC3545">*</span></strong>
                                        <input type="text" class="form-control" id="modetype" name="modetype"
                                            placeholder="Date">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <strong>Branch</strong>
                                        <input type="text" class="form-control" id="branchid" name="branchid"
                                            placeholder="Branch">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Location</strong>
                                        <input type="text" class="form-control" id="location_id" name="location_id"
                                            placeholder="Location">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Department</strong>
                                        <input type="text" class="form-control" id="department_id"
                                            name="department_id" placeholder="Department">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Required Date<span style="color:#DC3545">*</span></strong>
                                        <input type="date" class="form-control" id="date_picker" name="required_date"
                                            placeholder="Date">
                                        @if ($errors->has('required_date'))
                                            <div class="alert alert-danger" class="timererror" style="margin-top:10px">
                                                {{ $errors->first('required_date') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <strong>Employe</strong>
                                        <input type="text" class="form-control" id="empployee_id" name="empployee_id"
                                            placeholder="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Attachment</strong>
                                        <input type="text" class="form-control" id="filename" name="filename"
                                            placeholder="Date">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="d-flex col-md-12 form-group">
                                        <div class="col-md-2 form-group"><strong>PR Remarks</strong></div>
                                        <textarea id="pr_remarks" name="pr_remarks" rows="3" cols="135"></textarea>
                                    </div>
                                </div>
                                <div class="row" id="prdetail">
                                    <div class="innercontainer" class="col-md-12">
                                        <strong>PR Detail</strong>
                                    </div>
                                </div>
                                {{-- this is input hidden field for get data  of qtyproduct in laravel --}}
                                <input type="hidden" id="qtyproductInput" name="qtyproduct" value="0">
                                {{-- this is input hidden field for get data  of qtyproduct in laravel --}}
                                <input type="hidden" id="totalnoproductInput" name="totalnoproduct" value="1">
                            </div>

                            <div class="row" style="margin: 20px 0px 10px 40px">
                                <div class="col-md-2 form-group">
                                    <input class="form-check-input" type="checkbox" value="0"
                                        name="allpartialmethod" id="all_partial_qty_method">
                                    <label class="form-check-label" for="all_partial_qty_method">All Partial Qty
                                        Method</label>
                                </div>
                                <div class="col-md-2 form-group">
                                    <input class="form-check-input" type="checkbox" value="1"
                                        name="quotationrequired" id="quotation_required" checked>
                                    <label class="form-check-label" for="quotation_required">Quotation
                                        Required</label>
                                </div>
                                <div class="col-md-2 form-group">
                                    <input class="form-check-input" type="checkbox" value="0"
                                        name="directpocreations" id="direct_po_creation">
                                    <label class="form-check-label" for="direct_po_creation">Direct Po
                                        Creation</label>
                                </div>
                                <div class="col-md-2 form-group">
                                    <input class="form-check-input" type="checkbox" value="0" name="directpurchase"
                                        id="direct_purchase_required">
                                    <label class="form-check-label" for="direct_purchase_required">Direct Purchase
                                        Required</label>
                                </div>
                            </div>
                            {{-- Contetn for Grid Here --}}
                            <div
                                style="border: 1px solid rgb(20, 19, 19); margin-top:10px;margin-bottom:10px;padding:0px 10px 0px 10px">
                                <table class="table mt-3 border" id="tabledate">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Product_Ctgy</th>
                                            <th>Sub_Category</th>
                                            <th>Brand </th>
                                            <th>Product</th>
                                            <th>Product Remarks</th>
                                            <th>UOM</th>
                                            <th>Current Stock</th>
                                            <th>Qty Required</th>
                                            <th>Quotation Qty</th>
                                            <th>Po Quantity</th>
                                            <th>Direct Purchase Qty</th>
                                            <th>Last Purchase Qty</th>
                                            <th>Last Purchase Rate</th>
                                            <th>Min Stock</th>
                                            <th>Max Stock</th>
                                            <th>More Row</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodypurchase">

                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-2">
                                        <strong>
                                            <p id="tnop">Total Number of Products</p>
                                        </strong>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>
                                            <p id="noproduct">1</p>
                                        </strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <strong>
                                            <p>Total Qty of Products</p>
                                        </strong>
                                    </div>
                                    <div class="col-md-2">
                                        <strong>
                                            <p id="qtyproduct">0</p>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-md-12 col-sm-12 col-xs-12" id="topPagination">
                    <button type="button" class="btn btn-primary">Request to the requester</button>
                    <button type="button" id="submitButton" class="btn btn-primary">Approve</button>
                    <button type="button" class="btn btn-primary">Save </button>
                </div>
                </form>
            </div>
        </div>

        <!-- End Recent Sales -->

        <!-- Template Main JS File -->
        <script>
            // // function is implement for validation timer
            // const error = document.className("timererror");
            // setTimeout(() => {
            //     error.style.display = "none"
            // }, 4000);
            // -----------------------Start-------------------------------
            // this code is for direct po  and quotation required check at a time both should not be check at a time.
            // Get references to the checkboxes
            const quotationCheckbox = document.getElementById('quotation_required');
            const directPOCheckbox = document.getElementById('direct_po_creation');
            const directpurchasebox = document.getElementById('direct_purchase_required');
            const allpartialqtymethod = document.getElementById('all_partial_qty_method');
            // Add event listeners to each checkbox

            // -----------------------End-------------------------------
            var gettvalueok = 0;
            var totalproduct = document.getElementById("noproduct");
            var totalproductInput = document.getElementById("totalnoproductInput");
            var qtyproduct = document.getElementById("qtyproduct");
            // document.getElementById("qtyproductvalue").addEventListener("input", function() {
            //     var valuegetting = document.getElementById('qtyproductvalue').value;
            //     gettvalueok = parseInt(valuegetting);
            // });
            // var selectproduct = "";
            var counter = 0;
            // this is define conversted in json format of category data by Abrar
            var pcategoryData = {!! json_encode($pcategory) !!};
            // this is define conversted in json format of sub first category data by Abrar
            var psubcategorydata = {!! json_encode($subcategory) !!};
            // this is define converted in json format of product data by Abrar
            var productdata = {!! json_encode($product) !!};
            // this is define converted in json format of product data by Abrar
            var brand = {!! json_encode($brand) !!};
            // this is define converted in json format of product data by Abrar
            var productdata = {!! json_encode($product) !!};

            function addRow(prId) {
                fetch('/fetchapproval?pr_id=' + prId)
                    .then(response => response.json())
                    .then(data => {
                        updateTable(data);
                    })
                    .catch(error => console.error('Error:', error)); // Log any errors
            }

            function updateTable(data) {
                var prdata = data[0];
                console.log(data);
                //start Getting data for purchase requsiition main form 
                pr_doc_no = prdata[0].pr_doc_no;
                doc_ref_no = prdata[0].doc_ref_no;
                pr_doc_date = prdata[0].pr_doc_date;
                mode_type_id = prdata[0].mode_type_id;
                branch_id = prdata[0].req_by_br_id;
                location_id = prdata[0].req_by_location_id;
                req_by_depart_id = prdata[0].req_by_depart_id;
                pr_req_date = prdata[0].pr_req_date;
                req_by_emp_id = prdata[0].req_by_emp_id;
                attachment = prdata[0].attachment;
                remarks = prdata[0].remarks;
                //END Getting data for purchase requsiition main form 

                // start getting id and base on id put values
                var prdocnumber = document.getElementById('prdocnumber');
                var ref_doc = document.getElementById('doc_ref_no');
                var doc_creation = document.getElementById('doc_creation');
                var modetype = document.getElementById('modetype');
                var branchid = document.getElementById('branchid');
                var locations_id = document.getElementById('location_id');
                var department_id = document.getElementById('department_id');
                var date_picker = document.getElementById('date_picker');
                var empployee_id = document.getElementById('empployee_id');
                var filename = document.getElementById('filename');
                var pr_remarks = document.getElementById('pr_remarks');

                prdocnumber.value = pr_doc_no;
                ref_doc.value = doc_ref_no;
                doc_creation.value = pr_doc_date;
                modetype.value = mode_type_id;
                branchid.value = branch_id;
                locations_id.value = location_id;
                department_id.value = req_by_depart_id;
                date_picker.value = pr_req_date;
                empployee_id.value = req_by_emp_id;
                filename.value = attachment;
                pr_remarks.value = remarks;
                // End getting id and base on id put values

                var tableBody = document.querySelector('#tbodypurchase');
                // START putting value in input values
                pr_detaildata = data.slice(1);
                tableBody.innerHTML = '';
                pr_detaildata.forEach((item, index) => {
                    // var qtyrquired = document.getElementById(`qtyrequired_upper_${index}`);
                    var Doc_req_qty = item.req_qty;
                    var Doc_req_quot_qty = item.approve_qty_for_quotation;
                    var Doc_req_po_qty = item.approve_qty_for_po;
                    var Doc_req_inv_qty = item.approved_qty_for_direct_inv;
                    Total_req_Qty = Doc_req_qty - (Doc_req_quot_qty + Doc_req_po_qty + Doc_req_inv_qty);
                    quotationCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            // If the quotation checkbox is checked, uncheck the direct PO checkbox
                            directPOCheckbox.checked = false;
                            directpurchasebox.checked = false
                            allpartialqtymethod.checked = false;
                            const poQuantityInput = document.getElementById(`poquantity_${index}`);
                            const quotationInput = document.getElementById(`quotationqty_${index}`);
                            const directpurchaseInput = document.getElementById(`directpurchase_qty_${index}`);
                            poQuantityInput.readOnly = true;
                            quotationInput.readOnly = false;
                            directpurchaseInput.readOnly = true;

                        }
                    });
                    directPOCheckbox.addEventListener('change', function() {
                        if (this.checked) {
                            // If the direct PO checkbox is checked, uncheck the quotation checkbox
                            quotationCheckbox.checked = false;
                            directpurchasebox.checked = false;
                            allpartialqtymethod.checked = false;
                            const poQuantityInput = document.getElementById(`poquantity_${index}`);
                            const quotationInput = document.getElementById(`quotationqty_${index}`)
                            const directpurchaseInput = document.getElementById(`directpurchase_qty_${index}`);
                            poQuantityInput.readOnly = false;
                            quotationInput.readOnly = true;
                            directpurchaseInput.readOnly = true;
                        }
                    });
                    directpurchasebox.addEventListener('change', function() {
                        if (this.checked) {
                            quotationCheckbox.checked = false;
                            directPOCheckbox.checked = false;
                            allpartialqtymethod.checked = false;
                            const poQuantityInput = document.getElementById(`poquantity_${index}`);
                            const quotationInput = document.getElementById(`quotationqty_${index}`);
                            const directpurchaseInput = document.getElementById(`directpurchase_qty_${index}`);
                            poQuantityInput.readOnly = true;
                            quotationInput.readOnly = true;
                            directpurchaseInput.readOnly = false;
                        }
                    })
                    allpartialqtymethod.addEventListener('change', function() {
                        if (this.checked) {
                            quotationCheckbox.checked = false;
                            directPOCheckbox.checked = false;
                            directpurchasebox.checked = false;
                            const poQuantityInput = document.getElementById(`poquantity_${index}`);
                            const quotationInput = document.getElementById(`quotationqty_${index}`);
                            const directpurchaseInput = document.getElementById(`directpurchase_qty_${index}`);

                            poQuantityInput.readOnly = false;
                            quotationInput.readOnly = false;
                            directpurchaseInput.readOnly = false;
                        }
                    })
                    var row = tableBody.insertRow();
                    // S.No
                    var snoCell = row.insertCell();
                    snoCell.textContent = index + 1;

                    // PR_No
                    var prNoCell = row.insertCell();
                    prNoCell.innerHTML =
                        `<input type="text" class="form-control"value = "${item.p_main_cat}" placeholder="product category" id="product_c_${index}" name="productcategory" readonly>`;

                    // Product
                    var prNoCell = row.insertCell();
                    prNoCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.p_subc_cat}"  placeholder="Sub Category" id="subcategory_${index}" name="sub category" readonly>`;

                    // Product Wise Description
                    var descCell = row.insertCell();
                    descCell.innerHTML =
                        `<input type="text" class="form-control" value = "${item.brand_id}"  placeholder="Brand" id="brand_${index}" name="brand">`;

                    // UOM
                    var uomCell = row.insertCell();
                    uomCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.p_id}" id="product_${index}" placeholder="product" name="product">`;

                    // Quality
                    var qualityCell = row.insertCell();
                    qualityCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.p_id}" placeholder="product remarks" id="premarks_${index}" name="productremarks" />`;
                    // Last Received Date
                    var lastReceivedDateCell = row.insertCell();
                    lastReceivedDateCell.innerHTML =
                        lastReceivedDateCell.innerHTML =
                        `<input type="text" class="form-control"  placeholder="uom" value ="${item.uom}" id="uom_${index}"  name="uom" readonly>`;
                    // Last Received Rate
                    var lastReceivedRateCell = row.insertCell();
                    lastReceivedRateCell.innerHTML =
                        `<input type="text" class="form-control"  value = "static stock" placeholder="currentstaock" id="currentstaock_${index}" name="currentstaock" readonly>`;
                    // Rate
                    var rateCell = row.insertCell();
                    rateCell.innerHTML =
                        `<input type="text" class="form-control"  placeholder="Qty Required" value="${Total_req_Qty}" id="qtyrequiredInput${index}" name="currentrequired" readonly></br>
     <input type="text" class="form-control" placeholder="Qty Required" value="${item.req_qty}" id="qtyrequired_lower_${index}" name="currentrequired" readonly>`;
                    // Tax%
                    var taxPercentCell = row.insertCell();
                    taxPercentCell.innerHTML =
                        `<input type="text" class="form-control"   placeholder="Quotation qty" id="quotationqty_${index}" name="quotationqty" ></br>
     <input type="text" class="form-control" placeholder="Qty Required" value="${item.approve_qty_for_quotation}" id="quotationinput_${index}" name="quotationinput" readonly>`;
                    // Tax%
                    var taxPercentCell = row.insertCell();
                    taxPercentCell.innerHTML =
                        `<input type="text" class="form-control"  placeholder="po quantity" id="poquantity_${index}" name="poquantity" readonly></br>
     <input type="text" class="form-control" placeholder="Qty Required" value="${item.approve_qty_for_po}" id="qtyrequired_lower_${index}" name="currentrequired" readonly>`;
                    // Tax Amount
                    var taxAmountCell = row.insertCell();
                    taxAmountCell.innerHTML =
                        `<input type="text" class="form-control"  placeholder="directpurchase_qty" id="directpurchase_qty_${index}" name="directpurchase_qty" readonly> </br>
     <input type="text" class="form-control" placeholder="Qty Required" value="${item.approved_qty_for_direct_inv}" id="qtyrequired_lower_${index}" name="currentrequired" readonly>`;

                    // Discount%
                    var discountPercentCell = row.insertCell();
                    discountPercentCell.innerHTML =
                        `<input type="text" class="form-control" value="" placeholder="last purchase qty" id="lastpurchaseqty_${index}" name="lastpurchaseqty">`;

                    // Discount Amount
                    var discountAmountCell = row.insertCell();
                    discountAmountCell.innerHTML =
                        `<input type="text" class="form-control" value="" placeholder="last purchase rate" id="lastpurchaserate_${index}" name="lastpurchaserate">`;

                    // Net Amount
                    var netAmountCell = row.insertCell();
                    netAmountCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.req_min_stock}" placeholder="Min Stock" id="minstock_${index}" name="minstock" readonly>`;

                    // Net Amount
                    var netAmountCell = row.insertCell();
                    netAmountCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.req_max_stock}" placeholder="Max Stock" id="maxnstock_${index}" name="manstock" readonly>`;

                    let removebtn = row.insertCell();
                    removebtn.innerHTML =
                        `<button type="button" class="btn btn-danger" onclick="removeRow(${index})">-</button>`;
                    // Function to update tax amount based on rate and tax percentage
                });
            }
            // function declare for update to Quality product
            function updateTotalQuantity() {
                var totalQuantity = gettvalueok;
                var table = document.getElementById("tableBodydata");
                // Iterate through rows to sum up quantity values
                for (var i = 1; i < table.rows.length; i++) {
                    var inputValue = parseInt(table.rows[i].cells[8].querySelector("input").value);
                    if (!isNaN(inputValue)) {
                        totalQuantity += inputValue;
                    }
                }
                // Update total quantity display
                qtyproduct.innerHTML = totalQuantity;

                // Update hidden input field value
                document.getElementById("qtyproductInput").value = totalQuantity;
            }
            // this function is declare for erase rows from bottom to top
            function removeRow() {
                var totalproductInput = document.getElementById("totalnoproductInput");
                var table = document.getElementById("tableBodydata");
                var totalproduct = document.getElementById("noproduct");
                totalproduct.innerHTML = table.rows.length - 1;
                totalproductInput.value = table.rows.length - 1;
                totalQuantity = gettvalueok;
                // Iterate through rows to sum up quantity values
                for (var i = 1; i < table.rows.length - 1; i++) {
                    var inputValue = parseInt(table.rows[i].cells[8].querySelector("input").value);
                    if (!isNaN(inputValue)) {
                        console.log(i);
                        totalQuantity = totalQuantity + inputValue;
                    }
                }
                document.getElementById("qtyproductInput").value = totalQuantity;
                // Update total quantity display
                qtyproduct.innerHTML = totalQuantity;
                var table = document.getElementById("tableBodydata");
                if (table.rows.length > 1) {
                    table.deleteRow(table.rows.length - 1)
                } else {
                    alert("No Rows to Remove");
                }
            }
            // end here
        </script>
        <script>
            // by Badar
            // by Abrar
            // this model action function declare for static and dynamic 
            function modelactioncommon() {
                // Get all elements that trigger the modal
                var modalTriggers = document.querySelectorAll(".openModalBtn");

                // Get the modal
                var modal = document.getElementById("myModal");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // Flag to track if the modal has been opened before
                var modalOpened = false;

                // Function to open the modal
                function openModal() {
                    modal.style.display = "block";

                    // Check if the modal has been opened before
                    if (!modalOpened) {
                        modalOpened = true;
                        modal.classList.add("slideIn"); // Add slide-in animation class
                    }
                }

                // Function to close the modal
                function closeModal() {
                    modal.style.display = "none";
                }

                // Add event listeners to all elements that trigger the modal
                modalTriggers.forEach(function(trigger) {
                    trigger.addEventListener("click", openModal);
                });

                // When the user clicks on <span> (x), close the modal
                span.onclick = closeModal;

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                    if (event.target == modal) {
                        closeModal();
                    }
                }
            }
            modelactioncommon()
            $(document).ready(function() {
                var documentstatus_id;
                // Event handler for when documentstatus_id changes
                $('#doucmentstatus_id').change(function() {
                    documentstatus_id = $(this).val();
                });
                // Event handler for submit button click
                $('#submitButton').on('click', function(event) {
                    event.preventDefault();
                    var ids = $('input[name="ids[]"]:checked').map(function() {
                        return $(this).val();
                    }).get();

                    if (ids.length === 0) {
                        alert("No selected Row. Please select at least one Row.");
                        return;
                    }
                    if (documentstatus_id == "2" || documentstatus_id == "3") {
                        $.ajax({
                            type: 'POST',
                            url: '/Pr/update-approval',
                            data: {
                                ids: ids,
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                alert(response.message);
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    } else if (documentstatus_id == "3") {

                    } else if (documentstatus_id == "4") {
                        alert("Alredy Approved");
                        return;
                    } else {

                    }
                });
                $(document).on('click', '.openModalBtn', function() {
                    modelactioncommon()
                });
                jQuery('#doucmentstatus_id').change(function() {
                    var selectedId = $(this).val();
                    jQuery.ajax({
                        url: '/Pr/approvaldatapurchaserequsition',
                        type: "GET",
                        data: {
                            doucmentstatus_id: selectedId
                        },
                        success: function(response) {
                            // Clear existing table rows
                            $('#tableBody').empty();

                            // Populate table with fetched data
                            $.each(response, function(index, item) {
                                $('#tableBody').append('<tr>' +
                                    '<td><input type="checkbox" class="check" name="ids[]" value="' +
                                    item.pr_id + '"></td>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + item.pr_doc_no + '</td>' +
                                    '<td>' + item.department.department + '</td>' +
                                    '<td>' + item.employee.employee_name + '</td>' +
                                    '<td>' + item.pr_req_date + '</td>' +
                                    '<td>' + item.doc_status_value.doc_status +
                                    '</td>' +
                                    '<td>' + item.created_at + '</td>' +
                                    '<td><button type="button" class="openModalBtn btn"class="btn btn-primary">Approval</button></td>' +
                                    '</tr>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            });

            function toggleSelectAll() {
                var checkboxes = document.querySelectorAll('.check');
                var selectAllCheckbox = document.getElementById('selectAll');

                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = selectAllCheckbox.checked;
                }
            }
        </script>
    @endsection
