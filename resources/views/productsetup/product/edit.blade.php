@extends('layout.master')
@section('page-tab')
Create Product
@endsection
@section('content')

<section id="main" class="main" style="padding-top: 0vh;">
    <div class="pagetitle" style="margin-left: 20px;">
        <h1>Create Product</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a> Create Product</a></li>
            </ol>
        </nav>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <head>

        <style>
            body {
                font-family: Arial, sans-serif;
            }

            #nextbutton {
                cursor: pointer;
                width: 15%;
                border: none;
                border-radius: 5px;
                padding: 10px 10px 10px 10px;
                background-color: rgb(250, 219, 42);
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                margin-left: 20Spx;
            }

            #tab1 {
                padding-left: 40px;
            }

            .tab {
                display: none;
            }

            .btn {
                margin-top: 10px;
            }

            .dropdown {}

            #options,
            .options {
                width: 100%;
                padding: 5px;
            }

            .tabs {
                margin-bottom: 15px;

                justify-content: start;
                align-items: center;
            }

            /* .btn {
                                background-color: rgb(250, 219, 42);
                                font-size: 1rem;
                              } */

            .tab-link {
                border-radius: 5px;
                background-color: rgb(250, 219, 42);
                margin: 10px;
                cursor: pointer;
                padding: 10px;
                border: 1px solid #fffbfb;
            }

            .form-group {
                margin-bottom: 15px;
            }

            .form-group strong {
                margin-bottom: 5px;
            }

            .form-group input {
                width: 100%;
                padding: 8px;
                box-sizing: border-box;
            }

            @media (min-width: 600px) {
                .form-container {
                    flex-direction: row;
                }

                .form-group {
                    flex: 1;
                    margin-right: 15px;
                }
            }
        </style>
        <script>
            function handleCheckboxChange(checkbox) {
                    var checkboxes = document.querySelectorAll('.choose');
                    checkboxes.forEach(function(currentCheckbox) {
                        if (currentCheckbox !== checkbox) {
                            currentCheckbox.checked = false;
                        }
                    });
                }

                function calculateValues() {
                    var total = parseFloat(document.getElementById('total').value) || 0;
                    var discountValue = parseFloat(document.getElementById('discountValue').value) || 0;
                    var percentage = parseFloat(document.getElementById('percentage').value) || 0;

                    if (total && discountValue === 0 && percentage !== 0) {
                        discountValue = (percentage / 100) * total;
                    } else if (total && percentage === 0 && discountValue !== 0) {
                        percentage = (discountValue / total) * 100;
                    } else if (total && discountValue !== 0 && percentage !== 0) {
                        // Both discountValue and percentage are provided, choose one (for simplicity, discountValue takes precedence)
                        discountValue = (percentage / 100) * total;
                    }

                    var remainingValue = total - discountValue;

                    // Update the input values
                    document.getElementById('discountValue').value = discountValue.toFixed(2);
                    document.getElementById('percentage').value = percentage.toFixed(2);
                    document.getElementById('remainingValue').value = remainingValue.toFixed(2);
                }
        </script>
    </head>

    <body>
        <div class=" wrapper d-flex">
            <div class="tabs">
                <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                        onclick="showTab(1)">Product GN Info</button></div>
                <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                        onclick="showTab(2)">Product CTLG Mng</button></div>
                <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                        onclick="showTab(3)">Pricing & Tax</button></div>
            </div>
            <div class="container">
                <form class="w-100" id="multitab-form" action="{{ route('product.update',$products) }}"
                    enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="tab" id="tab1">
                        <div class="container d-flex flex-sm-row justify-content-center align-items-center"
                            style="margin-bottom:-15px;">
                            <div class="form-group  d-flex">
                                <div class="form-group  d-flex">
                                    <div class="form-group">
                                        <strong for="System">System</strong>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" value="{{ $products->id }}" readonly>
                                    </div>
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="Service"> Service
                                        <input type="checkbox" name="service" id="service" class="choose" Value="Yes"
                                            onchange="handleCheckboxChange(this)" {{$products->service ? 'checked' :
                                        ''}}>
                                    </strong>
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="General Product">General Product
                                        <input type="checkbox" name="general_product" id="general_product"
                                            class="choose" Value="Yes" onchange="handleCheckboxChange(this)"
                                            {{$products->general_product ? 'checked' : '' }} >
                                    </strong>
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="Product Active">Product Active
                                        <input type="checkbox" name="product_active" id="product_active" class=""
                                            Value="Yes" {{$products->general_product ? 'checked' : '' }}>
                                    </strong>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                {{-- {{ $nextId }} --}}
                                <div class="form-group d-flex .col-xs-12 .col-md-6">
                                    <strong for="Product">Product Code</strong>
                                    <input type="text" class="form-control" name="product_code" id="product_code"
                                        value="{{$products->product_code}}">
                                </div>
                                <div class="d-flex" style="margin: 3%">


                                </div>
                                <div class="form-group d-flex .col-xs-12 .col-md-6">
                                    <strong for="options">Product Color</strong>
                                    <input type="text" class="form-control" name="product_color" id="product_color"
                                        value="{{$products->product_color}}" placeholder="Product_color">
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group d-flex">
                                    <strong for="Product">Product Name <span style="color: #ff041d">*</span></strong>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Product Name" style="margin-left: -2%;"
                                        value="{{$products->name}}" />
                                </div>
                                <div class=" d-flex" style="margin: 3%">

                                </div>
                                <div class="form-group d-flex">
                                    <strong for="Product" style="">Origin</strong>

                                    {{-- country --}}
                                    <select name="origin" id="origin" class="form-select" style="margin-left: 8%;">
                                        @foreach ($countries as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $products->origin_id) selected
                                            @endif>{{ $item->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group d-flex">
                                    <strong for="Article No">Article No/SKU</strong>
                                    <input type="text" class="form-control" name="article_no" id="article_no"
                                        placeholder="Article No/SKU" value="{{$products->article_no}}" />
                                </div>
                                <div class=" d-flex" style="margin: 3%">


                                </div>
                                <div class="form-group d-flex">
                                    <strong for="Article No" style="margin-right: 3%">Locality</strong>
                                    <select name="locality" id="locality" class="form-select" style="margin-left: 2%;">
                                        <option value="Imported" @if ($products->locality == 'Imported') selected
                                            @endif>Imported</option>
                                        <option value="Local" @if ($products->locality == 'Local') selected @endif>Local
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group d-flex">
                                    <strong for="Product">Product Barcode</strong>
                                    <input type="text" class="form-control" name="product_barcode" id="product_barcode"
                                        style="margin-left: -2%" value="{{$products->product_barcode}}">
                                </div>
                                <div class=" d-flex" style="margin: 3%">


                                </div>
                                <div class="form-group d-flex">
                                    <strong for="Product">Re-OrdrType</strong>
                                    <input type="number" class="form-control" name="reorder_type" id="reorder_type"
                                        value="{{$products->reorder_type}}">
                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group text-center">
                                    <button type="button" class="btn btn-primary text-end"
                                        style="margin: 1px;">button</button>
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="Product" style="margin-left: 6%">Min Qty</strong>
                                    <input type="number" step="0.01" class="form-control" name="min_qty" id="min_qty"
                                        style="margin-left: 6%" value="{{$products->min_qty}}">
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group d-flex">
                                    <strong for="Product">P_UOM</strong>
                                    <select name="product_uom_id" id="product_uom_id" class="form-select"
                                        style="margin-left:6%;" value="{{$products->product_uom_id}}">
                                        <option value="">None</option>
                                        @foreach ($uoms as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $products->product_uom_id)
                                            selected @endif>{{ $item->uom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" d-flex" style="margin: 3%">


                                </div>
                                <div class="form-group d-flex">
                                    <strong for="Product">Max Qty</strong>

                                    <input type="number" class="form-control" name="max_qty" id="max_qty"
                                        placeholder="0.0" step="0.01" style="margin-left: 4%"
                                        value="{{$products->max_qty}}">
                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group d-flex">
                                    <strong for="Product Description">Product Dscrptn</strong>
                                    <textarea type="text" class="form-control blue-border" name="product_description"
                                        id="product_description" placeholder="product_description"
                                        style="margin-left:-2%" value="">{{$products->product_description}}</textarea>
                                </div>
                                <div class=" d-flex" style="margin: 3%">


                                </div>
                                <div class="form-group d-flex">
                                    <strong for="Product">Stock Type </strong>
                                    <select name="stock_type_id" id="stock_type_id" class="form-select">
                                        <option value="">None</option>
                                        @foreach ($stocktypes as $item)
                                        <option value="{{ $item->id }}" @if ( $item->id == $products->stock_type_id)
                                            selected @endif>{{ $item->stocktype }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group d-flex">
                                    <strong for="options">Othr_UOM</strong>
                                    <input type="number" name="other_unit" id="other_unit" class="form-control"
                                        style="margin-left: 3%" step="0.01" value="{{ $products->other_unit }}">
                                    {{-- country --}}
                                    <select name="other_uom_id" id="other_uom_id" class="form-select">
                                        <option value="">None</option>
                                        @foreach ($uoms as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $products->other_uom_id)
                                            selected @endif >{{ $item->uom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="options">Pr_Act<span style="color:#DC3545">*</span></strong>
                                    <select name="product_activity" id="product_activity" class="form-select"
                                        style="margin-left: 3%" placeholder="None" required>
                                        @foreach ($productactivities as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $products->product_activity)
                                            selected @endif>{{ $item->product_activity }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group d-flex">
                                    <strong for="options">Blk_Pkg</strong>
                                    <select name="bulk_packing_id" id="bulk_packing_id" class="form-select"
                                        style="margin-left: 6%">
                                        <option value="">None</option>
                                        @foreach ($producttypes as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $products->bulk_packing_id)
                                            selected @endif>{{ $item->product_type }}</option>
                                        @endforeach
                                    </select>

                                    <input type="number" name="blk_pkg_flt" id="blk_pkg_flt" class="form-control"
                                        step="0.01" placeholder="0.0" value="{{ $products->blk_pkg_flt }}">
                                    {{-- country --}}

                                    <input type="text" name="blk_pkg" id="blk_pkg" class="form-control"
                                        value="{{ $products->blk_pkg }}">
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="options">Ware Hsg</strong>

                                    {{-- country --}}
                                    <select name="warehousing_id" id="warehousing_id" class="form-select">
                                        <option value="">none</option>
                                        @foreach ($warehouses as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $products->warehousing_id
                                            )selected @endif>{{ $item->warehouse }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group d-flex">
                                    <strong for="options">B_Code<span style="color:#DC3545">*</span></strong>
                                    <select name="batch_coding" id="batch_coding" class="form-select" required
                                        style="margin-left: 5%;">
                                        <option value="" disabled selected>None</option>
                                        <option value="Yes" @if ( $products->batch_coding == 'Yes' )selected @endif>Yes
                                        </option>
                                        <option value="No" @if ( $products->batch_coding == 'No' )selected @endif>No
                                        </option>
                                    </select>
                                    <input type="text" name="batch_code" id="batch_code" class="form-control"
                                        placeholder="B_code" value="{{ $products->batch_code }}">
                                    <input type="number" step="0.01" name="btch_code" id="btch_code"
                                        class="form-control" value="{{ $products->btch_code }}" placeholder="00">

                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="options">Expiry</strong>

                                    {{-- country --}}
                                    <input type="checkbox" name="expiry" id="expiry" value="Yes" {{$products->expiry ?
                                    'checked' : ''}} >
                                    <input type="text" class="form-control" name="expiry_ap" id="expiry_ap"
                                        placeholder="Return Allowed" value="{{ $products->expiry_ap }}">
                                    <input type="checkbox" name="expiry_n" id="expiry_n" value="Yes"
                                        {{$products->expiry_n ? 'checked' : ''}}>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-5px;">
                                <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                                    onclick="submit1()">Submit</button>
                                <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                                    onclick="showTab(2)">Next</button>
                            </div>
                        </div>
                    </div>

                    <br>
                    <br>
                    <div class="tab" id="tab2">


                        <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group   d-flex">
                                    <div class="form-group d-flex">
                                        <strong for="options">Product Brand</strong>

                                        {{-- country --}}
                                        <select name="product_brand_id" id="product_brand_id" class="form-select">
                                            <option value="">None</option>
                                            @foreach ($brandselections as $item)
                                            <option value="{{ $item->id }}" @if ($item->id ==
                                                $products->product_brand_id )selected @endif>{{ $item->brand_selection
                                                }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <div class="form-group d-flex">
                                        <strong for="options">Product Type</strong>
                                        {{-- country --}}
                                        <select name="product_type_id" id="product_type_id" class="form-select">
                                            <option value="">None</option>
                                            @foreach ($producttypes as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $products->product_type_id
                                                )selected @endif>{{ $item->product_type }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">


                                <div class="form-group d-flex">
                                    <strong for="options">Product Class</strong>


                                    {{-- country --}}
                                    <select name="product_classification_id" id="product_classification_id"
                                        class="form-select" style="margin-right: 3%; margin-left:1%;">
                                        <option value="">None</option>
                                        @foreach ($classifications as $item)
                                        <option value="{{ $item->id }}" @if ($item->id ==
                                            $products->product_classification_id )selected @endif>{{
                                            $item->classification }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <div class="form-group d-flex">
                                        <strong for="options">Product Status</strong>


                                        {{-- country --}}
                                        <select name="product_status_id" id="product_status_id" class="form-select">
                                            <option value="">None</option>
                                            @foreach ($productstatuses as $item)
                                            <option value="{{ $item->id }}" @if ($item->id ==
                                                $products->product_status_id )selected @endif>{{ $item->product_status
                                                }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group   d-flex">
                                    <strong for="options">Prdct ctgry <span style="color: red;">*</span></strong>
                                    {{-- country --}}
                                    <select name="product_category_id" id="product_category_id" class="form-select"
                                        style="margin-left: 2%; margin-right:1%;">
                                        <option value="">None</option>
                                        @foreach ($productcategories as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $products->product_category_id
                                            )selected @endif>{{ $item->product_category }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="options">Product Qc Required</strong>
                                    <div class="form-check">
                                        <input type="checkbox" name="pqc_required" id="pqc_required" value="Yes" {{
                                            $products->pqc_required ? 'checked' : '' }}>
                                    </div>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">
                                <div class="form-group   d-flex">
                                    <strong for="options">Pro1st S_Ctgry</strong>
                                    <select name="product_1stcategory_id" id="product_1stcategory_id"
                                        class="form-select">
                                        <option value="">None</option>
                                        @foreach ($productsubs as $item)
                                        <option value="{{ $item->id }}" @if ($item->id ==
                                            $products->product_1stcategory_id )selected @endif>{{
                                            $item->product1stsbctgry }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" d-flex" style="margin: 4%">
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="options">Product Supplier</strong>
                                    <select name="product_supplier_id" id="product_supplier_id" class="form-select">
                                        <option value="">None</option>
                                        @foreach ($productsuppliers as $item)
                                        <option value="{{ $item->id }}" @if ($item->id == $products->product_supplier_id
                                            )selected @endif>{{ $item->product_supplier }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group  d-flex">
                                    <strong for="options">Pro2nd S_Ctgry</strong>
                                    <select name="product_2ndcategory_id" id="product_2ndcategory_id"
                                        class="form-select">
                                        <option value="">None</option>
                                        @foreach ($product2subs as $item)
                                        <option value="{{ $item->id }}" @if ($item->id ==
                                            $products->product_2ndcategory_id ) selected @endif>{{
                                            $item->product1stsbctgry }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class=" d-flex" style="margin: 4%">
                                </div>
                                <div class="form-group d-flex">
                                    <strong for="options">Image</strong>
                                    <input type="file" name="product_image" id="product_image" class="form-control"
                                        style="margin-left:5%;">
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-5px;">
                                <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                                    onclick="showTab(1)">Previous</button>
                                <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                                    onclick="submit()">Submit</button>
                                <button type="button" class="btn btn-primary p-3 px-5  col-3" id="sbumit2"
                                    style="margin: 5px;" onclick="showTab(3)">Next</button>
                            </div>
                            <script>
                                function submit1() {
                                        var form1 = document.getElementById('form1');
                                        form1.submit();
                                    }
                            </script>

                        </div>
                    </div>
                    <br><br>
                    <div class="tab" id="tab3">

                        <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">


                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group   d-flex">
                                    <strong for="options">Product Price <span style="color:#010101;">(Per
                                            Unit)</span></strong>
                                    {{-- country --}}
                                    <input type="number" step="0.01" name="price_per_unit" id="total"
                                        class="form-control" placeholder="0.0" oninput="calculateValues()"
                                        value="{{ $products->price_per_unit }}">
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">


                                    {{-- country --}}
                                    <div class="form-group d-flex">
                                        <h6><strong>Percentage</strong></h6>
                                    </div class="form-group d-flex">
                                    <div class="form-group d-flex">
                                        <h6><strong>Value</strong></h6>
                                    </div>
                                    <div class="form-group d-flex">
                                        <h6><strong>After Discount</strong></h6>
                                    </div>

                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group   d-flex">
                                    <strong for="options">Sale Price<span style="color:#010101;">(Per
                                            Unit)</span></strong>
                                    <input type="text" name="sale_price" id="sale_price" class="form-control"
                                        style="margin-left:3%;" value="{{ $products->sale_price }}">
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">

                                    <br>
                                    <div class="form-group d-flex">

                                        {{-- country --}}
                                        <input class="form-control" type="number" name="float" id="percentage" step=0.01
                                            placeholder="0" oninput="calculateValues()" value="{{  $products->float }}">
                                        <input class="form-control" type="number" name="float_value" id="discountValue"
                                            step=0.01 placeholder="0" oninput="calculateValues()"
                                            value="{{  $products->float_value }}">
                                        <input class="form-control" type="number" name="product_value"
                                            id="remainingValue" placeholder="value" oninput="calculateValues()"
                                            value="{{  $products->product_value }}">
                                    </div>
                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group   d-flex">

                                    <div class="form-group">
                                        <strong for="options">Product Profit</strong>
                                    </div>
                                    <div class="form-group">

                                        {{-- country --}}
                                        <input type="number" step="0.01" name="product_profit" id="product_profit"
                                            class="form-control" value="{{  $products->product_profit }}">
                                    </div>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <div class="form-group">
                                        <strong for="options">Allow Product Special Pricing</strong>
                                    </div>
                                    <div class="form-group">

                                        {{-- country --}}
                                        <input type="checkbox" class="">
                                    </div>
                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group   d-flex">

                                    <div class="form-group">
                                        <strong for="options">Product MRP</strong>
                                    </div>
                                    <div class="form-group">

                                        <input type="number" name="product_mrp" id="product_mrp" class="form-control"
                                            value="{{  $products->product_mrp }}">
                                    </div>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <div class="form-group">
                                        <strong for="options">Further Item Tax %</strong>
                                    </div>
                                    <div class="form-group">

                                        <input type="number" name="fur_itm_tax" id="fur_itm_tax" step="0.01"
                                            value="{{ old('fur_itm_tax') }}" value="{{ $products->fur_itm_tax }}">
                                    </div>
                                </div>

                            </div>

                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group   d-flex">

                                    <div class="form-group">
                                        <strong for="options">Tax Applicable on</strong>
                                    </div>
                                    <div class="form-group">

                                        {{-- country --}}
                                        <select name="applicable" id="applicable" class="form-select">
                                            <option value="">None</option>
                                            <option value="TP" @if ($products->applicable == 'TP') selected @endif>TP
                                            </option>
                                            <option value="MRP" @if ($products->applicable == 'MRP') selected @endif>MRP
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <div class="form-group">
                                        <strong for="options">Further Item Tax %</strong>
                                    </div>
                                    <div class="form-group">

                                        <input type="number" name="fur_item_tax" id="" step="0.01" placeholder="0.0"
                                            value="{{ $products->fur_item_tax }}">
                                    </div>
                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group   d-flex">

                                    <div class="form-group">
                                        <strong for="options">Tax ICalculation Type</strong>
                                    </div>
                                    <div class="form-group">

                                        {{-- country --}}
                                        <select name="calculation_type" id="calculation_type" class="form-select">
                                            <option value="Tax Inclusive" @if ($products->calculation_type== 'Tax
                                                Inclusive') selected @endif>Tax Inclusive</option>
                                            <option value="Tax Exclusive" @if ($products->calculation_type== 'Tax
                                                Exclusive') selected @endif>Tax Exclusive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group d-flex">
                                    <div class="form-group">
                                        <strong for="options">Item Costing Method</strong>
                                    </div>
                                    <div class="form-group">

                                        {{-- country --}}
                                        <select name="itm_cost_method" id="itm_cost_method" class="form-select">
                                            <option value="FIFO" @if ($products->itm_cost_method== 'FIFO') selected
                                                @endif>FIFO</option>
                                            <option value="LIFO" @if ($products->itm_cost_method== 'LIFO') selected
                                                @endif>LIFO</option>
                                            <option value="AVG" @if ($products->itm_cost_method== 'AVG') selected
                                                @endif>AVG</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-15px;">

                                <div class="form-group d-flex">
                                    <div class="form-group">
                                        <strong for="options">Direct Item Tax</strong>
                                    </div>
                                    <div class="form-group">
                                        {{-- country --}}
                                        <input type="number" name="direct_tax" id="direct_tax" step="0.01"
                                            class="form-control" value="{{ $products->direct_tax }}">
                                    </div>
                                </div>
                                <div class=" d-flex" style="margin: 3%">
                                </div>
                                <div class="form-group   d-flex">
                                    <div class="form-group">
                                        <strong for="MIC">Map Item COA</strong>
                                    </div>
                                    <div class="form-group">

                                        {{-- country --}}
                                        <select name="coa_id" id="coa_id" class="form-select">
                                            <option value="">None</option>
                                            @foreach ($coas as $item)
                                            <option value="{{ $item->id }}" @if ($item->id == $products->coa_id)selected
                                                @endif>{{ $item->coaname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="container d-flex justify-content-center align-items-center"
                                style="margin-bottom:-5px;">
                                <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                                    onclick="nextTab(2)">Previous</button>
                                <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                                    onclick="submit4()">Submit</button>
                            </div>
                        </div>


                    </div>


                </form>
            </div>
        </div>
        <script>
            let currentTab = 1;

                function showTab(tabNumber) {
                    // Hide all tabs
                    const tabs = document.querySelectorAll(".tab");
                    tabs.forEach((tab) => (tab.style.display = "none"));

                    // Show the selected tab
                    document.getElementById(`tab${tabNumber}`).style.display = "block";
                }

                function nextTab(next) {
                    // Validate if needed

                    // Show the next tab
                    currentTab = next;
                    showTab(currentTab);
                }

                function submitForm() {
                    // You can add any final validation logic here before submitting the form
                    document.getElementById("multitab-form").submit();
                }

                function submit4() {
                    var form1 = document.getElementById('form1');
                    var form2 = document.getElementById('form2');
                    var form3 = document.getElementById('form3');
                    var form4 = document.getElementById('form4');

                    // Submit both forms
                    form1.submit();
                    form2.submit();
                    form3.submit();
                    form4.submit();

                }

                // Show the first tab initially
                showTab(currentTab);

                function submit2() {
                    var form1 = document.getElementById('form1');
                    var form2 = document.getElementById('form2');

                    // Submit both forms
                    form1.submit();
                    form2.submit();

                }

                function submit3() {
                    var form1 = document.getElementById('form1');
                    var form2 = document.getElementById('form2');
                    var form3 = document.getElementById('form3');
                    // Submit both forms
                    form1.submit();
                    form2.submit();
                    form3.submit();
                }
        </script>
    </body>

</section>

@endsection
