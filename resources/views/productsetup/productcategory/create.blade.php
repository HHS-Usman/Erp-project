@extends('layout.master')
@section('page-tab')
    Create Product Category
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
                <h1>Create Product Category</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Product Category</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('productcategory.store') }}" method="POST">        
                @csrf
                    <div class="row justify-content-center">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Product Category Code</strong>
                                <input type="text" name="product_category_code" id="product_category_code" class="form-control" placeholder="productcategory Code">
                            </div>
                            <div class="form-group">
                                <strong>Product Category<span style="color:#DC3545">*</span></strong>
                                <input type="text" name="product_category" id="product_category" class="form-control" placeholder="productcategory" required>
                            </div>
                            <div class="form-group">
                                <strong>Product Category<span style="color:#DC3545">*</span></strong>
                                <input type="text" name="product_category" id="product_category" class="form-control" placeholder="productcategory" required>
                            </div>
                           
                            <div class="form-group">
                                <strong>Details</strong>
                                <input type="text" name="detail" id="detail" class="form-control" placeholder="Detail">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1"name="is_active" id="is_active" checked>
                                Active
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
            </form>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        
  </section> 

@endsection    