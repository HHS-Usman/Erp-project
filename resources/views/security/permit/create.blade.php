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
                {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    
                <!-- JS -->
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script> --}}
               <style>
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

                .form-group  {
                    
                   
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
                                <select id="gender" name="emp_id[]"  class="select2">
                                  <option class="options">None</option>
                                  @foreach($employes as $item)
                                  <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                @endforeach
                                </select>
                            </div> 
                        
                        
                        </div>
                        <div class="tab" id="tab1">
                            
                                <div class="container d-flex justify-content-center align-items-center">
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
                                  <div class="container d-flex justify-content-center align-items-center">
                                      
                                      <div class="form-group">    
                                        <h6>{{ $item->name }}</h6>
                                      
                                      </div>
                                      <div class="form-group">
                                        
                                        <input type="text" class="form-control" id="input1" name="login_id[]" class="input1" placeholder="Login ID" />
                                      </div>
                                      <div class="form-group">
                                          <input type="checkbox" id="freezeCheckbox" name="access[]" value="1" placeholder="Access" />
                                      </div>
                                      <div class="form-group">
                                        
                                        <input type="password" name="password[]" class="form-control input2" id="input2" placeholder="Password" />
                                      </div>
                                        <div class="form-group">
                                          
                                          <input
                                            type="text"
                                            class="form-control"
                                            id="bit"
                                            name="report_access[]"
                                            placeholder="report_access" 
                                          />
                                        </div>
                                        <div class="form-group">
                                          <input
                                            type="text"
                                            class="form-control"
                                            id="input"
                                            
                                            name="back_date_entry[]"
                                            placeholder="back_date_entry" 
                                          />
                                        </div>
                                        <div class="form-group">
                                          
                                          <input
                                            type="email"
                                            class="form-control"
                                            id="input"
                                            name="post_date_entry[]"
                                            placeholder="post_date_entry" 
                                          />
                                      </div>
                                      
                                  </div>
                                @endforeach
                              
                              <div class="container  justify-content-center align-items-center">
                                @foreach ($branches->groupBy('company.name') as $companyName => $companyGroup)
                                  <h3>
                                    {{ $companyName }}
                                  </h3>
                                  @foreach ($companyGroup as $data)
                                    <div class="form-group">
                                      <label for="options"> {{ $data->name }} </label>
                                      {{-- <input type="email" class="form-control" id="input" name="{{ $data->name }}" placeholder="{{ $data->name }}" /> --}}
                                    </div>
                                    
                                  @endforeach  
                                 
                                @endforeach()  
                                
                              </div>
                              
                              <div class="container  justify-content-center" style="margin-top: 10px;">
                                <div class="form-group">
                                    <label for="options">Role Selection</label>
                                    <select id="roleSelect" class="select2">
                                        <option class="options">None</option>
                                        @foreach($roles as $item)
                                            <option id="roled" value="{{ $item->id }}" data-user-role="{{ $item->user_role }}">{{ $item->user_role }}</option>
                                        @endforeach
                                    </select>
                                </div>
                             </div>                              
                        </div>
                        
                         
                  
                      <div class="d-flex container">       
                        <div class="col-xs-5 col-sm-5 col-md-5 justify-content-center">  
                            <table id="roletable" class="table table-bordered" style="border: 1px solid black">
                                <thead>
                                    <tr>
                                        <th>Select</th>
                                        <th>Role ID</th>
                                        <th>Add </th>
                                        <th>View</th>
                                        <th>Edit</th>
                                        <th>Dele</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Table rows will be populated dynamically using JavaScript -->
                                </tbody>
                            </table>
                        
                        </div>

                        <div class="col-xs-1 col-sm-1 col-md-1 justify-content-center" style="top: 30%; left:2%;">
                        <button type="button" class="btn btn-primary" onclick="sendData()">>></button>
                        <div class="" style="margin-top: 2%;">
                            <button type="button" class="btn btn-primary" onclick="getData()"><<</button>
                        </div>
                        </div>

                        <div class="col-xs-5 col-sm-5 col-md-5 justify-content-center">
                          <table id="secondTable" class="table table-bordered" style="border: 1px solid black; ">
                              <thead>
                                  <tr>
                                      <th>Role</th>
                                      <th>Module</th>
                                      <th>Page</th>
                                      
                                  </tr>
                              </thead>
                              <tbody>
                                  <!-- Table rows will be populated dynamically using JavaScript -->
                              </tbody>
                          </table>
                        </div>
                      </div>
                     
                      <div class="col-xs-12 col-sm-12 col-md-12 bottom-fixed text-center" style="right:4%; margin-top:10%;">
                          <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
        
                              
  
    </form>        
    <script>


        //this all code is set on that ui which Sir usman give me on excel 
             document.addEventListener('DOMContentLoaded', function () {
                    var originalOptions = document.getElementById('roleSelect').cloneNode(true);

                    // Fetch data when the page is loaded
                    fetchRoleData('default_role_id'); // Replace 'default_role_id' with your default role ID

                    // Listen for changes in the dropdown
                    document.getElementById('roleSelect').addEventListener('change', function () {
                        var selectedRoleId = this.value;
                        fetchRoleData(selectedRoleId);
                    });

                    // Add a "Select All" checkbox to the header row
                    var headerCheckbox = document.createElement('input');
                    headerCheckbox.type = 'checkbox';
                    headerCheckbox.id = 'selectAllCheckbox';
                    document.querySelector('#roletable thead tr').appendChild(document.createElement('th').appendChild(headerCheckbox));

                    // Handle checkbox click events
                    document.getElementById('selectAllCheckbox').addEventListener('change', function () {
                        var checkboxes = document.querySelectorAll('#roletable tbody input[type="checkbox"]');
                        checkboxes.forEach(function (checkbox) {
                            checkbox.checked = headerCheckbox.checked;
                        });
                    });

                    var roleTableBody = document.querySelector('#roletable tbody');
                    var secondTableBody = document.querySelector('#secondTable tbody');

                    // Function to update the second table
                    function updateSecondTable() {
                        // Clear the second table
                        secondTableBody.innerHTML = '';

                        // Iterate through rows in the role table
                        for (var i = 0; i < roleTableBody.rows.length; i++) {
                            var row = roleTableBody.rows[i];

                            // Check if the checkbox is checked
                            var checkbox = row.querySelector('.select-checkbox');
                            if (checkbox && checkbox.checked) {
                                // Clone the row
                                var newRow = secondTableBody.insertRow();

                                for (var j = 1; j < row.cells.length; j++) {
                                    var newCell = newRow.insertCell(j - 1);
                                    newCell.innerHTML = row.cells[j].innerHTML;

                                    // Set the name attribute for form elements
                                    var formElement = newCell.querySelector('input, select, textarea');
                                    if (formElement) {
                                        // Determine the name attribute based on the content of the row
                                        var nameAttribute;
                                        if (i === 0) {
                                            // Assuming the first row is the role row
                                            nameAttribute = 'role_id[]';
                                        } else if (i === 1) {
                                            // Assuming the second row is the module row
                                            nameAttribute = 'module_id[]';
                                        } else if (i === 2) {
                                            // Assuming the third row is the page row
                                            nameAttribute = 'page_id[]';
                                        } else {
                                            // Add additional conditions if needed
                                        }

                                        if (nameAttribute) {
                                            formElement.setAttribute('name', nameAttribute);
                                        }
                                    }
                                }
                            }
                        }
                    }

                    // Function to send data to the second table
                    window.sendData = function () {
                        updateSecondTable();
                    };

                    // Placeholder for fetching role data
                    function fetchRoleData(roleId) {
                                    // Replace with your API endpoint URL
                                    var apiUrl = '/fetch-employee-data/' + roleId;
                        
                                    // Make an AJAX request to fetch data for the selected role ID
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('GET', apiUrl, true);
                                    xhr.onreadystatechange = function () {
                                        if (xhr.readyState == 4 && xhr.status == 200) {
                                            var data = JSON.parse(xhr.responseText);
                        
                                            updateRoleTable(data.role_access_records);
                                        }
                                    };
                                    xhr.send();
                                }
                        // For now, let's simulate a response with dummy data
                        
                    // Function to update the dropdown options
                    function updateDropdownOptions(roleAccessRecords) {
                        var dropdown = document.getElementById('roleSelect');

                        // Remove all options except the first one ("None")
                        for (var i = dropdown.options.length - 1; i > 0; i--) {
                            dropdown.remove(i);
                        }

                        var dropdown = document.getElementById('roleSelect');
                        dropdown.innerHTML = '';
                        dropdown.appendChild(originalOptions.cloneNode(true));

                        // Assuming roleAccessRecords is an array of objects with a 'user_role' property
                        roleAccessRecords.forEach(function (record) {
                            var option = document.createElement('option');
                            option.value = record.user_role.id; // Assuming id is the value property
                            option.text = record.user_role.user_role;
                            dropdown.appendChild(option);
                        });
                    }

                    // Function to update the role table
                    function updateRoleTable(roleAccessRecords) {
                        var tableBody = document.querySelector('#roletable tbody');
                        tableBody.innerHTML = '';

                        roleAccessRecords.forEach(function (record) {
                            var row = tableBody.insertRow();
                            var cell0 = row.insertCell(0);
                            var cell1 = row.insertCell(1);
                            var cell2 = row.insertCell(2);
                            var cell3 = row.insertCell(3);

                            var roleName = record.user_role ? record.user_role.user_role : '';
                            var roleId = record.user_role ? record.user_role.id : '';
                            cell0.innerHTML = '<input type="checkbox" class="select-checkbox" />';
                            cell1.innerHTML = '<input type="text" value="' + roleId + '"  hidden>' + roleName; // Check if role relationship exists
                            var moduleName = record.module ? record.module.module_name : '';
                            var moduleId = record.module ? record.module.id : '';
                            cell2.innerHTML = '<input type="text" value="' + moduleId + '"  hidden>' + moduleName; // Check if module relationship exists

                            // Set both textContent and value attributes for the form element in the third column
                            var pageName = record.page ? record.page.name : '';
                            var pageId = record.page ? record.page.id : '';
                            cell3.innerHTML = '<input type="text" value="' + pageId + '" hidden>' + pageName;
                        });
                    }

                    // Placeholder for handling freeze checkbox
                    function handleFreezeCheckbox(checkbox, inputIdsToFreeze) {
                        function handleChange() {
                            for (var i = 0; i < inputIdsToFreeze.length; i++) {
                                var input = document.getElementById(inputIdsToFreeze[i]);

                                if (input) {
                                    // Unfreeze the input by removing the 'disabled' attribute
                                    input.disabled = !checkbox.checked;

                                    // Reset the value if the checkbox is unchecked
                                    if (!checkbox.checked) {
                                        // Set the initial value or any default value here
                                        input.value = '';
                                    }
                                }
                            }
                        }

                        // Attach the change event handler to the checkbox
                        checkbox.addEventListener('change', handleChange);

                        // Invoke the change event handler immediately
                        handleChange();
                    }

                    // Example usage inside your loop
                    var checkbox = document.getElementById('freezeCheckbox');
                    var inputIdsToFreeze = ['input1', 'input2'];

                    handleFreezeCheckbox(checkbox, inputIdsToFreeze);
             });

    </script>

  </section> 

@endsection    