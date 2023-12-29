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
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a> Create Product</a></li>
        </ol>
        </nav>
    </div>
    @if($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach($errors->all() as $error)
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
          #nextbutton{
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
          .dropdown {
           
          }
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
        </script>
      </head>
<body>
  <div class=" wrapper d-flex">
    <div class="tabs">
      <div style="margin:5px;" ><button type="button" class="btn btn-primary p-3 px-5  col-12" onclick="showTab(1)">Product GN Info</button></div>
      <div style="margin:5px;" ><button type="button" class="btn btn-primary p-3 px-5  col-12" onclick="showTab(2)">Product CTLG Mng</button></div>
      <div style="margin:5px;" ><button type="button" class="btn btn-primary p-3 px-5  col-12" onclick="showTab(3)">Pricing & Tax</button></div>
    </div>
    <div class="container">
      <form class="w-100" id="multitab-form" action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="tab" id="tab1">
          <div class="container d-flex justify-content-center align-items-center">           
            <div class="form-group   d-flex">
              <div class="form-group   d-flex">
                <div class="form-group">
                  <strong for="System">System</strong>
                </div>  
                  <div class="form-group">
                    <input type="text" class="form-control" value="{{ $nextId }}" readonly>     
                  </div>
              </div>      
              <div class="form-group d-flex">
                <strong for="Service"> Service
                <input type="checkbox" name="service" id="service" class="choose" Value="Yes" onchange="handleCheckboxChange(this)">
                </strong>
              </div>
              <div class="form-group d-flex">
                <strong for="General Product">General Product
                  <input type="checkbox" name="general_product" id="general_product" class="choose" Value="Yes" onchange="handleCheckboxChange(this)" checked>
                </strong>
              </div>    
              <div class="form-group d-flex">
                <strong for="Product Active">Product Active
                <input type="checkbox" name="product_active" id="product_active" class="" Value="Yes" checked>
                </strong>
              </div>
            </div>     
          </div>
          <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
              <div class="container d-flex justify-content-center align-items-center">
                {{-- {{ $nextId }} --}}
                  <div class="form-group d-flex">
                    <strong for="Product">Product Code</strong>  
                    <input type="text"  class="form-control" name="product_code" id="product_code" value="01">
                  </div>
                  <div class=" d-flex" style="margin: 3%">
                      
                    
                  </div>
                  <div class="form-group d-flex">
                    <strong for="options">Product Color</strong>
                    <input type="text" class="form-control" name="product_color" id="product_color" value="" placeholder="Product_color">
                  </div>
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                <div class="form-group d-flex">
                  <strong for="Product">Product Name <span style="color: #ff041d">*</span></strong>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" style="margin-left: -2%;" />
                </div>
                <div class=" d-flex" style="margin: 3%">

                </div>
                <div class="form-group d-flex">
                  <strong for="Product" style="" >Origin</strong>
                
                  {{-- country --}}   
                  <select name="origin" id="origin" class="form-select" style="margin-left: 8%;" >
                    @foreach ($countries as $item)
                    <option value="{{ $item->id }}">{{ $item->country }}</option>
                    @endforeach  
                  </select>          
                </div>
              </div>  
              <div class="container d-flex justify-content-center align-items-center">
                  <div class="form-group d-flex">
                    <strong for="Article No">Article No/SKU</strong>
                    <input type="text" class="form-control" name="article_no"  id="article_no" placeholder="Article No/SKU" />
                  </div>
                  <div class=" d-flex" style="margin: 3%">
                      
                    
                  </div>
                  <div class="form-group d-flex">
                    <strong for="Article No" style="margin-right: 3%">Locality</strong>
                    <select name="locality" id="locality" class="form-select" style="margin-left: 2%;">
                      <option value="Imported">Imported</option>
                      <option value="Local">Local</option>    
                    </select>
                  </div>
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                  
                    <div class="form-group d-flex">
                        <strong for="Product">Product Barcode</strong>
                        <input type="text"  class="form-control" name="product_barcode" id="product_barcode" style="margin-left: -2%" > 
                    </div> 
                    <div class=" d-flex" style="margin: 3%">
                      
                    
                    </div>
                      <div class="form-group d-flex">
                        <strong for="Product">Re-OrdrType</strong>
                        <input type="number"  class="form-control" name="reorder_type" id="reorder_type" value=""> 
                      </div>  
                     
              </div> 
              <div class="container d-flex justify-content-center align-items-center">
                    <div class="form-group text-center">
                      <button type="button" class="btn btn-primary text-end" style="margin: 1px;" >button</button>
                    </div>
                    <div class="form-group d-flex">
                      <strong for="Product" style="margin-left: 6%">Min Qty</strong>
                      <input type="number" step="0.01" class="form-control" name="min_qty" id="min_qty" style="margin-left: 6%" > 
                    </div> 
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                <div class="form-group d-flex">
                    <strong for="Product">Product UOM</strong>
                    <select name="product_uom" id="product_uom" class="form-select" style="padding-bottom: 5;">
                      <option value="none">None</option>
                      @foreach ($uoms as $item)
                        <option value="{{ $item->id }}">{{ $item->uom }}</option>
                      @endforeach    
                    </select> 
                </div>
                <div class=" d-flex" style="margin: 3%">
                      
                    
                </div>
                    <div class="form-group d-flex">
                      <strong for="Product">MAX QTY</strong>
                     
                      <input type="number"  class="form-control" name="max_qty" id="max_qty" placeholder="0.0" step="0.01" style="margin-left: 3%"> 
                    </div> 
                  
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group d-flex">
                  <strong for="Product Description">Product Description</strong>  
                  <textarea type="text" class="form-control blue-border" name="product_description" id="product_description" placeholder="product_description" style=""></textarea>
                </div>
                <div class=" d-flex" style="margin: 3%">
                      
                    
                </div>
                <div class="form-group d-flex">
                  <strong for="Product">Stock Type </strong>
                 <select name="stock_type" id="stock_type" class="form-select">
                    <option value="none">none</option>
                    @foreach ($stocktypes as $item)
                    <option value="{{ $item->id }}">{{ $item->stocktype }}</option>
                    @endforeach  
                  </select> 
                  
                </div>
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                <div class="form-group">
                  <strong for="options">Other UOM</strong>
                </div>  
                  <div class="form-group">
                    <input type="text" name="other_uom" id="other_uom" class="form-control">
                    {{-- country --}}
                    <select name="other_unit" id="other_unit" class="form-select">
                    <option value="none">None</option>
                    @foreach ($uoms as $item)
                      <option value="{{ $item->id }}">{{ $item->uom }}</option>
                    @endforeach   
                    </select> 
                  </div>  
                  
                
                  <div class="form-group">
                    <strong for="options">Product Activity  <span style="color:#DC3545">*</span></strong>
                  </div>  
                    <div class="form-group">
                      <select name="product_activity" id="product_activity" class="form-select">
                        <option value="01">1</option>
                        @foreach ($productactivities as $item)
                          <option value="{{ $item->id }}">{{ $item->product_activity }}</option>
                        @endforeach  
                      </select> 
                      
                    </div>
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                <div class="form-group">
                  <strong for="options">Bulk Packing</strong>
                </div>  
                <div class="form-group d-flex">
                  <div class="form-group">
                    <select name="bulk_packing" id="bulk_packing" class="form-select">
                      <option value="none">None</option>
                      @foreach ($packingtypes as $item)
                      <option value="{{ $item->id }}">{{ $item->packing_types}}</option>
                    @endforeach
                    </select> 
                  </div>
                  <div class="form-group">  
                    <input type="number" name="blk_pkg_flt" id="blk_pkg_flt" class="form-control" step="0.01" placeholder="0.0">
                  </div>  
                  {{-- country --}}
                  <div class="form-group">
                    <input type="text" name="blk_pkg" id="blk_pkg" class="form-control">
                  </div>  
                </div>     
              
                <div class="form-group">
                  <strong for="options">Ware Housing</strong>
                </div>  
                <div class="form-group">    
                  {{-- country --}}   
                  <select name="warehousing" id="warehousing" class="form-select">
                    <option value="01">1</option>
                    <option value="02">2</option>  
                    <option value="03">3</option>  
                  </select> 
                </div>  
              </div>
              <div class="container d-flex justify-content-center align-items-center">
              <div class="form-group">
                <strong for="options">Batch Code Required</strong>
              </div>             
                  <div class="form-group d-flex">     
                    {{-- country --}}
                    <div class="form-group">
                      <select name="batch_coding" id="batch_coding" class="form-select">
                        <option value="None">None</option>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>  
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" name="batch_code" id="batch_code" class="form-control" placeholder="B_code">
                    </div>
                    <div class="form-group">  
                      <input type="number" step="0.01" name="btch_code" id="btch_code" class="form-control" placeholder="00">
                    </div>
                  </div> 
                  <div class="form-group">
                    <strong for="options">Expiry</strong>
                  </div>                 
                  <div class="form-group d-flex">
                      
                    {{-- country --}}
                    <div class="form-group">
                      <input type="checkbox" name="expiry" id="expiry" value="Yes">
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" name="expiry_ap" id="expiry_ap" placeholder="Return Allowed">
                    </div>
                    <div class="form-group">
                      <input type="checkbox" name="expiry_n" id="expiry_n" value="Yes">
                    </div>
                  </div>
            </div>
          </div>  
          <div class="container d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="submit1()">Submit</button>
            <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="showTab(2)">Next</button>
          </div>
        </div>
        </div>
        <br>
        <br>
        <div class="tab" id="tab2">
          
    
          <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
            
              <div class="container d-flex justify-content-center align-items-center">
                  <div class="form-group   d-flex">
                    <div class="form-group">
                      <strong for="options">Product Brand</strong>
                    </div>  
                      <div class="form-group">
                        {{-- country --}}   
                        <select name="product_brand" id="product_brand" class="form-select">
                          <option value="none">None</option>
                          @foreach ($brandselections as $item)
                            <option value="{{ $item->id }}">{{ $item->brand_selection}}</option>
                          @endforeach  
                        </select> 
                      </div>  
                  </div> 
                  <div class="form-group d-flex">   
                    <div class="form-group">
                      <strong for="options">Product Type</strong>
                    </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <select name="product_type" id="product_type" class="form-select">
                        <option value="none">None</option>
                        @foreach ($producttypes as $item)
                          <option value="{{ $item->id }}">{{ $item->product_type}}</option>
                        @endforeach
                      </select> 
                    </div>  
                  </div>
                
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <strong for="options">Product Classification</strong>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <select name="product_classification" id="product_classification" class="form-select">
                        <option value="none">None</option>
                        @foreach ($classifications as $item)
                          <option value="{{ $item->id }}">{{ $item->classification }}</option>
                        @endforeach  
                      </select> 
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <strong for="options">Product Status</strong>
                  </div>  
                  <div class="form-group">
                    
                    {{-- country --}}   
                    <select name="product_status" id="product_status" class="form-select">
                      <option value="none">None</option>
                      @foreach ($productstatuses as $item)
                        <option value="{{ $item->id }}">{{ $item->product_status}}</option>
                      @endforeach 
                    </select> 
                  </div>  
                </div>
              
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                  
                  <div class="form-group   d-flex">

                    <div class="form-group">
                      <strong for="options">Product category <span style="color: red;">*</span></strong>
                    </div>  
                      <div class="form-group">
                        
                        {{-- country --}}   
                        <select name="product_category" id="product_category" class="form-select">
                          <option value="none">None</option>
                          @foreach ($productcategories as $item)
                          <option value="{{ $item->id }}">{{ $item->productcategory}}</option>
                          @endforeach  
                        </select> 
                      </div>  
                  </div> 
                  <div class="form-group d-flex">   
                    <div class="form-group">
                      <strong for="options">Product Qc Required</strong>
                    </div>  
                    <div class="form-group">
                      <input type="checkbox" name="pqc_required" id="pqc_required" value="Yes">
                    </div>  
                  </div>
                
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                  
                  <div class="form-group   d-flex">

                    <div class="form-group">
                      <strong for="options">Product 1st Sub Category</strong>
                    </div>  
                      <div class="form-group">
                        
                        {{-- country --}}   
                        <select name="product_1stcategory" id="product_1stcategory" class="form-select">
                          <option value="01">1</option>
                          <option value="02">2</option>  
                          <option value="03">3</option>  
                        </select> 
                      </div>  
                  </div> 
                  <div class="form-group d-flex">   
                    <div class="form-group">
                      <strong for="options">Product Supplier</strong>
                    </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <select name="product_supplier" id="product_supplier" class="form-select">
                        @foreach ($productsuppliers as $item)
                        <option value="{{ $item->id }}">{{ $item->productsupplier}}</option>
                        @endforeach  
                      </select> 
                    </div>  
                  </div>
                
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                  
                  <div class="form-group   d-flex">

                    <div class="form-group">
                      <strong for="options">Product 2nd Category</strong>
                    </div>  
                      <div class="form-group">
                        
                        {{-- country --}}   
                        <select name="product_2ndcategory" id="product_2ndcategory" class="form-select">
                          <option value="01">1</option>
                          <option value="02">2</option>  
                          <option value="03">3</option>  
                        </select> 
                      </div>  
                  </div> 
                  <div class="form-group d-flex">   
                    <div class="form-group">
                      <strong for="options">Image</strong>
                    </div>  
                    <div class="form-group" style="border: 1px solid rgb(5,5,5);     display: block;
                          width: 100%;
                          padding: 0.375rem 2.25rem 0.375rem 0.75rem;
                          -moz-padding-start: calc(0.75rem - 3px);
                          font-size: 1rem;
                          font-weight: 400;
                          line-height: 1.5;
                          color: #212529;
                          background-color: #fff;
                          background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e);
                          background-repeat: no-repeat;
                          background-position: right 0.75rem center;
                          background-size: 16px 12px;
                          border: 1px solid #ced4da;
                          border-radius: 0.375rem;
                          transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
                          -webkit-appearance: none;
                          -moz-appearance: none;
                          appearance: none;">
                      
                      {{-- country --}}   
                      <input type="file" name="product_image" id="product_image">
                    </div>  
                  </div>
                
              </div>
                
              <div class="container d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="showTab(1)">Previous</button>
                <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="submit()">Submit</button>
                <button type="button" class="btn btn-primary p-3 px-5  col-3" id="sbumit2" style="margin: 5px;" onclick="showTab(3)">Next</button>
              </div>
              <script>
              function submit1() 
              {
                var form1 = document.getElementById('form1');
                form1.submit();          
              }
              </script>
            </div>  
          </div>
  </div>  
           <br><br>
        <div class="tab" id="tab3">
          
          <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
            
                  
          <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <strong for="options">Product Price <span style="color:#010101;">(Per Unit)</span></strong>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <input type="number" step="0.01" name="price_per_unit" id="price_per_unit" class="form-control" placeholder="0.0" >
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    
                  </div>  
                  <div class="form-group d-flex">
                    
                    {{-- country --}}   
                    <h6>Percentage</h6>
                    <h6>% Value</h6>
                    <h6>After Discount</h6>
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <strong for="options">Sale Price<span style="color:#010101;">(Per Unit)</span></strong>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <input type="text" name="sale_price"  id="sale_price" class="form-control">
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-check">
                   
                  </div>
                  <br>  
                  <div class="form-group d-flex">
                    
                    {{-- country --}}   
                    <input class="form-control" type="number" name="float" id="float" step=0.01 placeholder="0">
                    <input class="form-control" type="number" name="float_value" id="float_value" step=0.01 placeholder="0">
                    <input class="form-control" type="text" name="product_value" id="" placeholder="value">
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <strong for="options">Product Profit</strong>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <input type="number" step="0.01" name="product_profit" id="product_profit" class="form-control">
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <strong for="options">Allow Product Special Pricing</strong>
                  </div>  
                  <div class="form-check">
                    
                    {{-- country --}}   
                    <input type="checkbox" class="form-check-input"> 
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <strong for="options">Product MRP</strong>
                  </div>  
                    <div class="form-group">
                      
                      <input type="number" name="product_mrp" id="product_mrp" class="form-control">
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <strong for="options">Further Item Tax %</strong>
                  </div>  
                  <div class="form-group">
                    
                    <input type="number"  name="fur_itm_tax" id="fur_itm_tax" step="0.01" value="{{ old('fur_itm_tax') }}" > 
                  </div>  
                </div>
              
            </div>
              
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <strong for="options">Tax Applicable on</strong>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <select name="applicable" id="applicable" class="form-select">
                      <option value="">None</option>
                        <option value="TP">TP</option>
                        <option value="MRP">MRP</option>  
                      </select> 
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                <div class="form-group">
                    <strong for="options">Further Item Tax %</strong>
                  </div>  
                  <div class="form-group">
                    
                    <input type="number" name="fur_item_tax" id="" step="0.01" placeholder="0.0"> 
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <strong for="options">Tax ICalculation Type</strong>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <select name="calculation_type" id="calculation_type" class="form-select">
                        <option value="Tax Inclusive">Tax Inclusive</option>
                        <option value="Tax Exclusive">Tax Exclusive</option>    
                      </select>
                    </div>
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <strong for="options">Item Costing Method</strong>
                  </div>  
                  <div class="form-group">
                    
                    {{-- country --}}   
                    <select name="itm_cost_method" id="itm_cost_method" class="form-select">
                      <option value="FIFO">FIFO</option>
                      <option value="LIFO">LIFO</option>  
                      <option value="AVG">AVG</option>  
                    </select> 
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <strong for="options">Direct Item Tax</strong>
                  </div>  
                  <div class="form-group">
                    {{-- country --}}
                    <input type="number" name="direct_tax" id="direct_tax" step="0.01" class="form-control"> 
                  </div>  
                </div>
                <div class="form-group   d-flex">
                <div class="form-group">
                  <strong for="MIC">Map Item COA</strong>
                </div>  
                  <div class="form-group">
                    
                    {{-- country --}}   
                    <select name="coa" id="coa" class="form-select">
                        @foreach ($coas as $item)
                         <option value="{{ $item->id }}">{{ $item->coaname}}</option>
                        @endforeach  
                    </select> 
                  </div>  
                </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center">
              <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="nextTab(2)">Previous</button>
              <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="submit4()">Submit</button>       
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