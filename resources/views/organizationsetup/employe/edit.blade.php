@extends('layout.master')
@section('page-tab')
    Edit Employee
@endsection    
@section('content')

  <section id="main" class="main" style="padding-top: 0vh;">
    <div class="pagetitle" style="margin-left: 20px;">
        <h1>Edit Employee</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a> Edit Employee</a></li>
        </ol>
        </nav>
    </div>
      <head>
      
        <style>
          body {
            font-family: Arial, sans-serif;
          }
          #nextbutton{
            cursor: pointer;
            width: 15%;
            border: none;
            border-radius: 5px;
            padding: 10px 10px 10px 10px;
            background-color: rgb(250, 219, 42);
          }
         
          .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            margin-left: 20Spx; 
          }
    
          #tab1 {
            padding-left: 40px;
          }
          .tab {
            display: none;
          }
    
          .btn {
            margin-top: 10px;
          }
          .dropdown {
           
          }
          #options,
          .options {
            width: 100%;
            padding: 5px;
          }
          .tabs {
            margin-bottom: 15px;
            
            justify-content: start;
            align-items: center;
          }
          /* .btn {
            background-color: rgb(250, 219, 42);
            font-size: 1rem;
          } */
    
          .tab-link {
            border-radius: 5px;
            background-color: rgb(250, 219, 42);
            margin: 10px;
            cursor: pointer;
            padding: 10px;
            border: 1px solid #fffbfb;
          }
    
          .form-group {
            margin-bottom: 15px;
          }
    
          .form-group label {
            margin-bottom: 5px;
          }
    
          .form-group input {
            width: 100%;
            padding: 8px;
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
      <body>
        <div class=" wrapper d-flex">
          <div class="tabs">
            <div style="margin:5px;" ><button type="button" class="btn btn-primary p-3 px-5  col-12" onclick="showTab(1)">Personal Information</button></div>
            <div style="margin:5px;" ><button type="button" class="btn btn-primary p-3 px-5  col-12" onclick="showTab(2)">Company Information</button></div>
            <div style="margin:5px;" ><button type="button" class="btn btn-primary p-3 px-5  col-12" onclick="showTab(3)">PayRoll/Overtime</button></div>
            <div style="margin:5px;" ><button type="button" class="btn btn-primary p-3 px-5  col-12" onclick="showTab(4)">Document/Job History</button></div>
          </div>
          <div class="container">
            <form method="post" action="{{ route('employees.update', $employed->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="tab" id="tab1">
                <h4><b> Employee : </b></h4>
                <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                  
                    <div class="container d-flex justify-content-center align-items-center">
                      
                        <div class="form-group">
                          <label for="Employee">Employee ID</label>
                          <input type="text" name="employee_code" value="{{  $employed->id  }}" readonly>
                        </div>
                        <div class="form-group">
                          <label for="Employee">Employee Code</label>
                          <input type="text" class="form-control" name="employee_code" id="employee_code" value="{{  $employed->employee_code  }}" placeholder="Employee Code" required/>
                          
                        </div>
                        <div class="form-group">
                          <label for="options">Employee GL Mapping</label>
                          <select id="" name=""  class="options">
                            <option class="options">None</option>
                            <option class="options" value="option1">1</option>
                            <option class="options" value="option2">2</option>
                            <option class="options" value="option3">3</option>
                          </select>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="Employee">Employee Name*</label>
                        <input type="text" class="form-control" name="employee_name" id="employee_name" value="{{ $employed->employee_name }}" placeholder="Employee Name" required/>
                      </div>
                      <div class="form-group">
                        <label for="Father name">Father Name</label>
                        <input  type="text" class="form-control" name="father_name" id="father_name" value="{{ $employed->father_name }}" placeholder="Father Name"/>
                      </div>
                      <div class="form-group">
                        <label for="Father name">CNIC*</label>
                        <input  type="text" class="form-control" name="cnic" id="cnic" value="{{ $employed->cnic }}" placeholder="CNIC" required />
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <div class="form-group">
                            <label for="Mobile No">Mobile No*</label>
                            <input type="text" class="form-control" name="mobile_no"  id="mobile_no" value="{{ $employed->mobile_no }}" placeholder="Mobile No" required/>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email*</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $employed->email }}" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                            <label for="Family_code">Family_code</label>
                            <input type="text" class="form-control" name="family_code" id="family_code" value="{{ $employed->family_code }}" placeholder="Family_code" />
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <div class="form-group">
                            <label for="DateOfBirth">Date Of Birth</label>
                            <input type="date" class="form-control" name="dob" id="dob" value="{{ $employed->dob }}" placeholder="DateOfBirth" />
                          </div>
                      <div class="form-group">
                        <label for="place of birth ">Place of Birth</label>
                        <input type="text" class="form-control" name="pob" id="pob" value="{{ $employed->pob }}" placeholder="Place of Birth" />
                      </div>
                      <div class="form-group">
                        <label for="FmailyContact">Family Contact</label>
                        <input type="text" class="form-control" name="familycontact" id="familycontact" value="{{ $employed->familycontact }}" placeholder="Family Contact" />
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      
                      <div class="form-group">
                        <label for="Telephone No">Telephone No/other Contact</label>
                        <input type="text" class="form-control" name="tele_no" id="tele_no" value="{{ $employed->tele_no }}" placeholder="Telephone No/Other Contact"/>
                      </div>
                      <div class="form-group">
                        <label for="options">Country</label>
                        <select  name="country" id="country" value="{{ $employed->country }}" class="options">
                            <option class="options">None</option>
                          @foreach($countries as $item)
                            <option value="{{ $item->id }}">{{ $item->country }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="options">Province/State</label>
                        <select id="state" name="state" value="{{ $employed->state }}"  class="options">
                            <option class="options">None</option>
                            @foreach($states as $item)
                            <option value="{{ $item->id }}">{{ $item->state }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">Select an City</label>
                        <select id="cities" name="cities"  value="{{ $employed->cnic }}" class="options">
                            <option class="options">None</option>
                          @foreach($cities as $item)
                            <option value="{{ $item->id }}">{{ $item->city }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="options">Select an Area</label>
                        <select id="area" name="area" value="{{ $employed->area }}" class="options">
                            <option class="options">None</option>
                            
                          @foreach($areas as $item)
                            <option value="{{ $item->id }}">{{ $item->area }}</option>
                          @endforeach
                        </option>
                        </select>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="Emergency Number">Address</label>
                        <textarea type="text" class="form-control" name="address"  id="address" value="{{ $employed->address }}" rows="4" cols="130" placeholder="Address" ></textarea>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">Select an Gender</label>
                        <select id="gender" name="gender" value="{{ $employed->gender }}" class="options">
                          <option class="options">None</option>
                          <option class="options" value="option1">Male</option>
                          <option class="options" value="option2">Female</option>
                          <option class="options" value="option3">Trans-Gender</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="options">Select an Marital Status</label>
                        <select id="maritalstatus" name="maritalstatus" value="{{ $employed->maritalstatus }}"  class="options">
                          <option class="options">None</option>
                          <option class="options" value="option1">Single</option>
                          <option class="options" value="option2">Married</option>
                          <option class="options" value="option3">Divocred</option>
                        </select>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group ">
                        <label for="options">Select an Nationality</label>
                        <select id="nationality" name="nationality" value="{{ $employed->nationality }}" class="options">
                            <option class="options">None</option>
                            @foreach($nationalities as $item)
                            <option value="{{ $item->id }}">{{ $item->nationality }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group ">
                        <label for="options">Select an Citizenship</label>
                        <select id="citizenship" name="citizenship" value="{{ $employed->citizenship }}" class="options">
                            <option class="options">None</option>
                          @foreach($citizenships as $item)
                            <option value="{{ $item->id }}">{{ $item->citizenship }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <h4>Emergency Information:</h4>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="Emergency Number">Emergency Contact Person</label>
                        <textarea type="text" class="form-control" name="emergency_c_n"  id="emergency_c_n" value="{{ $employed->emergency_c_n }}" rows="4" cols="130" placeholder="Emergency Number" ></textarea>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">  
                      <div class="form-group">
                        <label for="emergency_no1">Emergency No 1</label>
                        <input type="text" class="form-control" name="emergency_01" id="emergency_01" value="{{ $employed->emergency_01 }}" placeholder="Emergency No 1"/>
                      </div>
                      <div class="form-group">  
                        <label for="emergency_no2">Emergency No 2</label>
                        <input type="text" class="form-control" name="emergency_02" id="emergency_02" value="{{ $employed->emergency_02 }}" placeholder="Emergency No 2"/>
                      </div>
                      <div class="form-group">  
                        <label for="emergency_no3">Emergency No 3</label>
                        <input type="text" class="form-control" name="emergency_03" id="emergency_03" value="{{ $employed->emergency_03 }}" placeholder="Emergency No 3"/>
                      </div>
                    </div>
                    <h4>Employe Other Information:</h4>
                    <div class="container d-flex justify-content-center align-items-center">
                      
                      <div class="form-group">
                        <label for="options">Qualification</label>
                        <select id="qualification" name="qualification"  value="{{ $employed->qualification }}" style="width: 100%; padding: 7px;" >
                            <option class="options">None</option>
                          @foreach($qualifications as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->qualification }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="options">Qualification Level</label>
                      
                        <select id="qualificationlevel" name="qualificationlevel" value="{{ $employed->qualificationlevel }}" class="options">
                          <option class="options"  value="0">None</option>
                          @foreach($qualificationlevels as $item)
                            <option value="{{ $item->id }}">{{ $item->qualificationlevel }}</option>
                            @endforeach  
                        </select>
                      
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">Select an Skill</label>
                        <select id="skill" name="skill"  value="{{ $employed->skill }}" class="options">
                          <option class="options">None</option>
                          @foreach($skills as $item)
                            <option value="{{ $item->id }}">{{ $item->skill }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="options">Select an Skill Level</label>
                        <select id="skilllevel" name="skilllevel" value="{{ $employed->skilllevel }}" class="options">
                          <option class="options">None</option>
                          @foreach($skilllevels as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->skilllevel }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div>
                      <label for="options">Employe Status</label>
                      <input type="checkbox" name="emp_status"  id="emp_status" value="{{ $employed->emp_status }}" />
                    </div>
                        
                      <div class="container d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" 1()">Submit</button>
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="showTab(2)">Next</button>
                      </div>
                    
                </div>  
              </div>
      
              <div class="tab" id="tab2">
                <h4><b> Company Information : </b></h4>
                {{-- <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                  <form class="w-100" id="form2" action="{{ route('company_info.store') }}" method="POST">
                    @csrf
    
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                          <label for="options">Designation</label>
                          <select id="designation" name="designation"  class="options">
                              <option class="options">None</option>
                              @foreach($designations as $item)
                              <option class="options" value="{{ $item->id }}">{{ $item->designation }}</option>
                            @endforeach
                          </select>
                        </div> 
                        <div class="form-group">
                          <label for="Employee">Employee Name*</label>
                          <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Employee Name" required/>
                        </div>
                    
                      <div class="form-group">   
                        <label for="branch">branch</label>
                        <select  name="branch" id="branch"  class="options">
                            <option class="options">None</option>
                          @foreach($branchs as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->branch }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="division">division</label>
                        <select  name="division" id="division"  class="options">
                            <option class="options">None</option>
                          @foreach($divisions as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->division }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">   
                        <label for="department">Department</label>
                        <select  name="department" id="department"  class="options">
                            <option class="options">None</option>
                          @foreach($departments as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->department }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="subdepartment">Subdepartment</label>
                        <select  name="subdepartment" id="subdepartment"  class="options">
                            <option class="options">None</option>
                          @foreach($subdepartments as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->subdepartment }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="grade">Grade</label>
                        <select  name="employeegrade" id="employeegrade"  class="options">
                            <option class="options">None</option>
                          @foreach($grades as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->grade }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">   
                        <label for="group">Group</label>
                        <select  name="group" id="group"  class="options">
                            <option class="options">None</option>
                          @foreach($groups as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->group }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="managementlevel">Management Level</label>
                        <select  name="managementlevel" id="managementlevel"  class="options">
                            <option class="options">None</option>
                          @foreach($managementlevels as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->managementlevel }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="submanagementlevel">Submanagement Level</label>
                        <select  name="submanagementlevel" id="submanagementlevel"  class="options">
                            <option class="options">None</option>
                          @foreach($submanagementlevels as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->submanagementlevel }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">Employee Job Status</label>
                        <select  name="employeejobstatus" id="employeejobstatus"  class="options">
                            <option class="options">None</option>
                          @foreach($employeejobstatus as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->employeejobstatus }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="appointment">Appointment Date</label>
                        <input type="date" class="form-control" name="appointment_date" id="appointment_date" placeholder="Appointment Date"/>
                      </div>
                      <div class="form-group">
                        <label for="joining">Joining Date</label>
                        <input type="date" class="form-control" name="joining_date" id="joining_date" placeholder="Joining Date" />
                      </div>
                    </div>
                    
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="confirmation">Confirmation Date</label>
                        <input type="date" class="form-control" name="confirmation_date" id="confirmation_date" placeholder="Confirmation Date"/>
                      </div>
                      <div class="form-group">
                        <label for="retirement">Retirement Date</label>
                        <input type="date" class="form-control" name="retirement_date" id="retirement_date" placeholder="Retirement Date"/>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="contract_start">Contract Start Date</label>
                        <input type="date" class="form-control" name="contract_start_date" id="contract_start_date" placeholder="contract_start Date"/>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="contract_end">Contract End Date</label>
                        <input type="date" class="form-control" name="contract_end_date" id="contract_end_date" placeholder="Contract End Date"/>
                      </div>
                      <div class="form-group">
                        <label for="resign">Resign Date</label>
                        <input type="date" class="form-control" name="resign_date" id="resign_date" placeholder="Resign Date"/>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="resign">Resign Acceptance Date</label>
                        <input type="date" class="form-control" name="resign_acceptance_date" id="resign_acceptance_date" placeholder="Resign Date"/>
                      </div>
                      <div class="form-group ">
                        <label for="options">Leaving Reason</label>
                        <select id="leaving_reason" name="leaving_reason"  class="options">
                            <option class="options">None</option>
                          @foreach($leavereasons as $item)
                            <option value="{{ $item->id }}">{{ $item->leavingreason }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="leaving">Leaving Date</label>
                        <input type="date" class="form-control" name="leaving_date" id="leaving_date" placeholder="Leaving_Date"/>
                      </div>
                    </div>
                    
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">Approval_level </label>
                        <select  name="approval_level" id="approval_level"  class="options">
                            <option class="options">None</option>
                          @foreach($approvals as $item)
                            <option value="{{ $item->id }}">{{ $item->approval_level }}</option>
                          @endforeach 
                        </select>
                      </div> 
                      <div class="form-group">
                        <label for="options">additional_approval </label>
                        <select  name="additional_approval" id="additional_approval"  class="options">
                            <option class="options">None</option>
                          @foreach($add_approvals as $item)
                            <option value="{{ $item->id }}">{{ $item->additional_approval }}</option>
                          @endforeach 
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="options">approver </label>
                        <select  name="approver" id="approver"  class="options">
                            <option class="options">None</option>
                          @foreach($employee as $item)
                            <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>  
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">user_group </label>
                        <select  name="user_group" id="user_group"  class="options">
                            <option class="options">None</option>
                          @foreach($groups as $item)
                            <option value="{{ $item->id }}">{{ $item->group }}</option>
                          @endforeach 
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="options">workflow_group </label>
                        <select  name="workflow_group" id="workflow_group"  class="options">
                            <option class="options">None</option>
                          @foreach($workflows as $item)
                            <option value="{{ $item->id }}">{{ $item->workflow_group }}</option>
                          @endforeach 
                        </select>
                      </div>
                    </div>
                  </form>   
                    <div class="container d-flex justify-content-center align-items-center">
                      <button type="nextbutton" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="showTab(1)">Previous</button>
                      <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" 2()">Submit</button>
                      <button type="nextbutton" class="btn btn-primary p-3 px-5  col-3" id="sbumit2" style="margin: 5px;" onclick="showTab(3)">Next</button>
      
                      
                    </div>
                  
                </div>  --}}
                <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                  
                    <div class="container d-flex justify-content-center align-items-center">
                      
                        <div class="form-group">
                          <label for="options">Designation</label>
                          <select id="designation" name="company_info[designation]" value="{{ $employed->companyInfo->designation }}"  class="options">
                              <option class="options">None</option>
                              @foreach($designations as $item)
                              <option class="options" value="{{ $item->id }}">{{ $item->designation }}</option>
                            @endforeach
                          </select>
                        </div> 
                        <div class="form-group">   
                          <label for="branch">branch</label>
                          <select  name="company_info[branch]" id="branch" value="{{ $employed->companyInfo->branch }}"  class="options">
                              <option class="options">None</option>
                            @foreach($branchs as $item)
                              <option class="options" value="{{ $item->id }}">{{ $item->branch }}</option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group">   
                          <label for="division">division</label>
                          <select  name="company_info[division]" id="division" value="{{ $employed->companyInfo->division }}"  class="options">
                              <option class="options">None</option>
                            @foreach($divisions as $item)
                              <option class="options" value="{{ $item->id }}">{{ $item->division }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">   
                        <label for="department">Department</label>
                        <select  name="company_info[department]" id="department" value="{{ $employed->companyInfo->department }}" class="options">
                            <option class="options">None</option>
                          @foreach($departments as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->department }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="subdepartment">Subdepartment</label>
                        <select  name="company_info[subdepartment]" id="subdepartment" value="{{ $employed->companyInfo->subdepartment }}" class="options">
                            <option class="options">None</option>
                          @foreach($subdepartments as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->subdepartment }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="grade">Grade</label>
                        <select  name="company_info[employeegrade]" id="employeegrade"  value="{{ $employed->companyInfo->employeegrade }}" class="options">
                            <option class="options">None</option>
                          @foreach($grades as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->grade }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">   
                        <label for="group">Group</label>
                        <select  name="company_info[group]" id="group" value="{{ $employed->companyInfo->group }}" class="options">
                            <option class="options">None</option>
                          @foreach($groups as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->group }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="managementlevel">Management Level</label>
                        <select  name="company_info[managementlevel]" id="managementlevel" value="{{ $employed->companyInfo->group }}"  class="options">
                            <option class="options">None</option>
                          @foreach($managementlevels as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->managementlevel }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="submanagementlevel">Submanagement Level</label>
                        <select  name="company_info[submanagementlevel]" id="submanagementlevel" value="{{ $employed->companyInfo->group }}" class="options">
                            <option class="options">None</option>
                          @foreach($submanagementlevels as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->submanagementlevel }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">Employee Job Status</label>
                        <select  name="company_info[employeejobstatus]" id="employeejobstatus" value="{{ $employed->companyInfo->employeejobstatus }}" class="options">
                            <option class="options">None</option>
                          @foreach($employeejobstatus as $item)
                            <option class="options" value="{{ $item->id }}">{{ $item->employeejobstatus }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="appointment">Appointment Date</label>
                        <input type="date" class="form-control" name="company_info[appointment_date]" id="appointment_date" value="{{ $employed->companyInfo->appointment_date }}" placeholder="Appointment Date"/>
                      </div>
                      <div class="form-group">
                        <label for="joining">Joining Date</label>
                        <input type="date" class="form-control" name="company_info[joining_date]" id="joining_date" value="{{ $employed->companyInfo->joining_date }}" placeholder="Joining Date" />
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      
                      <div class="form-group">
                        <label for="confirmation">Confirmation Date</label>
                        <input type="date" class="form-control" name="company_info[confirmation_date]" id="confirmation_date" value="{{ $employed->companyInfo->confirmation_date }}" placeholder="Confirmation Date"/>
                      </div>
                      <div class="form-group">
                        <label for="retirement">Retirement Date</label>
                        <input type="date" class="form-control" name="company_info[retirement_date]" id="retirement_date" value="{{ $employed->companyInfo->retirement_date }}"  placeholder="Retirement Date"/>
                      </div>
                      <div class="form-group">
                        <label for="contract_start">Contract Start Date</label>
                        <input type="date" class="form-control" name="company_info[contract_start_date]" id="contract_start_date" value="{{ $employed->companyInfo->contract_start_date }}" placeholder="contract_start Date"/>
                      </div>
                    </div>
                    
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="contract_end">Contract End Date</label>
                        <input type="date" class="form-control" name="company_info[contract_end_date]" id="contract_end_date" value="{{ $employed->companyInfo->contract_date_end }}" placeholder="Contract End Date"/>
                      </div>
                      <div class="form-group">
                        <label for="resign">Resign Date</label>
                        <input type="date" class="form-control" name="company_info[resign_date]" id="resign_date" value="{{ $employed->companyInfo->resign_date }}" placeholder="Resign Date"/>
                      </div>
                      <div class="form-group">
                        <label for="resign">Resign Acceptance Date</label>
                        <input type="date" class="form-control" name="company_info[resign_acceptance_date]" id="resign_acceptance_date" value="{{ $employed->companyInfo->resign_acceptance_date }}" placeholder="Resign Date"/>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group ">
                        <label for="options">Leaving Reason</label>
                        <select id="leaving_reason" name="company_info[leaving_reason]" value="{{ $employed->companyInfo->leaving_reason }}"  class="options">
                            <option class="options">None</option>
                          @foreach($leavereasons as $item)
                            <option value="{{ $item->id }}">{{ $item->leavingreason }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="leaving">Leaving Date</label>
                        <input type="date" class="form-control" name="company_info[leaving_date]" id="leaving_date" value="{{ $employed->companyInfo->leaving_date }}" placeholder="Leaving_Date"/>
                      </div>
                      <div class="form-group">
                        <label for="options">Approval_level </label>
                        <select  name="company_info[approval_level]" id="approval_level" value="{{ $employed->companyInfo->approval_level }}" class="options">
                            <option class="options">None</option>
                          @foreach($approvals as $item)
                            <option value="{{ $item->id }}">{{ $item->approval_level }}</option>
                          @endforeach 
                        </select>
                      </div> 
                      
                      
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">additional_approval </label>
                        <select  name="company_info[additional_approval]" id="additional_approval" value="{{ $employed->companyInfo->additional_approval }}" class="options">
                            <option class="options">None</option>
                          @foreach($add_approvals as $item)
                            <option value="{{ $item->id }}">{{ $item->additional_approval }}</option>
                          @endforeach 
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="options">approver </label>
                        <select  name="company_info[approver]" id="approver" value="{{ $employed->companyInfo->approver }}" class="options">
                            <option class="options">None</option>
                          @foreach($employee as $item)
                            <option value="{{ $item->id }}">{{ $item->employee_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="options">user_group </label>
                        <select  name="company_info[user_group]" id="user_group" value="{{ $employed->companyInfo->user_group }}" class="options">
                            <option class="options">None</option>
                          @foreach($groups as $item)
                            <option value="{{ $item->id }}">{{ $item->group }}</option>
                          @endforeach 
                        </select>
                      </div>
                      <div class="form-group" rows="4" cols="130">
                        <label for="options">workflow_group </label>
                        <select  name="company_info[workflow_group]" id="workflow_group" value="{{ $employed->companyInfo->workflow_group }}" class="options">
                            <option class="options">None</option>
                          @foreach($workflows as $item)
                            <option value="{{ $item->id }}">{{ $item->workflow_group }}</option>
                          @endforeach 
                        </select>
                      </div>
                    </div>
                    {{-- <h4>Emergency Information:</h4> --}}
                    {{-- <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="Emergency Number">Emergency Contact Person</label>
                        <textarea type="text" class="form-control" name=""  id="" rows="4" cols="130" placeholder="" readonly></textarea>
                      </div>
                    </div> --}}
                    
                      
                      <div class="container d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="showTab(1)">Previous</button>
                        <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" >Submit</button>
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" id="sbumit2" style="margin: 5px;" onclick="showTab(3)">Next</button>
                      </div>
                    <script>
                      function submit1() 
                      {
                        var form1 = document.getElementById('form1');
                        form1.submit();          
                      }
                    </script>
                </div>  
              </div>
      
              <div class="tab" id="tab3">
                <h4><b> Payroll/Overtime : </b></h4>
                <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                  
                        
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        
                        <label for="costcenter">Cost Center</label>
                        <select  name="payroll[costcenter]" id="costcenter" value="{{ $employed->payroll->costcenter }}" class="options">
                            <option class="options">None</option>
                          @foreach($costcenters as $item)
                            <option value="{{ $item->id }}">{{ $item->costcenter }}</option>
                          @endforeach 
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="bank_name">bank_name</label>
                        <select  name="payroll[bank_name]" id="bank_name" value="{{ $employed->payroll->bank_name }}" class="options">
                            <option class="options">None</option>
                          @foreach($banks as $item)
                            <option value="{{ $item->id }}">{{ $item->bank_name }}</option>
                          @endforeach 
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="eobi_no">EOBI NO : </label>
                          
                          <input type="text" class="form-control" name="eobi_no" id="eobi_no" value="{{ $employed->payroll->eobi_no }}" placeholder="eobi_no" />
                      </div>
                      <input type="checkbox" name="payroll[eobi_num]"  id="eobi_num" value="{{ $employed->payroll->eobi_num }}" />
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">   
                        <label for="company_bank">Company Bank</label>
                        <select  name="payroll[company_bank]" id="company_bank" value="{{ $employed->payroll->company_bank }}" class="options">
                            <option class="options">None</option>
                          @foreach($banks as $item)
                            <option value="{{ $item->id }}">{{ $item->company_bank }}</option>
                          @endforeach 
                        </select>
                      </div>
                      <div class="form-group">   
                        <label for="bank_ac_no">Bank Ac/No </label>
                          <input type="text" class="form-control" name="payroll[bank_ac_no]" id="bank_ac_no" value="{{ $employed->payroll->bank_ac_no }}" placeholder="Bank Acount Number" />
                      </div>
                      <div class="form-group">   
                        <label for="pf_no">PF NO : </label>
                          
                          <input type="text" class="form-control" name="payroll[pf_no]" id="pf_no" value="{{ $employed->payroll->pf_no }}" placeholder="pf_no" />
                      </div>
                      <input type="checkbox"  name="payroll[pf_num]"  id="pf_num" />                   
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        
                      <div class="form-group">
                        <label for="pfstart">Pf Start Date</label>
                        <input type="date" class="form-control" name="payroll[pfstart_date]" id="pfstart_date" value="{{ $employed->payroll->pfstart_date }}" placeholder="PF Start Date"/>
                      </div>
                      <div class="form-group">   
                        <label for="gratuitystart">Gratuity Start Date</label>
                        <input type="date" class="form-control" name="payroll[gratuitystart_date]" id="gratuitystart_date" value="{{ $employed->payroll->gratuitystart_date }}" placeholder="Gratuity Start Date"/>
                      </div>
                      <div class="form-group">   
                        <label for="gratuity_no">Gratuity NO : </label>
                          
                          <input type="text" class="form-control" name="payroll[gratuity_no]" id="gratuity_no" value="{{ $employed->payroll->gratuity_no }}" placeholder="gratuity_no" />
                      </div>
                      <input type="checkbox" class="justify-content-start" name="payroll[gratuity_num0]"  id="gratuity_num" value="{{ $employed->payroll->gratuity_num }}" />
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                  
                      <div class="form-group">
                        <label for="options">overtime_ratefactor </label>
                        <select  name="overtime_rate_type" id="overtime_rate_type" value="{{ $employed->payroll->overtime_rate_type }}" class="options">
                          <option class="options">None</option>
                        {{-- @foreach($overtimes as $item)
                          <option value="{{ $item->id }}">{{ $item->overtime_type }}</option>
                        @endforeach --}}
                      </select>
                      </div>
                      <div class="form-group">
                      <label for="holiday_rate_type">Holiday Rate Type : </label>
                          <input type="text" class="form-control" name="payroll[holiday_rate_type]"  id="holiday_rate_type" value="{{ $employed->payroll->holiday_rate_type }}" placeholder="holiday rate type" />
                      </div>
                      <div class="form-group">
                        <label for="shifthours">Shift Hours : </label>
                          <input type="text" class="form-control" name="payroll[shifthours]"  id="shifthours" value="{{ $employed->payroll->shifthours }}" placeholder="shifthours" />
                      </div>
                    </div>
                    
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="gazettedholiday_rate_type">Gazetted Holiday Rate Type : </label>
                        <input type="text" class="form-control" name="payroll[gazettedholiday_rate_type]"  id="gazettedholiday_rate_type" value="{{ $employed->payroll->gazettedholiday_rate_type }}" placeholder="gazettedholiday rate type" />
                      </div>
                      <div class="form-group">
                        <label for="ratefactor"> Rate Factor : </label>
                        <input type="text" class="form-control" name="payroll[ratefactor]" id="ratefactor" value="{{ $employed->payroll->ratefactor }}" />
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="offday_ratefactor"> Off Day Rate Factor : </label>
                        <input type="text" class="form-control" name="payroll[offday_ratefactor]" id="offday_ratefactor" value="{{ $employed->payroll->offday_ratefactor }}" />
                      </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                        <label for="workingday_ratefactor">Working Day Rate Factor : </label>
                        <input type="text" class="form-control" name="payroll[workingday_ratefactor]" id="workingday_ratefactor" value="{{ $employed->payroll->workingday_ratefactor }}"/>
                      </div>
                      <div class="form-group">
                        <label for="offday_rate"> Off Day Rate : </label>
                        <input type="text" class="form-control" name="payroll[offday_rate]" id="offday_rate" value="{{ $employed->payroll->offday_rate }}" />
                      </div>
                      
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                      {{-- <textarea type="text" class="form-control" name=""  id="" rows="4" cols="130" placeholder="" readonly></textarea> --}}
                    </div>  
                    
                    <div class="container d-flex justify-content-center align-items-center">
                      <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="showTab(2)">Previous</button>
                      {{-- <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="submit2()">Submit</button> --}}
                      <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" 3()">Submit</button>
                      <button type="button" class="btn btn-primary p-3 px-5  col-3" id="sbumit3" style="margin: 5px;" onclick="showTab(4)">Next</button>
      
                      
                    </div>
                  
                </div>
              </div>
      
              <div class="tab" id="tab4">
                <h4><b> Document & History : </b></h4>
                <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                  <div class="container d-flex justify-content-center align-items-center">
                    @if ($employed->document || $employed->document === null)  
                        <div class="container d-flex justify-content-center align-items-center">
                            
                            <div class="form-group">  
                              <label for="document_name">Document Name</label>
                            </div> 
                                <input type="text" class="form-control" name="document_name" id="document_name" value="{{ old('document_name',  optional($employed->document)->document_name) }}" placeholder="Document Name" />
                            </div>
                            <div class="form-group">   
                            <div id="fileupload">
                                <label for="document_name">Document Type</label>
                                <input style="padding: 5px; font-size: 0.8rem;" name="document" type="file"  class="form-control" id="file" placeholder="document FIle" >
                            </div> 
                            </div>
                        </div>
                        <div class="container d-flex justify-content-center align-items-center">
                          
                          <div class="form-group">   
                            <label for="document_expiredate">Document Expired Date</label>
                            <input type="date" class="form-control" name="document_expiredate" id="document_expiredate" placeholder="Document Expired date" value="{{ old('document_expiredate', optional($employed->document)->document_expiredate) }}" />
                          </div>
                          <div class="form-group">   
                            <label for="document_remark">Document Remarks : </label>
                            <textarea type="text" class="form-control" name="document_remark"  id="document_remark"  rows="4" cols="130" placeholder="Remarks" >{{ old('document_remark', optional($employed->document)->document_remark) }}</textarea>
                          </div>
                        </div> 
                    @endif     
                    <div class="row justify-content-center" >
          
                      <div class="card-body">  
                        <table class="table table-bordered datatable " style="border: 1px solid black">
                          <thead>
                            <tr >
                              <th scope="col">Doc.name</th>
                              <th scope="col">Doc.Type</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <th>sesefssfsf</th>
                              <th>sddsgsdgsd</th>
                              <td>fsdsgsdfds{{-- <form action="" method="POST">
                                <a class="btn btn-info" href="">Show</a>
                                <a class="btn btn-primary" href="">Edit</a>
                                
                                <button  class="btn btn-danger">Delete</button>
                                </form> --}}
                              </td>
                            </tr>
                          
                            
                          </tbody>
                        </table>
                      </div>  
                    </div>  
                  </div> 
                  <div class="row justify-content-center" >
                    <div class="card-body">  
                      <table class="table table-bordered datatable " style="border: 1px solid black">
                        <thead>
                          <tr>
                            <th scope="col">Joining Datee</th>
                            <th scope="col">Department</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Branch</th>
                            <th scope="col">Promotion date</th>
                            <th scope="col">Department</th>
                            <th scope="col">Designation</th>
                            <th scope="col">branch</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th>sesefssfsf</th>
                            <th>sddsgsdgsd</th>
                            <td>fsdsgsdfds{{-- <form action="" method="POST">
                              <a class="btn btn-info" href="">Show</a>
                              <a class="btn btn-primary" href="">Edit</a>
                              
                              <button  class="btn btn-danger">Delete</button>
                              </form> --}}
                            </td>
                            <th>sesefssfsf</th>
                            <th>sesefssfsf</th>
                            <th>sesefssfsf</th>
                            <th>sesefssfsf</th>
                            <th>sesefssfsf</th>
                          </tr>
                        
                          
                        </tbody>
                      </table>
                    </div>  
                  </div>  
                    <div class="container d-flex justify-content-center align-items-center">
                      <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" onclick="nextTab(3)">Previous</button>
                      <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;" 4()">Submit</button>       
                    </div>
                  
                </div>
              </div>
            </form>  
          </div>
        </div>
    
        <script>
          let currentTab = 1;
    
          function showTab(tabNumber) {
            // Hide all tabs
            const tabs = document.querySelectorAll(".tab");
            tabs.forEach((tab) => (tab.style.display = "none"));
    
            // Show the selected tab
            document.getElementById(`tab${tabNumber}`).style.display = "block";
          }
    
          function nextTab(next) {
            // Validate if needed
    
            // Show the next tab
            currentTab = next;
            showTab(currentTab);
          }
          function submitForm() {
                // You can add any final validation logic here before submitting the form
                document.getElementById("multitab-form").submit();
            }
          function submit4() {
            var form1 = document.getElementById('form1');
            var form2 = document.getElementById('form2');
            var form3 = document.getElementById('form3');
            var form4 = document.getElementById('form4');

            // Submit both forms
            form1.submit();
            form2.submit();
            form3.submit();
            form4.submit();

          }
    
          // Show the first tab initially
          showTab(currentTab);
          function submit2() {
            var form1 = document.getElementById('form1');
            var form2 = document.getElementById('form2');

            // Submit both forms
            form1.submit();
            form2.submit();

          }
          function submit3() {
            var form1 = document.getElementById('form1');
            var form2 = document.getElementById('form2');
            var form3 = document.getElementById('form3');
            // Submit both forms
            form1.submit();
            form2.submit();
            form3.submit();
          }
        </script>
      </body>
        
  </section> 

@endsection    