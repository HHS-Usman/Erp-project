@extends('layout.master')
@section('page-tab')
Create Access Permission
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
        <h1>Create Permit</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a> Create Permit</a></li>
            </ol>
        </nav>
    </div>
    <br>

    <head>
        {{--
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />

        <!-- JS -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
        <style>
            .dropdown-a {
                position: relative;
                display: inline-block;
                width: 200px;
            }

            .dropdown-button {
                padding: 10px;
                background-color: #3498db;
                color: #fff;
                cursor: pointer;
            }

            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #fff;
                box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
                border: 1px solid #3498db;
                max-height: 150px;
                overflow-y: auto;
            }

            .dropdown-content a {
                display: block;
                padding: 10px;
                text-decoration: none;
                color: #333;
            }

            .dropdown-content a:hover {
                background-color: #3498db;
                color: #fff;
            }

            input[type="checkbox"] {
                margin-right: 5px;
            }

            .selected-options {
                margin-top: 10px;
                font-weight: bold;
            }

            #selects,
            .select2 {
                width: 50%;
                padding: 3px;
            }

            .form-group {
                margin-bottom: 05px;
            }

            .form-group label {
                margin-bottom: 5px;
            }

            .form-group {


                box-sizing: border-box;
            }

            @media (min-width: 600px) {
                .form-container {
                    flex-direction: row;
                }

                .form-group {
                    flex: 1;
                    margin-right: 15px;
                }
            }
        </style>

    </head>
    <form action="{{ route('accesspermit.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 container  justify-content-center align-items-center">
                <div class="form-group">
                    <label for="options">Select Employee</label>
                    <select id="name" name="name" class="form-select">
                        <option class="options" value="">None</option>
                        @foreach($employes as $item)
                        <option value="{{ $item->employee_name }}">{{ $item->employee_code }}-{{ $item->employee_name }}
                        </option>
                        @endforeach
                    </select>
                </div>


            </div>
            <div class="tab" id="tab1">

                <div class=" d-flex justify-content-center align-items-center">
                    <div class="form-group">
                        <h4>Companies/ Units</h4>
                    </div>
                    <div class="form-group">
                        <h4>Login ID</h4>
                    </div>
                    <div class="form-group">
                        <h4>Access</h4>
                    </div>
                    <div class="form-group">
                        <h4>Set Password </h4>
                    </div>
                    <div class="form-group">
                        <h4>Report Access</h4>
                    </div>
                    <div class="form-group">
                        <h4>Back days Entres</h4>
                    </div>
                    <div class="form-group">
                        <h4>Post Days Entries</h4>
                    </div>
                </div>
                @foreach ($companies as $company =>$item )
                <div class=" d-flex justify-content-center align-items-center">

                    <div class="form-group">
                        <h6>{{ $item->name }}</h6>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="input1" name="email" class="input1"
                            placeholder="Login ID" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="freezeCheckbox" name="access[]" value="1" placeholder="Access" />

                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control input2" id="input2"
                            placeholder="Password" disabled />
                        <input type="checkbox" id="showPasswordCheckbox" onclick="togglePassword()" />
                        <label for="showPasswordCheckbox">Show Password</label>
                    </div>
                    <div class="form-group">
                        <select name="" id="" class="form-select">
                            <option value="">None</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="" id="" class="form-select">
                            <option value="">None</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select name="" id="" class="form-select">
                            <option value="">None</option>
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="15">15</option>
                            <option value="20">20</option>
                        </select>
                    </div>

                </div>
                @endforeach

                <div class="  justify-content-center align-items-center">
                    @foreach ($branches->groupBy('company.name') as $companyName => $companyGroup)
                    <h4>
                        {{ $companyName }}
                    </h4>
                    @foreach ($companyGroup as $data)
                    <div class="form-group">
                        <label for="options"> {{ $data->name }} </label>
                        {{-- <input type="email" class="form-control" id="input" name="{{ $data->name }}"
                            placeholder="{{ $data->name }}" /> --}}
                    </div>

                    @endforeach

                    @endforeach()

                </div>

                <div class="container justify-content-center" style="margin-top: 10px;">
                    <div class="dropdown-a" id="myDropdown">
                        <div class="dropdown-button" onclick="toggleDropdown()">Select Options</div>
                        <div id="dropdownOptions" class="dropdown-content">
                            @foreach ($roles as $item)
                            <a><input type="checkbox" name="" value="{{ $item->id }}"> {{ $item->name }}</a>
                            <!-- Add more options as needed -->
                            @endforeach
                        </div>
                    </div>




                </div>
                <div class="form-group">
                    <label for="role-select">Select Role:</label>
                    <select id="role-select" class="form-select">
                        <option value="">Select Role</option>
                        @foreach($roles as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <div id="selectedRoleDiv">
                        <!-- Selected role will be displayed here -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 justify-content-center">
                    <table id="permissions-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAllCheckboxFirstTable"></th>
                                <th>Role Name</th>
                                <th>Permission Name</th>

                            </tr>
                        </thead>
                        <tbody id="myid">
                            <!-- Permissions will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
                <div class="col-xs-1 col-sm-1 col-md-1 justify-content-center">
                    <button type="button" class="btn btn-primary" id="sendToSecondTable">>></button>
                    <div class="">
                        <button type="button" class="btn btn-primary" id="removeFromSecondTable">
                            << </button>
                    </div>
                </div>
                <div class="col-xs-5 col-sm-5 col-md-5 justify-content-center">
                    <table id="second-table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th><input type="checkbox" id="selectAllCheckboxSecondTable"></th>
                                <th>Role Name</th>
                                <th>Permission Name</th>
                            </tr>
                        </thead>
                        <tbody id="secondTableBody">
                            <!-- Selected permissions from the first table will be dynamically added here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#selectAllCheckboxFirstTable').on('change', function () {
                    $('#myid .permission-checkbox').prop('checked', this.checked);
                });

                // Add functionality for Select All checkbox in the second table
                $('#selectAllCheckboxSecondTable').on('change', function () {
                    $('#secondTableBody .permission-checkbox').prop('checked', this.checked);
                });

                $('#role-select').on('change', function () {
                    $('#role-select').on('change', function () {
                    var selectedRoles = $(this).val();

                    // Display selected roles in the div
                    $('#selectedRolesDiv').html('Selected Roles: ' + selectedRoles.join(', '));
                    $.ajax({
                            url: '/fetch-employee-data/' + selectedRoles,
                        type: 'GET',
                        dataType: 'json',
                        success: function (response) {
                            updatePermissionsTable(response.permissions);
                        },
                        error: function (error) {
                            console.error(error);
                        }
                    });
                });

                function updatePermissionsTable(permissions) {
                    var permissionsTable = $('#myid');

                    // Append new rows to existing content
                    permissions.forEach(function (permission) {
                        var row = $('<tr></tr>');
                        row.append('<td><input type="checkbox" class="permission-checkbox" ></td>');
                        row.append('<td>' + permission.role_name + '</td>');
                        row.append('<td><input type="hidden" class="permissione" value="' + permission.permission_id + '" >' + permission.name + '</td>');

                        permissionsTable.append(row);
                    });

                // Add Select All checkbox if it doesn't exist
                // if ($('#selectAllCheckbox').length === 0) {
                //     var selectAllRow = $('<tr></tr>');
                //     selectAllRow.append('<td><input type="checkbox" id="selectAllCheckbox"></td>');
                //     selectAllRow.append('<td></td>');
                //     selectAllRow.append('<td></td>');
                //     permissionsTable.prepend(selectAllRow);

                //     // Add functionality for Select All checkbox
                //     $('#selectAllCheckbox').on('change', function () {
                //         $('.permission-checkbox').prop('checked', this.checked);
                //     });
                // }
                }

                $('#sendToSecondTable').on('click', function () {
                    var selectedRows = $('#permissions-table .permission-checkbox:checked');

                    // Clone and append selected rows to the second table
                    var clonedRows = selectedRows.closest('tr').clone();
                    clonedRows.find('.permission-checkbox').prop('checked', false); // Uncheck the cloned checkboxes

                    // Set the 'name' attribute for the cloned rows in the second table
                    clonedRows.each(function () {
                        var permissionId = $(this).find('.permissione').val();
                        $(this).attr('name', 'permissions[]'); // Set the 'name' attribute for the entire row
                        $(this).find('.permissione').attr('name', 'permissions[]').val(permissionId);
                    });

                    $('#secondTableBody').append(clonedRows);

                    // Clear the selection in the first table
                    selectedRows.prop('checked', false);
                });

                $('#removeFromSecondTable').on('click', function () {
                    // Remove selected rows from the second table
                    $('#secondTableBody .permission-checkbox:checked').closest('tr').remove();
                });

                // Add functionality for Select All checkbox in the second table
                $('#selectAllCheckboxSecondTable').on('change', function () {
                    $('#secondTableBody .permission-checkbox').prop('checked', this.checked);
                });

                function toggleDropdown() {
                    var dropdown = document.getElementById('dropdownOptions');
                    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
                }

                function updateSelectedOptions() {
                    var selectedOptionsDiv = document.getElementById('selectedOptions');
                    var selectedOptions = Array.from(document.querySelectorAll('#dropdownOptions input:checked'))
                        .map(checkbox => checkbox.parentElement.textContent.trim());

                    selectedOptionsDiv.textContent = 'Selected Options: ' + selectedOptions.join(', ');
                }

                // Handle checkbox changes to update selected options
                document.getElementById('myDropdown').addEventListener('change', updateSelectedOptions);

                function handleCheckboxChange() {
                    const checkbox = document.getElementById("freezeCheckbox");
                    const passwordInput = document.getElementById("input2");
                    const emailInput = document.getElementById("input1");
                    // Enable or disable password input based on checkbox state
                    passwordInput.disabled = !checkbox.checked;
                    emailInput.disabled = !checkbox.checked;
                }

                // Attach event listener to checkbox
                document.getElementById("freezeCheckbox").addEventListener("change", handleCheckboxChange);

                // Initial call to set up password input based on checkbox state
                handleCheckboxChange();

                function togglePassword() {
                    const passwordInput = document.getElementById("input2");
                    const showPasswordCheckbox = document.getElementById("showPasswordCheckbox");

                    // Toggle password visibility
                    passwordInput.type = showPasswordCheckbox.checked ? "text" : "password";
                }
            });

            </script>

            <div class="col-xs-12 col-sm-12 col-md-12 bottom-fixed text-center" style="right:4%; margin-top:10%;">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

    </form>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var roleSelect = document.getElementById('roleSelect');
            var roletableBody = document.querySelector('#roletable tbody');

            // Listen for changes in the dropdown
            roleSelect.addEventListener('change', function () {
                var selectedRoleId = this.value;
                fetchRolePermissions(selectedRoleId);
            });

            // Function to fetch role permissions using AJAX
            function fetchRolePermissions(roleId) {
                // Replace with your Laravel route for fetching role permissions
                var apiUrl = '/fetch-role-permissions/' + roleId;

                // Make an AJAX request to fetch data for the selected role ID
                var xhr = new XMLHttpRequest();
                xhr.open('GET', apiUrl, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            var data = JSON.parse(xhr.responseText);
                            updateRoleTable(data.permissions);
                        } else {
                            // Handle error response
                            console.error('Error fetching role permissions');
                        }
                    }
                };
                xhr.send();
            }

            // Function to update the role table with permissions data
            function updateRoleTable(permissions) {
                // Clear the existing table rows
                roletableBody.innerHTML = '';

                // Iterate through the permissions and add rows to the table
                permissions.forEach(function (permission) {
                    var row = roletableBody.insertRow();
                    row.innerHTML = '<td>' + permission.name + '</td>'; // Adjust this based on your permission structure
                });
            }
        });
    </script>
</section>

@endsection
