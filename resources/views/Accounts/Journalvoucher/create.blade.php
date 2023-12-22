@extends('layout.master')
@section('page-tab')
    Create Journal Voucher
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
            <h1>Create Journal Voucher </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Journal Voucher</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="" method="">     
            <div class="row justify-content-center">
                <div class="col-xs-6 col-sm-6 col-md-6">   
            <div class="row">
                <div class="col-md-6">
                    <label for="journalNumber">Journal Voucher (JV) no#</label>
                    <input type="text" class="form-control" id="journalNumber" name="journalNumber" value="JV-3654" readonly>
                </div>
    
                <div class="col-md-6">
                    <label for="journalDate">JV Date</label>
                    <input type="date" class="form-control" id="journalDate" name="journalDate">
                </div>
            </div>
    
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="branch">Branch</label>
                    <select class="form-control" id="branch" name="branch">
                        <!-- Dropdown options for branches -->
                        <option value="1">Branch 1</option>
                        <option value="2">Branch 2</option>
                        <!-- Add more options as needed -->
                    </select>
                </div>
    
                <div class="col-md-6">
                    <label for="documentCreationDate">Document Creation Date</label>
                    <input type="datetime-local" class="form-control" id="documentCreationDate" name="documentCreationDate">
                </div>
            </div>
    
            <div class="row mt-3">
                <div class="col-md-12">
                    <label for="bulkMemo">Bulk Memo</label>
                    <textarea class="form-control" id="bulkMemo" name="bulkMemo" rows="3"></textarea>
                </div>
            </div>
    
            <!-- Account, Memo, Debit, Credit Rows -->
    
            <!-- Add More Rows Button -->
            <div class="row mt-3">
                <div class="col-md-12">
                    <button type="button" class="btn btn-primary" onclick="addRow()">Add More Rows</button>
                </div>
            </div>

            <table  class="table mt-3 border">
                <thead>
                    <tr>
                        <th>Account</th>
                        <th>Memo</th>
                        <th>Debit</th>
                        <th>Credit</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td>
                            <select class="form-control" id="account1" name="account1">
                                <!-- Options for selecting COA -->
                                <option value="1">COA 1</option>
                                <option value="2">COA 2</option>
                                <!-- Add more options as needed -->
                            </select>
                        </td>
                        <td><input type="text" class="form-control" id="memo1" name="memo1"></td>
                        <td><input type="text" class="form-control" id="debit1" name="debit1"></td>
                        <td><input type="text" class="form-control" id="credit1" name="credit1"></td>
                    </tr>
    
                    <!-- Row 2 -->
                    <tr>
                        <td>
                            <select class="form-control" id="account2" name="account2">
                                <!-- Options for selecting COA -->
                                <option value="1">COA 1</option>
                                <option value="2">COA 2</option>
                                <!-- Add more options as needed -->
                            </select>
                        </td>
                        <td><input type="text" class="form-control" id="memo2" name="memo2"></td>
                        <td><input type="text" class="form-control" id="debit2" name="debit2"></td>
                        <td><input type="text" class="form-control" id="credit2" name="credit2"></td>
                    </tr>
    
                    <!-- Add More Rows dynamically -->
    
                </tbody>
            </table>
        <!-- Save Button -->
        <div class="row mt-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success">Save</button>
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
