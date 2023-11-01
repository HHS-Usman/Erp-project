@extends('layout.master')
@section('page-tab')
  Manage Qualification Level
@endsection    
@section('content')
<section id="main" class="main" style="padding-top: 0vh;">
  <div class="pagetitle">
      <h1>Qualification Level</h1>
      <nav>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active"><a> Manage Qualification Level</a></li>
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
          <table class="table table-borderless datatable">
            <tr>
              <th>S.No</th>
              <th>Qualification Level</th>
              <th width="280px">Action</th>
            </tr>
      @foreach ($qualificationlevels as $division)
        <tr>
          <td>{{ $division->id }}</td>
          <td>{{ $division->name}}</td>

          <td>
            <form action="" method="POST">

              <a class="btn btn-primary" href="">Edit</a>

            </form>
          </td>
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
    {{ $qualificationlevels->links() }}    
</section> 
@endsection