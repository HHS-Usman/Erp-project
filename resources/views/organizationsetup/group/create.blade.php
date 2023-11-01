@extends('layout.master')
@section('page-tab')
    Create Grade
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
        <section id="main" class="main" style="padding-top: 0vh;">
            <div class="pagetitle">
                <h1>Create Group</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Group</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('group.store') }}" method="POST">        
      @csrf
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Group</strong>
                    <input type="text" name="group" id="group" class="form-control" placeholder="Group">
                </div>
                <div class="form-group">
                    <strong>Group Code</strong>
                    <input type="text" name="group_code" id="group_code" class="form-control" placeholder="Group Code">
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