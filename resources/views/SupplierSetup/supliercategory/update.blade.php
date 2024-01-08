@extends('layout.master')
@section('page-tab')
    Update Suplier Category
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
                <h1>Update Suplier Category</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Update Suplier Category</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('scategory.update',$supcategory) }}" method="POST">
                @csrf
                @csrf
                @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                            <strong class="form-group">Suplier Category Code</strong>
                                <input type="text" name="suppliercategoty_Code" value="{{$supcategory->suppliercategoty_Code }}" id="suppliercategoty_Code" class="form-control" placeholder="Supllier Category Code">
                            </div>
                            <div class="form-group">
                                <strong>Supllier Category<span style="color:#DC3545">*</span></strong>
                                <input type="text" name="suplliercategory" value="{{$supcategory->suplliercategory }}" id="suplliercategory" class="form-control" placeholder="Supplier Category" required>
                            </div>
                            <div class="form-group">
                                <strong>Details</strong>
                                <input type="text" name="detail" value="{{$supcategory->detail }}" id="detail" class="form-control" placeholder="Detail">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1"name="is_active" id="is_active" {{$supcategory->is_active? 'checked' : '' }}  >
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
