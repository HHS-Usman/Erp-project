@extends('layout.master')
@section('page-tab')
    Update Sale Person
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
            <h1>Update Sales Person </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create </a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('salesperson.update', $saleperson) }}" method="POST">
         @csrf
            @method('PUT')
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong>Sale Person Code</strong>
                        <input type="text" name="saleperson_code" value="{{ $saleperson->saleperson_code }}" class="form-control" placeholder="Sale Person Code">
                    </div>
                    <div class="form-group">
                        <strong>Select Sale Person Type:</strong>
                        <select name="persontype" id="persontype" class="form-control" >
                            <option value="Select Sale Type">Select Person Type</option>
                            @foreach ($spt as $item)
                                <option value="{{ $item->id }}" {{ $saleperson->persontype == $item->id ? 'selected' : '' }}>
                                    {{ $item->persontype }}
                                </option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Select Employee:</strong>
                        <select name="employee" id="employee" class="form-control">
                            <option value="Select Employee">Select Employee</option>
                            @foreach ($emp as $item)
                                <option value="{{ $item->id }}" {{ $saleperson->employee == $item->id ? 'selected' : '' }}>
                                    {{ $item->id }} {{ $item->employee_name }}
                                </option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Details</strong>
                        <input type="text" name="detail" value="{{ $saleperson->detail }}" class="form-control" placeholder="Detail">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" {{ $saleperson->is_active ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_active">Active</label>
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
