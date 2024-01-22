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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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

        /* .{
                                                        font-size: 2rem !important;
                                                    } */
    </style>
    <br><br><br>
    <form action="{{ route('bank.store') }}" method="POST">
        @csrf
        <div class="wrapper">
            <div class="row">
                <div class="col-md-6 form-group">
                    <strong>PR Doc#</strong>
                    <input type="text" class="form-control" id="prdocnumber" name="prdoc_no" placeholder="PR Doc#">
                </div>
                <div class="col-md-6 form-group">
                    <strong for="attachment">Doc Ref No</strong>
                    <input type="text" class="form-control" id="doc_ref_no" name="doc_ref_no" placeholder="Doc Ref No">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <strong>Date</strong>
                    <input type="text" class="form-control" id="prdocnumber" name="pak_standard"
                        placeholder="Pakistan Standard time">
                </div>
                <div class="col-md-6 form-group">
                    <strong>Mode Type</strong>
                    <select name="mode_type" id="mode_type" class="form-control">
                        <option value="modetype">Select Mode Type</option>
                        <option value="select">Urgent</option>
                        <option value="select">Most Urgent</option>
                        <option value="select">Normal</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <strong>Department</strong>
                    <select name="department" id="mode_type" class="form-control">
                        <option value="department">Select Department</option>
                        @foreach ($deaprtment as $depart)
                        <option value={{ $depart->id }}>{{ $depart->department }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <strong>Required Date</strong>
                    <input type="date" class="form-control" id="required_date" name="required_date" placeholder="Date">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <strong>Employe</strong>
                    <select name="employe" id="employe" class="form-control">
                        <option value="employe">Select Employe</option>
                        @foreach ($employee as $employ)
                        <option value={{ $employ->branch_id }}>{{ $employ->employee_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <strong>Attachment</strong>
                    <input type="file" class="form-control" id="required_date" name="required_date" placeholder="Date">
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
        </div>
        {{-- Contetn for Grid Here --}}
        <table class="table mt-3 border" id="tabledate">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Product_Ctgy</th>
                    <th>Sub_Category</th>
                    <th>Brand </th>
                    <th>Productr/Item</th>
                    <th>UOM</th>
                    <th>Current Stock</th>
                    <th>Qty Required</th>
                    <th>Last Purchase</th>
                    <th>Min Stock</th>
                    <th>Max Stock</th>
                    <th>History</th>
                    <th>Add</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td>1</td>
                    <td>
                        <select name="category" id="category" class="form-control">
                            <option value="category" id="chnagefont">Select</option>
                            @foreach ($pcategory as $category)
                            <option id="chnagefont" value={{ $category->id }}>{{ $category->product_category }}
                            </option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="number" class="form-control debit" placeholder="Sub-Category" name="debit1"></td>
                    <td> <select name="brand_id" id="category" class="form-control">
                            <option value="brand" id="chnagefont">Select</option>
                            @foreach ($brand as $b)
                            <option id="chnagefont" value={{ $b->id }}>{{ $b->brand_selection }}</option>
                            @endforeach
                        </select></td>
                    <td> <select name="product_d" id="product" class="form-control">
                            <option id="chnagefont" value="product">Select</option>
                            @foreach ($product as $p)
                            <option id="chnagefont" value={{ $p->id }}>{{ $p->name }}</option>
                            @endforeach
                        </select></td>
                    <td><input type="text" class="form-control credit" value="" placeholder="UOM" name="UOM"></td>
                    <td><input type="text" class="form-control" placeholder="Current Stock" name="memo1">
                    </td>
                    <td><input type="text" class="form-control debit" placeholder="Qty Required" name="qty_required">
                    </td>
                    <td><input type="number" class="form-control debit" placeholder="0.00" name="lastpurchase">
                    </td>
                    <td><input type="number" class="form-control debit" placeholder="0.00" name="minstock"></td>
                    <td><input type="number" class="form-control debit" placeholder="0.00" name="maxstock"></td>
                    <td><input type="number" class="form-control debit" placeholder="0.00" name="debit5"></td>
                    <td>
                        <!-- Add More Rows Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" onclick="addRow()">Add</button>
                            </div>
                        </div>
                    </td>
                    <td>

                    </td>
                </tr>
            </tbody>
        </table>

        <script>
            $.noConflict();
                   jQuery(document).ready(function($) {
                       $('#product').change(function() {
                           var productId = $(this).val();
                           // Make an AJAX request to get UOM data
                           $.ajax({
                               url: '/get-uom/' + productId,
                               type: 'GET',
                               success: function(data) {
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
                   });

                   function addRow() {
                    var table = document.getElementById("tableBody");
                    var counter = table.rows.length + 1;

                    var newRow = table.insertRow(table.rows.length);
                    var cells = [];

                    for (var i = 0; i < 14; i++) {
                        cells[i] = newRow.insertCell(i);
                    }

                    cells[0].innerHTML = counter;
                    cells[1].innerHTML = '<select name="category' + counter + '" class="form-control">' +
                        '<option value="category">Select</option>' +
                        '@foreach ($pcategory as $category)' +
                        '<option value="{{ $category->id }}">{{ $category->product_category }}</option>' +
                        '@endforeach' +
                        '</select>';
                    cells[2].innerHTML = '<input type="number" class="form-control debit" placeholder="Sub-Category" name="debit' + counter + '">';
                    cells[3].innerHTML = '<select name="brand_id' + counter + '" class="form-control">' +
                        '<option value="brand">Select</option>' +
                        '@foreach ($brand as $b)' +
                        '<option value="{{ $b->id }}">{{ $b->brand_selection }}</option>' +
                        '@endforeach' +
                        '</select>';
                    cells[4].innerHTML = '<select name="product_d' + counter + '" class="form-control">' +
                        '<option value="product">Select</option>' +
                        '@foreach ($product as $p)' +
                        '<option value="{{ $p->id }}">{{ $p->name }}</option>' +
                        '@endforeach' +
                        '</select>';
                     cells[5].innerHTML = '<input type="text" class="form-control credit" value="" placeholder="UOM" name="UOM' + counter + '">';
                    cells[6].innerHTML = '<input type="text" class="form-control" placeholder="Current Stock" name="memo' + counter + '">';
                    cells[7].innerHTML = '<input type="text" class="form-control debit" placeholder="Qty Required" name="qty_required' + counter + '">';
                    cells[8].innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="lastpurchase' + counter + '">';
                    cells[9].innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="minstock' + counter + '">';
                    cells[10].innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="maxstock' + counter + '">';
                    cells[11].innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="debit5' + counter + '">';
                    cells[12].innerHTML = '<button type="button" class="btn btn-primary" onclick="addRow()">Add</button>';
                    cells[13].innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>';

                    // Event listener for product change
                    jQuery(document).on('change', 'select[name^="product_d"]', function() {
                            var productId = jQuery(this).val();
                            var counter = jQuery(this).attr('name').replace('product_d', '');
                            handleProductChange(jQuery(this), counter, productId);
                        });

                        // Function to handle both the event listener and product change event
                        function handleProductChange(selectElement, counter, productId) {
                            // Common functionality for both event listener and product change event

                            jQuery.ajax({
                                url: '/get-uom/' + productId,
                                type: 'GET',
                                success: function(data) {
                                    var uomInput = jQuery('input[name="UOM' + counter + '"]');
                                    uomInput.val(data.uom);
                                },
                                error: function(xhr, status, error) {
                                    console.error(error);
                                }
                            });
                        }
                    }

                function removeRow(button) {
                    var table = document.getElementById("tableBody");
                    var rowIndex = button.closest('tr').rowIndex;
                    table.deleteRow(rowIndex);
                }
                //    function addRow(counter) {
                //        var table = document.getElementById("tableBody");
                //        var newRow = table.insertRow(table.rows.length);
                //        var counter = table.rows.length;
                //        var cell1 = newRow.insertCell(0);
                //        var cell2 = newRow.insertCell(1);
                //        var cell3 = newRow.insertCell(2);
                //        var cell4 = newRow.insertCell(3);
                //        var cell5 = newRow.insertCell(4);
                //        var cell6 = newRow.insertCell(5);
                //        var cell7 = newRow.insertCell(6);
                //        var cell8 = newRow.insertCell(7);
                //        var cell9 = newRow.insertCell(8);
                //        var cell10 = newRow.insertCell(9);
                //        var cell11 = newRow.insertCell(10);
                //        var cell12 = newRow.insertCell(11);
                //        var cell13 = newRow.insertCell(12);
                //        var cell14 = newRow.insertCell(13);


                //        // start Category
                //        // create element select category
                //        var selectElement = document.createElement("select");
                //        selectElement.className = "form-control";
                //        selectElement.name = "account" + table.rows.length;
                //        // Add a default option Element of Category
                //        var defaultOption = document.createElement("option");
                //        defaultOption.text = "Select";
                //        selectElement.add(defaultOption);

                //        // Add options from PHP array for category
                //        @foreach ($pcategory as $category)
                //            var option = document.createElement("option");
                //            option.value = "{{ $category->id }}";
                //            option.text = "{{ $category->product_category }}";
                //            selectElement.add(option);
                //        @endforeach
                //        // End
                //        // Start Product
                //        // create element select Product


                //        var selectproduct = document.createElement("select");
                //        selectproduct.id = "product" + counter;
                //        selectproduct.className = "form-control";
                //        selectproduct.name = "account" + counter;
                //        var productname = selectproduct.name;
                //        // Select option Element of product
                //        var defaultOption1 = document.createElement("option");
                //        defaultOption1.value = "product";
                //        defaultOption1.text = "Select";
                //        selectproduct.add(defaultOption1);

                //        // Data fetch from product
                //        @foreach ($product as $p)
                //            var option = document.createElement("option");
                //            option.value = "{{ $p->id }}";
                //            option.text = "{{ $p->name }}";
                //            selectproduct.add(option);
                //        @endforeach
                //        // END

                //        // Start Brand
                //        // create element select Brand
                //        var selectbrand = document.createElement("select");
                //        selectbrand.className = "form-control";
                //        selectbrand.name = "brand";
                //        // Select option Element of product
                //        var defaultOption2 = document.createElement("option");
                //        defaultOption2.value = "Brand";
                //        defaultOption2.text = "Select";
                //        selectbrand.add(defaultOption2);
                //        // Data fetch from product
                //        @foreach ($brand as $b)
                //            var option = document.createElement("option");
                //            option.value = "{{ $b->id }}";
                //            option.text = "{{ $b->brand_selection }}";
                //            selectbrand.add(option);
                //        @endforeach
                //        // END
                //        cell7.innerHTML = '<input type="text" class="form-control" placeholder="Current Stock" name="memo' + counter + '">';
                //        cell8.innerHTML = '<input type="text" class="form-control debit" placeholder="Qty Required" name="qty_required' + counter + '">';
                //        cell9.innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="lastpurchase' + counter + '">';
                //        cell10.innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="minstock' + counter + '">';
                //        cell11.innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="maxstock' + counter + '">';
                //        cell12.innerHTML = '<input type="number" class="form-control debit" placeholder="0.00" name="debit5' + counter + '">';
                //        cell13.innerHTML = '<button type="button" class="btn btn-primary" onclick="addRow(' + counter + ')">Add</button>';
                //        cell14.innerHTML += '<button type="button" class="btn btn-danger" onclick="removeRow()">Remove</button>';
                //        // Append the select element to the cell
                //        cell1.innerHTML = counter;
                //        // This cell2.appendChild is use for add option selected value in category
                //        cell2.appendChild(selectElement);
                //        // cell3.appendChild(selectElement);
                //        cell3.innerHTML = '<input type="number" class="form-control debit" placeholder="Sub-Category" name="debit' +
                //            table.rows
                //            .length + '">';
                //        cell4.appendChild(selectbrand);
                //        // Append the select element to the cel
                //        cell5.appendChild(selectproduct);
                //        // Event listener for product change
                //        jQuery(document).on('change', 'select[id^="product"]', function() {
                //             var productId = jQuery(this).val();
                //             var counter = jQuery(this).attr('id').replace('product', '');
                //             handleProductChange(jQuery(this), counter, productId);
                //         });
                //        cell6.innerHTML = '<input type="text" class="form-control credit" value="" placeholder="UOM" name="UOM' + table.rows
                //            .length + '">';
                //        cell14.innerHTML = '<button type="button" class="btn btn-danger" onclick="removeRow()">Remove</button>';
                //        // Separate function to handle the product change event

                //        var productId = jQuery('#product' + counter).val();
                //        Query(document).on('change', '#product' + counter, function() {
                //            var productId = jQuery(this).val();
                //            handleProductChange(jQuery(this), counter, productId);
                //        });
                //        handleProductChange(jQuery('#product' + counter), counter);
                //        console.log("daslfkjasd");
                //        updateTotals();
                //    }

                //    function handleProductChange(selectElement, counter, productId) {
                //         jQuery.ajax({
                //             url: '/get-uom/' + productId,
                //             type: 'GET',
                //             success: function(data) {
                //                 var uomInput = jQuery('input[name="UOM' + counter + '"]');
                //                 uomInput.val(data.uom);
                //             },
                //             error: function(xhr, status, error) {
                //                 console.error(error);
                //             }
                //         });

                //         console.log("daslfkjasd");
                //         updateTotals();
                // }



                //    function removeRow() {
                //        var table = document.getElementById("tableBody");
                //        if (table.rows.length > 0) {
                //            table.deleteRow(table.rows.length - 1)
                //        } else {
                //            alert("No Rows to Remove");
                //        }
                //    }
                   // Function to update totals
                //    function updateTotals() {
                //        var debitTotal = 0;
                //        var creditTotal = 0;
                //        var rowCount = 0;

                //        // Loop through rows
                //        jQuery('tbody#tableBody tr').each(function() {
                //            var row = jQuery(this);
                //            var productId = row.find('select[name^="product_d"]').val();

                //            // Skip the first row (header)
                //            if (productId !== "product") {
                //                rowCount++;

                //                // Make an AJAX request to get UOM data
                //                jQuery.ajax({
                //                    url: '/get-uom/' + productId,
                //                    type: 'GET',
                //                    async: false,  // Make sure AJAX requests are synchronous
                //                    success: function(data) {
                //                        var debitInput = row.find('input[name^="debit5"]');
                //                        debitTotal += parseFloat(debitInput.val())
                //                        console.log("AJAX request for row " + rowCount + " completed");
                //                    },
                //                    error: function(xhr, status, error) {
                //                        console.error(error);
                //                    }
                //                });
                //            }
                //        });

                //            // Loop through rows with class 'debit' and 'credit'
                //        document.querySelectorAll('.debit').forEach(function(element) {
                //            debitTotal += parseFloat(element.value) || 0;
                //        });

                //        document.querySelectorAll('.credit').forEach(function(element) {
                //            creditTotal += parseFloat(element.value) || 0;
                //        });

                //        // Update total row
                //        document.getElementById('debitTotal').textContent = debitTotal.toFixed(2);
                //        document.getElementById('creditTotal').textContent = creditTotal.toFixed(2);

                //        document.getElementById('totalDebit').value = debitTotal.toFixed(2);
                //        document.getElementById('totalCredit').value = creditTotal.toFixed(2);

                //    }

                //    // Attach event listeners to update totals when values change
                //    document.addEventListener('input', function() {
                //        updateTotals();
                //    });
        </script>
    </form>
    </div>
    <br><br><br>
    <br>
    <br>
    <div><br> </div>

</section>

@endsection
