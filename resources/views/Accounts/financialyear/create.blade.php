@extends('layout.master')
@section('page-tab')
    Create Financial Year Setup
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
                <h1>Create Financial Year Setup</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Financial Year Setup</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('financailyear.store') }}" method="POST">        
                @csrf
                    <div class="row justify-content-center">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>From Date</strong>
                                <input type="date" class="form-control" id="fromdate" name="fromdate">
                            </div>
                            <div class="form-group">
                                <strong>To Date</strong>
                                <input type="date" class="form-control" id="todate" name="todate">
                            </div>
                            <div class="form-group">
                                <strong>Fiscal Year Title</strong>
                                <input type="text" name="fiscalyear" id="fiscalyear" class="form-control" placeholder="Fiscal Year">
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