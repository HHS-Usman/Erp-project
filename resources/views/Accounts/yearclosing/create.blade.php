@extends('layout.master')
@section('page-tab')
    Create Year Closing
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
            <h1>Create Year Closing </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Year Closing</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('yearclosing.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">

                    <div class="row">
                        <div class="col-md-6">
                            <strong>Date</strong>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="col-md-6">
                            <strong for="attachment">Attachment (multiple)</strong>
                            <input type="file" class="form-control-file" id="attachment" name="attachment" multiple>
                        </div>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <strong>Select Chart of Account</strong>
                            <select id="chartofaccount" name="chartofaccount" class="form-control">
                                @foreach ( $coas as $item )
                                    <option value={{$item->id}}>{{$item->coaname}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <strong>View List</strong>
                            <ul class="list-group" style="border: 1px solid rgb(29, 27, 27)">
                                <li class="list-group-item">employe.pdf</li>
                                <li class="list-group-item">Account.csv</li>
                                <li class="list-group-item">customer.pdf</li>
                              </ul>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <strong for="description">Description</strong>
                            <textarea class="form-control" id="description" name="description" ></textarea>
                        </div>
                    </div>
                
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
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
