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
                                        class="btn btn-primary">Approval</button>
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
                                        <input type="text" class="form-control" value="PR-<?php echo $pr; ?>"
                                            id="prdocnumber" name="prdoc_no" placeholder="PR Doc#" readonly>

                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong for="attachment">Doc Ref No</strong>
                                        <input type="text" class="form-control" id="doc_ref_no" name="doc_ref_no"
                                            placeholder="Doc Ref No">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <strong>PR Document<span style="color:#DC3545">*</span></strong>
                                        <input type="date" class="form-control" id="doc_creation" name="doc_create_date"
                                            placeholder="Date">
                                        @if ($errors->has('doc_create_date'))
                                            <div class="alert alert-danger" class="timererror" style="margin-top:10px">
                                                {{ $errors->first('doc_create_date') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Select Mode Type<span style="color:#DC3545">*</span></strong>
                                        <select name="mt_id" id="mode_type" class="form-control">
                                            @foreach ($modetype as $item)
                                                <option value="{{ $item->mt_id }}">{{ $item->modetype_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <strong>Branch</strong>
                                        <select name="branches_id" id="branch_type" class="form-control">
                                            <option value="branch">Select branch</option>
                                            @foreach ($branch as $branch)
                                                <option value={{ $branch->id }}>{{ $branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Location</strong>
                                        <select name="location_id" id="location" class="form-control">
                                            <option value="location">Select Location</option>
                                            @foreach ($location as $location)
                                                <option value={{ $location->location_id }}>{{ $location->Location }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Department</strong>
                                        <select name="depart_id" id="department" class="form-control">
                                            <option value="none">Select Department</option>
                                            @foreach ($deaprtment as $depart)
                                                <option value="{{ $depart->id }}">{{ $depart->department }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div id="department-error" class="alert alert-danger"
                                            style="margin-top:10px; display:none;">
                                            Please select a department.
                                        </div>
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
                                        <select name="emp_id" id="employe" class="form-control">
                                            <option value="employe">Select Employe</option>
                                            @foreach ($employee as $employ)
                                                <option value={{ $employ->id }}>{{ $employ->employee_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <strong>Attachment</strong>
                                        <input type="file" class="form-control" id="filename" name="filename"
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
                                            <th>Last Purchase</th>
                                            <th>Last Purchase Rate</th>
                                            <th>Last Purchase Date</th>
                                            <th>Min Stock</th>
                                            <th>Max Stock</th>
                                            <th>Add</th>
                                            <th></th>
                                            <th>Refresh</th>
                                            <th>History</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tableBodydata">
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <select name="category" id="pc_data" class="form-control">
                                                    <option value="category" id="chnagefont">Select</option>
                                                    @foreach ($pcategory as $category)
                                                        <option id="chnagefont" value="{{ $category->id }}">
                                                            id{{ $category->id }} | Product Category Name|
                                                            {{ $category->product_category }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <select name="firstcategory" id="subcategory" class="form-control">
                                                    <option value="None" id="chnagefont">Select</option>
                                                </select>

                                            </td>
                                            <td>
                                                <select name="brand_id" id="brandselection" class="form-control">
                                                    <option value="brand" id="chnagefont">Select</option>
                                                </select>
                                            </td>
                                            <td> <select name="product_id" id="productdata" class="form-control">
                                                    <option id="chnagefont" value="product">Select</option>
                                                </select></td>
                                            <td><input type="text" class="form-control credit" value=""
                                                    placeholder="product Remarks" name="pd"></td>
                                            <td>
                                                <span>UOM</span>
                                                <input type="hidden" class="form-control credit" value=""
                                                    placeholder="UOM" name="UOM">
                                            </td>
                                            <td>
                                                <span>---</span>
                                            </td>
                                            <td><input type="text" class="form-control debit" id="qtyproductvalue"
                                                    placeholder="Qty Required" name="qty_required">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control debit" id="lastpurchase"
                                                    placeholder="Last Purchase" name="lastpurchase">
                                            </td>
                                            <td>
                                                ---
                                            </td>
                                            <td>
                                                ---
                                            </td>

                                            <td><input type="number" class="form-control debit" id="minstock"
                                                    placeholder="0.00" name="minstock" required>
                                            </td>
                                            <td><input type="number" class="form-control debit" id="maxstock"
                                                    placeholder="0.00" name="maxstock" required>
                                            </td>
                                            <td> <!-- Add More Rows Button -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="addRow()">+</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-primary"
                                                            onclick="refreshtext()">
                                                            <i class="fa fa-refresh" aria-hidden="true"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-warning">.</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
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

                                // Add event listeners to each checkbox
                                quotationCheckbox.addEventListener('change', function() {
                                    if (this.checked) {
                                        // If the quotation checkbox is checked, uncheck the direct PO checkbox
                                        directPOCheckbox.checked = false;
                                        directpurchasebox.checked = false
                                    }
                                });

                                directPOCheckbox.addEventListener('change', function() {
                                    if (this.checked) {
                                        // If the direct PO checkbox is checked, uncheck the quotation checkbox
                                        quotationCheckbox.checked = false;
                                        directpurchasebox.checked = false;
                                    }
                                });

                                directpurchasebox.addEventListener('change', function() {
                                    if (this.checked) {
                                        quotationCheckbox.checked = false;
                                        directPOCheckbox.checked = false;
                                    }
                                })

                                // -----------------------End-------------------------------
                                var gettvalueok = 0;
                                var totalproduct = document.getElementById("noproduct");
                                var totalproductInput = document.getElementById("totalnoproductInput");
                                var qtyproduct = document.getElementById("qtyproduct");
                                document.getElementById("qtyproductvalue").addEventListener("input", function() {
                                    var valuegetting = document.getElementById('qtyproductvalue').value;
                                    gettvalueok = parseInt(valuegetting);
                                });
                                var selectproduct = "";
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

                                function addRow() {
                                    var table = document.getElementById("tableBodydata");
                                    var newRow = table.insertRow(table.rows.length);
                                    counter = table.rows.length;
                                    totalproduct.innerHTML = counter;
                                    totalproductInput.value = counter;
                                    var cell1 = newRow.insertCell(0);
                                    var cell2 = newRow.insertCell(1);
                                    var cell3 = newRow.insertCell(2);
                                    var cell4 = newRow.insertCell(3);
                                    var cell5 = newRow.insertCell(4);
                                    var cell6 = newRow.insertCell(5);
                                    var cell7 = newRow.insertCell(6);
                                    var cell8 = newRow.insertCell(7);
                                    var cell9 = newRow.insertCell(8);
                                    var cell10 = newRow.insertCell(9);
                                    var cell11 = newRow.insertCell(10);
                                    var cell12 = newRow.insertCell(11);
                                    var cell13 = newRow.insertCell(12);
                                    var cell14 = newRow.insertCell(13);
                                    var cell15 = newRow.insertCell(14);
                                    var cell16 = newRow.insertCell(15);
                                    var cell17 = newRow.insertCell(16);
                                    var cell18 = newRow.insertCell(17);

                                    var namesInput = document.createElement("input");
                                    namesInput.type = "hidden";
                                    namesInput.name = "names[]";
                                    namesInput.value = counter;
                                    cell14.appendChild(namesInput);
                                    // start Category
                                    // create element select product category 
                                    var selectElement = document.createElement("select");
                                    selectElement.id = "pcategory" + counter;
                                    selectElement.className = "form-control";
                                    selectElement.name = "account[]";
                                    console.log(selectElement);
                                    // Add a default option Element of Category
                                    var defaultOption = document.createElement("option");
                                    defaultOption.text = "Select";
                                    selectElement.add(defaultOption);
                                    // Add options from PHP array for category
                                    //here fetching all records
                                    for (var i = 0; i < pcategoryData.length; i++) {
                                        var category = pcategoryData[i];
                                        var option = document.createElement("option");
                                        option.value = category.id;
                                        option.text = "id| " + category.id + " | Product Category | " + category.product_category;
                                        selectElement.add(option);
                                    }
                                    // End
                                    // start Sub Category
                                    // create element select sub category category
                                    var subcategory = document.createElement("select");
                                    subcategory.id = "subcategory" + counter;
                                    subcategory.className = "form-control";
                                    subcategory.name = "subcategory[]";
                                    // Add a default option Element of Category
                                    var defaultOption = document.createElement("option");
                                    defaultOption.text = "Select";
                                    subcategory.add(defaultOption);
                                    // Add options from PHP array for category

                                    // End
                                    // Start Product
                                    // create element select Product
                                    var selectproduct = document.createElement("select");
                                    selectproduct.id = "product" + counter;
                                    selectproduct.className = "form-control";
                                    selectproduct.name = "product[]";
                                    var productname = selectproduct.name;
                                    // Select option Element of product
                                    var defaultOption1 = document.createElement("option");
                                    defaultOption1.value = "product";
                                    defaultOption1.text = "Select";
                                    selectproduct.add(defaultOption1);
                                    // Data fetch from product 

                                    // END
                                    // Start brand
                                    // create element select Brand
                                    var selectbrand = document.createElement("select");
                                    selectbrand.id = "brand" + counter;
                                    selectbrand.className = "form-control";
                                    selectbrand.name = "brand[]";
                                    var brandname = selectbrand.name;
                                    // Select option Element of brand
                                    var defaultOption1 = document.createElement("option");
                                    defaultOption1.value = "brand";
                                    defaultOption1.text = "Select";
                                    selectbrand.add(defaultOption1);
                                    // data fetch from json and print in drop down selection

                                    // END
                                    // Append the select element to the cell
                                    cell1.innerHTML = counter;
                                    // This cell2.appendChild is use for add option selected value in category
                                    cell2.appendChild(selectElement);
                                    cell3.appendChild(subcategory);
                                    cell4.appendChild(selectbrand);
                                    cell5.appendChild(selectproduct);
                                    cell6.innerHTML =
                                        '<input type="text" class="form-control debit" placeholder="Product description" name="p_description[]' +
                                        table.rows
                                        .length + '">';
                                    cell7.innerHTML = '<input type="text" class="form-control debit" placeholder="UOM" name="UOM[]' + table.rows
                                        .length + '">';
                                    cell7.appendChild(namesInput);
                                    cell8.innerHTML =
                                        '---';
                                    var input = document.createElement("input");
                                    input.type = "text";
                                    input.className = "form-control debit";
                                    input.placeholder = "Quality Required";
                                    input.name = "qty_required[]" + counter;
                                    input.addEventListener("input", function() {
                                        // Update total quantity
                                        updateTotalQuantity();
                                    });
                                    cell9.appendChild(input);
                                    // Update total quantity initially
                                    cell9.appendChild(input);
                                    cell10.innerHTML =
                                        '<input type="number" class="form-control debit" placeholder="last Purchase" name="last_purchase' + table
                                        .rows.length + '">';
                                    cell11.innerHTML = '<span>---</span>';
                                    cell12.innerHTML = '<span>---</span>';
                                    cell13.innerHTML =
                                        '<input type="number" class="form-control credit" placeholder="0.00" name="minstock[]" id="minstock' + table
                                        .rows.length + '">';
                                    cell13.appendChild(namesInput);
                                    cell14.innerHTML =
                                        '<input type="number" class="form-control credit" placeholder="0.00" name="maxstock[]"id="maxstock' + table
                                        .rows.length + '">';
                                    cell14.appendChild(namesInput);
                                    cell15.innerHTML = ' <button type="button" class="btn btn-primary" onclick="addRow()">+</button>';
                                    cell16.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow()">-</button>';
                                    cell17.innerHTML =
                                        '<button type="button" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></button>';
                                    cell18.innerHTML = '<button type="button" class="btn  btn-warning" >.</button>';
                                    bindProductChangeEvent(counter);
                                    bindProductChangeCategoryEvent(counter);
                                    updateTotalQuantity();
                                    // declare for dynamic addrow dropdown selection of product category -> sub category 
                                    bindProductChangeCategoryEvent(counter);
                                    // declare for dynamic addrow dropdown selection of product sub category -> Brand Selection 
                                    bindsubcategoryChangebrandselectionEvent(counter);
                                    // declare for dynamic addrow dropdown selection of brand selction -> product 
                                    bindbrandChangeproductEvent(counter);
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

                                $.noConflict();
                                jQuery(document).ready(function($) {
                                    jQuery('#productdata').change(function() {
                                        var productId = $(this).val();
                                        // Make an AJAX request to get UOM data
                                        $.ajax({
                                            url: '/get-uom/' + productId,
                                            type: 'GET',
                                            success: function(data) {
                                                var uomInput = $('input[name="UOM"]');
                                                uomInput.val(data.uom);

                                                var minstock = $('input[id="minstock"]');
                                                minstock.val(data.minqty);

                                                var maxstock = $('input[id="maxstock"]');
                                                maxstock.val(data.maxqty);
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(error);
                                            }
                                        });
                                    });
                                    $('#category').change(function() {
                                        var prodcategy_id = $(this).val();
                                        console.log(prodcategy_id);
                                        // Make an AJAX request to get UOM data
                                        $.ajax({
                                            url: '/get-category/' + prodcategy_id,
                                            type: 'GET',
                                            success: function(data) {
                                                var firstcategory = $('input[name="firstcategory"]');
                                                firstcategory.val(data.firstcategory);
                                            },
                                            error: function(xhr, status, error) {
                                                console.error(error);
                                            }
                                        });
                                    });
                                    // this ajax is use for when use click on option of product category related to id filter data in get brand select by Abrar
                                    // Function to populate Sub Category dropdown based on Product Category selection
                                    // counter
                                    $('#pc_data').change(function() {
                                        var pc_id = $(this).val();
                                        $.ajax({
                                            url: '/getsubcategory/' + pc_id,
                                            type: 'GET',
                                            success: function(response) {
                                                $('#subcategory').empty();
                                                $('#subcategory').append(
                                                    '<option value="None" id="chnagefont">Select</option>');
                                                $.each(response, function(index, psubc) {
                                                    $('#subcategory').append('<option value="' + psubc.id +
                                                        '">id| ' + psubc.id + ' | Sub Category | ' + psubc
                                                        .product1stsbctgry + '</option>');
                                                });
                                            }
                                        });
                                    });

                                    // Function to populate Brand Selection dropdown based on Sub Category selection
                                    $('#subcategory').change(function() {
                                        var psubc_id = $(this).val();
                                        $.ajax({
                                            url: '/getbrand/' + psubc_id,
                                            type: 'GET',
                                            success: function(response) {
                                                $('#brandselection').empty();
                                                $('#brandselection').append(
                                                    '<option value="brand" id="chnagefont">Select</option>');
                                                $.each(response, function(index, brand) {
                                                    $('#brandselection').append(
                                                        '<option id="chnagefont" value="' + brand.id +
                                                        '">id | ' + brand.id + ' | Brand Selection | ' +
                                                        brand.brand_selection + '</option>');
                                                });
                                            }
                                        });
                                    });
                                    // Function to populate Product dropdown based on Brand Selection
                                    $('#brandselection').change(function() {
                                        var p_id = $(this).val();
                                        $.ajax({
                                            url: '/getproductdata/' + p_id,
                                            type: 'GET',
                                            success: function(response) {
                                                $('#productdata').empty();
                                                $('#productdata').append(
                                                    '<option value="product" id="">Select</option>'
                                                )
                                                $.each(response, function(index, product) {
                                                    $('#productdata').append(
                                                        '<option id="chnagefont" value="' + product.id +
                                                        '">id | ' + product.id + ' | Brand Selection | ' +
                                                        product.name + '</option>'
                                                    )
                                                })
                                            }
                                        })
                                    })

                                });
                                // this function declare in addRow this is for dynamic when user click dropdown on product category base selection option dropdown show option dropdown in sub category
                                function bindProductChangeCategoryEvent(counter) {
                                    jQuery('#pcategory' + counter).change(function() {
                                        var pc_id = $(this).val();
                                        $.ajax({
                                            url: '/getsubcategory/' + pc_id,
                                            type: 'GET',
                                            success: function(response) {
                                                $('#subcategory' + counter).empty();
                                                $('#subcategory' + counter).append(
                                                    '<option value="None" id="chnagefont">Select</option>');
                                                $.each(response, function(index, psubc) {
                                                    $('#subcategory' + counter).append('<option value="' + psubc.id +
                                                        '">id| ' + psubc.id + ' | Sub Category | ' + psubc
                                                        .product1stsbctgry + '</option>');
                                                });
                                            }
                                        });
                                    });
                                }
                                // this function declare in addRow this is for dynamic when user click dropdown on product sub category base on brand selection option dropdown show option dropdown in brand selection
                                function bindsubcategoryChangebrandselectionEvent(counter) {
                                    jQuery('#subcategory' + counter).change(function() {
                                        var psubc_id = $(this).val();
                                        $.ajax({
                                            url: '/getbrand/' + psubc_id,
                                            type: 'GET',
                                            success: function(response) {
                                                $('#brand' + counter).empty();
                                                $('#brand' + counter).append(
                                                    '<option value="None" id="chnagefont">Select</option>');
                                                $.each(response, function(index, brand) {
                                                    $('#brand' + counter).append('<option id="chnagefont" value="' +
                                                        brand.id +
                                                        '">id | ' + brand.id + ' | Brand Selection | ' +
                                                        brand.brand_selection + '</option>');
                                                });
                                            }
                                        });
                                    });
                                }

                                // this function declare in addRow this is for dynamic when user click dropdown on brand selection base on brand selection option dropdown show option dropdown in product dropdown
                                function bindbrandChangeproductEvent(counter) {
                                    jQuery('#brand' + counter).change(function() {
                                        var p_id = $(this).val();
                                        $.ajax({
                                            url: '/getproductdata/' + p_id,
                                            type: 'GET',
                                            success: function(response) {
                                                $('#product' + counter).empty();
                                                $('#product' + counter).append(
                                                    '<option value="None" id="chnagefont">Select</option>');
                                                $.each(response, function(index, product) {
                                                    $('#product' + counter).append('<option id="chnagefont" value="' +
                                                        product.id +
                                                        '">id | ' + product.id + ' | Product Name | ' +
                                                        product.name + '</option>');
                                                });
                                            }
                                        });
                                    });
                                }

                                function bindProductChangeEvent(counter) {
                                    jQuery(document).ready(function($) {
                                        $(document).on('change', "#product" + counter, function() {
                                            var productId = $(this).val();
                                            console.log("skdf")
                                            $.ajax({
                                                url: '/get-uom/' + productId,
                                                type: 'GET',
                                                dataType: 'json',
                                                success: function(data) {
                                                    var uomInput = $('input[name="UOM' + counter + '"]');
                                                    let minstock = $('input[id="minstock' + counter + '"]');
                                                    let maxstock = $('input[id="maxstock' + counter + '"]');
                                                    uomInput.val(data.uom);
                                                    minstock.val(data.minqty);
                                                    maxstock.val(data.maxqty);
                                                },
                                                error: function(xhr, status, error) {
                                                    console.error(error);
                                                }
                                            });
                                        });
                                    });
                                }

                                // function bindProductChangeCategoryEvent(counter) {
                                //     jQuery(document).ready(function($) {
                                //         $(document).on('change', "#pcategory" + counter, function() {
                                //             var prodcategy_id = $(this).val();
                                //             console.log("skdf")
                                //             $.ajax({
                                //                 url: '/get-category/' + prodcategy_id,
                                //                 type: 'GET',
                                //                 dataType: 'json',
                                //                 success: function(data) {
                                //                     var firstcategory = $('input[name="subcategory' + counter + '"]');
                                //                     firstcategory.val(data.firstcategory);
                                //                 },
                                //                 error: function(xhr, status, error) {
                                //                     console.error(error);
                                //                 }
                                //             });
                                //         });

                                //     });
                                // }
                            </script>
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
                        alert("No ids selected. Please select at least one id.");
                        return;
                    }
                    else if(documentstatus_id == "2"){
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
                    }
                    else if(documentstatus_id == "3"){

                    }
                    else if(documentstatus_id == "4"){
                        alert("Alredy Approved");
                        return;
                    }
                    else {

                    }
                });
                $(document).on('click', '.openModalBtn', function() {
                    modelactioncommon()
                })
                jQuery('#doucmentstatus_id').change(function() {
                    var selectedId = $(this).val();
                    jQuery.ajax({
                        url: '/Pr/approvaldatapurchaserequsition',
                        type: "GET",
                        data: {
                            doucmentstatus_id: selectedId // Correct parameter name
                        },
                        success: function(response) {
                            console.log(response); // Check the response data
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
