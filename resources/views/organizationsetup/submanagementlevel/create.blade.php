@extends('layout.master')
@section('page-tab')
    Create Sub Management Level
@endsection
@section('content')
<div id="maincontainer">
  <section id="main" class="main" style="padding-top: 0vh;">
        <div class="pagetitle">
            <h1>Add Sub Management</h1>
            <nav>
            <ol style="color:white;">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Create</li>
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
            <h2>Management Level</h2>
            <h4>Navigation path</h4>
            <br><br><br>
            <form action="{{ route('submanagement.store') }}" method="POST">        
      @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
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
</div>      

@endsection    