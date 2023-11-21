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
            <br><br>
            <div class="d-flex justify-content-center">
              <div class=" " style="width: 40%">
               <form id="form1" action="{{ route('weekoffday.store') }}" method="POST">
                @csrf 
                <table class="table table-bordered" style="border: 1px solid black">
                    
                      <thead>
                        <tr>
                            <th colspan="2">Regular weekly basis</th>
                            <th colspan="4">Monthly Week Wise</th>
                            
                        </tr>
                        <tr>
                          <th scope="col" >Days</th>
                          <th scope="col">Selection</th>
                          <th>1st Week</th>
                          <th>2nd Week</th>
                          <th>3rd Week</th>
                          <th>4th Week</th>
                        </tr>
                      </thead>
                    
                      <tbody>
                        
                        <tr>
                          <td>Sunday</td>
                          <td><input  type="checkbox" name="sel_sun_01"  id="sel_sun_01" value="1"></td>
                          <td><input type="checkbox" name="1stweek_sun_01"  id="1stweek_sun_01" value="1"></td>
                          <td><input type="checkbox" name="2ndweek_sun_01"  id="2ndweek_sun_01" value="1"></td>
                          <td><input type="checkbox" name="3rdweek_sun_01"  id="3rdweek_sun_01" value="1"></td>
                          <td><input type="checkbox" name="4thweek_sun_01"  id="4thweek_sun_01" value="1"></td>
                          
                        </tr>
                        <tr>
                          <td>Monday</td>
                          <td><input type="checkbox" name="sel_mon_02" id="sel_mon_02" value="1"></td>
                          <td><input type="checkbox" name="1stweek_mon_02" id="1stweek_mon_02" value="1"></td>
                          <td><input type="checkbox" name="2ndweek_mon_02" id="2ndweek_mon_02" value="1"></td>
                          <td><input type="checkbox" name="3rdweek_mon_02" id="3rdweek_mon_02" value="1"></td>
                          <td><input type="checkbox" name="4thweek_mon_02" id="4thweek_mon_02" value="1"></td>
                        </tr>
                        <tr>
                            <td>Tuesday</td>
                            <td><input type="checkbox" name="sel_tue_03" id="sel_tue_03" value="1"></td>
                            <td><input type="checkbox" name="1stweek_tue_03" id="1stweek_tue_03" value="1"></td>
                            <td><input type="checkbox" name="2ndweek_tue_03" id="2ndweek_tue_03" value="1"></td>
                            <td><input type="checkbox" name="3rdweek_tue_03" id="3rdweek_tue_03" value="1"></td>
                            <td><input type="checkbox" name="4thweek_tue_03" id="4thweek_tue_03" value="1"></td>
                          </tr>
                          <tr>
                            <td>Wednesday</td>  
                            <td><input type="checkbox" name="sel_wed_04" id="sel_wed_04" value="1"></td>
                            <td><input type="checkbox" name="1stweek_wed_04" id="1stweek_wed_04" value="1"></td>
                            <td><input type="checkbox" name="2ndweek_wed_04" id="2ndweek_wed_04" value="1"></td>
                            <td><input type="checkbox" name="3rdweek_wed_04" id="3rdweek_wed_04" value="1"></td>
                            <td><input type="checkbox" name="4thweek_wed_04" id="4thweek_wed_04" value="1"></td>
                          <tr>
                            <td>Thursday</td>
                            <td><input type="checkbox" name="sel_thu_05" id="sel_thu_05" value="1"></td>
                            <td><input type="checkbox" name="1stweek_thu_05" id="1stweek_thu_05" value="1"></td>
                            <td><input type="checkbox" name="2ndweek_thu_05" id="2ndweek_thu_05" value="1"></td>
                            <td><input type="checkbox" name="3rdweek_thu_05" id="3rdweek_thu_05" value="1"></td>
                            <td><input type="checkbox" name="4thweek_thu_05" id="4thweek_thu_05" value="1"></td>
                            
                          </tr>
                          <tr>
                            <td>Friday</td>
                            <td><input type="checkbox" name="sel_fri_06" id="sel_fri_06" value="1"></td>
                            <td><input type="checkbox" name="1stweek_fri_06" id="1stweek_fri_06" value="1"></td>
                            <td><input type="checkbox" name="2ndweek_fri_06" id="2ndweek_fri_06" value="1"></td>
                            <td><input type="checkbox" name="3rdweek_fri_06" id="3rdweek_fri_06" value="1"></td>
                            <td><input type="checkbox" name="4thweek_fri_06" id="4thweek_fri_06" value="1"></td>
                          </tr>
                          <tr>
                            <td>Saturday</td>
                            <td><input type="checkbox" name="sel_sat_07" id="sel_sat_07" value="1"></td>
                            <td><input type="checkbox" name="1stweek_sat_07" id="1stweek_sat_07" value="1"></td>
                            <td><input type="checkbox" name="2ndweek_sat_07" id="2ndweek_sat_07" value="1"></td>
                            <td><input type="checkbox" name="3rdweek_sat_07" id="3rdweek_sat_07" value="1"></td>
                            <td><input type="checkbox" name="4thweek_sat_07" id="4thweek_sat_07" value="1"></td>
                          </tr>  
                      </tbody>
                </table>
                
               </form>
              </div>  
                <div class="" style="">
                    <ul style="list-style:none; width:100%;height:auto; ">
                        <li style="margin:20px"><button type="button" class="btn btn-primary p-3 px-5  col-12" onclick="toggleEnableDisable()" id="regbtn">Regular weekly basis</button></li>
                        <li style="margin:20px"><button type="button" class="btn btn-primary p-3 px-5 col-12" onclick="toggleWeek()"  id="weekbtn">Monthly Week Wise</button></li>
                        <li style="margin:20px"><button type="button" class="btn btn-primary p-3 px-5 col-12" onclick="toggleMonth()"  id="monthbtn">Monthly Day  Wise</button></li>
                        <li style="margin:20px"><button type="button" class="btn btn-primary p-3 px-5 col-12" id="submitButton" >Save</button></li>
                    
                    </ul>
                </div>
            </div>
            <div id="myDiv" class="col-xs-12 col-sm-12 col-md-12 text-center">
              <head>
                <style>
                .selected{
                  cursor: pointer;
                  background-color: #157EFB !important;
                  color: #FFF;
                  border-radius: 0.25rem;
                }
                .disabled-div {
                    opacity: 0.5; /* Adjust the opacity value as needed (0.0 to 1.0) */
                    pointer-events: none; /* Disable pointer events on the div */
                }
                .clicked-button {
                      background-color: darkblue !important; /* Change the color as needed */
                      color: white; /* Change the text color as needed */
                  }
              </style>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                          crossorigin="anonymous">
                  </script>
                  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                          crossorigin="anonymous"></script>
                  <!-- Project Files -->
                  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                  <link rel="stylesheet" href="/as/jquery.bootstrap.year.calendar.css">
                  <script src="/as/jquery.bootstrap.year.calendar.js"></script>
                  <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                  
              </head>
              <div id="myDiv">
                <div class="container">
                    <div class="calendar" id="calendar"></div>   
                </div>
              </div>
              <div class="row " style="">
                @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
                 @endif
                <form id="form2" action="{{ route('monthlydaywise.store') }}" method="POST">
                  @csrf 
                  <div class="card-body col-xs-12 col-sm-12 col-md-12 text-center">  
                    <table class="table table-bordered datatable " style="">
                      <thead>
                        <tr >
                          <th scope="col">S.no</th>
                          <th scope="col">Year</th>
                          <th scope="col">Month</th>
                          <th scope="col">Date</th>
                          <th scope="col">Day</th>
                          <th scope="col">Applied To Country</th>
                          <th scope="col">State/Province</th>
                          <th scope="col">religion</th>
                          <th scope="col">Group</th>
                          <th scope="col">Remove</th>
                        </tr>
  
                      </thead>
                      
                        <tbody id="my_test">
                        

                        </tbody>
                        
                    
                    </table>
                  </div>
                  
                 </form> 
                </div>  
              </div>  
                <script>

                    $('.calendar').calendar({
                        startFromSunday: true,
                
                    });

                </script>
            
                <script>
                      function toggleEnableDisable() {
                        var myDiv = document.getElementById('myDiv');
                        var Check1 = document.getElementById('1stweek_sun_01');
                        var Check2 = document.getElementById('2ndweek_sun_01');
                        var Check3 = document.getElementById('3rdweek_sun_01');
                        var Check4 = document.getElementById('4thweek_sun_01');
                        var Check5 = document.getElementById('1stweek_mon_02');
                        var Check6 = document.getElementById('2ndweek_mon_02');
                        var Check7 = document.getElementById('3rdweek_mon_02');
                        var Check8 = document.getElementById('4thweek_mon_02');
                        var Check9 = document.getElementById('1stweek_tue_03');
                        var Check10 = document.getElementById('2ndweek_tue_03');
                        var Check11 = document.getElementById('3rdweek_tue_03');
                        var Check12 = document.getElementById('4thweek_tue_03');
                        var Check13 = document.getElementById('1stweek_wed_04');
                        var Check14 = document.getElementById('2ndweek_wed_04');
                        var Check15 = document.getElementById('3rdweek_wed_04');
                        var Check16 = document.getElementById('4thweek_wed_04');
                        var Check17 = document.getElementById('1stweek_thu_05');
                        var Check18 = document.getElementById('2ndweek_thu_05');
                        var Check19 = document.getElementById('3rdweek_thu_05');
                        var Check20 = document.getElementById('4thweek_thu_05');
                        var Check21 = document.getElementById('1stweek_fri_06');
                        var Check22 = document.getElementById('2ndweek_fri_06');
                        var Check23 = document.getElementById('3rdweek_fri_06');
                        var Check24 = document.getElementById('4thweek_fri_06');
                        var Check25 = document.getElementById('1stweek_sat_07');
                        var Check26 = document.getElementById('2ndweek_sat_07');
                        var Check27 = document.getElementById('3rdweek_sat_07');
                        var Check28 = document.getElementById('4thweek_sat_07');
                        
                        // Toggle the 'disabled' property of the div and form elements
                        myDiv.disabled = !myDiv.disabled;
                        Check1.disabled = !Check1.disabled;
                        Check2.disabled = !Check2.disabled;
                        Check3.disabled = !Check3.disabled;
                        Check4.disabled = !Check4.disabled;
                        Check5.disabled = !Check5.disabled;
                        Check6.disabled = !Check6.disabled;
                        Check7.disabled = !Check7.disabled;
                        Check8.disabled = !Check8.disabled;
                        Check9.disabled = !Check9.disabled;
                        Check10.disabled = !Check10.disabled;
                        Check11.disabled = !Check11.disabled;
                        Check12.disabled = !Check12.disabled;
                        Check13.disabled = !Check13.disabled;
                        Check14.disabled = !Check14.disabled;
                        Check15.disabled = !Check15.disabled;
                        Check16.disabled = !Check16.disabled;
                        Check17.disabled = !Check17.disabled;
                        Check18.disabled = !Check18.disabled;
                        Check19.disabled = !Check19.disabled;
                        Check20.disabled = !Check20.disabled;
                        Check21.disabled = !Check21.disabled;
                        Check22.disabled = !Check22.disabled;
                        Check23.disabled = !Check23.disabled;
                        Check24.disabled = !Check24.disabled;
                        Check25.disabled = !Check25.disabled;
                        Check26.disabled = !Check26.disabled;
                        Check27.disabled = !Check27.disabled;
                        Check28.disabled = !Check28.disabled;
                      }
                      $(document).ready(function () {
                          $('#regbtn').on('click', function () {
                              $('#myDiv').toggleClass('disabled-div');
                              $(this).toggleClass('clicked-button');
                          });
                      });
                      function toggleWeek() {
                        var myDiv = document.getElementById('myDiv');
                        var Chec1 = document.getElementById('sel_sun_01');
                        var Chec2 = document.getElementById('sel_mon_02');
                        var Chec3 = document.getElementById('sel_tue_03');
                        var Chec4 = document.getElementById('sel_wed_04');
                        var Chec5 = document.getElementById('sel_thu_05');
                        var Chec6 = document.getElementById('sel_fri_06');
                        var Chec7 = document.getElementById('sel_sat_07');
                        
                        // Toggle the 'disabled' property of the div and form elements
                        myDiv.disabled = !myDiv.disabled;
                        Chec1.disabled = !Chec1.disabled;
                        Chec2.disabled = !Chec2.disabled;
                        Chec3.disabled = !Chec3.disabled;
                        Chec4.disabled = !Chec4.disabled;
                        Chec5.disabled = !Chec5.disabled;
                        Chec6.disabled = !Chec6.disabled;
                        Chec7.disabled = !Chec7.disabled;
                        
                      }
                      $(document).ready(function () {
                          $('#weekbtn').on('click', function () {
                              $('#myDiv').toggleClass('disabled-div');
                              $(this).toggleClass('clicked-button');
                          });
                      });
                      function toggleMonth() {
                        var Chec1 = document.getElementById('sel_sun_01');
                        var Chec2 = document.getElementById('sel_mon_02');
                        var Chec3 = document.getElementById('sel_tue_03');
                        var Chec4 = document.getElementById('sel_wed_04');
                        var Chec5 = document.getElementById('sel_thu_05');
                        var Chec6 = document.getElementById('sel_fri_06');
                        var Chec7 = document.getElementById('sel_sat_07');
                        var Check1 = document.getElementById('1stweek_sun_01');
                        var Check2 = document.getElementById('2ndweek_sun_01');
                        var Check3 = document.getElementById('3rdweek_sun_01');
                        var Check4 = document.getElementById('4thweek_sun_01');
                        var Check5 = document.getElementById('1stweek_mon_02');
                        var Check6 = document.getElementById('2ndweek_mon_02');
                        var Check7 = document.getElementById('3rdweek_mon_02');
                        var Check8 = document.getElementById('4thweek_mon_02');
                        var Check9 = document.getElementById('1stweek_tue_03');
                        var Check10 = document.getElementById('2ndweek_tue_03');
                        var Check11 = document.getElementById('3rdweek_tue_03');
                        var Check12 = document.getElementById('4thweek_tue_03');
                        var Check13 = document.getElementById('1stweek_wed_04');
                        var Check14 = document.getElementById('2ndweek_wed_04');
                        var Check15 = document.getElementById('3rdweek_wed_04');
                        var Check16 = document.getElementById('4thweek_wed_04');
                        var Check17 = document.getElementById('1stweek_thu_05');
                        var Check18 = document.getElementById('2ndweek_thu_05');
                        var Check19 = document.getElementById('3rdweek_thu_05');
                        var Check20 = document.getElementById('4thweek_thu_05');
                        var Check21 = document.getElementById('1stweek_fri_06');
                        var Check22 = document.getElementById('2ndweek_fri_06');
                        var Check23 = document.getElementById('3rdweek_fri_06');
                        var Check24 = document.getElementById('4thweek_fri_06');
                        var Check25 = document.getElementById('1stweek_sat_07');
                        var Check26 = document.getElementById('2ndweek_sat_07');
                        var Check27 = document.getElementById('3rdweek_sat_07');
                        var Check28 = document.getElementById('4thweek_sat_07');
                        
                        Chec1.disabled = !Chec1.disabled;
                        Chec2.disabled = !Chec2.disabled;
                        Chec3.disabled = !Chec3.disabled;
                        Chec4.disabled = !Chec4.disabled;
                        Chec5.disabled = !Chec5.disabled;
                        Chec6.disabled = !Chec6.disabled;
                        Chec7.disabled = !Chec7.disabled;
                        Check1.disabled = !Check1.disabled;
                        Check2.disabled = !Check2.disabled;
                        Check3.disabled = !Check3.disabled;
                        Check4.disabled = !Check4.disabled;
                        Check5.disabled = !Check5.disabled;
                        Check6.disabled = !Check6.disabled;
                        Check7.disabled = !Check7.disabled;
                        Check8.disabled = !Check8.disabled;
                        Check9.disabled = !Check9.disabled;
                        Check10.disabled = !Check10.disabled;
                        Check11.disabled = !Check11.disabled;
                        Check12.disabled = !Check12.disabled;
                        Check13.disabled = !Check13.disabled;
                        Check14.disabled = !Check14.disabled;
                        Check15.disabled = !Check15.disabled;
                        Check16.disabled = !Check16.disabled;
                        Check17.disabled = !Check17.disabled;
                        Check18.disabled = !Check18.disabled;
                        Check19.disabled = !Check19.disabled;
                        Check20.disabled = !Check20.disabled;
                        Check21.disabled = !Check21.disabled;
                        Check22.disabled = !Check22.disabled;
                        Check23.disabled = !Check23.disabled;
                        Check24.disabled = !Check24.disabled;
                        Check25.disabled = !Check25.disabled;
                        Check26.disabled = !Check26.disabled;
                        Check27.disabled = !Check27.disabled;
                        Check28.disabled = !Check28.disabled;
                      }
                      $(document).ready(function() {
                        $('#monthbtn').on('click', function() {
                          $('#myDiv').removeClass('disabled-div');
                          $(this).toggleClass('clicked-button');
                        });
                      
                        
                    });
                </script>
                <script>
                  $(document).ready(function () {
                      $('#submitButton').on('click', function () {
                          // Check if form1 is enabled before submitting
                          if ($('#myDiv').hasClass('disabled-div')) {
                              $('#form2').submit();
                          } else {
                              $('#form1').submit();
                          }
                      });
                  });
              </script>
              
              <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
              
             
              <script>
                  // Make an AJAX request to fetch country data
                  axios.get('/get-countries')
                      .then(function (response) {
                          var countries = response.data;
              
                          // Use the country data in your JavaScript logic
                          console.log(countries);
              
                          // Example: Loop through countries and append options to a select element
                          var select = document.getElementById('countrySelect');
                          countries.forEach(function (country) {
                              var option = document.createElement('option');
                              option.value = country.id;
                              option.text = country.name;
                              select.appendChild(option);
                          });
                      })
                      .catch(function (error) {
                          console.error(error);
                      });
              </script>
              
              
              
            </div>
        
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        <script>
        
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
        </script>
        <script>
         
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
        <!-- Project Files -->
        <link rel="stylesheet" href="/as/jquery.bootstrap.year.calendar.css">
        <script src="/as/jquery.bootstrap.year.calendar.js"></script>
  </section> 

@endsection    