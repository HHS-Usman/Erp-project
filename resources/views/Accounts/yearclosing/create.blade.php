@extends('layout.master')
@section('page-tab')
    Create Year Closing
@endsection
<?php
use App\Models\Costcenteraccount;
$selectedParentCoa = 'default';
if ($selectedParentCoa == 'default') {
    $levelcounts = Costcenteraccount::max('Level-1');
    $costcentercode = $levelcounts + 1;
}
?>
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
        <form action="{{ route('vouchertype.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">

                    <div class="row">
                        <div class="col-md-6">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="col-md-6">
                            <label for="attachment">Attachment (multiple)</label>
                            <input type="file" class="form-control-file" id="attachment" name="attachment[]" multiple>
                        </div>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <strong>Select Chart of Account</strong>
                            <select id="chartofaccount" name="chartofaccount" class="form-control">
                                <option class="options" value="Detail">Asset</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="viewAttachment">View Attachment</label>
                            <button type="button" class="btn btn-info form-control" onclick="viewAttachment()">View Attachment</button>
                        </div>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                    </div>
            
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <label for="attachmentList">Attachment List</label>
                            <ul id="attachmentList" class="list-group">
                                <!-- Display attachment list dynamically -->
                            </ul>
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
