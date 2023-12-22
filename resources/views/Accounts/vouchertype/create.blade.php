@extends('layout.master')
@section('page-tab')
    Create Voucher Type
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
            <h1>Create Voucher Type </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Voucher Type</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('vouchertype.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">

                    <div class="form-group">
                        <strong>Voucher Type ID</strong>
                        <input type="text" name="voucherid" disabled value={{$maxID}}
                            id="voucherid" class="form-control">
                    </div>

                    <div class="form-group">
                        <strong>Voucher Type Title</strong>
                        <input type="text" name="vouchertitle" 
                            id="vouchertitle" class="form-control" placeholder="Voucher Type">
                    </div>
                
                    <div class="form-group">
                        <strong>Voucher Prefix</strong>
                        <input type="text" name="voucherprefix" id="voucherprefix" class="form-control"
                            placeholder="Voucher Prefix">
                    </div>

                    <div class="form-group">
                        <strong>Select Voucher Type</strong>
                        <select id="vouchertype" name="vouchertype" class="form-control">
                            <option class="options" value="Double">Double</option>
                            <option class="options" value="Single">Single</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>Select Transaction Type</strong>
                        <select id="trnasactiontype" name="trnasactiontype" class="form-control">
                            <option class="options" value="Debit">Debit</option>
                            <option class="options" value="Credit">Credit</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>Select Default COA</strong>
                        <select id="coadata" name="coadata" class="form-control">
                            <option value="2">Select Coa Default</option>
                            @foreach ($coa as $item)
                                <option value={{$item->id}}>{{$item->coaname}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1"name="is_active" id="is_active"
                            checked>
                        Active
                        </label>
                    </div>

                    <div class="form-group">
                        <strong>Voucher Valid for Company units</strong>
                        <select id="companyunits" name="companyunits" class="form-control">
                            <option value="">Select Company Units</option>
                            @foreach ($branch as $item)
                            <option value={{$item->id}}>{{$item->name}}</option>
                            @endforeach
                        </select>
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
