@extends('layout.master')
@section('page-tab')
    Create Department
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
            <div class="pagetitle">
                <h1>Create Department</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Department</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('department.store') }}" method="POST">        
      @csrf
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Department</strong>
                    <input type="text" name="department" id="department" class="form-control" placeholder="Department">
                </div>
                <div class="form-group">
                    <strong>Department Code</strong>
                    <input type="text" name="department_code" id="department_code" class="form-control" placeholder="Department Code">
                </div>
                <div class="form-group">
                    <strong>Details</strong>
                    <input type="text" name="detail" id="detail" class="form-control" placeholder="Detail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     </form>
        </div>
  </section>

@endsection    