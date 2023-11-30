@extends('layout.master')
@section('page-tab')
    Create Coa
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
            <h1>Create Coa </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Coa</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('cast.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1"name="is_active" id="is_active"
                            checked>
                        Operational
                        </label>
                    </div>
                    <div class="form-group">
                        <strong>Select Parent COA </strong>
                        <select id="parentcoa" name="parentcoa" class="form-control">
                            <option class="options" value="">Select Parent COA</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Select Account Category </strong>
                        <select id="accountcategory" name="accountcategory" class="form-control">
                            <option class="options" value="">Select Parent COA</option>
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
                            <option class="options" value=""> Account Type</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <strong>Opening Balance (Optional)</strong>
                        <input type="text" name="openbalance" id="openbalance" class="form-control"
                            placeholder="Opening Balance">
                    </div>
                    <div class="form-group">
                        <strong>Opening Date</strong>
                        <input type="text" name="openingdate" id="openingdate" class="form-control"
                            placeholder="Opening Date">
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
