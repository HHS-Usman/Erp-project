@extends('layout.master')
@section('page-tab')
    Update Employee Rule
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
                <h1>Update Employee Rule</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Update Employee Rule</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('employeerule.update', $employeerule->id) }}" method="post">
                @csrf
                @method('PUT')
                    <div class="row justify-content-center">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Employee Rule Code</strong>
                                <input type="text" name="employeerule_code" value="{{$employeerule->employeerule_code}}"  id="employeerule_code" class="form-control" placeholder="Employee Rule Code">
                            </div>
                            <div class="form-group">
                                <strong>Employee Rule<span style="color:#DC3545">*</span></strong>
                                <input type="text" name="employeerule" value="{{$employeerule->employeerule}}" id="employeerule" class="form-control" placeholder="Employee Rule" required>
                            </div>
                            <div class="form-group">
                                <strong>Details</strong>
                                <input type="text" name="detail" value="{{$employeerule->detail}}" id="detail" class="form-control" placeholder="Detail">
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