@extends('layout.master')
@section('page-tab')
    Department Uploader
@endsection    
@section('content')
 

  
    <section id="main" class="main" style="padding-top: 0vh;">
        
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
             --}}
      <div class="pagetitle" style="margin-left: 20px;">
          <h1>Department uploader</h1>
          <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active"><a> Department Uploader</a></li>
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
    </section>
                <!-- Template Main JS File -->
                <script src="/asset/js/main.js"></script> 
                <br><br>
             
    </section>
   
   
@endsection