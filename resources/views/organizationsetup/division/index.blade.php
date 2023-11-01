@extends('layout.master')
@section('page-tab')
    Manage Division
@endsection    
@section('content')
<div id="maincontainer">
    <br><br>
    <section id="main" class="main" style="padding-top: 0vh;">
                                <div class="pagetitle">
                                    <h1>Division</h1>
                                    <nav>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                                        <li class="breadcrumb-item active"><a> Manage Division</a></li>
                                    </ol>
                                    </nav>
                                </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <tr>
                    <th>S.No</th>
                    <th>Division</th>
                    <th>Division Code</th>
                    <th>Details</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($divisions as $division)
                <tr>
                    <td>{{ $division->id }}</td>
                    <td>{{ $division->division }}</td>
                    <td>{{ $division->division_code }}</td>
                    <td>{{ $division->detail }}</td>
                    <td>
                        <form action="" method="POST">
                            <a class="btn btn-info" href="">Show</a>
                            <a class="btn btn-primary" href="">Edit</a>

                            
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            {{ $divisions->links() }}    
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