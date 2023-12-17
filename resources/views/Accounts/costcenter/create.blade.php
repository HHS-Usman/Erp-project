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
                        <input class="form-check-input" type="checkbox" value="1" name="operation">
                        Operational
                        </label>
                    </div>
                    <div class="form-group">
                        <strong>Select Parent Cost Center </strong>
                        <select name="parentcostcenter" id="parentcostcenter" class="form-control"
                            onchange="updateAccountCode()">
                            <option value="1">Select Parent Cost Center </option>
                            @foreach ($costcenter as $item)
                            <option value="{{ $item->id }}" data-costcenter_code="{{ $item->costcenter_code }}" data-childcount="{{ $item->children_count }}">
                                Account ID {{ $item->id }} || CostCenter Code {{ $item->costcenter_code }} || {{ $item->costcentername }} || parent Name || {{ $item->parentid }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <strong>Cost Center Code</strong>
                        <input type="text" name="costcenter_code" disabled value="12255" id="costcenter_code" class="form-control"
                            placeholder="Cost Center Code">
                    </div>
                    <script>
                        $(document).ready(function () {
                            // Attach the updateAccountCode function to the change event of the dropdown
                            $('#parentcostcenter').on('change', function () {
                                updateAccountCode();
                            });
                    
                            function updateAccountCode() {
                                var parentCode = $('#parentcostcenter').find(':selected').data('costcenter_code');
                                var existingChildCount = $('#parentcostcenter').find(':selected').data('childcount') || 0;
                    
                                // Extract the current child number from the parent code
                                var currentChildNumber = parseInt(parentCode.split('-')[1]) || 0;
                    
                                // Calculate the new child number by incrementing the current one
                                var newChildNumber = currentChildNumber + 0;
                    
                                // Create the new cost center code
                                var newAccountCode = parentCode + '-' + newChildNumber;
                    
                                console.log('New Account Code:', newAccountCode);
                                $('#costcenter_code').val(newAccountCode);
                            }
                        });
                    </script>
           <script>
            $(document).ready(function () {
                // Attach the updateAccountCode function to the change event of the dropdown
                $('#parentcostcenter').on('change', function () {
                    updateAccountCode();
                });
        
                function updateAccountCode() {
                    var parentCode = $('#parentcostcenter').find(':selected').data('costcenter_code');
        
                    // Get all existing child numbers from the dropdown
                    var existingChildNumbers = $('#parentcostcenter').find('option[data-costcenter_code^="' + parentCode + '-"]').map(function () {
                        return parseInt($(this).data('costcenter_code').split('-')[2]) || 0;
                    }).get();
        
                    // Find the next available child number
                    var newChildNumber = findNextChildNumber(existingChildNumbers);
        
                    // Create the new cost center code
                    var newAccountCode = parentCode + '-' + newChildNumber;
        
                    console.log('New Account Code:', newAccountCode);
                    $('#costcenter_code').val(newAccountCode);
                }
        
                function findNextChildNumber(existingChildNumbers) {
                    var newChildNumber = 1;
        
                    while (existingChildNumbers.includes(newChildNumber)) {
                        newChildNumber++;
                    }
        
                    return newChildNumber;
                }
            });
        </script>
        
                    
                    
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
                        <strong>Select Cost Center Department Mapping</strong>
                        <select name="costcentermapping" id="costcentermapping" class="form-control">
                            <option>Select Cost Department Center Mapping </option>
                            @foreach ($maping as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->department }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1"name="is_active" id="is_active"
                            checked>
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
