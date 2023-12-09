@extends('layout.master')
@section('page-tab')
    Manage COA
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
            <h1>Manage COA</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Manage COA</a></li>
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
                <table class="table table-border datatable " style="border: 1px solid black">
                    <thead>
                        <tr>
                            {{-- <th scope="col">Expander</th> --}}
                            {{-- <th scope="col">System ID</th> --}}
                            <th scope="col">S.No</th>
                            <th scope="col">Coa_id</th>
                            <th scope="col">Account Code</th>
                            <th scope="col">Ref A/C Code</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Account Category</th>
                            <th scope="col">Account Type</th>
                            {{-- <th scope="col">System/Manaul</th> --}}
                            <th scope="col">Current Balance</th>
                            <th scope="col">Opening Date</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coas as $coa => $item)
                            <tr>
                                <td>{{ $coa + 1 }}</td>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->coacode}}</td>
                                <td>{{ $item->refaccode}}</td>
                                <td>{{ $item->coaname}}</td>
                                <td>{{ $item->coacategory}}</td>
                                <td>{{ $item->accountype}}</td>
                                <td>{{ $item->openbalance}}</td>
                                <td>{{ $item->openingdate}}</td>
                                {{-- <td>
                                    @if ($item->is_active)
                                        <p>Active</p>
                                    @else
                                        <p>INActive</p>
                                    @endif
                                </td> --}}
                                <td>
                                    <a class="btn btn-info" href="">Show</a>
                                    <a class="btn btn-primary" href="">Edit</a>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End Recent Sales -->
        <script src="/asset/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="/asset/vendor/chart.js/chart.umd.js"></script>
        <script src="/asset/vendor/echarts/echarts.min.js"></script>
        <script src="/asset/vendor/quill/quill.min.js"></script>
        <script src="/asset/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="/asset/vendor/tinymce/tinymce.min.js"></script>
        <script src="/asset/vendor/php-email-form/validate.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="/asset/js/main.js"></script>
        <br><br>

    </section>


@endsection