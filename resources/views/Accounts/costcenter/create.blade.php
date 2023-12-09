@extends('layout.master')
@section('page-tab')
    Create Cost Center
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
            <h1>Create Cost Center </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Cost Center</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('costcenteraccount.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="operation" >
                        Operational
                        </label>
                    </div>
                    {{-- <div class="form-group">
                        <strong>System ID</strong>
                        <input type="text" name="systemid" id="systemid" class="form-control"
                            placeholder="Account Name">
                    </div> --}}
                    <div class="form-group">
                        <strong>Select Parent COA </strong>
                        <select name="parentcostcenter" id="parentcostcenter" class="form-control">
                            <option >Select Parent Cost Center </option>
                            @foreach ($costcenter as $costc=>$item)
                            <option  value={{$item->id}} >Account ID {{$item->id}} || coacode {{$item->costcenter_code}} || {{$item->costcentername}} || parent Name ||  {{$item->parentid}}
                            </option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Cost Center Code</strong>
                        <input type="text" name="costcenter_code" id="costcenter_code" class="form-control"
                            placeholder="Cost Center Code">
                    </div>
                    <div class="form-group">
                        <strong>Cost Center Name</strong>
                        <input type="text" name="costcenter_name" id="costcenter_name" class="form-control"
                            placeholder="Cost Center Name">
                    </div>
                    <div class="form-group">
                        <strong>Select Cost Center Type</strong>
                        <select id="costcentertype" name="costcentertype" class="form-control">
                            <option class="options" value="1">Detail</option>
                            <option class="options" value="2">Control</option>
                        </select>
                    </div>
                    <strong>Remarks</strong>
                    <div class="form-group">
                        <strong>Department Cost Center Mapping</strong>
                        <input type="text" name="costcentermapping" id="openbalance" class="form-control"
                            placeholder="Department Cost Center Mapping">
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1"name="is_active" id="is_active" checked>
                        Active
                        </label>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Create</button>
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
