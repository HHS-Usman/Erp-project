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
            <form action="" method="">        
                
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 container  justify-content-center align-items-center">
                            <div class="form-group">
                                <label for="options">Employee GL Mapping</label>
                                <select id="gender" name="gender"  class="select2">
                                  <option class="options">None</option>
                                  @foreach($employes as $item)
                                  <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                @endforeach
                                </select>
                            </div> 
                        
                            <div class="form-group">
                                <label for="options">Employee GL Mapping</label>
                                <select id="br" name="br" class="select2" >
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
                                    type="text"
                                    class="form-control"
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
                                    type="text"
                                    class="form-control"
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
                                    type="text"
                                    class="form-control"
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
                        <div class="d-flex">
                            <div class="col-xs-6 col-sm-6 col-md-6  " style="border: 1px solid  red;">  
                                <div class="container  d-flex justify-content-center align-items-center">
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
                                        <label for="options">Employee GL Mapping</label>
                                        <select id="br" name="br" class="select2" >
                                        <option class="options">None</option>
                                        @foreach($employes as $item)
                                            <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="container  d-flex justify-content-center align-items-center">
                                    <div class="form-group">
                                        <label for="options">Role Id</label>
                                        <select id="br" name="br" class="select2" >
                                          <option class="options">None</option>
                                          @foreach($employes as $item)
                                          <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="options"></label>
                                        <select id="br" name="br" class="select2" placeholder="">
                                          <option class="options">None</option>
                                          @foreach($employes as $item)
                                          <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="options">Employee GL Mapping</label>
                                        <select id="br" name="br" class="select2" >
                                          <option class="options">None</option>
                                          @foreach($employes as $item)
                                              <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>    

                            </div>
                            <div class="col-xs-1 col-sm-1 col-md-1 text-center">
                                <button type="submit" class="btn btn-primary">>></button>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6" style="border: 1px solid  red;"> 
                               
                                <div class="container d-flex justify-content-center align-items-center">
                                    <div class="form-group">
                                        
                                        <select id="br" name="br" class="select2" >
                                          <option class="options" aria-placeholder="select"></option>
                                          @foreach($employes as $item)
                                          <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="options">Employee GL Mapping</label>
                                        <select id="br" name="br" class="select2" >
                                          <option class="options">None</option>
                                          @foreach($employes as $item)
                                          <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="options">Employee GL Mapping</label>
                                        <select id="br" name="br" class="select2" >
                                          <option class="options">None</option>
                                          @foreach($employes as $item)
                                          <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="options">Employee GL Mapping</label>
                                        <select id="br" name="br" class="select2" >
                                          <option class="options">None</option>
                                          @foreach($employes as $item)
                                          <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="options">Employee GL Mapping</label>
                                        <select id="br" name="br" class="select2" >
                                          <option class="options">None</option>
                                          @foreach($employes as $item)
                                          <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        {{-- <table class="table  col-xs-6 col-sm-6 col-md-6" style="border: 1px solid black">
                                
                                  <thead>
                                    <tr>
                                      <th colspan="1" >Company Dropdown</th>
                                      <th colspan="2" >Select role</th>
                                      
                                    </tr>
                                  </thead>
                                
                                  <tbody>
                                    
                                    <tr>
                                        <td><h1>Module Name</h1></td>
                                      <td><input  type="checkbox" name="sel_sun_01"  id="unfreezeToggle" value="1"  onchange="toggleUnfreeze()"></td>
                                      <td></td>    
                                      
                                    </tr>
                                    <tr>
                                      <td>Pages Name</td>   
                                      <td></td>   </tr>
                                    <tr>
                                        <td>Pages Name</td>   
                                        <td></td>            
                                    </tr>
                                    <tr>
                                        <td>Pages Name</td>     
                                        <td></td>            
                                    <tr>
                                        <td>Pages Name</td>   
                                        <td></td>                
                                    </tr>
                                    <tr>
                                        <td>Pages Name</td>   
                                        <td></td>            
                                    </tr>
                                    <tr>
                                        <td>Page Name</td>   
                                        <td></td>            
                                    </tr>  
                                  </tbody>
                        </table> --}}
                    {{-- </div> 
                    <script>
                        $(document).ready(function () {
                         $('.select2').select2();
                     });  
                     </script>
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
            
            //  function freezer1() {
            //      var unfreezeToggle = document.getElementById('freezer');
            //      var checkboxes = document.getElementsById('item01');

            //      if (unfreezeToggle.checked) {
            //          // Unfreeze all checkboxes
            //          for (var i = 0; i < checkboxes.length; i++) {
            //              checkboxes[i].disabled = false;
            //              checkboxes[i].classList.remove('frozen');
            //          }
            //      } else {
            //          // Freeze all checkboxes
            //          for (var i = 0; i < checkboxes.length; i++) {
            //              checkboxes[i].disabled = true;
            //              checkboxes[i].classList.add('frozen');
            //          }
            //      }
            //  }
      </script> --}}
  </section> 

@endsection    