<?php
use App\Helpers\MasterFormsHelper;
$master = new MasterFormsHelper();
?>
@extends('layout.master')
@section('title', "SND || Add New Designation")
@section('content')


<section id="multiple-column-form">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">ADD NEW USER ROLE</h4>
                </div>
                <div class="card-body">
                    <form id="subm" method="POST" action="{{ route('role.store') }}" class="form">
                        @csrf
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label>Role Name<strong>*</strong></label>
                                    <input name="role_name" value="{{ old('role_name') }}" type="text" class="form-control" placeholder="Role Name"/>
                                </div>
                            </div>

                            <div class="col-md-12 form-check sperater2">
                                <strong>Permissions</strong>
                                <div class="row padl">
                                    
                                        {{-- @dd($mainModule); --}}
                                        <div class="col-md-12">
                                            <input class="form-check-input" type="checkbox"
                                                id="" onclick="checkboxChecked(this)">
                                            <strong></strong>


                                        </div>
                                         {{-- @foreach ($mainModule['permissions'] as $id => $permission) --}}
                                            {{-- @dd($id); --}}
                                                <div class="col-md-3 form-check padtbh">
                                                    <input class="form-check-input" value="" type="checkbox" id="permissions" name="permissions[]">
                                                    <label class="form-check-label"
                                                        for="permissions"></label>
                                                </div>
                                       
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary mr-1">Create Item</button>
                                <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
                        <label for="options"><h4 class="card-title">ADD ROLE</h4></label>
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
                            {{-- @php
                                $groupedPermissions = $permissions->groupBy(['module_id', 'page_id']);
                            @endphp
                            
                            @foreach ($groupedPermissions as $modulePageGroup)
                                @foreach ($modulePageGroup as $data)
                                    <tr>
                                        <td rowspan="4">
                                            @if (isset($data->module))
                                                <h1>{{ $data->module->module_name }}</h1>
                                            @endif
                                        </td>
                                        <td><input type="checkbox" name="sel_sun_01" id="unfreezeToggle" value="1" onchange="toggleUnfreeze()"></td>
                                        <!-- Other cells for the first action -->
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="sel_mon_02" id="selectAll" class="item" value="1"></td>
                                        <!-- Other cells for the second action -->
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" name="sel_tue_03" id="sel_tue_03" class="item example" value="1"></td>
                                        <!-- Other cells for the third action -->
                                    </tr>
                                    <tr>
                                        <td>
                                            @if (isset($data->page))
                                                {{ $data->page->name }}
                                            @endif
                                        </td>
                                        <!-- Cells for the page details -->
                                        <td>
                                            @if (isset($data->page_action_id))
                                                @if($data->page_action_id == 1)  
                                                    {{ $data->name }} <input type="checkbox" name="1stweek_tue_03" id="item_one" class="item example2 not" value="1">
                                                @elseif ($data->page_action_id == 2)
                                                    {{ $data->name }}<input type="checkbox" name="2ndweek_tue_03" id="2ndweek_tue_03" class="item example3 but" value="1">
                                                @elseif ($data->page_action_id == 3)
                                                    {{ $data->name }}<input type="checkbox" name="3rdweek_tue_03" id="3rdweek_tue_03" class="item example4 why" value="1">
                                                @elseif ($data->page_action_id == 4) 
                                                    {{ $data->name }} <br><input type="checkbox" name="4thweek_tue_03" id="4thweek_tue_03" class="item example5 the" value="1">
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach    
                            @endforeach --}}
                            
                            


                            @foreach ($permissions->groupBy('module_id') as $moduleGroup)
                            @foreach ($moduleGroup->groupBy('page_id') as $pageGroup)
                                <tr>
                                    <td rowspan="{{ $pageGroup->count() * 4 }}"> 
                                        <!-- Display the module name once for all pages in this module -->
                                        {{ optional($pageGroup->first()->module)->module_name }}
                                    </td>
                                </tr>
                                @foreach ($pageGroup as $data)
                                    <tr>
                                        <td>{{ optional($data->page)->name }}</td>
                                        <td><input type="checkbox" name="add_{{ $data->id }}" value="1">{{ $data->id }}</td>
                                        <td><input type="checkbox" name="edit_{{ $data->id }}" value="1">{{ $data->id }}</td>
                                        <td><input type="checkbox" name="view_{{ $data->id }}" value="1">{{ $data->id }}</td>
                                        <td><input type="checkbox" name="delete_{{ $data->id }}" value="1">{{ $data->id }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                        
                             
                                {{-- <tr>
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
                                </tr>   --}}
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
