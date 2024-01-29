@extends('layout.master')
@section('page-tab')
Create Role Permission
@endsection
@section('content')
<?php
use Spatie\Permission\Models\Permission;
?>
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
    @if(session('success'))
    <script>
        window.onload = function() {
                    alert("{{ session('success') }}");
                }
    </script>
    @endif

    <div class="pagetitle" style="margin-left: 20px;">
        <h1>Create recent Role Permission</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a> Create Role Permission</a></li>
            </ol>
        </nav>
    </div>

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
                    <label for="options">
                        <h4>Role</h4>
                    </label>
                    <div></div>
                    <select id="name" name="role_name" class="form-select" style="margin-left: 2%">
                        <option class="options" value="">None</option>
                        @foreach($roles as $item)
                        <option value="{{ $item->user_role }}|{{ $item->id }}">{{ $item->user_role }}</option>
                        @endforeach
                    </select>

                </div>
                <table class="table table-bordered" style="border: 1px solid black">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th>Active</th>
                            <th></th>
                            <th>Add</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    @foreach ($permissions->groupBy('module.module_name') as $moduleName => $moduleGroup)
                    <tbody>

                        <tr>
                            <td>
                                <h1>{{ $moduleName }}</h1>
                            </td>

                            <td>
                                @foreach ( $moduleGroup as $data )
                                @if ($data->page_action_id == 7)
                                <input type="checkbox" name="permissions[]" id="unfreezeToggle_{{ $moduleName }}"
                                    value="{{ $data->id }}"
                                    onclick="toggleUnfreeze('{{ $moduleName }}', {{ $moduleGroup->first()->module->id }})">
                                @endif
                                @endforeach
                            </td>
                            <td></td>
                            <td><input type="checkbox" name="{{ $moduleName }}" id="freezer_{{ $moduleName }}"
                                    class="ite item_{{ $moduleName}}" value="{{ $moduleGroup->first()->module->id }}"
                                    onclick="freeze('{{ $moduleName }}', {{ $moduleGroup->first()->module->id }})"
                                    checked></td>
                            <td><input type="checkbox" name="" id="freezer1_{{ $moduleName }}"
                                    class="ite item_{{ $moduleName}}" value="1"
                                    onclick="freeze1('{{ $moduleName }}', {{ $moduleGroup->first()->module->id }})"
                                    checked></td>
                            <td><input type="checkbox" name="" id="freezer2_{{ $moduleName }}"
                                    class="ite item_{{ $moduleName}}" value="1"
                                    onclick="freeze2('{{ $moduleName }}', {{ $moduleGroup->first()->module->id }})"
                                    checked></td>
                            <td><input type="checkbox" name="" id="freezer3_{{ $moduleName }}"
                                    class="ite item_{{ $moduleName}}" value="1"
                                    onclick="freeze3('{{ $moduleName }}', {{ $moduleGroup->first()->module->id }})"
                                    checked></td>
                        </tr>
                        <tr>
                            <td>Tick All</td>
                            <td><input type="checkbox" name="" id="selectAll_{{ $moduleName }}"
                                    class="ite item_{{ $moduleName}} selectAll"
                                    value="{{ $moduleGroup->first()->module->id }}" data-module="{{ $moduleName }}">
                            </td>
                            <td></td>
                            <td><input type="checkbox" name="" id="selectAdd_{{ $moduleName }}"
                                    class="ite item_{{ $moduleName }} example0_{{ $moduleName}} not_{{ $moduleName }} selectAdd"
                                    value="{{ $moduleGroup->first()->module->id }}" data-module="{{ $moduleName }}">
                            </td>
                            <td><input type="checkbox" name="" id="selectView_{{ $moduleName }}"
                                    class="ite item_{{ $moduleName}} example0_{{ $moduleName}} but_{{ $moduleName}} selectView"
                                    value="{{ $moduleGroup->first()->module->id }}" data-module="{{ $moduleName }}">
                            </td>
                            <td><input type="checkbox" name="" id="selectEdit_{{ $moduleName }}"
                                    class="ite item_{{ $moduleName}} example0_{{ $moduleName}} why_{{ $moduleName}} selectEdit"
                                    value="{{ $moduleGroup->first()->module->id }}" data-module="{{ $moduleName }}">
                            </td>
                            <td><input type="checkbox" name="" id="selectDelete"
                                    class="ite item_{{ $moduleName}} example0_{{ $moduleName}} the_{{ $moduleName}} selectDelete"
                                    value="{{ $moduleGroup->first()->module->id }}" data-module="{{ $moduleName }}">
                            </td>
                        </tr>
                        @foreach ($moduleGroup->groupBy('page.name') as $pageName => $pageGroup)
                        <tr>
                            <td>{{ $pageName }}</td>
                            <td><input type="checkbox" name="" id="tick_{{ $pageName}}"
                                    class="ite item_{{ $moduleName}} example0_{{ $moduleName}} tick" value="{{ $pageGroup->first()->module->id }}" data-page="{{ $pageName }}"></td>
                            <td></td>
                            @foreach ($pageGroup as $data)
                            @if ($data->page_action_id == 1)
                            <td>
                                <input type="checkbox" name="permissions[]" id="item_one"
                                    class="ite item_{{ $moduleName}} example2_{{ $moduleName}} not_{{ $moduleName}} exam_{{ $pageName}}  example0_{{ $moduleName}}"
                                    value="{{ $data->id }}">
                            </td>

                            @elseif ($data->page_action_id == 2)
                            <td><input type="checkbox" name="permissions[]" id="2ndweek_tue_03"
                                    class="ite item_{{ $moduleName}} example3_{{ $moduleName}} but_{{ $moduleName}} exam_{{ $pageName}}  example0_{{ $moduleName}}"
                                    value="{{ $data->id }}"></td>
                            @elseif ($data->page_action_id == 3)
                            <td><input type="checkbox" name="permissions[]" id="3rdweek_tue_03"
                                    class="ite item_{{ $moduleName}} example4_{{ $moduleName}} why_{{ $moduleName}} exam_{{ $pageName}}  example0_{{ $moduleName}}"
                                    value="{{ $data->id }}"></td>
                            @elseif ($data->page_action_id == 4)
                            <td><input type="checkbox" name="permissions[]" id="4thweek_tue_03"
                                    class="ite item_{{ $moduleName}} example5_{{ $moduleName}} the_{{ $moduleName}} exam_{{ $pageName}}  example0_{{ $moduleName}}"
                                    value="{{ $data->id }}"></td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach

                    </tbody>
                    @endforeach

                </table>
                <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;">Submit</button>
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

            $('.ite').prop('disabled', true);

            // Select All checkbox change event
            $('.tick').change(function () {
                    var $pageName = $(this).attr('data-page');
                    $('.exam_' + $pageName).prop('checked', $(this).prop('checked'));

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState($pageName);
                });

                // Individual item checkbox change event
                $('.exam_{{ $pageName }}').change(function () {
                    var $pageName = $(this).attr('data-page');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState($pageName);
                });

                // Initial state check for selectAdd
                $('.exam_{{ $pageName }}').each(function () {
                    var $pageName = $(this).attr('data-page');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState($pageName);
                });

                // Initial state check for selectAdd
                $('.exam_{{ $pageName }}').each(function () {
                    var $pageName = $(this).attr('data-page');
                    if (!$(this).prop('checked')) {
                        $('.tick[data-page="' + $pageName + '"]').prop('checked', false);
                    }
                });

                // Freeze All checkbox change event
                $('.selectAdd').change(function () {
                    var moduleName = $(this).attr('data-module');
                    $('.example2_' + moduleName).prop('checked', $(this).prop('checked'));

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState(moduleName);
                });

                // Individual item checkbox change event
                $('.example2_{{ $moduleName }}').change(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example2_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example2_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');
                    if (!$(this).prop('checked')) {
                        $('.selectAdd[data-module="' + moduleName + '"]').prop('checked', false);
                    }
                });

                $('.selectView').change(function () {
                    var moduleName = $(this).attr('data-module');
                    $('.example3_' + moduleName).prop('checked', $(this).prop('checked'));

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState(moduleName);
                });

                // Individual item checkbox change event
                $('.example3_{{ $moduleName }}').change(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectViewState(moduleName);
                });

                // Initial state check for selectView
                $('.example3_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectView accordingly
                    updateSelectViewState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example3_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');
                    if (!$(this).prop('checked')) {
                        $('.selectView[data-module="' + moduleName + '"]').prop('checked', false);
                    }
                });

                $('.selectEdit').change(function () {
                    var moduleName = $(this).attr('data-module');
                    $('.example4_' + moduleName).prop('checked', $(this).prop('checked'));

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectEditState(moduleName);
                });

                // Individual item checkbox change event
                $('.example4_{{ $moduleName }}').change(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectEdit accordingly
                    updateSelectEditState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example4_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectEditState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example4_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');
                    if (!$(this).prop('checked')) {
                        $('.selectEdit[data-module="' + moduleName + '"]').prop('checked', false);
                    }
                });

                $('.selectDelete').change(function () {
                    var moduleName = $(this).attr('data-module');
                    $('.example5_' + moduleName).prop('checked', $(this).prop('checked'));

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectDeleteState(moduleName);
                });

                // Individual item checkbox change event
                $('.example5_{{ $moduleName }}').change(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectDeleteState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example5_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectDeleteState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example5_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');
                    if (!$(this).prop('checked')) {
                        $('.selectDelete[data-module="' + moduleName + '"]').prop('checked', false);
                    }
                });
                $('.selectAll').change(function () {
                    var moduleName = $(this).attr('data-module');
                    $('.example0_' + moduleName).prop('checked', $(this).prop('checked'));

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState(moduleName);
                });

                // Individual item checkbox change event
                $('.example0_{{ $moduleName }}').change(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example0_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');

                    // Check the state of the individual checkboxes and update selectAdd accordingly
                    updateSelectAddState(moduleName);
                });

                // Initial state check for selectAdd
                $('.example0_{{ $moduleName }}').each(function () {
                    var moduleName = $(this).attr('data-module');
                    if (!$(this).prop('checked')) {
                        $('.selectAll[data-module="' + moduleName + '"]').prop('checked', false);
                    }
                });

                    });

            function toggleUnfreeze(moduleName, moduleId) {
                var unfreezeToggle = document.getElementById('unfreezeToggle_' + moduleName);
                var checkboxes = document.getElementsByClassName('item_' + moduleName);

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

          function freeze(moduleName, moduleId) {
              var unfreezeToggle = document.getElementById('freezer_' + moduleName);
              var checkboxes = document.getElementsByClassName('not_'+ moduleName);

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
          function freeze1(moduleName, moduleId) {
              var unfreezeToggle = document.getElementById('freezer1_' + moduleName);
              var checkboxes = document.getElementsByClassName('but_'+ moduleName);

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
          function freeze2(moduleName, moduleId) {
              var unfreezeToggle = document.getElementById('freezer2_' + moduleName);
              var checkboxes = document.getElementsByClassName('why_'+ moduleName);

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
          function freeze3(moduleName, moduleId) {
              var unfreezeToggle = document.getElementById('freezer3_' + moduleName);
              var checkboxes = document.getElementsByClassName('the_'+ moduleName);

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
          $(document).ready(function () {
            $('#roleForm').submit(function (e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    success: function (response) {
                        if (response.success) {
                            $('#successModalBody').text(response.message);
                            $('#successModal').modal('show');
                        } else {
                            $('#errorModalBody').text(response.message);
                            $('#errorModal').modal('show');
                        }
                    }
                });
            });
        });
    </script>
</section>


<!-- Basic Floating Label Form section end -->

@endsection
