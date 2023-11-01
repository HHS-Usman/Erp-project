@extends('layout.master')
@section('page-tab')
    Create Department
@endsection
@section('content')

<section id="main" class="main" style="width:100%; margin:0px;padding:5px">
                <div class="pagetitle">
                    <h1>Add Cast</h1>
                    <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active"><a> View</a></li>
                    </ol>
                    </nav>
                </div>
                <br><br><br>
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif     
            <div class="col-md-2 col-lg-2 col-sm-12" style="float: right; padding-bottom:10px"> 
            <input type="search" name="search"  class="form-control" placeholder="search">
          </div>
            <div class="row justify-content-center" style="border: 1px solid rgb(122, 122, 122); width:100%;padding:10px">
              <div class="col-xs-8 col-sm-8 col-md-10">
    
    <div class="filter">
      <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center" >
          <!-- Dropdown Menu -->
          <!-- Search Bar -->
        </div>
      </div>
      
    </div>

    <div class="card-body">
      <table class="table table-borderless datatable">
        <thead>
          <tr>
          <th>S.No</th>
          <th>Department</th>
          <th>Department Code</th>
          <th>Detail</th>
          <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($departments as $department)
          <tr>
            <td>{{ $department->department }}</td>
            <td>{{ $department->department_code }}</td>
            <td>{{ $department->detail }}</td>
            <td><a class="btn btn-primary" href="">Edit</a></td>
            <td><span class="btn btn-success">Action</span></td>
          </tr>
        @endforeach  
        </tbody>
      </table>
    </div>

    <div class="d-flex justify-content-between align-items-center" style=" margin: auto;
    width: 50%;">
      {{-- <button class="buttonstyle" type="button" id="butto1" aria-haspopup="true" aria-expanded="false">
       {{ $departments->links() }}aaadadad
      </button> --}}

      <button type="button" class="btn btn-warning">Previous</button>
      <button type="button" class="btn btn-warning">Next</button>
      {{-- <button class="buttonstyle" style="position: relative; left: 60%;" type="button" id="buttooo133"
        aria-haspopup="true" aria-expanded="false">
        Previous
      </button>
      <button class="buttonstyle" style="position: relative; left: 60%;" type="button" id="buttooo13"
        aria-haspopup="true" aria-expanded="false">
        Next
      </button> --}}

    </div>
  </div>
            </div>

  </div>

  <!-- Vendor JS Files -->
  {{-- <script src="/asset/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/asset/vendor/chart.js/chart.umd.js"></script>
  <script src="/asset/vendor/echarts/echarts.min.js"></script>
  <script src="/asset/vendor/quill/quill.min.js"></script>
  <script src="/asset/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/asset/vendor/tinymce/tinymce.min.js"></script>
  <script src="/asset/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}

  <!-- Template Main JS File -->
  <script src="/asset/js/main.js"></script>
</section>
@endsection