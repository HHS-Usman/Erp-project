
@extends('layout.master')
@section('page-tab')
    Manage Product 1st sub category
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
          <h1>Manage Product 1st sub category</h1>
          <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a> Manage Product 1st sub category</a></li>
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


                          <!-- Tab content will be dynamically added here -->
                        </div>
                      </div>



                {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>


                </ul> --}}



              <div class="row justify-content-center" >
                <div class="card-body">
                  <table class="table table-border datatable " style="border: 1px solid black">
                    <thead>
                      <tr >
                        <th scope="col">S.no</th>
                        <th scope="col">1_sb_ctgry_id</th>
                        <th scope="col">1st sub category</th>
                        <th scope="col">1st sub category Code</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($productsbctgries as $product1stsbctgry =>$item )
                      <tr>
                        <th >{{ $product1stsbctgry + 1 }}</a></th>
                        <th >{{ $item->id }}</a></th>
                        <td>{{ $item->product1stsbctgry }}</td>
                        <td><a  class="datatable-sorter"></a>{{ $item->product1stsbctgry_code }}</td>
                        <td>{{ $item ->detail }}</td>
                        <td>@if($item->is_active)
                                <p>Active</p>
                            @else
                                <p>INActive</p>
                            @endif
                        </td>
                        <td><form action="" method="POST">
                          <a class="btn btn-info" href="">Show</a>
                          <a class="btn btn-primary" href="{{route('product_sub_category.edit',$item->id)}}">Edit</a>

                          <button  class="btn btn-danger">Delete</button>
                      </form></td>
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
