
@extends('layout.master')
@section('page-tab')
    Manage Division
@endsection    
@section('content')
 <style>
  #footer{
    background-color: rgb(243, 251, 253)
  }
</style>

  
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
          <h1>Manage Division</h1>
          <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a> Manage Division</a></li>
          </ol>
          </nav>
      </div>
            </section>
                  <div class="container-fluid" style="background-color: rgb(243, 251, 253)" > 
                    <div style="background-color: lightgray;opacity: 0.9;">
                      <ul class="nav nav-tabs" id="myTabs">
                          <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab"></a>
                          </li>
                      </ul>
                      </div>
                        <div style=" left:0px; top:170px;z-index: -1; width: 100%;">
                          <div class="tab-content" id="myTabContent">
                          
                          <!-- Tab content will be dynamically added here -->
                        </div>
                      </div>
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
                
            <div class="container-fluid" style="background-color: rgb(243, 251, 253)" >     
              <div class="container justify-content-center">
                <div class="card-body" >
                  
                <table class="table table-border datatable " style="border: 1px solid black">
                  <thead>
                    <tr >
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
                      <td>{{ $division->division_code }}</td>
                      <td><a  class="datatable-sorter"></a>{{ $division->division }}</td>
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
              </div>
                
              <div style="width: 100%;">
                <button class="buttonstyle" style="position: relative; left: 80%; bottom: 1vh;" type="button" id="buttooo12"
                  aria-haspopup="true" aria-expanded="false">
                  Record per Page
                </button>
              </div>
              <div>
              
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
                <br><br><br><br>
             
    </section>
   
   
@endsection