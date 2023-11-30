@extends('layout.master')
@section('page-tab')
    Create Coa Main Head Level
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
                <h1>Create Coa Main Head Level</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Coa-Main-Head-Level</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('cast.store') }}" method="POST">        
                @csrf
                    <div class="row justify-content-center">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <strong>Head Name</strong>
                                <input type="text" name="headname" id="headname" class="form-control" placeholder="Head Name">
                            </div>
                            <div class="form-group">
                                <strong>Account Code<span style="color:#DC3545">*</span></strong>
                                <input type="text" name="accounttcode" id="accounttcode" class="form-control" placeholder="Account Code" required>
                            </div>
                            <div class="form-group">
                                <strong>Transction Type</strong>
                                <select id="transactiontype" name="transctiontype" class="form-control">
                                  <option class="form-control" value="Debit">Debit</option>
                                  <option class="form-control" value="Credit">Credit</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <strong>Account Category <span>(Optional)</span></strong>                                <select id="transactiontype" name="accountcategory" class="form-control">
                                  <option class="options" value="Debit">Select of Account Category</option>
                                </select>
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