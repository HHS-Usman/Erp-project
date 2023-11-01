@extends('layout.master')
@section('page-tab')
Create Function
@endsection
@section('content')

  <section id="main" class="main" style="padding-top: 0vh;">
    <div class="pagetitle">
        <h1>Add Function</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('function.create') }}"> Create</a></li>
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
        <br><br>
        <div class="form-container">
            <link rel="stylesheet" href="/as/style.css">
            <nav>
            <ol style="color:white;">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Manage Function</li>
            </ol>
            </nav>
            <form action="{{ route('function.store') }}" method="POST">           
              @csrf
                <div class="row justify-content-center">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Function</strong>
                            <input type="text" name="function" id="function" class="form-control" placeholder="Function">
                        </div>
                        <div class="form-group">
                            <strong>Function Code</strong>
                            <input type="text" name="function_code" id="function_code" class="form-control" placeholder="Function Code">
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