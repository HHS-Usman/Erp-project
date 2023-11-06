@extends('layout.master')
@section('page-tab')
    Create Week Off Day
@endsection    
@section('content')
    <section id="main" class="main" style="padding-top: 0vh;">
        <div class="pagetitle" style="margin-left: 20px;">
            <h1>Manage calender Day</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a> Manage Week Off Day</a></li>
            </ol>
            </nav>
        </div>
        <div class=" d-flex">
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
            
            <div class="" style="border: 1px solid red; width:30%">
                <ul style="list-style:none; width:100%;height:auto; border:1px solid rgb(144, 78, 78)">
                    <li style><button type="button" class="btn btn-primary p-3 px-5" >Regular weekly basis</button></li>
                    <li style=""><button type="button" class="btn btn-primary p-3 px-5" style="padding:0px 25px 0px 25px">Monthly Week Wise</button></li>
                    <li style=""><button type="button" class="btn btn-primary p-3 px-5" style="padding:0px 25px 0px 25px">Monthly Day  Wise</button></li>
                </ul>
            </div>
        </div>    
    </section>    
@endsection