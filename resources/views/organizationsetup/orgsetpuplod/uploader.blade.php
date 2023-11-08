@extends('layout.master')
@section('page-tab')
    Uploader Division
@endsection    
@section('content')

  <section id="main" class="main" style="padding-top: 0vh;">
        
       
            <div class="pagetitle" style="margin-left: 20px;">
                <h1>Uploader Division</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Uploader Division</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            {{-- <form action="{{ route('division.store') }}" method="POST">        
      @csrf
       
     </form> --}}
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        
  </section> 

@endsection    