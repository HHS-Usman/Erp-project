@extends('layout.master')
@section('page-tab')
    Create Role Permission
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
                <h1>Create Role Permission</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Role Permission</a></li>
                </ol>
                </nav>
            </div>
            <br><br><br>
            <head>
                <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    
                <!-- JS -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
               <style>
                    #selects,
                .select2 {
                    width: 100%;
                    padding: 3px;
                }
                </style>
            </head>
            <form action="" method="">        
                
                    <div class="row justify-content-center">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group d-flex">
                                <label for="options">Role</label>
                                <select id="gender" name="gender"  class="select2">
                                  <option class="options">None</option>
                                  @foreach($roles as $item)
                                  <option value="{{ $item->id }}">{{ $item->user_role }}</option>
                                @endforeach
                                </select>
                              </div>
                            
                        </div>
                        
                            <table class="table table-bordered" style="border: 1px solid black">
                                
                                  <thead>
                                    
                                    <tr>
                                      <th scope="col" ></th>
                                      <th>Active</th>
                                      <th></th>
                                      <th>Add</th>
                                      <th>View</th>
                                      <th>Edit</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                
                                  <tbody>
                                    
                                    <tr>
                                        <td><h1>Module Name</h1></td>
                                      <td><input  type="checkbox" name="sel_sun_01"  id="unfreezeToggle" value="1"  onchange="toggleUnfreeze()"></td>
                                      <td></td>
                                      <td><input type="checkbox" name="1stweek_sun_01"  id="freezer" class="item"  value="1" onchange="freeze()" checked></td>
                                      <td><input type="checkbox" name="2ndweek_sun_01"  id="freezer1" class="item" value="1"  onchange="freeze1()" checked></td>
                                      <td><input type="checkbox" name="3rdweek_sun_01"  id="freezer2" class="item" value="1"  onchange="freeze2()" checked></td>
                                      <td><input type="checkbox" name="4thweek_sun_01"  id="freezer3" class="item" value="1"  onchange="freeze3()" checked></td>
                                      
                                    </tr>
                                    <tr>
                                      <td>Tick All</td>
                                      <td><input type="checkbox" name="sel_mon_02" id="selectAll" class="item" value="1"></td>
                                      <td></td>
                                      <td><input type="checkbox" name="1stweek_mon_02" id="selectAdd" class="item not" value="1"></td>
                                      <td><input type="checkbox" name="2ndweek_mon_02" id="selectView" class="item but" value="1"></td>
                                      <td><input type="checkbox" name="3rdweek_mon_02" id="selectEdit" class="item why" value="1"></td>
                                      <td><input type="checkbox" name="4thweek_mon_02" id="selectDelete" class="item the" value="1"></td>
                                    </tr>
                                    <tr>
                                        <td>Pages Name</td>
                                        <td><input type="checkbox" name="sel_tue_03" id="sel_tue_03"  class="item example" value="1"></td>
                                        <td></td>
                                        <td><input type="checkbox" name="1stweek_tue_03" id="item_one" class="item example2 not" value="1"></td>
                                        <td><input type="checkbox" name="2ndweek_tue_03" id="2ndweek_tue_03" class="item example3 but" value="1"></td>
                                        <td><input type="checkbox" name="3rdweek_tue_03" id="3rdweek_tue_03" class="item example4 why" value="1"></td>
                                        <td><input type="checkbox" name="4thweek_tue_03" id="4thweek_tue_03" class="item example5 the" value="1"></td>
                                      </tr>
                                      <tr>
                                        <td>Pages Name</td>  
                                        <td><input type="checkbox" name="sel_wed_04" id="sel_wed_04" class="item example" value="1"></td>
                                        <td></td>
                                        <td><input type="checkbox" name="1stweek_wed_04" id="item_one" class="item example2 not" value="1"></td>
                                        <td><input type="checkbox" name="2ndweek_wed_04" id="2ndweek_wed_04" class="item example3 but" value="1"></td>
                                        <td><input type="checkbox" name="3rdweek_wed_04" id="3rdweek_wed_04" class="item example4 why" value="1"></td>
                                        <td><input type="checkbox" name="4thweek_wed_04" id="4thweek_wed_04" class="item example5 the" value="1"></td>
                                      <tr>
                                        <td>Pages Name</td>
                                        <td><input type="checkbox" name="sel_thu_05" id="sel_thu_05" class="item example" value="1"></td>
                                        <td></td>
                                        <td><input type="checkbox" name="1stweek_thu_05" id="item_one" class="item example2 not" value="1"></td>
                                        <td><input type="checkbox" name="2ndweek_thu_05" id="2ndweek_thu_05" class="item example3 but" value="1"></td>
                                        <td><input type="checkbox" name="3rdweek_thu_05" id="3rdweek_thu_05" class="item example4 why" value="1"></td>
                                        <td><input type="checkbox" name="4thweek_thu_05" id="4thweek_thu_05" class="item example5 the" value="1"></td>
                                        
                                      </tr>
                                      <tr>
                                        <td>Pages Name</td>
                                        <td><input type="checkbox" name="sel_fri_06" id="sel_fri_06" class="item example" value="1"></td>
                                        <td></td>
                                        <td><input type="checkbox" name="1stweek_fri_06" id="item_one" class="item example2 not" value="1"></td>
                                        <td><input type="checkbox" name="2ndweek_fri_06" id="2ndweek_fri_06" class="item example3 but" value="1"></td>
                                        <td><input type="checkbox" name="3rdweek_fri_06" id="3rdweek_fri_06" class="item example4 why" value="1"></td>
                                        <td><input type="checkbox" name="4thweek_fri_06" id="4thweek_fri_06" class="item example5 the" value="1"></td>
                                      </tr>
                                      <tr>
                                        <td>Page Name</td>
                                        <td><input type="checkbox" name="sel_sat_07" id="sel_sat_07" class="item example" value="1"></td>
                                        <td></td>
                                        <td><input type="checkbox" name="1stweek_sat_07" id="1stweek_sat_07" class="item example2 not" value="1"></td>
                                        <td><input type="checkbox" name="2ndweek_sat_07" id="2ndweek_sat_07" class="item example3 but" value="1"></td>
                                        <td><input type="checkbox" name="3rdweek_sat_07" id="3rdweek_sat_07" class="item example4 why" value="1"></td>
                                        <td><input type="checkbox" name="4thweek_sat_07" id="4thweek_sat_07" class="item example5 the" value="1"></td>
                                      </tr>  
                                  </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" >Submit</button>
                    </div>
                   
            </form>
        </div>
        <br><br><br>
        <br>
        
        <div><br> </div>
        <script>
           $(document).ready(function () {
                // By default, set Freeze All to checked and disable individual items
               
                $('.item').prop('disabled', true);

                // Select All checkbox change event
                $('#selectAll').change(function () {
                    $('.example').prop('checked', $(this).prop('checked'));
                });

                // Individual item checkbox change event
                $('.example').change(function () {
                    if (!$(this).prop('checked')) {
                        $('#selectAll').prop('checked', false);
                    }
                });

                // Freeze All checkbox change event
                $('#selectAdd').change(function () {
                    $('.example2').prop('checked', $(this).prop('checked'));
                });

                // Individual item checkbox change event
                $('.example2').change(function () {
                    if (!$(this).prop('checked')) {
                        $('#selectAdd').prop('checked', false);
                    }
                });
                
                $('#selectView').change(function () {
                    $('.example3').prop('checked', $(this).prop('checked')); 
                });

                $('.example3').change(function () {
                    if (!$(this).prop(checked)) {
                        $('#selectView').prop('checked', false);
                    }
                });

                $('#selectEdit').change(function () {
                    $('.example4').prop('checked', $(this).prop('checked'));
                });

                $('.example4').change(function () {
                    if (!$(this).prop(checked)) {
                        $('#selectEdit').prop('checked', $this(this).prop('checked'));
                    }
                });

                $('#selectDelete').change(function () {
                    $('.example5').prop('checked', $(this).prop('checked'));
                });

                $('.example5').change(function () {
                    if (!$(this).prop(checked)) {
                        $('#selectDelete').prop('checked', $(this).prop('checked'));
                    }
                });
            });
            
            function toggleUnfreeze() {
                var unfreezeToggle = document.getElementById('unfreezeToggle');
                var checkboxes = document.getElementsByClassName('item');

                if (unfreezeToggle.checked) {
                    // Unfreeze all checkboxes
                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].disabled = false;
                        checkboxes[i].classList.remove('frozen');
                    }
                } else {
                    // Freeze all checkboxes
                    for (var i = 0; i < checkboxes.length; i++) {
                        checkboxes[i].disabled = true;
                        checkboxes[i].classList.add('frozen');
                    }
                }
            }
            
              function freeze() {
                  var unfreezeToggle = document.getElementById('freezer');
                  var checkboxes = document.getElementsByClassName('not');

                  if (unfreezeToggle.checked) {
                     //  Unfreeze all checkboxes
                      for (var i = 0; i < checkboxes.length; i++) {
                          checkboxes[i].disabled = false;
                          checkboxes[i].classList.remove('frozen');
                      }
                  } else {
                    //   Freeze all checkboxes
                      for (var i = 0; i < checkboxes.length; i++) {
                          checkboxes[i].disabled = true;
                          checkboxes[i].classList.add('frozen');
                      }
                  }
              }
              function freeze1() {
                  var unfreezeToggle = document.getElementById('freezer1');
                  var checkboxes = document.getElementsByClassName('but');

                  if (unfreezeToggle.checked) {
                     //  Unfreeze all checkboxes
                      for (var i = 0; i < checkboxes.length; i++) {
                          checkboxes[i].disabled = false;
                          checkboxes[i].classList.remove('frozen');
                      }
                  } else {
                    //   Freeze all checkboxes
                      for (var i = 0; i < checkboxes.length; i++) {
                          checkboxes[i].disabled = true;
                          checkboxes[i].classList.add('frozen');
                      }
                  }
              }
              function freeze2() {
                  var unfreezeToggle = document.getElementById('freezer2');
                  var checkboxes = document.getElementsByClassName('why');

                  if (unfreezeToggle.checked) {
                     //  Unfreeze all checkboxes
                      for (var i = 0; i < checkboxes.length; i++) {
                          checkboxes[i].disabled = false;
                          checkboxes[i].classList.remove('frozen');
                      }
                  } else {
                    //   Freeze all checkboxes
                      for (var i = 0; i < checkboxes.length; i++) {
                          checkboxes[i].disabled = true;
                          checkboxes[i].classList.add('frozen');
                      }
                  }
              }
              function freeze3() {
                  var unfreezeToggle = document.getElementById('freezer3');
                  var checkboxes = document.getElementsByClassName('the');

                  if (unfreezeToggle.checked) {
                     //  Unfreeze all checkboxes
                      for (var i = 0; i < checkboxes.length; i++) {
                          checkboxes[i].disabled = false;
                          checkboxes[i].classList.remove('frozen');
                      }
                  } else {
                    //   Freeze all checkboxes
                      for (var i = 0; i < checkboxes.length; i++) {
                          checkboxes[i].disabled = true;
                          checkboxes[i].classList.add('frozen');
                      }
                  }
              }
             
      </script>
  </section> 

@endsection    