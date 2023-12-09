@extends('layout.master')
@section('page-tab')
    Create Permit
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
            <form action="{{ route('userrole.store') }}" method="POST">        
                
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 container  justify-content-center align-items-center">
                            <div class="form-group">
                                <label for="options">Select Employee</label>
                                <select id="gender" name="employee_name"  class="select2">
                                  <option class="options">None</option>
                                  @foreach($employes as $item)
                                  <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                @endforeach
                                </select>
                            </div> 
                        
                            <div class="form-group">
                                <label for="options">Select Role</label>
                                <select id="br" name="role" class="select2" >
                                  <option class="options">None</option>
                                  @foreach($roles as $item)
                                  <option value="{{ $item->user_role }}">{{ $item->user_role }}</option>
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
                               
                              <div class="container d-flex justify-content-center align-items-center">
                                <div class="form-group">
                                  <h6>Company/Unit Name</h6>
                                  
                                </div>
                                <div class="form-group">
                                  
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="input"
                                    placeholder="Login ID"
                                  />
                                </div>
                                <div class="form-group">
                                    <input
                                    type="checkbox"
                                    
                                    id="input"
                                    name="access"
                                    placeholder="Access"
                                  />
                                  
                                </div>
                                <div class="form-group">
                                    
                                    <input type="password" name="password" class="form-control" id="input" placeholder="Password" />
                                  </div>
                                  <div class="form-group">
                                    
                                    <input
                                      type="checkbox"
                                      class="form-control"
                                      id="input"
                                      name="report_access"
                                      placeholder="report_access" 
                                    />
                                  </div>
                                  <div class="form-group">
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="input"
                                      name="back_date_entry"
                                      placeholder="back_date_entry" 
                                    />
                                  </div>
                                  <div class="form-group">
                                    
                                    <input
                                      type="email"
                                      class="form-control"
                                      id="input"
                                      name="post_date_entry"
                                      placeholder="post_date_entry" 
                                    />
                                </div>
                              </div>
                              <div class="container d-flex justify-content-center align-items-center">
                                <div class="form-group">
                                  <h6>Company/Unit Name</h6>
                                  
                                </div>
                                <div class="form-group">
                                  
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="input"
                                    placeholder="Login ID"
                                  />
                                </div>
                                <div class="form-group">
                                  <input
                                    type="checkbox"
                                    id="input"
                                    placeholder="Access"
                                  />
                                  
                                </div>
                                <div class="form-group">
                                    
                                    <input type="password" class="form-control" id="input" placeholder="Password" />
                                  </div>
                                  <div class="form-group">
                                    
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="input"
                                      placeholder="" 
                                    />
                                  </div>
                                  <div class="form-group">
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="input"
                                      placeholder="" 
                                    />
                                  </div>
                                  <div class="form-group">
                                    
                                    <input
                                      type="email"
                                      class="form-control"
                                      id="input"
                                      placeholder="Email" 
                                    />
                                </div>
                              </div>
                              <div class="container d-flex justify-content-center align-items-center">
                                <div class="form-group">
                                  <h6>Company/Unit Name</h6>
                                  
                                </div>
                                <div class="form-group">
                                  
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="input"
                                    placeholder="Login ID"
                                  />
                                </div>
                                <div class="form-group">
                                    <input
                                    type="checkbox"
                                    id="input"
                                    placeholder="Access"
                                  />
                                  
                                </div>
                                <div class="form-group">
                                    
                                    <input type="password" class="form-control" id="input" placeholder="Password" />
                                  </div>
                                  <div class="form-group">
                                    
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="input"
                                      placeholder="" 
                                    />
                                  </div>
                                  <div class="form-group">
                                    <input
                                      type="text"
                                      class="form-control"
                                      id="input"
                                      placeholder="" 
                                    />
                                  </div>
                                  <div class="form-group">
                                    
                                    <input
                                      type="email"
                                      class="form-control"
                                      id="input"
                                      placeholder="Email" 
                                    />
                                </div>
                              </div>
                              <div class="container d-flex justify-content-center align-items-center">
                                <div class="form-group">
                                  <h6>Select company/Unit Branch</h6>
                                  
                                </div>
                                <div class="form-group col-xs-6 col-sm-6 col-md-6">
                                  
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="input"
                                    placeholder="Login ID"
                                  />
                                </div>
                              </div>
                              <div class="container d-flex justify-content-center align-items-center">
                                <div class="form-group">
                                  <h6>Select company/Unit Branch</h6>
                                  
                                </div>
                                <div class="form-group col-xs-6 col-sm-6 col-md-6">
                                  
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="input"
                                    placeholder="Login ID"
                                  />
                                </div>
                              </div>
                              <div class="container d-flex justify-content-center align-items-center">
                                <div class="form-group">
                                  <h6>Select company/Unit Branch</h6>
                                  
                                </div>
                                <div class="form-group col-xs-6 col-sm-6 col-md-6">
                                  
                                  <input
                                    type="text"
                                    class="form-control"
                                    id="input"
                                    placeholder="Login ID"
                                  />
                                </div>
                              </div>
                                                         
                        </div>
                        <div class="d-flex container">
                            <div class="col-xs-5 col-sm-5 col-md-5  " >  
                                <div class="container  d-flex justify-content-center align-items-center" style="margin-top: 10px;">
                                    <div class="form-group">
                                        <label for="options">Company Selection</label>
                                        <select id="br" name="br" class="select2" >
                                        <option class="options">None</option>
                                        @foreach($employes as $item)
                                            <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="options">Company Selection</label>
                                        <select id="br" name="br" class="select2" >
                                        <option class="options">None</option>
                                        @foreach($employes as $item)
                                            <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <table class=" table table-bordered " style="border: 1px solid black">
                                    <thead>
                                      <tr>
                                        <th>
                                            Selection
                                        </th>
                                        <th class="justify-content-center">
                                            Role
                                        </th>
                                        <th>
                                            Module
                                        </th>
                                        <th>
                                            Page
                                        </th>
                                      </tr>
                                    </thead>
                                  
                                    <tbody>
                                      
                                      
                                      <tr>
                                        <td>Tick All<input  type="checkbox" name="tick_all"  id="unfreezeToggle" value="1" ></td>
                                      </tr>
                                      <tr>
                                          <td><input  type="checkbox" name="sel_sun_01"  id="unfreezeToggle" value="1" ></td>   
                                          <td><input type="text" class="form-control" id="purchase01" placeholder="Purchaser"></td>
                                          <td><input type="text" class="form-control" id="purchaser01" placeholder="Purchaser"></td>    
                                          <td><input type="text" class="form-control" id="pocreation01" placeholder="PO creation"></td>              
                                      </tr>
                                      <tr>
                                          <td><input  type="checkbox" name="sel_sun_01"  id="unfreezeToggle" value="1" ></td>     
                                          <td><input type="text" class="form-control" id="purchasing01" placeholder="Purchaser"></td>
                                          <td><input type="text" class="form-control" id="warehouse01" placeholder="warehouse"></td>    
                                          <td><input type="text" class="form-control" id="grn01" placeholder="GRN"></td>          
                                      </tr>  
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-xs-1 col-sm-1 col-md-1 justify-content-center" style=" top: 40%; left:2%; ">
                                <button type="button" class="btn btn-primary" onclick="sendData()">>></button>
                            
                                <div class="" style="margin-top: 2%;">
                
                                    <button type="button" class="btn btn-primary" onclick="getData()"><<</button>

                                </div>
                            </div>
                            <div class="col-xs-5 col-sm-5 col-md-5 justify-content-center" > 
                               
                                <table class=" table table-bordered " style="border: 1px solid black;  margin-top:60px; ">
                                    <thead>
                                      <tr>
                                        
                                        <th class="justify-content-center">
                                            <input type="text" name="role" id="role" placeholder="role" readonly> 
                                        </th>
                                        <th>
                                            <input type="text" name="module" id="module" placeholder="module" readonly>
                                        </th>
                                        <th>
                                            <input type="text" name="page" id="pgname" placeholder="Pg_name" readonly>
                                        </th>
                                      </tr>
                                    </thead>
                                  
                                    <tbody>
                                      
                                      
                                      <tr>
                                            
                                          <td><input type="text" class="form-control" id="purchase" placeholder="Purchaser" readonly></td>
                                          <td><input type="text" class="form-control" id="purchaser" placeholder="Purchaser" readonly></td>    
                                          <td><input type="text" class="form-control" id="pocreation" placeholder="PO creation" readonly></td>              
                                      </tr>
                                      <tr>
                                              
                                          <td><input type="text" class="form-control" id="purchasing" placeholder="Purchaser" readonly></td>
                                          <td><input type="text" class="form-control" id="warehouse" placeholder="warehouse" readonly></td>    
                                          <td><input type="text" class="form-control" id="grn" placeholder="GRN" readonly></td>          
                                      </tr> 
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center" style="right:4%">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <script>
                            function sendData() {
                                
                                var input4 = document.getElementById('purchase01').value;
                                var input5 = document.getElementById('purchaser01').value;
                                var input6 = document.getElementById('pocreation01').value;
                                var input7 = document.getElementById('purchasing01').value;
                                var input8 = document.getElementById('warehouse01').value;
                                var input9 = document.getElementById('grn01').value;

                                
                                document.getElementById('purchase').value = input4;
                                document.getElementById('purchaser').value = input5;
                                document.getElementById('pocreation').value = input6;
                                document.getElementById('purchasing').value = input7;
                                document.getElementById('warehouse').value = input8;
                                document.getElementById('grn').value = input9
                            }

                            function getData() {
                                
                                var inputType5 = document.getElementById('purchase').value;
                                var inputType6 = document.getElementById('purchaser').value;
                                var inputType7 = document.getElementById('pocreation').value;
                                var inputType8 = document.getElementById('purchasing').value;
                                var inputType9 = document.getElementById('warehouse').value;
                                var inputType10 = document.getElementById('grn').value;

                     
                                document.getElementById('pgname01').value = inputType4
                                document.getElementById('purchase01').value = inputType5
                                document.getElementById('purchaser01').value = inputType6
                                document.getElementById('pocreation01').value = inputType7
                                document.getElementById('purchasing01').value = inputType8
                                document.getElementById('warehouse01').value = inputType9
                                document.getElementById('grn01').value = inputType10;
                                document.getElementById('role').value = '';
                                document.getElementById('module').value = '';
                                document.getElementById('pgname').value = '';
                                document.getElementById('purchase').value = '';
                                document.getElementById('purchaser').value = '';
                                document.getElementById('pocreation').value = '';
                                document.getElementById('purchasing').value = '';
                                document.getElementById('warehouse').value = '';
                                document.getElementById('grn').value = '';	
                            }
                            function toggleDropdown() {
                                var dropdown = document.getElementById('dropdownOptions');
                                dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
                            }

                            function updateSelectedOptions() {
                                var selectedOptionsDiv = document.getElementById('selectedOptions');
                                var selectedOptions = Array.from(document.querySelectorAll('#dropdownOptions input:checked'))
                                                          .map(checkbox => checkbox.value);

                                selectedOptionsDiv.textContent = 'Selected Options: ' + selectedOptions.join(', ');
                            }

                            // Handle checkbox changes to update selected options
                            document.getElementById('myDropdown').addEventListener('change', updateSelectedOptions);
                        </script>
                       
                    </div>
            </form>        

  </section> 

@endsection    