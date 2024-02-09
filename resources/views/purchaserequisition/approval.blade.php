@extends('layout.master')
@section('page-tab')
Purchase Requisition Approval
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
        <h1>Purchase Requisition Approval</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a>Purchase Requisition Approval</a></li>
            </ol>
        </nav>
    </div>
    <div style="background-color: lightgray;opacity: 0.9;">
        <ul class="nav nav-tabs" id="myTabs">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Date Range</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">time Range</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Property Name</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Property Status</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab">Property ID & conditional Filter</a>
            </li>
        </ul>
    </div>
    <br>
    <div class="row justify-content-start">
        <div class="d-flex col-md-3 col-sm-12 col-xs-12">
            <label for="">Dropdown Selection</label>
            <select class="form-select" name="" id="">
                <option value="Pending">Pending</option>
            </select>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="card-body">
            <form id="updateForm">
                @csrf
                <table id="myTable" class="table table-border datatable" style="border: 1px solid black">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox" id="selectAll" class="" onclick="toggleSelectAll()">
                            </th>
                            <th scope="col">S.no</th>
                            <th scope="col">Document No</th>
                            <th scope="col">Department</th>
                            <th scope="col">Employee</th>
                            <th scope="col">Document Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form id="updateForm">
                            @csrf
                            @foreach($Prdatas as $Prdata => $pr)


                            <tr>
                                <td><input type="checkbox" class="check" name="ids[]" value="{{ $pr->id }}"></td>
                                <td>{{ $Prdata ++ }}</a></td>
                                <td>{{ optional($pr->purchaserequisition)->doc_ref_no }}</a></td>
                                <td>{{ $pr->purchaserequisition->department->department }}</td>
                                <td>{{ optional($pr->purchaserequisition->employee)->employee_name }}</td>
                                <td>
                                    <p class="btn btn-outline-warning">{{ $pr->documentstatus->doc_status}}</p>
                                </td>
                                <td>
                                    <form action="" method="">
                                        <a class="btn btn-info" href="">Show</a>
                                        <a class="btn btn-primary" href="#">Edit</a>
                                        <button type="button" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach

                    </tbody>
                </table>
                <div class="col-md-12 col-sm-12 col-xs-12" id="topPagination">
                    <button type="button" class="btn btn-primary">Request to the requester</button>
                    <button type="submit" id="submitButton" class="btn btn-primary">Approve</button>
                    <button type="button" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>

    <!-- End Recent Sales -->

    <!-- Template Main JS File -->
    <script>

    </script>
    <br><br>

</section>
<script>
    $(document).ready(function() {
        $('#submitButton').on('click', function() {
            var ids = $('input[name="ids[]"]:checked').map(function(){
                return $(this).val();
            }).get();

            $.ajax({
                type: 'POST',
                url: '{{ route("update.Prapproval") }}',
                data: {
                    ids: ids,
                    approval: 2, // Assuming you want to set approval to 1 when checked
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    alert(response.message);
                    // You can handle further actions upon success
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
function toggleSelectAll() {
        var checkboxes = document.querySelectorAll('.check');
        var selectAllCheckbox = document.getElementById('selectAll');

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = selectAllCheckbox.checked;
        }
}
</script>
@endsection
