@extends('layout.master')
@section('page-tab')
    Create Purchase Requisition
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
            <h1>Create Purchase Requisition</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Purchase Requisition</a></li>
                </ol>
            </nav>
        </div>





        <style>
            .wrapper {
                margin: 0px 100px 0px 100px
            }

            #prdetail {
                border: 1px solid black;
                padding: 1%;
            }

            .innercontainer {
                text-align: center;
            }
        </style>
        <br><br><br>
        <form action="{{ route('purchaserequisition.store') }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <strong>PR Doc#</strong>
                        <input type="text" class="form-control" value={{ $pr }} id="prdocnumber"
                            name="prdoc_no" placeholder="PR Doc#" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <strong for="attachment">Doc Ref No</strong>
                        <input type="text" class="form-control" id="doc_ref_no" name="doc_ref_no"
                            placeholder="Doc Ref No">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="journalDate">Document Creation Date</label>
                        <input type="text" class="form-control" disabled id="documentdate" name="documentdate"
                            value="" readonly>
                    </div>
                    <div class="col-md-6 form-group">
                        <strong>Mode Type</strong>
                        <select name="mt_id" id="mode_type" class="form-control">
                            <option value="None">Select Mode Type</option>
                            @foreach ($modetype as $item)
                                <option value={{ $item->mt_id }}>{{ $item->modetype_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <strong>Department</strong>
                        <select name="depart_id" id="mode_type" class="form-control">
                            <option value="department">Select Department</option>
                            @foreach ($deaprtment as $depart)
                                <option value={{ $depart->id }}>{{ $depart->department }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <strong>Required Date</strong>
                        <input type="date" class="form-control" id="date_picker" name="date_picker" placeholder="Date">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <strong>Employe</strong>
                        <select name="emp_id" id="employe" class="form-control">
                            <option value="employe">Select Employe</option>
                            @foreach ($employee as $employ)
                                <option value={{ $employ->id }}>{{ $employ->employee_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 form-group">
                        <strong>Attachment</strong>
                        <input type="file" class="form-control" id="required_date" name="filename" placeholder="Date">
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
            {{-- Contetn for Grid Here --}}
            <div style="border: 1px solid rgb(20, 19, 19); margin-top:10px;margin-bottom:10px;padding:0px 10px 0px 10px">
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
                    <tbody id="tableBody">
                        <tr>
                            <td>1</td>
                            <td>
                                <select name="category" id="category" class="form-control">
                                    <option value="category" id="chnagefont">Select</option>
                                    @foreach ($pcategory as $category)
                                        <option onclick="categoryData()" id="chnagefont" value="{{ $category->id }}">
                                            id{{ $category->id }} | Product Category Name|
                                            {{ $category->product_category }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="firstcategory" id="subcategory" class="form-control">
                                    <option value="None" id="chnagefont">Select</option>
                                    @foreach ($subcategory as $item)
                                        <option id="chnagefont" value={{ $item->id }}>
                                            id | {{ $item->id }} | Sub_Category_Name | {{ $item->product1stsbctgry }}
                                        </option>
                                    @endforeach
                                </select>

                            </td>
                            <td> <select name="brand_id" id="category" class="form-control">
                                    <option value="brand" id="chnagefont">Select</option>
                                    @foreach ($brand as $b)
                                        <option id="chnagefont" value={{ $b->id }}>id | {{ $b->id }} |
                                            Brand Selection | {{ $b->brand_selection }}
                                        </option>
                                    @endforeach
                                </select></td>
                            <td> <select name="product_d" id="product" class="form-control">
                                    <option id="chnagefont" value="product">Select</option>
                                    @foreach ($product as $p)
                                        <option onclick="datafetch()" id="chnagefont" value={{ $p->id }}>
                                            id| {{ $p->id }}| Product Name | {{ $p->name }}</option>
                                    @endforeach
                                </select></td>
                            <td><input type="text" class="form-control credit" value=""
                                    placeholder="product Remarks" name="pd"></td>
                            <td>
                                <span>UOM</span>
                                <input type="hidden" class="form-control credit" value="" placeholder="UOM"
                                    name="UOM">
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

                            <td><input type="number" class="form-control debit" placeholder="0.00" name="minstock"
                                    required>
                            </td>
                            <td><input type="number" class="form-control debit" placeholder="0.00" name="maxstock"
                                    required>
                            </td>
                            <td> <!-- Add More Rows Button -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" onclick="addRow()">+</button>
                                    </div>
                                </div>
                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" onclick="refreshtext()">
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
                // function declare for refresh test for first row
                function refreshtext() {
                    // Reset the dropdown selections to their default values
                    document.getElementById('category').selectedIndex = 0;
                    document.getElementById('product').selectedIndex = 0;
                    document.getElementById('brand_id').selectedIndex = 0;

                    // Clear the input field values
                    document.getElementsByName('firstcategory')[0].value = '';
                    document.getElementsByName('pd')[0].value = '';
                    document.getElementsByName('qty_required')[0].value = '';
                    document.getElementsByName('lastpurchase')[0].value = '';
                    document.getElementsByName('minstock')[0].value = '';
                    document.getElementsByName('maxstock')[0].value = '';
                }
                // no of product 
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

                function addRow() {
                    var table = document.getElementById("tableBody");
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
                    // create element select category
                    var selectElement = document.createElement("select");
                    selectElement.id = "pcategory" + counter;
                    selectElement.className = "form-control";
                    selectElement.name = "account" + table.rows.length;
                    console.log(selectElement);
                    // Add a default option Element of Category
                    var defaultOption = document.createElement("option");
                    defaultOption.text = "Select";
                    selectElement.add(defaultOption);

                    // Add options from PHP array for category
                    @foreach ($pcategory as $category)
                        var option = document.createElement("option");
                        option.value = "{{ $category->id }}";
                        option.text = "id| {{ $category->id }} | Product Category | {{ $category->product_category }}";
                        selectElement.add(option);
                    @endforeach
                    // End
                    // start Sub Category
                    // create element select sub category category
                    var subcategory = document.createElement("select");
                    subcategory.id = "subcategory" + counter;
                    subcategory.className = "form-control";
                    subcategory.name = "subcategory" + table.rows.length;
                    // Add a default option Element of Category
                    var defaultOption = document.createElement("option");
                    defaultOption.text = "Select";
                    subcategory.add(defaultOption);
                    // Add options from PHP array for category
                    @foreach ($subcategory as $subcategory)
                        var option = document.createElement("option");
                        option.value = "{{ $subcategory->id }}";
                        option.text = " id | {{ $subcategory->id }}| SubCategoryname|{{ $subcategory->product1stsbctgry }}";
                        subcategory.add(option);
                    @endforeach
                    // End
                    // Start Product
                    // create element select Product
                    var selectproduct = document.createElement("select");
                    selectproduct.id = "product" + counter;
                    selectproduct.className = "form-control";
                    selectproduct.name = "account" + counter;
                    var productname = selectproduct.name;

                    // Select option Element of product
                    var defaultOption1 = document.createElement("option");
                    defaultOption1.value = "product";
                    defaultOption1.text = "Select";
                    selectproduct.add(defaultOption1);

                    // Data fetch from product 
                    @foreach ($product as $p)
                        var option = document.createElement("option");
                        option.value = "{{ $p->id }}";
                        option.text = "id|{{ $p->id }} | productName | {{ $p->name }}";
                        selectproduct.add(option);
                    @endforeach
                    // END
                    console.log(selectproduct);
                    // Start Brand
                    // create element select Brand
                    var selectbrand = document.createElement("select");
                    selectbrand.className = "form-control";
                    selectbrand.name = "brand";
                    // Select option Element of product
                    var defaultOption2 = document.createElement("option");
                    defaultOption2.value = "Brand";
                    defaultOption2.text = "Select";
                    selectbrand.add(defaultOption2);
                    // Data fetch from product 
                    @foreach ($brand as $b)
                        var option = document.createElement("option");
                        option.value = "{{ $b->id }}";
                        option.text = "id|{{ $b->id }}| Brand Selection| {{ $b->brand_selection }}";
                        selectbrand.add(option);
                    @endforeach
                    // END

                    // Append the select element to the cell
                    cell1.innerHTML = counter;
                    // This cell2.appendChild is use for add option selected value in category
                    cell2.appendChild(selectElement);
                    // cell3.appendChild(selectElement);
                    cell3.appendChild(subcategory);
                    cell3.appendChild(namesInput);
                    cell4.appendChild(selectbrand);
                    // Append the select element 
                    cell5.appendChild(selectproduct);
                    cell6.innerHTML = '<input type="text" class="form-control debit" placeholder="description" name="Remarks' +
                        table.rows
                        .length + '">';
                    cell7.innerHTML = '<input type="hidden" class="form-control debit" placeholder="UOM" name="UOM' + table.rows
                        .length + '">';
                    cell7.innerHTML = '<span>UOM</span>';
                    cell7.appendChild(namesInput);
                    cell8.innerHTML =
                        '---';
                    var input = document.createElement("input");
                    input.type = "text";
                    input.className = "form-control debit";
                    input.placeholder = "Quality Required";
                    input.name = "qty_required" + counter;
                    input.addEventListener("input", function() {
                        // Update total quantity
                        updateTotalQuantity();
                    });
                    cell9.appendChild(input);
                    // Update total quantity initially
                    cell9.appendChild(input);
                    cell10.innerHTML =
                        '<input type="number" class="form-control debit" placeholder="last Purchase" name="last_purchase' + table
                        .rows
                        .length + '">';
                    cell11.innerHTML = '<span>---</span>';
                    cell12.innerHTML = '<span>---</span>';
                    cell13.innerHTML = '<input type="number" class="form-control credit" placeholder="0.00" name="minstock' + table
                        .rows.length + '">';
                    cell13.appendChild(namesInput);
                    cell14.innerHTML = '<input type="number" class="form-control credit" placeholder="0.00" name="maxstock' + table
                        .rows.length + '">';
                    cell14.appendChild(namesInput);
                    cell15.innerHTML = ' <button type="button" class="btn btn-primary" onclick="addRow()">+</button>';
                    cell16.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow()">-</button>';
                    cell17.innerHTML =
                        '<button type="button" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i></button>';
                    cell18.innerHTML = '<button type="button" class="btn  btn-warning" >.</button>';

                    var formData = $('#form').serialize();
                    console.log(formData);
                    jQuery.ajax({
                        url: '/save-data',
                        method: 'POST',
                        data: formData,
                        success: function(response) {

                            console.log(response);
                        },
                        error: function(xhr, status, error) {

                            console.error(error);
                        }
                    });
                    bindProductChangeEvent(counter);
                    bindProductChangeCategoryEvent(counter);
                    updateTotalQuantity();
                }

                function updateTotalQuantity() {
                    var totalQuantity = gettvalueok;
                    var table = document.getElementById("tableBody");
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

                function removeRow() {
                    var totalproductInput = document.getElementById("totalnoproductInput");
                    var table = document.getElementById("tableBody");
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
                    var table = document.getElementById("tableBody");
                    if (table.rows.length > 1) {
                        table.deleteRow(table.rows.length - 1)
                    } else {
                        alert("No Rows to Remove");
                    }
                }
                // Function to update totals
                function updateTotals() {
                    var debitTotal = 0;
                    var creditTotal = 0;

                    // Loop through rows with class 'debit' and 'credit'
                    document.querySelectorAll('.debit').forEach(function(element) {
                        debitTotal += parseFloat(element.value) || 0;
                    });

                    document.querySelectorAll('.credit').forEach(function(element) {
                        creditTotal += parseFloat(element.value) || 0;
                    });

                    // Update total row
                    document.getElementById('debitTotal').textContent = debitTotal.toFixed(2);
                    document.getElementById('creditTotal').textContent = creditTotal.toFixed(2);

                    document.getElementById('totalDebit').value = debitTotal.toFixed(2);
                    document.getElementById('totalCredit').value = creditTotal.toFixed(2);

                }
                $.noConflict();
                jQuery(document).ready(function($) {
                    $('#product').change(function() {
                        var productId = $(this).val();
                        // Make an AJAX request to get UOM data
                        $.ajax({
                            url: '/get-uom/' + productId,
                            type: 'GET',
                            success: function(data) {
                                console.log(data);
                                var uomInput = $('input[name="UOM"]');
                                uomInput.val(data.uom);

                                var minstock = $('input[name="minstock"]');
                                minstock.val(data.minqty);

                                var maxstock = $('input[name="maxstock"]');
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

                });

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
                                    let minstock = $('input[name="minstock' + counter + '"]');
                                    let maxstock = $('input[name="maxstock' + counter + '"]');
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

                function bindProductChangeCategoryEvent(counter) {
                    jQuery(document).ready(function($) {
                        $(document).on('change', "#pcategory" + counter, function() {
                            var prodcategy_id = $(this).val();
                            console.log("skdf")
                            $.ajax({
                                url: '/get-category/' + prodcategy_id,
                                type: 'GET',
                                dataType: 'json',
                                success: function(data) {
                                    var firstcategory = $('input[name="subcategory' + counter + '"]');
                                    firstcategory.val(data.firstcategory);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        });

                    });
                }
            </script>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        <script>
            // Get the current UTC time
            var utcTime = new Date();

            // Calculate the time difference for Pakistan Standard Time (UTC+5)
            var pstOffset = 5 * 60 * 60 * 1000; // 5 hours in milliseconds

            // Calculate the Pakistan Standard Time by adding the offset
            var pstTime = new Date(utcTime.getTime() + pstOffset);

            // Format the date components
            var year = pstTime.getUTCFullYear();
            var month = ('0' + (pstTime.getUTCMonth() + 1)).slice(-2);
            var day = ('0' + pstTime.getUTCDate()).slice(-2);

            // Create a string in the format 'YYYY-MM-DD HH:mm:ss'
            var formattedDate = year + '-' + month + '-' + day;
            var pakisatndate = document.getElementById('documentdate');
            pakisatndate.value = formattedDate;
        </script>

    </section>

@endsection
