@extends('layout.master')
@section('page-tab')
    Create Sale Person
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
            <h1>Create Sales Person </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create </a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <div class="container mt-5">
            <form action="{{ route('save.supplier.info') }}" method="post">
                @csrf
        
                <!-- Custom Code -->
                <div class="row">
                    <div class="col-md-6">
                        <label for="customCode">Custom Code (Optional)</label>
                        <input type="text" class="form-control" id="customCode" name="customCode">
                    </div>
        
                    <div class="col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>
        
                <!-- Company Information -->
                <div class="row mt-3">
                    <!-- ... (other fields in a similar structure) -->
                </div>
        
                <!-- Supplier Locality -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="supplierLocality">Supplier Locality</label>
                        <select class="form-control" id="supplierLocality" name="supplierLocality">
                            <option value="local">Local</option>
                            <option value="international">International</option>
                        </select>
                    </div>
                </div>
        
                <!-- Company Shipping Address -->
                <div class="row mt-3">
                    <!-- ... (similar structure for shipping address fields) -->
                </div>
        
                <!-- Contact Person Information -->
                <div class="row mt-3">
                    <!-- ... (similar structure for contact person fields) -->
                </div>
        
                <!-- Tax and Withholding Information -->
                <div class="row mt-3">
                    <!-- ... (similar structure for tax and withholding fields) -->
                </div>
        
                <!-- Bank Information -->
                <div class="row mt-3">
                    <!-- ... (similar structure for bank information fields) -->
                </div>
        
                <!-- Opening Balance -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="openingBalance">Opening Balance</label>
                        <input type="text" class="form-control" id="openingBalance" name="openingBalance">
                    </div>
        
                    <div class="col-md-6">
                        <label for="openingDate">Opening Date</label>
                        <input type="date" class="form-control" id="openingDate" name="openingDate">
                    </div>
                </div>
        
                <!-- Save Button -->
                <div class="row mt-3">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>

    </section>

@endsection
