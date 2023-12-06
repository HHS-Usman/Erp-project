@extends('layout.master')
@section('page-tab')
    Create COA
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
            <h1>Create COA </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create COA</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('coa.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="operation" id="is_operation">
                        Operational
                    </div>
                    <div class="form-group">
                        <strong>Select Parent COA </strong>
                        <select name="parentcoa" id="parentcoa" class="form-control">
                            <option >Select Parent COA</option>
                            @foreach ($prentcoa as $pcoa=>$item)
                            <option  value={{$item->id}} >Account ID {{$item->id}} || coacode {{$item->coacode}} || {{$item->coaname}} || parent Name || {{$item->parentcoa}} {{$item->parentid}}
                            </option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Select Account Category </strong>
                        <select name="accountcategory" id="accountcetegory" class="form-control">
                            <option value="Select Sale Type">Select Parent COA</option>
                            @foreach ($accountCategory as $ac=>$item)
                            <option value={{$item->id}}>{{$item->accountcategory}}
                            </option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Account Name</strong>
                        <input type="text" name="accountname" id="accountname" class="form-control"
                            placeholder="Account Name">
                    </div>
                    <div class="form-group">
                        <strong>Account Code</strong>
                        <input type="text" name="accountcode" id="accountcode" class="form-control"
                            placeholder="Account Code">
                    </div>
                    <div class="form-group">
                        <strong>Ref A/C Code</strong>
                        <input type="text" name="refaccode" id="refaccode" class="form-control"
                            placeholder="Ref A/C Code">
                    </div>
                    <div class="form-group">
                        <strong>Select Account Type </strong>
                        <select id="accountype" name="accountype" class="form-control">
                            <option class="options" value="Detail Account">Detail Account</option>
                            <option class="options" value="Account Group Level">Account Group level</option>
                            <option class="options" value="Controll Account">Controll Account</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Opening Balance (Optional)</strong>
                        <input type="text" name="openbalance" id="openbalance" class="form-control"
                            placeholder="Opening Balance">
                    </div>
                    <div class="form-group">
                        <strong>Opening Date</strong>
                        <input type="date" class="form-control" name="openingdate" id="Opening Date" placeholder="Opening Date"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Create COA</button>
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
