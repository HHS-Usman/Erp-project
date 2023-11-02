@extends('layout.master')
@section('page-tab')
    Manage function
@endsection
@section('content')
<section id="main" class="main" style="padding-top: 0vh;">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link href="/asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/asset/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/asset/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/asset/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/asset/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/asset/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/asset/vendor/simple-datatables/style.css" rel="stylesheet">
  <!-- Recent Sales -->
  <section id="main" class="main" style="padding-top: 0vh;">
            
              <div class="form-container" style="margin-left: 10px">
                  <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active"><a> Manage Function </a></li>
                  </ol>
                  </nav>
              </div>
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
                  <div class="card-body">
                
      <table class="table">
        <thead>
          <tr>
          <th>S.No</th>
          <th>Function</th>
          <th>Function Code</th>
          <th>Detail</th>
          <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($fundtions as $function)
          <tr>
            <td>{{ $function->id }}</td>
            <td>{{ $function->function }}</td>
            <td>{{ $function->function_code }}</td>
            <td>{{ $function->detail }}</td>
            <td><a class="btn btn-primary" href="">Edit</a></td>
          </tr>
        @endforeach  
        </tbody>
      </table>
    </div>
    <div class="d-flex justify-content-between align-items-center" style=" margin: auto;
    width: 50%;">
      <button type="button" class="btn btn-warning">Previous</button>
      <button type="button" class="btn btn-warning">Next</button>
    </div>

    </div>
  </div>


  <!-- Vendor JS Files -->
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