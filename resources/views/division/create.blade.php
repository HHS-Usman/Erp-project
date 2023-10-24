@extends('layout.master')
@section('content')
<div id="maincontainer">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <section id="main" class="main" style="padding-top: 0vh;">
                            <div class="pagetitle">
                                <h1>Add Division</h1>
                                <nav>
                                <ol class="breadcrumb" style="color:white;">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('division.index') }}">VIew</a></li>
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

     <form action="{{ route('division.store') }}" method="POST">        
      @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     </form>
    </section> 
</div>
@endsection