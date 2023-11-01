@extends('layout.master')
@section('page-tab')
   Create Management level
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
        <div class="form-container">
            <link rel="stylesheet" href="/as/style.css">
            
            <h1>Create Management Level </h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item">Create</li>
            </ol>
            </nav>
            <br><br><br>
            <form action="{{ route('management.store') }}" method="POST">                   
            @csrf
                <div class="row justify-content-center">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <strong>Management Level</strong>
                            <input type="text" name="managementlevel" id="managementlevel" class="form-control" placeholder="Management Level">
                        </div>
                        <div class="form-group">
                            <strong>Management Level Code</strong>
                            <input type="text" name="managementlevel_code" id="managementlevel_code" class="form-control" placeholder="Management Level Code">
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