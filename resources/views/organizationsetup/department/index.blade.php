
@extends('layout.master')
@section('page-tab')
    Manage Department
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
          <h1>Manage Department</h1>
          <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a> Manage Department</a></li>
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
                        <th scope="col">Div_id</th>
                        <th scope="col">Department</th>
                        <th scope="col">Department Code</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($departments as $department =>$item )
                      <tr>
                        <th >{{ $department + 1 }}</a></th>
                        <th >{{ $item->id }}</a></th>
                        <td>{{ $item->department }}</td>
                        <td><a  class="datatable-sorter"></a>{{ $item->department_code }}</td>
                        <td>{{ $item ->detail }}</td>
                        <td>@if($item->is_active)
                                <p>Active</p>
                            @else
                                <p>INActive</p>
                            @endif
                        </td>
                        <td><form action="" method="POST">
                          <a class="btn btn-info" href="">Show</a>
                          <a class="btn btn-primary" href="{{route('department.edit',$item->id)}}">Edit</a>

                          <button  class="btn btn-danger">Delete</button>
                      </form></td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>






              <!-- End Recent Sales -->

                {{ $departments->links() }}
    </section>


@endsection
