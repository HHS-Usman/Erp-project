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
                <div class=" d-flex">
                    <div style="margin-left: 10px" class="col-md-5">
                        <div class="form-group">
                            <strong>Select Buyer </strong>
                            <select name="employee" id="employee" class="form-control">
                                <option value="Select Employee" >Select Buyer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Dropdown Buyer</strong>
                            <select name="employee" id="employee" class="form-control">
                                <option value="Select Employee" >Dropdown Buyer</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Payment Type</strong>
                            <select name="employee" id="employee" class="form-control">
                                <option value="Select Employee" >Payment Type</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <strong>Mode of Payment</strong>
                            <select name="employee" id="employee" class="form-control">
                                <option value="Select Employee" >Mode of Payment</option>
                            </select>
                        </div>
                    </div>
                    <div style="margin-left: 20px">
                    <table  class="table col-md-10" style="border:3px solid rgb(2, 2, 2)">
                        <tbody>
                            <tr>
                                <td class="col-4 col-md-4">Total Payable</td>
                                <td class="col-4 col-md-4">Total Paid</td>
                                <td class="col-4 col-md-4">Total Remaining</td>
                            </tr>
                            <tr>
                                <td class="col-4 col-md-2">  <input type="text" name="pyamentcoucher" id="pyamentcoucher" class="form-control"
                                  ></td>
                                <td class="col-4 col-md-2"><input type="text" name="pyamentcoucher" id="pyamentcoucher" class="form-control"
                                  ></td>
                                <td class="col-4 col-md-2"><input type="text" name="pyamentcoucher" id="pyamentcoucher" class="form-control"
                                  ></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="col-4 col-md-2">
                                    <select name="employee" id="employee" class="form-control">
                                        <option value="Select Employee" >Payment Type</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="col-4 col-md-2">
                                    <select name="employee" id="employee" class="form-control">
                                        <option value="Select Employee" >Select DropDown Cash</option>
                                    </select>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                </div>
                <div class="col-md-5" style="margin-left: 5px">
                    <div >
                        <div class="form-group">
                            <strong class="form-group">Payment Vouceher No</strong>
                            <input type="text" name="pyamentcoucher" id="pyamentcoucher" class="form-control"
                                placeholder="Supllier Category Code">
                        </div>
                        <div class="form-group">
                            <strong>Creation Date</strong>
                            <input type="text" name="creationdate" id="creationdate" class="form-control"
                                placeholder="Buyer Category" placeholder="standard date">
                        </div>
                        <div class="form-group">
                            <strong>Voucher Date</strong>
                            <input type="date" name="voucherdate" id="voucherdate" class="form-control"
                                placeholder="Detail">
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div >
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
                        <div style="border: 2px solid black">
                            <div style="border:1px solid rgb(12, 12, 12)">
                                <h5 style="text-align: center">Monthly Invoice Pending Payment</h5>
                            </div>
                            <table id="myTable" class="table table-border datatable " style="border: 3px solid black">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Month</th>
                                        <th scope="col">Pending Payment</th>
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
                                    <tr>
                                        <th ></th>
                                        <td scope="col">Total </td>
                                        <td scope="col">12 Month</td>
                                        <td scope="col">2332323</td>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <div class="pagination" id="topPagination"></div>
                    <div class="pagination" id="bottomPagination"></div> --}}
                        </div>
                    </div>
                    <div>
                        <div>
                            <div style="border:1px solid rgb(12, 12, 12)">
                                <h5 style="text-align: center">Pending Credit Note</h5>
                            </div>
                            
                            <table id="myTable" class="table table-border datatable " style="border: 3px solid black">
                                <thead>
                                    <tr>
                                        <th scope="col">S.no</th>
                                        <th scope="col">Doc No</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Pending Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="col">1</th>
                                        <th scope="col">434</th>
                                        <th scope="col">12-2-2002</th>
                                        <th scope="col">34453</th>
                                    </tr>
                                    <tr>
                                        <th scope="col">2</th>
                                        <th scope="col">13-2-2004</th>
                                        <th scope="col">March</th>
                                        <th scope="col">32323</th>
                                    </tr>
                                </tbody>
                            </table>
                            {{-- <div class="pagination" id="topPagination"></div>
                    <div class="pagination" id="bottomPagination"></div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

@endsection
