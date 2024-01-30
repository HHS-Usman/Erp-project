@extends('layout.master')
@section('page-tab')
    Create Quotation
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
            <h1>Create Quotation</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Quotation</a></li>
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

            .tablecalculation {
                border: 1px solid black;
                text-align: center;
            }
        </style>
        <br><br><br>
        <form action="{{ route('purchaserequisition.store') }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <strong>Document Doc#</strong>
                            <input type="text" class="form-control" value="" id="prdocnumber" name="doc_no"
                                placeholder="PR Doc#" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <strong>Branch</strong>
                            <select name="b_id" id="branch" class="form-control">
                                <option value="None">Select Branch</option>
                                @foreach ($branch as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <strong>Department</strong>
                            <select name="d_id" id="department" class="form-control">
                                <option value="None">Select Department</option>
                                @foreach ($deaprtment as $item)
                                    <option value="{{ $item->id }}">{{ $item->department }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group" style="margin-top: 20px">
                            <button type="button" class="btn btn-primary">GET PRS Data</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Contetn for Grid Here --}}
            <div style="border: 1px solid rgb(20, 19, 19); margin-top:14px;margin-bottom:10px;padding:0px 10px 0px 10px">
                <div class="row justify-content-center" style="padding-top:30px">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Select Supplier</strong>
                                <select name="s_id" id="supplier" class="form-control">
                                    <option value="None">Select Supplier</option>
                                    @foreach ($suplier as $item)
                                        <option value={{ $item->suplier_id }}>{{ $item->contactperson }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Quotation Remarks</strong>
                                <input type="text" class="form-control" value="" id="prdocnumber" name="qremarks"
                                    placeholder="Quotation Remarks">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table mt-3 border" id="tabledate">
                    <thead>
                        <tr>
                            <th>S.No#</th>
                            <th>PR_No</th>
                            <th>Product/Item</th>
                            <th>Product Wise Desciption </th>
                            <th>UOM</th>
                            <th>Qty</th>
                            <th>Last Received Date</th>
                            <th>Last Received Rate</th>
                            <th>Rate</th>
                            <th>Tax%</th>
                            <th>Tax Amount</th>
                            <th>Amount</th>
                            <th>Discount%</th>
                            <th>Discount Amount</th>
                            <th>Net Amount</th>
                            <th>Action</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" class="form-control" value="" placeholder="PR Number"
                                    name="prnumber" readonly>
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Product"
                                    name="product" readonly>
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Product Description"
                                    name="product">
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="UOM" name="UOM"
                                    readonly>
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" id="qtyproductvalue"
                                    placeholder="Qty" name="productqty">
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Laste Recived Date"
                                    name="lreceiveddate" readonly>
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Last Received Rate"
                                    name="lrr" readonly>
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Rate"
                                    name="rate">
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Tax%"
                                    name="taxper">
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Tax Amount"
                                    name="taxamount">
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Amount"
                                    name="amount" readonly>
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Discount%"
                                    name="discount">
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Discount Amount"
                                    name="discountamount">
                            </td>

                            <td>
                                <input type="text" class="form-control" value="" placeholder="Net Amount"
                                    name="netamount"readonly>
                            </td>

                            <td>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-primary" onclick="addRow()">+</button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                {{-- end table here by Abrar ul hassan --}}
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="tablecalculation">Total no of Products</td>
                                    <td class="tablecalculation" id="totalproduct">1</td>
                                    <td class="tablecalculation">Total Tax Amount</td>
                                    <td class="tablecalculation">0.00</td>
                                    <td class="tablecalculation">Gross Amount</td>
                                    <td class="tablecalculation">0.00</td>
                                    <td class="tablecalculation">Invoice Discount</td>
                                </tr>
                                <tr>
                                    <td class="tablecalculation">Total Qty of Products</td>
                                    <td class="tablecalculation" id="qtyproduct">0.00</td>
                                    <td class="tablecalculation">Total Discount amount</td>
                                    <td class="tablecalculation">0.00</td>
                                    <td class="tablecalculation">Net Amount</td>
                                    <td class="tablecalculation">0.00</td>
                                    <td class="tablecalculation">0.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
            tproduct = document.getElementById("totalproduct");
            var qtyproduct = document.getElementById("qtyproduct");
            var gettvalueqty = 0;
            document.getElementById("qtyproductvalue").addEventListener("input", function() {
                var valuegetting = document.getElementById('qtyproductvalue').value;
                gettvalueqty = parseInt(valuegetting);
            });
            // function for add new row (Abrar ul Hassan)
            function addRow() {
                var tableBody = document.getElementById("tableBody");
                var rowCount = tableBody.rows.length;
                tproduct.innerHTML = rowCount + 1;
                // declaring cell for each td for first row
                var newRow = tableBody.insertRow(rowCount);
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
                // dynamic input field and other tag for each cell 
                cell1.innerHTML = rowCount + 1;
                cell2.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="PR Number" name="prnumber" readonly>';
                cell3.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="Product" name="product" readonly>';
                cell4.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="Product Description" name="product">';
                cell5.innerHTML = '<input type="text" class="form-control" value="" placeholder="UOM" name="UOM" readonly>';
                var input = document.createElement("input");
                input.type = "text";
                input.className = "form-control debit";
                input.placeholder = "Quality";
                input.name = "qty_required" + rowCount;
                input.addEventListener("input", function() {
                    // Update total quantity
                    updateTotalQuantity();
                });
                cell6.appendChild(input);
                cell7.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="Last Received Date" name="lreceiveddate" readonly>';
                cell8.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="Last Received Rate" name="lrr" readonly>';
                cell9.innerHTML = '<input type="text" class="form-control" value="" placeholder="Rate" name="rate">';
                cell10.innerHTML = '<input type="text" class="form-control" value="" placeholder="Tax%" name="taxper">';
                cell11.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="Tax Amount" name="taxamount">';
                cell12.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="Amount" name="amount" readonly>';
                cell13.innerHTML = '<input type="text" class="form-control" value="" placeholder="Discount%" name="discount">';
                cell14.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="Discount Amount" name="discountamount">';
                cell15.innerHTML =
                    '<input type="text" class="form-control" value="" placeholder="Net Amount" name="netamount" readonly>';
                cell16.innerHTML =
                    '<button type="button" class="btn btn-primary" onclick="addRow()">+</button>';
                cell17.innerHTML =
                    '<button type="button" class="btn btn-danger" onclick="removeRow()">-</button>';

            }
            // function is for update quality text td 
            function updateTotalQuantity() {
                var totalQuantity = gettvalueqty; // Corrected variable name
                var table = document.getElementById("tableBody");
                // Iterate through rows to sum up quantity values
                for (var i = 1; i < table.rows.length; i++) {
                    // Adjusted cell index to target the quantity input field
                    var inputValue = parseInt(table.rows[i].cells[5].querySelector("input").value);
                    if (!isNaN(inputValue)) {
                        totalQuantity = totalQuantity + inputValue;
                    }
                }
                // Update total quantity display
                qtyproduct.innerHTML = totalQuantity;

                // Update hidden input field value
                // document.getElementById("qtyproductInput").value = totalQuantity;
            }
            // function for remove row here
            function removeRow() {
                var table = document.getElementById("tableBody");
                var tproduct = document.getElementById("totalproduct");
                var qtyproduct = document.getElementById("qtyproduct");

                // Update total product count
                tproduct.innerHTML = table.rows.length - 1;

                // Recalculate total quantity
                var totalQuantity = 0;
                for (var i = 0; i < table.rows.length-1; i++) {
                    var inputValue = parseInt(table.rows[i].cells[5].querySelector("input").value);
                    if (!isNaN(inputValue)) {
                        console.log(inputValue);
                        totalQuantity += inputValue;
                    }
                }
                // Update total quantity display
                qtyproduct.innerHTML = totalQuantity;

                // Check if there are rows to remove
                if (table.rows.length > 1) {
                    // Remove the last row
                    table.deleteRow(table.rows.length - 1);
                } else {
                    // Otherwise, show a message
                    alert("No Rows to Remove");
                }
            }


            // end functionality of dynamic add row
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
