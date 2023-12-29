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
        <form action="{{ route('yearclosing.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="container justify-content">
                <div class="container d-flex col-xs-6 col-sm-6 col-md-10">
                    <div class="row" class="col-md-12">
                        <div class="col-md-9">
                            <strong>Date</strong>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <br>
                        <div class="col-md-9  mt-3">
                            <strong for="description">Description</strong>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <br>
                        <div class="col-md-9  mt-3">
                            <strong>Select Chart of Account</strong>
                            <select id="chartofaccount" name="chartofaccount" class="form-control">
                                @foreach ($coas as $item)
                                    <option value={{ $item->id }}>{{ $item->coaname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="col-md-6">
                        <div class="col-md-12  mt-3">
                            <strong for="attachment">Attachment (multiple)</strong>
                            <input type="file" class="form-control-file" id="attachment" name="file" multiple>
                        </div>
                        <div class="col-md-12  mt-3">
                            <strong>View List</strong>
                            <ul class="list-group" style="border: 1px solid rgb(29, 27, 27)">
                                @foreach ($fileaname as $item)
                                <li class="list-group-item">{{ explode('.', $item->file_name)[0] }}</li>
                            @endforeach
                            
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container col-md-12 mt-5 text-center"> 
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>

    </section>

@endsection
