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
    
          .form-group label {
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
      </head>
<body>
  <div class=" wrapper d-flex">
  
    <div class="container">
      <form class="w-100" id="multitab-form" action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        <div class="" id="">
          <div class="container d-flex justify-content-center align-items-center">           
            <div class="form-group   d-flex">
              <div class="form-group   d-flex">
                <div class="form-group">
                  <label for="System">System</label>
                </div>  
                  <div class="form-group">
                
                    <input type="text" class="form-control" value="" readonly>
                  
                  </div>
              </div>      
              <div class="form-group">
                <label for="Service"> Service
                <input type="checkbox" name="service" id="service" class="" Value="Yes">
                </label>
              </div>
              <div class="form-group">
                <label for="General Product">General Product
                <input type="checkbox" name="general_product" id="general_product" class="" Value="Yes" >
                </label>
              </div>    
              <div class="form-group">
                <label for="Product Active">Product Active
                <input type="checkbox" name="product_active" id="product_active" class="" Value="Yes" checked>
                </label>
              </div>
            </div>     
          </div>
          <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">         
            <div class="container d-flex justify-content-center align-items-center">
              {{-- {{ $nextId }} --}}
                <div class="form-group">
                <label for="Product">Product Code</label>
                </div>
                <div class="form-group">
                  <input type="text"  class="form-control" name="product_code" id="product_code" value="01" readonly>
                </div>
                <div class="form-group">
                  <label for="options">Product Color</label>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="product_color" id="product_color" value="" placeholder="Product_color">
                </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center">
              <div class="form-group">
                <label for="Product">Product Name <span style="color: #ff041d">*</span></label>
              </div>
              <div class="form-group"> 
                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" />
              </div>
              <div class="form-group">
                <label for="Product">Origin</label>
              </div>
              <div class="form-group">
                {{-- country --}}   
                <select name="origin" id="origin" class="form-select">
                  <option value="01">1</option>
                  <option value="02">2</option>  
                  <option value="03">3</option>  
                </select> 
                
              </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                <div class="form-group">
                  <label for="Article No">Article No/SKU</label>
                </div>
                <div class="form-group">
                  
                    <input type="text" class="form-control" name="article_no"  id="article_no" placeholder="Article No/SKU" />
                </div>
                <div class="form-group">
                  <label for="Article No">Locality</label>
                </div>
                <div class="form-group">
                  
                  <select name="locality" id="locality" class="form-select">
                    <option value="Imported">Imported</option>
                    <option value="Local">Local</option>    
                  </select>
                </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                <div class="form-group ">
                  <div class="form-group d-flex">
                    <div class="form-group d-flex">
                      <label for="Product">Product Barcode</label>
                    </div> 
                    <div> 
                      <input type="text"  class="form-control" name="product_barcode" id="product_barcode" > 
                    </div> 
                  
                  </div> 
                  
                </div>
                
                <div class="form-group">
                  <div class="form-group d-flex">
                    <div class="form-group d-flex">
                      <label for="Product">Re-OrderType</label>
                    </div> 
                    <div> 
                      <input type="number"  class="form-control" name="reorder_type" id="reorder_type" value=""> 
                    </div> 
                  </div> 
                </div>   
            </div> 
            <div class="container d-flex justify-content-center align-items-center">
              <div class="form-group text-center">
                <button type="button" class="btn btn-primary text-end" style="margin: 1px;" >button</button>
              </div>
              
              <div class="form-group">
                <div class="form-group d-flex">
                  <div class="form-group d-flex">
                    <label for="Product">Min Qty</label>
                  </div> 
                  <div> 
                    <input type="number" step="0.01" class="form-control" name="min_qty" id="min_qty" > 
                  </div> 
                
                </div> 
              </div>  
            </div>
            <div class="container d-flex justify-content-center align-items-center">
              <div class="form-group d-flex">
                <div class="form-group">
                  <label for="Product">Product UOM</label>
                </div>
                <div class="form-group">
                  {{-- country --}}   
                  <select name="product_uom" id="product_uom" class="form-select">
                    <option value="01">1</option>
                    <option value="02">2</option>  
                    <option value="03">3</option>  
                  </select> 
                  
                </div>
              </div>
              
              <div class="form-group">
                <div class="form-group d-flex">
                  <div class="form-group d-flex">
                    <label for="Product">MAX QTY</label>
                  </div> 
                  <div> 
                    <input type="number"  class="form-control" name="max_qty" id="max_qty" placeholder="0.0" step="0.01"> 
                  </div> 
                </div> 
              </div>  
            </div>
            <div class="container d-flex justify-content-center align-items-center">
              
              <div class="form-group">
                <label for="Product Description">Product Description</label>
              </div>
              <div class="form-group">  
                <textarea type="text" class="form-control blue-border" name="product_description" id="product_description" placeholder="product_description"></textarea>
              </div>
              <div class="form-group">
                <label for="Product">Stock Type </label>
              </div>
              <div class="form-group">
                {{-- country --}}   
                <select name="stock_type" id="stock_type" class="form-select">
                  <option value="01">1</option>
                  <option value="02">2</option>  
                  <option value="03">3</option>  
                </select> 
                
              </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center">
              <div class="form-group">
                <label for="options">Other UOM</label>
              </div>  
                <div class="form-group">
                  <input type="text" name="other_uom" id="other_uom" class="form-control">
                  {{-- country --}}
                  <select name="other_unit" id="other_unit" class="form-select">
                    <option value="01">1</option>
                    <option value="02">2</option>  
                    <option value="03">3</option>  
                  </select> 
                </div>  
                
              
                <div class="form-group">
                  <label for="options">Product Activity  <span style="color:#DC3545">*</span></label>
                </div>  
                  <div class="form-group">
                    <select name="product_activity" id="product_activity" class="form-select">
                      <option value="01">1</option>
                      <option value="02">2</option>  
                      <option value="03">3</option>  
                    </select> 
                    
                  </div>
            </div>
            <div class="container d-flex justify-content-center align-items-center">
              <div class="form-group">
                <label for="options">Bulk Packing</label>
              </div>  
              <div class="form-group d-flex">
                <div class="form-group">
                  <select name="bulk_packing" id="bulk_packing" class="form-select">
                    <option value="01">1</option>
                    <option value="02">2</option>  
                    <option value="03">3</option>  
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
                <label for="options">Ware Housing</label>
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
                <label for="options">Batch Code Required</label>
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
                    <label for="options">Expiry</label>
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
        </div>
        <br>
        <br>
        <div class="" id="">
          
    
          <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
            
              <div class="container d-flex justify-content-center align-items-center">
                  <div class="form-group   d-flex">
                    <div class="form-group">
                      <label for="options">Product Brand</label>
                    </div>  
                      <div class="form-group">
                        {{-- country --}}   
                        <select name="product_brand" id="product_brand" class="form-select">
                          <option value="01">1</option>
                          <option value="02">2</option>  
                          <option value="03">3</option>  
                        </select> 
                      </div>  
                  </div> 
                  <div class="form-group d-flex">   
                    <div class="form-group">
                      <label for="options">Product Type</label>
                    </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <select name="product_type" id="product_type" class="form-select">
                        <option value="01">1</option>
                        <option value="02">2</option>  
                        <option value="03">3</option>  
                      </select> 
                    </div>  
                  </div>
                
              </div>
              <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <label for="options">Product Classification</label>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <select name="product_classification" id="product_classification" class="form-select">
                        <option value="01">1</option>
                        <option value="02">2</option>  
                        <option value="03">3</option>  
                      </select> 
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <label for="options">Product Status</label>
                  </div>  
                  <div class="form-group">
                    
                    {{-- country --}}   
                    <select name="product_status" id="product_status" class="form-select">
                      <option value="01">1</option>
                      <option value="02">2</option>  
                      <option value="03">3</option>  
                    </select> 
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <label for="options">Product category <span style="color: red;">*</span></label>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <select name="product_category" id="product_category" class="form-select">
                        <option value="01">1</option>
                        <option value="02">2</option>  
                        <option value="03">3</option>  
                      </select> 
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <label for="options">Product Qc Required</label>
                  </div>  
                  <div class="form-group">
                    <input type="checkbox" name="pqc_required" id="pqc_required" value="Yes">
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <label for="options">Product 1st Sub Category</label>
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
                    <label for="options">Product Supplier</label>
                  </div>  
                  <div class="form-group">
                    
                    {{-- country --}}   
                    <select name="product_supplier" id="product_supplier" class="form-select">
                      <option value="01">1</option>
                      <option value="02">2</option>  
                      <option value="03">3</option>  
                    </select> 
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <label for="options">Product 2nd Supplier</label>
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
                    <label for="options">Image</label>
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
              
            
          </div>  
        </div>
    <br><br>
        <div class="" id="">
          
          <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
            
                  
          <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <label for="options">Product Price <span style="color:#010101;">(Per Unit)</span></label>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <input type="number" step="0.01" name="price_per_unit" id="price_per_unit" class="form-control" placeholder="0.0" >
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <label for="options">Product Type</label>
                  </div>  
                  <div class="form-group d-flex">
                    
                    {{-- country --}}   
                    <input type="number" step="0.01" name="dis_percentage" id="dis_percentage" class="form-control" placeholder="%" >
                    <input type="number" step="0.01" name="dis_value" id="dis_value" class="form-control" placeholder="Value" >
                    <input type="number" step="0.01" name="dis_afterdis" id="dis_afterdis" class="form-control" placeholder="After Discount" >
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <label for="options">Sale Price<span style="color:#010101;">(Per Unit)</span></label>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <input type="text" name="sale_price"  id="sale_price" class="form-control">
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-check">
                    <input type="checkbox" class="" checked>
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
                    <label for="options">Product Profit</label>
                  </div>  
                    <div class="form-group">
                      
                      {{-- country --}}   
                      <input type="number" step="0.01" name="product_profit" id="product_profit" class="form-control">
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <label for="options">Allow Product Special Pricing</label>
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
                    <label for="options">Product MRP</label>
                  </div>  
                    <div class="form-group">
                      
                      <input type="number" name="product_mrp" id="product_mrp" class="form-control">
                    </div>  
                </div> 
                <div class="form-group d-flex">   
                  <div class="form-group">
                    <label for="options">Further Item Tax %</label>
                  </div>  
                  <div class="form-group">
                    
                    <input type="number"  name="fur_itm_tax" id="fur_itm_tax" step="0.01" value="{{ old('fur_itm_tax') }}" > 
                  </div>  
                </div>
              
            </div>
              
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <label for="options">Tax Applicable on</label>
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
                    <label for="options">Further Item Tax %</label>
                  </div>  
                  <div class="form-group">
                    
                    <input type="number" name="fur_item_tax" id="" step="0.01" placeholder="0.0"> 
                  </div>  
                </div>
              
            </div>
            <div class="container d-flex justify-content-center align-items-center">
                
                <div class="form-group   d-flex">

                  <div class="form-group">
                    <label for="options">Tax ICalculation Type</label>
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
                    <label for="options">Item Costing Method</label>
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
                    <label for="options">Direct Item Tax</label>
                  </div>  
                  <div class="form-group">
                    {{-- country --}}
                    <input type="number" name="direct_tax" id="direct_tax" step="0.01" class="form-control"> 
                  </div>  
                </div>
                <div class="form-group   d-flex">
                <div class="form-group">
                  <label for="MIC">Map Item COA</label>
                </div>  
                  <div class="form-group">
                    
                    {{-- country --}}   
                    <select name="coa" id="coa" class="form-select">
                      <option value="01">1</option>
                      <option value="02">2</option>  
                      <option value="03">3</option>  
                    </select> 
                  </div>  
                </div>
            </div>
            
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>

        
      </form>  
    </div>
  </div>

</body>
        
</section> 

@endsection    