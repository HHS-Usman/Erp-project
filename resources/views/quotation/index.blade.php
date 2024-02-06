@extends('layout.master')
@section('page-tab')
Manage Quotation
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
        <h1>Manage Quotation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a> Manage Quotation </a></li>
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
    <div style=" left:0px; top:170px;z-index: -1; width: 100%;">
        <div class="tab-content" id="myTabContent">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card-body">
            <table id="myTable" class="table table-border datatable " style="border: 1px solid black">
                <thead>
                    <tr>

                        <th scope="col">S.no</th>
                        <th scope="col">Document No</th>
                        <!--data of this comes from quotation_detail table -->
                        <th scope="col">Supplier</th>
                        <!--data of this comes from quotation table -->
                        <th scope="col">Quotation Pr No</th>
                        <!--data of this comes from quotation_detail table -->
                        <th scope="col">Quotation AMount</th>
                        <!--data of this comes from quotation_detail table -->
                        <th scope="col">Quotation remarks</th>
                        <!--data of this comes from quotation table -->
                        <th scope="col">Status</th>
                        <!--data of this comes from quotation_detail table -->
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quotationDetails as $quotationDetail => $item )
                    <tr>
                        <td>{{ $quotationDetail + 1}}</td>
                        <td>{{ $item->document_no }}</td> <!-- data from quotation_detail table -->
                        <td>{{ optional($item->quotation->supplierdata)->companyname }}</td>
                        <!-- data from quotation table -->
                        <td>{{ $item->pr_no }}</td> <!-- data from quotation_detail table -->
                        <td>{{ $item->amount }}</td> <!-- data from quotation_detail table -->
                        <td>{{ $item->quotation->remarks }}</td>
                        <!-- data from quotation table -->
                        <td><p class="btn btn-outline-warning">{{ $item->quotation->documentstatus->doc_status}}</p>
                        </td> <!-- data from quotation_detail table -->
                        <td>
                            <form action="" method="POST">
                                <a class="btn btn-info" href="">Show</a>
                                <a class="btn btn-primary" href="#">Edit</a>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination" id="topPagination"></div>
            <div class="pagination" id="bottomPagination"></div>
        </div>
    </div>

    <!-- End Recent Sales -->
    <script src="/asset/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/asset/vendor/chart.js/chart.umd.js"></script>
    <script src="/asset/vendor/echarts/echarts.min.js"></script>
    <script src="/asset/vendor/quill/quill.min.js"></script>
    <script src="/asset/vendor/simple-datatables/simple-datatables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js">
    </script>
    <script src="/asset/vendor/tinymce/tinymce.min.js"></script>
    <script src="/asset/vendor/php-email-form/validate.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/asset/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
                const myTable = new simpleDatatables.DataTable("#myTable", {
                    paging: true,
                    perPage: 10, // Set your desired number of items per page
                    // Add other DataTable options as needed
                });

                // Link the top and bottom pagination containers
                myTable.on("datatable.sort", () => {
                    const topPagination = document.querySelector("#topPagination");
                    const bottomPagination = document.querySelector("#bottomPagination");
                    bottomPagination.innerHTML = topPagination.innerHTML;
                });
            });
    </script>
    <br><br>

</section>


@endsection
