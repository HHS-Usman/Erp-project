@extends('layout.master')
@section('content')
<div id="maincontainer">
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Details</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($divisions as $division)
                <tr>
                    <td>{{ $division->id }}</td>
                    <td>{{ $division->name }}</td>
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
</div>    
@endsection