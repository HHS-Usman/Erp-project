@extends('layout.master')
@section('page-tab')
    Create Buyer Payment
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
            <h1>Create Buyer Payment</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Buyer Payment</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('accountcategory.store') }}" method="POST">
            @csrf
            <div class=" d-flex">
                <div>
                    <div class=" d-flex col-md-12" >
                        <div  class="col-md-5">
                            <div class="form-group text-center ">
                                <strong>Select Buyer</strong>
                                <select name="employee" id="employee" class="form-control mt-3">
                                    <option value="Select Employee">Select Buyer</option>
                                </select>
                            </div>
                           
                        </div>
                        <div style="margin-left: 20px;">
                            <table class="table col-md-10" style="border:1px solid rgb(2, 2, 2)">
                                
                                    <tr>
                                        <th class="col-4 col-md-4">Total Payable</th>
                                        <th class="col-4 col-md-4">Total Paid</th>
                                        <th class="col-4 col-md-4">Total Remaining</th>
                                    </tr>
                                    <tr>
                                        <td class="col-4 col-md-2"> <input type="text" disabled name="pyamentcoucher"
                                                id="pyamentcoucher" placeholder="3323" class="form-control"></td>
                                        <td class="col-4 col-md-2"><input type="text" disabled name="pyamentcoucher"
                                                id="pyamentcoucher" placeholder="2323" class="form-control"></td>
                                        <td class="col-4 col-md-2"><input type="text" disabled name="pyamentcoucher"
                                                id="pyamentcoucher" placeholder="2343" class="form-control"></td>
                                    </tr>
                                
                            </table>
                           
                        </div>
                        <div>
                            <div class="form-group" style="margin-right: 20px;" >
                                <button type="button" class="btn btn-primary">Invoice Reconcilation</button>
                            </div>
                            <div style="margin-right: 25px;" >
                                <strong>Area</strong>
                                <textarea class="form-control" id="bulkMemo" placeholder="Description" name="bulkMemo" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div style="margin-left: 10px" class="col-md-5">
                            <div>
                                <div class="form-group row">
                                    <label for="paymenttype" class="col-md-4 col-form-label"><strong>Payment Type</strong></label>
                                    <div class="col-md-8">
                                        <select name="paymenttype" id="paymenttype" class="form-control">
                                            <option value="Select Employee">Invoice Payment</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="modeofpayment" class="col-md-4 col-form-label"><strong>Mode of Payment</strong></label>
                                    <div class="col-md-8">
                                        <select name="modeofpayment" id="modeofpayment" class="form-control">
                                            <option value="Cash">Cash</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pyamentcoucher" class="col-md-4 col-form-label"><strong>Payment Voucher#</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" name="pyamentcoucher" id="pyamentcoucher" class="form-control" placeholder="PV-1">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="documentdate" class="col-md-4 col-form-label"><strong>Doc Creation Date</strong></label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" disabled id="documentdate" name="documentdate" value="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="voucherdate" class="col-md-4 col-form-label"><strong>Voucher Date</strong></label>
                                    <div class="col-md-8">
                                        <input type="date" name="voucherdate" id="voucherdate" class="form-control" placeholder="Detail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div  class="col-md-5">
                            <div class="form-group row">
                                <label for="bulkMemo" class="col-md-3 col-form-label"><strong>Bulk Memo</strong></label>
                                <div class="col-md-7">
                                    <textarea class="form-control" id="bulkMemo" placeholder="Description" name="bulkMemo" rows="5" cols="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="area" class="col-md-3 col-form-label"><strong>Area</strong></label>
                                <div class="col-md-7">
                                    <textarea class="form-control" id="area" placeholder="Description" name="area" rows="5" cols="5"></textarea>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-12">
                        <div>
                            <table id="myTable" class="table table-border datatable " style="border: 1px solid black">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Invoice No#</th>
                                        <th scope="col">Invoice Amount</th>
                                        <th scope="col">Paid</th>
                                        <th scope="col">Remaining</th>
                                        <th scope="col">Select Invoice to Pay</th>
                                        <th scope="col">Payment Amount</th>
                                        <th scope="col">Tax%</th>
                                        <th scope="col">Tax Amount</th>
                                        <th scope="col">Tax Remaining</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div class="pagination" id="topPagination"></div>
                            <div class="pagination" id="bottomPagination"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <div>
                            <div  style="border: 1px solid black" class="toggle-content text-center" onclick="toggleTableVisibility()" style="cursor: pointer;">
                                <h5 >Monthly Invoice Pending Payments</h5>
                            </div>
                            <div id="myTableContainer" style="display: none;">
                            <table id="myTable" class="table table-border datatable " style="border: 1px solid black">
                                <thead>
                                   
                                    <tr style="border: 2px solid black">
                                        <th scope="col">S.no</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Pending_Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="col">1</td>
                                        <td scope="col">2002</td>
                                        <td scope="col">Jan</td>
                                        <td scope="col">34453</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">2</td>
                                        <td scope="col">2003</td>
                                        <td scope="col">Feb</td>
                                        <td scope="col">3003</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">3</td>
                                        <td scope="col">2004</td>
                                        <td scope="col">Marcd</td>
                                        <td scope="col">3000</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">5</td>
                                        <td scope="col">2004</td>
                                        <td scope="col">Marcd</td>
                                        <td scope="col">3000</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">6</td>
                                        <td scope="col">2010</td>
                                        <td scope="col">March</td>
                                        <td scope="col">3000</td>
                                    </tr>
                                    <tr style="border: 2px solid black">
                                        <th></th>
                                        <td scope="col">Total</td>
                                        <td scope="col">12Month</td>
                                        <td scope="col">2332323</td>
                                    </tr>
                                    <tr style="border: 2px solid black">
                                        <th colspan="4" class="text-center">Pending Credit Note</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Doc No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Pending_Payment</th>
                                    </tr>
                                    <tr>
                                        <td scope="col">1</td>
                                        <td scope="col">434</td>
                                        <td scope="col">12/2/2002</td>
                                        <td scope="col">34453</td>
                                    </tr>
                                    <tr>
                                        <td scope="col">2</td>
                                        <td scope="col">13/2/2004</td>
                                        <td scope="col">March</td>
                                        <td scope="col">32323</th>
                                    </tr>
                                    <tr style="border: 2px solid black">
                                        <td scope="col">Total</td>
                                        <td scope="col"></td>
                                        <td scope="col"></td>
                                        <td scope="col">23413</th>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <script>
                                function toggleTableVisibility() {
                                  var tableContainer = document.getElementById('myTableContainer');
                                  if (tableContainer.style.display === 'none') {
                                    tableContainer.style.display = 'block';
                                  } else {
                                    tableContainer.style.display = 'none';
                                  }
                                }
                              </script>
                            {{-- <div class="pagination" id="topPagination"></div>
                    <div class="pagination" id="bottomPagination"></div> --}}
                        </div>
                    </div>
                </div>
                   
                        
                    </div>
                </div>
            </div>
        </form>
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
            console.log('Pakistan Standard Time:', formattedDate);
        </script>
    </section>

@endsection
