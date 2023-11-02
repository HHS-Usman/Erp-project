@extends('layout.master')
@section('page-tab')
    Create Sub Department
@endsection
@section('content')

  <section id="main" class="main" style="padding-top: 0vh;">
    <div class="pagetitle">
        <h1>Add Sub Department</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('subdepartment.create') }}"> Create Sub Department</a></li>
        </ol>
        </nav>
    </div>
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
        <div class="form-container">
            <link rel="stylesheet" href="/as/style.css">
            <form action="{{ route('subdepartment.store') }}" method="POST">        
      @csrf
      <div class="row justify-content-center">
        <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
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