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
                    <label for="options">
                        <h4>Role</h4>
                    </label>
                    <div></div>
                    <select id="name" name="role_name" class="form-select" style="margin-left: 2%">
                        <option class="options">None</option>
                        @foreach($roles as $item)
                        <option value="{{ $item->user_role}}">{{ $item->user_role }}</option>
                        @endforeach
                    </select>

                </div>
                <table class="table table-bordered" style="border: 1px solid black">
                    {{-- <thead>
                        <tr>
                            <th scope="col"></th>
                            <th>Active</th>
                            <th></th>
                            <th>Add</th>
                            <th>View</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead> --}}
                    @php
                    use App\Helpers\CommonHelper;
                    $permissions = Permission::query()
                    ->select('module_id')
                    ->groupBy('module_id')
                    ->get()
                    ->map(function ($permission) {
                    return [
                    'main_module' => $permission->module_id,
                    'permissions' => Permission::where('module_id', $permission->module_id)
                    ->pluck('name'),

                    'page_action_id' => Permission::where('module_id', $permission->module_id)
                    ->pluck('page_action_id'),
                    'permission_id' => Permission::where('module_id', $permission->module_id)
                    ->pluck('id'),
                    ];
                    });



                    @endphp
                    <tr>
                        <th>Module</th>
                        <th>Tick</th>
                        <th>Add</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    @foreach ($permissions as $moduleName => $moduleGroup)
                    @php
                    // dd($moduleGroup['main_module'],$moduleGroup['permissions'],$moduleName);
                    // dd(CommonHelper::get_Module_by_name($moduleGroup['main_module']));
                    @endphp
                    <tbody>

                        <tr>
                            <td>
                                <h1>{{ CommonHelper::get_Module_by_name($moduleGroup['main_module']) }}</h1>
                            </td>
                            <td><input type="checkbox" name="module_id[]"
                                    id="unfreezeToggle-{{$moduleGroup['main_module'] }}"
                                    value="{{$moduleGroup['main_module'] }}"
                                    onclick="toggleUnfreeze({{ $moduleGroup['main_module'] }})"></td>
                            {{-- <td></td> --}}
                            @php
                            // dd($moduleGroup['permissions']);
                            @endphp
                            @foreach($moduleGroup['permissions'] as $key=>$page_permission)


                            <td>
                                {{ $moduleGroup['permissions'][$key] }}
                                {{ $moduleGroup['permission_id'][$key] }}
                                <input type="checkbox" name="permissions[]"
                                    id="freezer-{{ $moduleGroup['main_module'] }}" class="item"
                                    value="{{$moduleGroup['page_action_id'][$key] }}"
                                    data-module="{{ $moduleGroup['main_module'] }}"
                                    onclick="freeze('{{ $moduleGroup['main_module'] }}')" checked>
                            </td>
                            @endforeach
                            {{-- <td><input type="checkbox" name=""
                                    id="freezer1-{{ $moduleGroup->first()->module->id }}" class="item" value="1"
                                    data-module="{{ $moduleGroup->first()->module->id }}"
                                    onclick="freeze1('{{ $moduleGroup->first()->module->id }}')" checked></td>
                            <td><input type="checkbox" name="" id="freezer2-{{ $moduleGroup->first()->module->id }}"
                                    class="item" value="1" data-module="{{ $moduleGroup->first()->module->id }}"
                                    onclick="freeze2('{{ $moduleGroup->first()->module->id }}')" checked></td>
                            <td><input type="checkbox" name="" id="freezer3-{{ $moduleGroup->first()->module->id }}"
                                    class="item" value="1" data-module="{{ $moduleGroup->first()->module->id }}"
                                    onclick="freeze3('{{ $moduleGroup->first()->module->id }}')" checked></td> --}}
                        </tr>
                        {{-- <tr>
                            <td>Tick All</td>
                            <td><input type="checkbox" name="" id="selectAll-{{ $moduleGroup->first()->module->id }}"
                                    class="item" data-module="{{ $moduleGroup->first()->module->id }}" value="1"></td>
                            <td></td>
                            <td><input type="checkbox" name="" id="selectAdd-{{ $moduleGroup->first()->module->id }}"
                                    class="item" data-module="{{ $moduleGroup->first()->module->id }}" value="1"></td>
                            <td><input type="checkbox" name="" id="selectView-{{ $moduleGroup->first()->module->id }}"
                                    class="item but" data-module="{{ $moduleGroup->first()->module->id }}" value="1">
                            </td>
                            <td><input type="checkbox" name="" id="selectEdit-{{ $moduleGroup->first()->module->id }}"
                                    class="item why" data-module="{{ $moduleGroup->first()->module->id }}" value="1">
                            </td>
                            <td><input type="checkbox" name="" id="selectDelete-{{ $moduleGroup->first()->module->id }}"
                                    class="item the" data-module="{{ $moduleGroup->first()->module->id }}" value="1">
                            </td>
                        </tr>
                        @foreach ($moduleGroup->groupBy('page.name') as $pageName => $pageGroup)
                        <tr>
                            <td>{{ $pageName }}</td>
                            <td><input type="checkbox" name="" id="" class="item example" value="1"
                                    data-module="{{ $moduleGroup->first()->module->id }}"></td>
                            <td></td>
                            @foreach ($pageGroup as $data)
                            @if ($data->page_action_id == 1)
                            <td>
                                <input type="checkbox" name="page_id[]" id="item_one" class="item example2 not"
                                    value="{{ $data->id }}" data-module="{{ $moduleGroup->first()->module->id }}">
                                {{ $data->name }}
                            </td>
                            @elseif ($data->page_action_id == 2)
                            <td><input type="checkbox" name="page_id[]" id="2ndweek_tue_03" class="item example3 but"
                                    value="{{ $data->id }}" data-module="{{ $moduleGroup->first()->module->id }}"></td>
                            @elseif ($data->page_action_id == 3)
                            <td><input type="checkbox" name="page_id[]" id="3rdweek_tue_03" class="item example4 why"
                                    value="{{ $data->id }}" data-module="{{ $moduleGroup->first()->module->id }}"></td>
                            @elseif ($data->page_action_id == 4)
                            <td><input type="checkbox" name="page_id[]" id="4thweek_tue_03" class="item example5 the"
                                    value="{{ $data->id }}" data-module="{{ $moduleGroup->first()->module->id }}"></td>
                            @endif
                            @endforeach
                        </tr>
                        @endforeach --}}
                    </tbody>
                    @endforeach


                    {{-- @foreach ($permissions as $item)
                    <tbody>
                        <tr>
                            <td>
                                <h1>{{ $item->module->module_name }}</h1>
                            </td>
                            <td><input type="checkbox" name="sel_sun_01" id="unfreezeToggle" value="1"
                                    onchange="toggleUnfreeze()"></td>
                            <td></td>
                            <td><input type="checkbox" name="1stweek_sun_01" id="freezer" class="item" value="1"
                                    onchange="freeze()" checked></td>
                            <td><input type="checkbox" name="2ndweek_sun_01" id="freezer1" class="item" value="1"
                                    onchange="freeze1()" checked></td>
                            <td><input type="checkbox" name="3rdweek_sun_01" id="freezer2" class="item" value="1"
                                    onchange="freeze2()" checked></td>
                            <td><input type="checkbox" name="4thweek_sun_01" id="freezer3" class="item" value="1"
                                    onchange="freeze3()" checked></td>

                        </tr>
                        <tr>
                            <td>Tick All</td>
                            <td><input type="checkbox" name="sel_mon_02" id="selectAll" class="item" value="1"></td>
                            <td></td>
                            <td><input type="checkbox" name="1stweek_mon_02" id="selectAdd" class="item not" value="1">
                            </td>
                            <td><input type="checkbox" name="2ndweek_mon_02" id="selectView" class="item but" value="1">
                            </td>
                            <td><input type="checkbox" name="3rdweek_mon_02" id="selectEdit" class="item why" value="1">
                            </td>
                            <td><input type="checkbox" name="4thweek_mon_02" id="selectDelete" class="item the"
                                    value="1"></td>
                        </tr>
                        <tr>
                            <td>{{ $item->page->name }}</td>

                            <td><input type="checkbox" name="sel_tue_03" id="sel_tue_03" class="item example" value="1">
                            </td>
                            <td></td>
                            @if ( $item->page_action_id == '1')
                            <td><input type="checkbox" name="1stweek_tue_03" id="item_one" class="item example2 not"
                                    value="1">{{ $item->name }}</td>
                            @else
                            <td><input type="checkbox" name="2ndweek_tue_03" id="2ndweek_tue_03"
                                    class="item example3 but" value="1"></td>
                            @endif
                            <td><input type="checkbox" name="3rdweek_tue_03" id="3rdweek_tue_03"
                                    class="item example4 why" value="1"></td>

                            <td><input type="checkbox" name="4thweek_tue_03" id="4thweek_tue_03"
                                    class="item example5 the" value="1"></td>

                        </tr>
                    </tbody>
                    @endforeach --}}
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

        $('.item').prop('disabled', true);

        // Select All checkbox change event
        // $('#selectAll').change(function () {
        //     $('.example').prop('checked', $(this).prop('checked'));
        // });
        $('[id^=selectAll]').change(function () {
            var moduleId = $(this).data('module');
            $('.example[data-module="' + moduleId + '"]').prop('checked', $(this).prop('checked'));
        });

        // Individual item checkbox change event
        // $('.example').change(function () {
        //     if (!$(this).prop('checked')) {
        //         $('#selectAll').prop('checked', false);
        //     }
        // });

        // Freeze All checkbox change event
        // $('#selectAdd').change(function () {
        //     $('.example2').prop('checked', $(this).prop('checked'));
        // });
        $('[id^=selectAdd]').change(function () {
            var moduleId = $(this).data('module');
            $('.example2[data-module="' + moduleId + '"]').prop('checked', $(this).prop('checked'));
        });
        // Individual item checkbox change event
        // $('.example2').change(function () {
        //     if (!$(this).prop('checked')) {
        //         $('#selectAdd').prop('checked', false);
        //     }
        // });
        $('[id^=selectView]').change(function () {
            var moduleId = $(this).data('module');
            $('.example3[data-module="' + moduleId + '"]').prop('checked', $(this).prop('checked'));
        });
        // $('#selectView').change(function () {
        //     $('.example3').prop('checked', $(this).prop('checked'));
        // });

        // $('.example3').change(function () {
        //     if (!$(this).prop(checked)) {
        //         $('#selectView').prop('checked', false);
        //     }
        // });

        $('[id^=selectEdit]').change(function () {
            var moduleId = $(this).data('module');
            $('.example4[data-module="' + moduleId + '"]').prop('checked', $(this).prop('checked'));
        });

        $('[id^=selectDelete]').change(function () {
            var moduleId = $(this).data('module');
            $('.example5[data-module="'+ moduleId + '"]').prop('checked', $(this).prop('checked'));
        });

    });

    // function toggleUnfreeze() {
    //     var unfreezeToggle = document.getElementById('unfreezeToggle');
    //     var checkboxes = document.getElementsByClassName('item');

    //     if (unfreezeToggle.checked) {
    //         // Unfreeze all checkboxes
    //         for (var i = 0; i < checkboxes.length; i++) {
    //             checkboxes[i].disabled = false;
    //             checkboxes[i].classList.remove('frozen');
    //         }
    //     } else {
    //         // Freeze all checkboxes
    //         for (var i = 0; i < checkboxes.length; i++) {
    //             checkboxes[i].disabled = true;
    //             checkboxes[i].classList.add('frozen');
    //         }
    //     }
    // }
            function toggleUnfreeze(moduleId) {
            var unfreezeToggle = document.getElementById('unfreezeToggle-' + moduleId);
            var checkboxes = document.querySelectorAll('.item[data-module="' + moduleId + '"]');

            if (unfreezeToggle.checked) {
                // Unfreeze all checkboxes in the same group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = false;
                    checkbox.classList.remove('frozen');
                });
            } else {
                // Freeze all checkboxes in the same group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = true;
                    checkbox.classList.add('frozen');
                });
            }
        }
        function freeze(moduleId) {
            var unfreezeToggle = document.getElementById('freezer-' + moduleId);
            var checkboxes = document.querySelectorAll('.not[data-module="' + moduleId + '"]');

            if (unfreezeToggle.checked) {
                // Unfreeze all checkboxes in the specific group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = false;
                    checkbox.classList.remove('frozen');
                });
            } else {
                // Freeze all checkboxes in the specific group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = true;
                    checkbox.classList.add('frozen');
                });
            }
        }

        function freeze1(moduleId) {
            var unfreezeToggle = document.getElementById('freezer1-' + moduleId);
            var checkboxes = document.querySelectorAll('.but[data-module="' + moduleId + '"]');

            if (unfreezeToggle.checked) {
                // Unfreeze all checkboxes in the specific group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = false;
                    checkbox.classList.remove('frozen');
                });
            } else {
                // Freeze all checkboxes in the specific group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = true;
                    checkbox.classList.add('frozen');
                });
            }
        }
        function freeze2(moduleId) {
            var unfreezeToggle = document.getElementById('freezer2-' + moduleId);
            var checkboxes = document.querySelectorAll('.why[data-module="' + moduleId + '"]');

            if (unfreezeToggle.checked) {
                // Unfreeze all checkboxes in the specific group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = false;
                    checkbox.classList.remove('frozen');
                });
            } else {
                // Freeze all checkboxes in the specific group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = true;
                    checkbox.classList.add('frozen');
                });
            }
        }
        function freeze3(moduleId) {
            var unfreezeToggle = document.getElementById('freezer3-' + moduleId);
            var checkboxes = document.querySelectorAll('.the[data-module="' + moduleId + '"]');

            if (unfreezeToggle.checked) {
                // Unfreeze all checkboxes in the specific group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = false;
                    checkbox.classList.remove('frozen');
                });
            } else {
                // Freeze all checkboxes in the specific group
                checkboxes.forEach(function (checkbox) {
                    checkbox.disabled = true;
                    checkbox.classList.add('frozen');
                });
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
                    <select id="gender" name="gender" class="select2">
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
                        <th scope="col"></th>
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
                        <td>
                            <h1>Module Name</h1>
                        </td>
                        <td><input type="checkbox" name="sel_sun_01" id="unfreezeToggle" value="1"
                                onchange="toggleUnfreeze()"></td>
                        <td></td>
                        <td><input type="checkbox" name="1stweek_sun_01" id="freezer" class="item" value="1"
                                onchange="freeze()" checked></td>
                        <td><input type="checkbox" name="2ndweek_sun_01" id="freezer1" class="item" value="1"
                                onchange="freeze1()" checked></td>
                        <td><input type="checkbox" name="3rdweek_sun_01" id="freezer2" class="item" value="1"
                                onchange="freeze2()" checked></td>
                        <td><input type="checkbox" name="4thweek_sun_01" id="freezer3" class="item" value="1"
                                onchange="freeze3()" checked></td>

                    </tr>
                    <tr>
                        <td>Tick All</td>
                        <td><input type="checkbox" name="sel_mon_02" id="selectAll" class="item" value="1"></td>
                        <td></td>
                        <td><input type="checkbox" name="1stweek_mon_02" id="selectAdd" class="item not" value="1"></td>
                        <td><input type="checkbox" name="2ndweek_mon_02" id="selectView" class="item but" value="1">
                        </td>
                        <td><input type="checkbox" name="3rdweek_mon_02" id="selectEdit" class="item why" value="1">
                        </td>
                        <td><input type="checkbox" name="4thweek_mon_02" id="selectDelete" class="item the" value="1">
                        </td>
                    </tr>
                    <tr>
                        <td>Pages Name</td>
                        <td><input type="checkbox" name="sel_tue_03" id="sel_tue_03" class="item example" value="1">
                        </td>
                        <td></td>
                        <td><input type="checkbox" name="1stweek_tue_03" id="item_one" class="item example2 not"
                                value="1"></td>
                        <td><input type="checkbox" name="2ndweek_tue_03" id="2ndweek_tue_03" class="item example3 but"
                                value="1"></td>
                        <td><input type="checkbox" name="3rdweek_tue_03" id="3rdweek_tue_03" class="item example4 why"
                                value="1"></td>
                        <td><input type="checkbox" name="4thweek_tue_03" id="4thweek_tue_03" class="item example5 the"
                                value="1"></td>
                    </tr>
                    <tr>
                        <td>Pages Name</td>
                        <td><input type="checkbox" name="sel_wed_04" id="sel_wed_04" class="item example" value="1">
                        </td>
                        <td></td>
                        <td><input type="checkbox" name="1stweek_wed_04" id="item_one" class="item example2 not"
                                value="1"></td>
                        <td><input type="checkbox" name="2ndweek_wed_04" id="2ndweek_wed_04" class="item example3 but"
                                value="1"></td>
                        <td><input type="checkbox" name="3rdweek_wed_04" id="3rdweek_wed_04" class="item example4 why"
                                value="1"></td>
                        <td><input type="checkbox" name="4thweek_wed_04" id="4thweek_wed_04" class="item example5 the"
                                value="1"></td>
                    <tr>
                        <td>Pages Name</td>
                        <td><input type="checkbox" name="sel_thu_05" id="sel_thu_05" class="item example" value="1">
                        </td>
                        <td></td>
                        <td><input type="checkbox" name="1stweek_thu_05" id="item_one" class="item example2 not"
                                value="1"></td>
                        <td><input type="checkbox" name="2ndweek_thu_05" id="2ndweek_thu_05" class="item example3 but"
                                value="1"></td>
                        <td><input type="checkbox" name="3rdweek_thu_05" id="3rdweek_thu_05" class="item example4 why"
                                value="1"></td>
                        <td><input type="checkbox" name="4thweek_thu_05" id="4thweek_thu_05" class="item example5 the"
                                value="1"></td>

                    </tr>
                    <tr>
                        <td>Pages Name</td>
                        <td><input type="checkbox" name="sel_fri_06" id="sel_fri_06" class="item example" value="1">
                        </td>
                        <td></td>
                        <td><input type="checkbox" name="1stweek_fri_06" id="item_one" class="item example2 not"
                                value="1"></td>
                        <td><input type="checkbox" name="2ndweek_fri_06" id="2ndweek_fri_06" class="item example3 but"
                                value="1"></td>
                        <td><input type="checkbox" name="3rdweek_fri_06" id="3rdweek_fri_06" class="item example4 why"
                                value="1"></td>
                        <td><input type="checkbox" name="4thweek_fri_06" id="4thweek_fri_06" class="item example5 the"
                                value="1"></td>
                    </tr>
                    <tr>
                        <td>Page Name</td>
                        <td><input type="checkbox" name="sel_sat_07" id="sel_sat_07" class="item example" value="1">
                        </td>
                        <td></td>
                        <td><input type="checkbox" name="1stweek_sat_07" id="1stweek_sat_07" class="item example2 not"
                                value="1"></td>
                        <td><input type="checkbox" name="2ndweek_sat_07" id="2ndweek_sat_07" class="item example3 but"
                                value="1"></td>
                        <td><input type="checkbox" name="3rdweek_sat_07" id="3rdweek_sat_07" class="item example4 why"
                                value="1"></td>
                        <td><input type="checkbox" name="4thweek_sat_07" id="4thweek_sat_07" class="item example5 the"
                                value="1"></td>
                    </tr>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;">Submit</button>
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
</section> --}}
