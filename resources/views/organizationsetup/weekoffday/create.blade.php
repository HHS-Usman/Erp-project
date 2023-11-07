@extends('layout.master')
@section('page-tab')
    Create Week Off Day
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
                <h1>Create Week Off Day</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Week Off Day</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <div class="d-flex justify-content-center">
                <table class="table table-bordered col-4" style="border: 1px solid black">
                  <thead>
                    <tr>
                        <th colspan="2">Regular weekly basis</th>
                        <th colspan="4">Monthly Week Wise</th>
                    </tr>
                    <tr>
                      <th scope="col" >Days</th>
                      <th scope="col">Selection</th>
                      <th scope="col">1st Week</th>
                      <th scope="col">2nd Week</th>
                      <th scope="col">3rd Week</th>
                      <th scope="col">4th Week</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    <tr>
                      <td>Sunday</td>
                      <th><input type="checkbox" name="checkbox1" id="checkbox1"></th>
                      <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                    </tr>
                    <tr>
                      <td>Monday</td>
                      <th><input type="checkbox" name="checkbox1" id="checkbox1"></th>
                      <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                    </tr>
                    <tr>
                        <td>Tuesday</td>
                        <th><input type="checkbox" name="checkbox1" id="checkbox1"></th>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      </tr>
                      <tr>
                        <td>Wednesday</td>
                        <th><input type="checkbox" name="checkbox1" id="checkbox1"></th>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      </tr>
                      <tr>
                        <td>Thursday</td>
                        <th><input type="checkbox" name="checkbox1" id="checkbox1"></th>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      </tr>
                      <tr>
                        <td>Friday</td>
                        <th><input type="checkbox" name="checkbox1" id="checkbox1"></th>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      </tr>
                      <tr>
                        <td>Saturday</td>
                        <th><input type="checkbox" name="checkbox1" id="checkbox1"></th>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                        <td><input type="checkbox" name="checkbox1" id="checkbox1"></td>
                      </tr>  
                  </tbody>
                  
                </table>
                
                <div class="" style="">
                    <ul style="list-style:none; width:100%;height:auto; border:1px solid rgb(144, 78, 78)">
                        <li style="margin:20px"><button type="button" class="btn btn-primary p-3 px-5" >Regular weekly basis</button></li>
                        <li style="margin:20px"><button type="button" class="btn btn-primary p-3 px-5" style="padding:0px 25px 0px 25px">Monthly Week Wise</button></li>
                        <li style="margin:20px"><button type="button" class="btn btn-primary p-3 px-5" style="padding:0px 25px 0px 25px">Monthly Day  Wise</button></li>
                    </ul>
                </div>
            </div>
            <div>
                <div class="container">
                    <div class="calendar"></div>
                   
                </div>
                <script>
                    $('.calendar').calendar({
                        startFromSunday: true,
                    });
                </script>
            </div>
        
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <!-- Project Files -->
        <link rel="stylesheet" href="/as/jquery.bootstrap.year.calendar.css">
        <script src="/as/jquery.bootstrap.year.calendar.js"></script>
  </section> 

@endsection    