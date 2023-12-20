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

    <form action="{{ route('role.store') }}" method="POST">        
        @csrf
        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-6">
                
                            <div class="form-group d-flex">
                                <label for="options"><h4>Role</h4></label>
                                <div>
                                    <select id="gender" name="role_id"  class="select2">
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
                    {{-- @foreach ($permissions->groupBy('module.module_name') as $moduleName => $moduleGroup)
                        <tbody>
                            <tr>
                                <td><h1>{{ $moduleName }}</h1></td>
                                <!-- Add a data-module attribute to store the module ID -->
                                <td><input type="checkbox" name="sel_sun_01" data-module="{{ $moduleGroup->first()->module->id }}" id="unfreezeToggle" value="1" onclick="toggleUnfreeze(this)"></td>
                                <td></td>$permissions->module->module_name as moduleName
                                <td><input type="checkbox" name="1stweek_sun_01" id="freezer" class="item" value="1" onclick="freeze(this)" checked></td>
                                <td><input type="checkbox" name="2ndweek_sun_01" id="freezer1" class="item" value="1" onclick="freeze1(this)" checked></td>
                                <td><input type="checkbox" name="3rdweek_sun_01" id="freezer2" class="item" value="1" onclick="freeze2(this)" checked></td>
                                <td><input type="checkbox" name="4thweek_sun_01" id="freezer3" class="item" value="1" onclick="freeze3(this)" checked></td>
                            </tr>
                            <!-- ... (other rows) ... -->
                            @foreach ($moduleGroup->groupBy('page.name') as $pageName => $pageGroup)
                                <tr>
                                    <td>{{ $pageName }}</td>
                                    <td><input type="checkbox" name="sel_tue_03" id="sel_tue_03" class="item example" value="1"></td>
                                    <td></td>
                                    @foreach ($pageGroup as $data)
                                        <td>
                                            <!-- Add a data-page and data-action attribute to store page and action info -->
                                            <input type="checkbox" name="1stweek_tue_03" class="item example2 not" value="1" data-page="{{ $data->page->id }}" data-action="{{ $data->page_action_id }}">
                                            {{ $data->name }}
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    @endforeach --}}
                        
                        @foreach ($permissions->groupBy('module.module_name') as $moduleName => $moduleGroup)
                            <tbody>
                            
                                <tr> 
                                    <td><h1>{{ $moduleName }}</h1></td>
                                    <td><input type="checkbox" name="module_id[]" id="unfreezeToggle" value="{{ $moduleGroup->first()->module->id }}" onclick="toggleUnfreeze({{ $moduleGroup->first()->module->id }})"></td>    
                                    <td></td>
                                    <td><input type="checkbox" name="" id="freezer" class="item" value="1" onclick="freeze()" checked></td>
                                    <td><input type="checkbox" name="" id="freezer1" class="item" value="1" onclick="freeze1()" checked></td>
                                    <td><input type="checkbox" name="" id="freezer2" class="item" value="1" onclick="freeze2()" checked></td>
                                    <td><input type="checkbox" name="" id="freezer3" class="item" value="1" onclick="freeze3()" checked></td>
                                </tr>
                                <tr>
                                    <td>Tick All</td>
                                    <td><input type="checkbox" name="" id="selectAll" class="item" value="1"></td>
                                    <td></td>
                                    <td><input type="checkbox" name="" id="selectAdd" class="item not" value="1"></td>
                                    <td><input type="checkbox" name="" id="selectView" class="item but" value="1"></td>
                                    <td><input type="checkbox" name="" id="selectEdit" class="item why" value="1"></td>
                                    <td><input type="checkbox" name="" id="selectDelete" class="item the" value="1"></td>
                                </tr>
                                @foreach ($moduleGroup->groupBy('page.name') as $pageName => $pageGroup)
                                    <tr>
                                        <td>{{ $pageName }}</td>
                                        <td><input type="checkbox" name="" id="" class="item example" value="1"></td>
                                        <td></td>
                                        @foreach ($pageGroup as $data)
                                            @if ($data->page_action_id == 1)
                                                <td>
                                                    <input type="checkbox" name="page_id[]" id="item_one" class="item example2 not" value="{{ $data->id }}">
                                                    {{ $data->name }}
                                                </td>
                                            @elseif ($data->page_action_id == 2)
                                                <td><input type="checkbox" name="page_id[]" id="2ndweek_tue_03" class="item example3 but" value="{{ $data->id }}"></td>
                                            @elseif ($data->page_action_id == 3)
                                                <td><input type="checkbox" name="page_id[]" id="3rdweek_tue_03" class="item example4 why" value="{{ $data->id }}"></td>
                                            @elseif ($data->page_action_id == 4)
                                                <td><input type="checkbox" name="page_id[]" id="4thweek_tue_03" class="item example5 the" value="{{ $data->id }}"></td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach    
                            
                            </tbody>
                        @endforeach 
                
                    {{-- @foreach ($permissions as $item)
                        <tbody >   
                                <tr>
                                    <td><h1>{{ $item->module->module_name }}</h1></td>
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
                                    <td>{{ $item->page->name }}</td>
                                    
                                    <td><input type="checkbox" name="sel_tue_03" id="sel_tue_03"  class="item example" value="1"></td>
                                    <td></td>
                                    @if ( $item->page_action_id == '1')
                                        <td><input type="checkbox" name="1stweek_tue_03" id="item_one" class="item example2 not" value="1">{{ $item->name }}</td>
                                    @else 
                                        <td><input type="checkbox" name="2ndweek_tue_03" id="2ndweek_tue_03" class="item example3 but" value="1"></td>
                                    @endif 
                                        <td><input type="checkbox" name="3rdweek_tue_03" id="3rdweek_tue_03" class="item example4 why" value="1"></td>
                                   
                                        <td><input type="checkbox" name="4thweek_tue_03" id="4thweek_tue_03" class="item example5 the" value="1"></td>
                                        
                                </tr>  
                        </tbody>
                    @endforeach --}}
                </table>
                <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" >Submit</button>
            </div>    
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
                <!-- Basic Floating Label Form section end -->

@endsection

@section('script')

    <script>
        function checkboxChecked(id) {
            // alert(id.id);
            // $('#select-all').click(function(event) {
                if (id.checked) {
                    // Iterate each checkbox
                    $('.'+id.id).each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.'+id.id).each(function() {
                        this.checked = false;
                    });
                }
            // });
        }

        function get_distributor() {
            var user_type = $('#user_type').val();
            if (user_type != 5) {
                return;
            }

            $.ajax({
                type: "get",
                url: '{{ url('distributor/get_distributor') }}',
                data: {
                    user_type: user_type
                },
                async: true,
                cache: false,
                success: function(data) {
                    $('#data').html(data);

                }
            });
        }
    </script>
@endsection
{{-- <section id="main" class="main" style="padding-top: 0vh;">
        
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
</section>  --}}
