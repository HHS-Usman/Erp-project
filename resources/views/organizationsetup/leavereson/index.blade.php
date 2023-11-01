@extends('layout.master')
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
    
           
              <div class="pagetitle">
                  <h1>Sub Leaving Reason</h1>
                  <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                      <li class="breadcrumb-item active"><a href="{{ route('leavereson.create') }}"> Create</a></li>
                  </ol>
                  </nav>
              </div>
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif      
  <div class="card recent-sales overflow-auto">
    
    <div class="filter">
      <div class="container-fluid">
        <div class="d-flex justify-content-between  align-items-center">
          <!-- Dropdown Menu -->
          
          <!-- Search Bar -->
        </div>
      </div>
    </div>

    <div class="card-body">
      <table class="table table-borderless datatable">
        <thead>
          <tr>
          <th>ID</th>
          <th>Name</th>
          <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($leaveresons as $function)
          <tr>
            <td>{{ $function->id }}</td>
            <td>{{ $function->name }}</td> 
            <td><span class="badge bg-succes">Action</span></td>
          </tr>
        @endforeach  
        </tbody>
      </table>
    </div>
    <!-- End Recent Sales -->
    {{ $leaveresons->links() }}
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