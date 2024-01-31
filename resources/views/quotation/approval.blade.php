@extends('layout.master')
@section('page-tab')
Approval List
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
        <h1>Approval List</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a> Approval List </a></li>
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
            <table id="myTable" class="table table-border datatable " style="border: 1px solid black">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="selectAll" class="" onclick="toggleSelectAll()"></th>
                        <th scope="col">S.no</th>
                        <th scope="col">Document No</th>
                        <th scope="col">Supplier</th>
                        <th scope="col">Quotation Pr No</th>
                        <th scope="col">Quotation AMount</th>
                        <th scope="col">Quotation remarks</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="checkbox" class="check"></td>
                        <td>1</td>
                        <td>Q-00321</td>
                        <td>pr-10231</td>
                        <td>Supplier</td>
                        <td>10000</td>
                        <td>thisdfds</td>
                        <td><a class="btn btn-outline-warning" href="#">Pending For Approval</a></td>
                        <td>
                            <form action="" method="POST">
                                <a class="btn btn-info" href="#">Show</a>
                                <a class="btn btn-primary" href="#">Edit</a>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="col-md-12 col-sm-12 col-xs-12" id="topPagination">
                <button class="btn btn-primary">Request to the requester</button>
                <button class="btn btn-primary">Approve</button>
                <button class="btn btn-primary">Save </button>
            </div>

        </div>
    </div>

    <!-- End Recent Sales -->

    <!-- Template Main JS File -->
    <script>
        function toggleSelectAll() {
        var checkboxes = document.querySelectorAll('.check');
        var selectAllCheckbox = document.getElementById('selectAll');

        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = selectAllCheckbox.checked;
        }
    }
    </script>
    <br><br>

</section>


@endsection
