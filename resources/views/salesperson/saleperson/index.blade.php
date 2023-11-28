
@extends('layout.master')
@section('page-tab')
    Manage Sales Person Type
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
          <h1>Manage Sale Person Type</h1>
          <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a> Manage Sale Person Type</a></li>
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
                  <table id="myTable" class="table table-border datatable " style="border: 1px solid black">
                    <thead>
                      <tr >
                        <th scope="col">S.no</th>
                        <th scope="col">sp_id</th>
                        <th scope="col">saleperson_code</th>
                        <th scope="col">persontype</th>
                        <th scope="col">employee</th>
                        <th scope="col">detail</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($saleperson as $salepersons =>$item )
                      <tr>
                        <th >{{ $salepersons + 1 }}</a></th>
                        <th >{{ $item->id }}</a></th>
                        <td><a  class="datatable-sorter"></a>{{ $item->saleperson_code }}</td>
                        <td>{{ $item->persontype}}</td>
                        <td>{{ $item->employee}}</td>
                        <td>{{ $item->detail }}</td>
                        <td>@if($item->is_active)
                                <p>Active</p>
                            @else
                                <p>Inactive</p>
                            @endif
                        </td>
                        <td><form action="" method="POST">
                          <a class="btn btn-info" href="">Show</a>
                          <a class="btn btn-primary" href="{{route('salepersontype.edit',$item->id)}}">Edit</a>
                          <button  class="btn btn-danger">Delete</button>
                      </form></td>
                      </tr>
                      @endforeach 
                      
                    </tbody>
                  </table>
                  <div class="pagination" id="topPagination"></div>
                  <div class="pagination" id="bottomPagination"></div>
                </div>  
              </div>
              
                
              
          
              
           
              <!-- End Recent Sales -->
            
                {{ $saleperson->links() }} 
                <script src="/asset/vendor/apexcharts/apexcharts.min.js"></script>
                <script src="/asset/vendor/chart.js/chart.umd.js"></script>
                <script src="/asset/vendor/echarts/echarts.min.js"></script>
                <script src="/asset/vendor/quill/quill.min.js"></script>
                <script src="/asset/vendor/simple-datatables/simple-datatables.js"></script>
                <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.10/js/jquery.dataTables.min.js"></script>
                <script src="/asset/vendor/tinymce/tinymce.min.js"></script>
                <script src="/asset/vendor/php-email-form/validate.js"></script>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                
                <!-- Template Main JS File -->
                <script src="/asset/js/main.js"></script> 
                <script>
                    document.addEventListener("DOMContentLoaded", function () {
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