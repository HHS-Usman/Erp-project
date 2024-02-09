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
        <form action="{{ route('quotation.store') }}" method="POST" id="formdata" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <strong>Document Doc#</strong>
                            <input type="text" class="form-control" value={{ $qcounter }} id="prdocnumber"
                                name="doc_no" placeholder="PR Doc#" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <strong>Branch</strong>
                            <select name="branchs_id" id="branch" class="form-control">
                                <option value="None">Select Branch</option>
                                @foreach ($branch as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <strong>Department</strong>
                            <select name="depart_id" id="department" class="form-control">
                                <option value="None">Select Department</option>
                                @foreach ($deaprtment as $item)
                                    <option value="{{ $item->id }}">{{ $item->department }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <strong>Select PRs</strong>
                            <input type="text" class="form-control" value="" id="prs" name="PRS"
                                placeholder="Quotation Remarks">
                        </div>
                        <div class="col-md-3 form-group" style="margin-top: 20px">
                            <button type="button" class="btn btn-primary" onclick="Getprsdata()">GET PRS Data</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- calculation hidden field for entry in database by Abrar --}}
            <input type="hidden" name="total_no_product" value="3" id="tnoproduct">
            <input type="hidden" name="total_qty_product" value="3" id="tqtyproduct">
            <input type="hidden" name="total_tax_amount" value="3" id="ttaxamount">
            <input type="hidden" name="total_discount_amount" value="3" id="tdamount">
            <input type="hidden" name="gross_amount" value="3" id="grossamount">
            <input type="hidden" name="invoice_discount" value="3" id="invoicediscount">
            <input type="hidden" name="net_amount" value="3" id="invoicediscount">
            {{-- Contetn for Grid Here --}}
            <div style="border: 1px solid rgb(20, 19, 19); margin-top:14px;margin-bottom:10px;padding:0px 10px 0px 10px">
                <div class="row justify-content-center" style="padding-top:30px">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Select Supplier</strong>
                                <select name="supplier_id" id="supplier" class="form-control">
                                    <option value="None">Select Supplier</option>
                                    @foreach ($suplier as $item)
                                        <option value={{ $item->suplier_id }}>{{ $item->companyname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Quotation Remarks</strong>
                                <input type="text" class="form-control" value="" id="quotationremarks"
                                    name="qremarks" placeholder="Quotation Remarks">
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table mt-3 border" id="tabledate">
                    <thead>
                        <tr>
                        <tr>
                            <th>S.No</th>
                            <th>PR_No</th>
                            <th>Product</th>
                            <th>product Wise Description</th>
                            <th>UOM</th>
                            <th>Quality</th>
                            <th>Last Received Date</th>
                            <th>Last Received Rate</th>
                            <th>Rate</th>
                            <th>Tax%</th>
                            <th>Tax Amount</th>
                            <th>Amount</th>
                            <th>Discount%</th>
                            <th>Discount Amount</th>
                            <th>Net Amount</th>
                            <th>Remove</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                    </tbody>
                </table>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary" id="submitBtn">Submit</button>
            </div>
        </form>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        <script>
            // Define the Getprsdata function
            function Getprsdata() {
                var inputValue = document.getElementById('prs').value;
                fetch('/fetch-data?prs=' + inputValue)
                    .then(response => response.json())
                    .then(data => {
                        updateTable(data);
                        console.log(data);
                    })
                    .catch(error => console.error('Error:', error));
            }

            function updateTable(data) {
                var tableBody = document.querySelector('#tableBody');
                tableBody.innerHTML = '';
                data.forEach((item, index) => {
                    var row = tableBody.insertRow();
                    // S.No
                    var snoCell = row.insertCell();
                    snoCell.textContent = index + 1;

                    // PR_No
                    var prNoCell = row.insertCell();
                    prNoCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.pre_id}" placeholder="PR Number" id="prnumber_${index}" name="prnumber[]" readonly>`;

                    // Product
                    var prNoCell = row.insertCell();
                    prNoCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.product.name}" placeholder="Product" id="product_${index}" name="product[]" readonly>`;

                    // Product Wise Description
                    var descCell = row.insertCell();
                    descCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.product_description}" placeholder="Product Description" id="productdescription_${index}" name="product_description[]">`;

                    // UOM
                    var uomCell = row.insertCell();
                    uomCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.uom}" id="uom_${index}" placeholder="uom" name="uom[]">`;

                    // Quality
                    var qualityCell = row.insertCell();
                    qualityCell.innerHTML =
                        `<input type="text" class="form-control" value="" placeholder="Quality" id="quantity_${index}" name="qty_required[]" />`;
                    // Last Received Date
                    var lastReceivedDateCell = row.insertCell();
                    lastReceivedDateCell.innerHTML =
                        lastReceivedDateCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.last_received_date}" placeholder="last received date" id="lastrecevied_date_${index}"  name="last_received_date[]" readonly>`;
                    // Last Received Rate
                    var lastReceivedRateCell = row.insertCell();
                    lastReceivedRateCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.last_received_rate}" placeholder="last received rate" id="lastreceivedrate_${index}" name="last_received_rate[]" readonly>`;
                    // Rate
                    var rateCell = row.insertCell();
                    var rateInput = document.createElement('input');
                    rateInput.type = 'text';
                    rateInput.id = "rate_" + index;
                    rateInput.className = "form-control";
                    rateInput.placeholder = "Rate";
                    rateInput.name = "rate";
                    rateInput.addEventListener("input", function() {
                        // Update tax amount
                        updateTaxAmount(row);
                    });
                    rateCell.appendChild(rateInput);
                    // Tax%
                    var taxPercentCell = row.insertCell();
                    taxPercentCell.innerHTML =
                        `<input type="text" class="form-control" value="${item.product.direct_tax}" placeholder="Tax Percentage" id="tax_percentage_${index}" name="tax_percentage[]" readonly>`;
                    // Tax Amount
                    var taxAmountCell = row.insertCell();
                    taxAmountCell.innerHTML =
                        `<input type="text" class="form-control" value="" placeholder="Tax Amount" id="taxamount_${index}" name="tax_amount[]" readonly>`;

                    // Amount
                    var amountCell = row.insertCell();
                    amountCell.innerHTML =
                        `<input type="text" class="form-control" value="" placeholder="Amount" id="amount_${index}"  name="amount[]" readonly>`;

                    // Discount%
                    var discountPercentCell = row.insertCell();
                    discountPercentCell.innerHTML =
                        `<input type="text" class="form-control" value="" placeholder="Discount%" id="discountpercentage_${index}" name="discountpercentage[]">`;

                    // Discount Amount
                    var discountAmountCell = row.insertCell();
                    discountAmountCell.innerHTML =
                        `<input type="text" class="form-control" value="" placeholder="Discount Amount" id="discountamount_${index}" name="discountamount[]">`;

                    // Net Amount
                    var netAmountCell = row.insertCell();
                    netAmountCell.innerHTML =
                        `<input type="text" class="form-control" value="" placeholder="Net Amount" id="netamount_${index}" name="netamount[]" readonly>`;

                    let removebtn = row.insertCell();
                    removebtn.innerHTML =
                        `<button type="button" class="btn btn-danger" onclick="removeRow(${index})">-</button>`;
                    // Function to update tax amount based on rate and tax percentage
                    function updateTaxAmount(row) {
                        var rate = parseFloat(row.querySelector('[name="rate"]').value);
                        var taxPercentage = parseFloat(row.querySelector('[name="tax_percentage"]').value);
                        var taxAmount = (rate * taxPercentage) / 100;
                        row.querySelector('[name="tax_amount"]').value = taxAmount.toFixed(2);

                        // Calculate Amount (rate + tax)
                        var amount = rate + taxAmount;
                        row.querySelector('[name="amount"]').value = amount.toFixed(2);

                        // Fetch discount percentage
                        var discountPercentage = parseFloat(row.querySelector('[name="discountpercentage"]').value);

                        // Calculate Discount Amount (amount * discountPercentage / 100)
                        var discountAmount = amount * (discountPercentage / 100);
                        row.querySelector('[name="discountamount"]').value = discountAmount.toFixed(2);

                        // Calculate Net Amount (amount - discountAmount)
                        var netAmount = amount - discountAmount;
                        row.querySelector('[name="netamount"]').value = netAmount.toFixed(2);
                    }

                    // Call updateTaxAmount initially to calculate tax amount for the first time
                    updateTaxAmount(row);
                    // Add event listener to discountpercentage input field
                    row.querySelector('[name="discountpercentage"]').addEventListener("input", function() {
                        // Update tax amount, discount amount, and net amount when discount percentage changes
                        updateTaxAmount(row);
                    });

                });

            }
            // MremoveRow function to accept the index parameter
            function removeRow(index) {
                console.log(index)
                var table = document.getElementById("tableBody");
                var row = table.rows[index];
                // Remove the row at the given index
                if (row) {
                    table.deleteRow(index);
                    // Recalculate total quantities or any other necessary updates
                    // ...
                } else {
                    alert("Row does not exist.");
                }
            }
         
        </script>

    </section>

@endsection
