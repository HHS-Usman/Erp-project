
@extends('layout.master')
@section('page-tab')
    Manage Division
@endsection    
@section('content')
{{-- <style>
  #footer{
    background-color:rgb(246, 249, 249)
  }
</style> --}}

      <section id="main" class="main" style="padding-top: 0vh;" >
      
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link href="/asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
        <link href="/asset/vendor/quill/quill.snow.css" rel="stylesheet">
        <link href="/asset/vendor/quill/quill.bubble.css" rel="stylesheet">
        <link href="/asset/vendor/remixicon/remixicon.css" rel="stylesheet">
        <link href="/asset/vendor/simple-datatables/style.css" rel="stylesheet">
            <div class="container-fluid" style="background-color: rgb(243, 251, 253)" >
                <div class="pagetitle">
                    <h1>Designation </h1>
                    <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('designation.create') }}">Create </a></li>
                    </ol>
                    </nav>
                </div>
            </div>

                  <button class="button" style="position: relative; left: 80%;" type="button" id="buttooo" aria-haspopup="true" aria-expanded="false">
                    Record per Page
                  </button>
            {{-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>
      

            </ul> --}}
      
          <div class="card-body" >
            <table class="table table-borderless datatable" style="border: 1px solid black">
              <thead>
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Division Code</th>
                  <th scope="col">Division</th>
                  <th scope="col">Detail</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($divisions as $division)
                <tr>
                  <th scope="row">{{ $division->id }}</a></th>
                  <td>{{ $division->division }}</td>
                  <td><a  class="datatable-sorter">{{ $division->division_code }}</a></td>
                  <td>{{ $division ->detail }}</td>
                  <td><form action="" method="POST">
                    <a class="btn btn-info" href="">Show</a>
                    <a class="btn btn-primary" href="">Edit</a>
                    
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form></td>
                </tr>
                @endforeach 
                
              </tbody>
            </table>
          </div>
          <div style="width: 100%;">
            <button class="buttonstyle" style="position: relative; left: 80%; bottom: 1vh;" type="button" id="buttooo12"
              aria-haspopup="true" aria-expanded="false">
              Record per Page
            </button>
          </div>
          <div>
            <button class="buttonstyle" type="button" id="butto1" aria-haspopup="true" aria-expanded="false">
              Showing 163 Entries
            </button>
            <button class="buttonstyle" style="position: relative; left: 60%;" type="button" id="buttooo133"
              aria-haspopup="true" aria-expanded="false">
              Previous
            </button>
            <button class="buttonstyle" style="position: relative; left: 60%;" type="button" id="buttooo13"
              aria-haspopup="true" aria-expanded="false">
              Next
            </button>
      
          </div>

          <!-- End Recent Sales -->
         
            {{ $divisions->links() }} 
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
    </section>
 
@endsection