@extends('layout.master')
@section('page-tab')
    Create Division
@endsection    
@section('content')
<div id="maincontainer">
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
        <section id="main" class="main" style="padding-top: 0vh;">
            <div class="pagetitle">
                <h1>Create Division</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Division</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <form action="{{ route('division.store') }}" method="POST">        
      @csrf
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Division</strong>
                    <input type="text" name="division" id="division" class="form-control" placeholder="Division">
                </div>
                <div class="form-group">
                    <strong>Division Code</strong>
                    <input type="text" name="division_code" id="division_code" class="form-control" placeholder="Division Code">
                </div>
                <div class="form-group">
                    <strong>Details</strong>
                    <input type="text" name="detail" id="detail" class="form-control" placeholder="Detail">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
     </form>
        </div>
  </section>
  <footer id="footer" class="footer justify-content-center">
    <div class="copyright col-4">
    &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="copyright col-4">
    version here
    </div>
    <div class="credits col-4">
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
</footer><!-- End Footer -->
</div>      

@endsection    