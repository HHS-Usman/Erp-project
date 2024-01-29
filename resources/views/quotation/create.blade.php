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
        </style>
        <br><br><br>
        <form action="{{ route('purchaserequisition.store') }}" method="POST" id="form" enctype="multipart/form-data">
            @csrf
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <strong>Document Doc#</strong>
                        <input type="text" class="form-control" value={{ $pr }} id="prdocnumber" name="doc_no"
                            placeholder="PR Doc#" readonly>
                    </div>
                </div>
                <div class="row">
                    <div>
                        <div class="col-md-6 form-group">
                            <strong>Branch</strong>
                            <select name="b_id" id="branch" class="form-control">
                                <option value="None">Select Branch</option>
                                {{-- @foreach ($modetype as $item)
                                <option value={{ $item->mt_id }}>{{ $item->modetype_name }}</option>
                            @endforeach --}}
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Branch</strong>
                            <select name="b_id" id="branch" class="form-control">
                                <option value="None">Select Department</option>
                                {{-- @foreach ($modetype as $item)
                                <option value={{ $item->mt_id }}>{{ $item->modetype_name }}</option>
                            @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <strong>Branch</strong>
                        <select name="b_id" id="branch" class="form-control">
                            <option value="None">Select Department</option>
                            {{-- @foreach ($modetype as $item)
                            <option value={{ $item->mt_id }}>{{ $item->modetype_name }}</option>
                        @endforeach --}}
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
                            <th>S.No#</th>
                            <th>PR_No</th>
                            <th>Product/Item</th>
                            <th>Product Wise Desciption </th>
                            <th>UOM</th>
                            <th>City</th>
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

                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <tr>
                            <td>1</td>
                            <td>
                                <select name="category" id="pc_data" class="form-control">
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
                                    {{-- @foreach ($brand as $b)
                                        <option id="chnagefont" value={{ $b->id }}>id | {{ $b->id }} |
                                            Brand Selection | {{ $b->brand_selection }}
                                        </option>
                                    @endforeach --}}
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
