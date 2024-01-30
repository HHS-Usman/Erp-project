@extends('layout.master')
@section('page-tab')
    Manage Purchase Requisition
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
            <h1>Manage  Purchase Requisition</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Manage  Purchase Requisition </a></li>
                </ol>
            </nav>
        </div>
        <div style="background-color: lightgray;opacity: 0.9; height='20px'; ">
            <ul class="nav nav-tabs" id="myTabs">
                <li class="nav-item">
                    <a class="nav-link " data-bs-toggle="tab"></a>
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
                            <th scope="col">Doc_no</th>
                            <th scope="col">Department</th>
                            <th scope="col">Employee</th>
                            <th scope="col">Document status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Prdata as $item=>$pr)
                        <tr>
                            <th>{{ $item + 1 }}</a></th>
                            <th>{{ $pr->doc_ref_no }}</a></th>
                            <td>{{ $pr->saleperson_code }}</td>
                            <td>{{ $pr->persontype }}</td>
                            <td>{{ $pr->employee }}</td>
                            <td>{{ $pr->detail }}</td>
                            <td>
                                <form action="" method="POST">
                                    <a class="btn btn-info" href="">Show</a>
                                    <a class="btn btn-primary">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
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
