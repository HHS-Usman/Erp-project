@extends('layout.master')
@section('page-tab')
    Create Employee
@endsection    
@section('content')

  <section id="main" class="main" style="padding-top: 0vh;">
    <div class="pagetitle" style="margin-left: 20px;">
        <h1>Create Employee</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active"><a> Create Employee</a></li>
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
            
            <div class="tab" id="tab1">
              <h4><b> Employee : </b></h4>
              <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                <form class="w-100" action="{{ route('employees.store') }}" method="POST">
                  @csrf
                  <div class="container d-flex justify-content-center align-items-center">
                    
                      <div class="form-group">
                        <label for="Employee">Employee Code</label>
                        <input type="text" name="employee_code" value="{{ $nextId }}" readonly>

                        
                      </div>
                      <div class="form-group">
                        <label for="Employee">Employee Code</label>
                        <input type="text" class="form-control" name="employee_code" id="employee_code" placeholder="Employee Code" required/>
                        
                      </div>
                      <div class="form-group">
                        <label for="options">Employee GL Mapping</label>
                        <select id="gender" name="gender"  class="options">
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
                      <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Employee Name" required/>
                    </div>
                    <div class="form-group">
                      <label for="Father name">Father Name</label>
                      <input  type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name"/>
                    </div>
                    <div class="form-group">
                      <label for="Father name">CNIC*</label>
                      <input  type="text" class="form-control" name="cnic" id="cnic" placeholder="CNIC" required />
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                          <label for="Mobile No">Mobile No*</label>
                          <input type="text" class="form-control" name="mobile_no"  id="mobile_no" placeholder="Mobile No" required/>
                      </div>
                      <div class="form-group">
                          <label for="Email">Email*</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                      </div>
                      <div class="form-group">
                          <label for="Family_code">Family_code</label>
                          <input type="text" class="form-control" name="family_code" id="family_code" placeholder="Family_code" />
                      </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                          <label for="DateOfBirth">Date Of Birth</label>
                          <input type="text" class="form-control" name="dob" id="dob" placeholder="DateOfBirth" />
                        </div>
                    <div class="form-group">
                      <label for="place of birth ">Place of Birth</label>
                      <input type="text" class="form-control" name="pob" id="pob" placeholder="Place of Birth" />
                    </div>
                    <div class="form-group">
                      <label for="FmailyContact">Family Contact</label>
                      <input type="text" class="form-control" name="familycontact" id="familycontact" placeholder="Family Contact" />
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                    
                    <div class="form-group">
                      <label for="Telephone No">Telephone No/other Contact</label>
                      <input type="text" class="form-control" name="tele_no" id="tele_no" placeholder="Telephone No/Other Contact"/>
                    </div>
                    <div class="form-group">
                      <label for="options">Country</label>
                      <select  name="country" id="country"  class="options">
                          <option class="options">None</option>
                        @foreach($countries as $item)
                          <option value="{{ $item->id }}">{{ $item->country }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Province/State</label>
                      <select id="state" name="state"  class="options">
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
                      <select id="cities" name="cities"  class="options">
                          <option class="options">None</option>
                        @foreach($cities as $item)
                          <option value="{{ $item->id }}">{{ $item->city }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Select an Area</label>
                      <select id="area" name="area"  class="options">
                          <option class="options">None</option>
                          <option value="">
                        @foreach($areas as $item)
                          <option value="{{ $item->id }}">{{ $item->area }}</option>
                        @endforeach
                      </option>
                      </select>
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                    <div class="form-group">
                      <label for="for address">Address</label>
                      <textarea id="address" name="address" rows="4" cols="130" placeholder="Address...."></textarea>
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                    <div class="form-group">
                      <label for="options">Select an Gender</label>
                      <select id="gender" name="gender"  class="options">
                        <option class="options">None</option>
                        <option class="options" value="option1">Male</option>
                        <option class="options" value="option2">Female</option>
                        <option class="options" value="option3">Trans-Gender</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Select an Marital Status</label>
                      <select id="maritalstatus" name="maritalstatus"  class="options">
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
                      <select id="nationality" name="nationality"  class="options">
                          <option class="options">None</option>
                          @foreach($nationalities as $item)
                          <option value="{{ $item->id }}">{{ $item->nationality }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group ">
                      <label for="options">Select an Citizenship</label>
                      <select id="citizenship" name="citizenship"  class="options">
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
                      <textarea type="text" class="form-control" name="emergency_c_n"  id="emergency_c_n" rows="4" cols="130" placeholder="Emergency Number" ></textarea>
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">  
                    <div class="form-group">
                      <label for="emergency_no1">Emergency No 1</label>
                      <input type="text" class="form-control" name="emergency_01" id="emergency_01" placeholder="Emergency No 1"/>
                    </div>
                    <div class="form-group">  
                      <label for="emergency_no2">Emergency No 2</label>
                      <input type="text" class="form-control" name="emergency_02" id="emergency_02" placeholder="Emergency No 2"/>
                    </div>
                    <div class="form-group">  
                      <label for="emergency_no3">Emergency No 3</label>
                      <input type="text" class="form-control" name="emergency_03" id="emergency_03" placeholder="Emergency No 3"/>
                    </div>
                  </div>
                  <h4>Employe Other Information:</h4>
                  <div class="container d-flex justify-content-center align-items-center">
                    <div class="form-group">
                      <label for="options">Select an Country</label>
                      <select id="options" name="options">
                        <option class="options">None</option>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Qualification</label>
                      <select id="qualification" name="qualification" style="width: 100%; padding: 7px;" >
                          <option class="options">None</option>
                        @foreach($qualifications as $item)
                          <option class="options" value="{{ $item->id }}">{{ $item->qualification }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Qualification Level</label>
                    
                      <select id="qualificationlevel" name="qualificationlevel" class="options">
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
                      <select id="skill" name="skill"  class="options">
                        <option class="options">None</option>
                        @foreach($skills as $item)
                          <option value="{{ $item->id }}">{{ $item->skill }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Select an Skill Level</label>
                      <select id="skilllevel" name="skilllevel"  class="options">
                        <option class="options">None</option>
                        @foreach($skilllevels as $item)
                          <option class="options" value="{{ $item->id }}">{{ $item->skilllevel }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div>
                    <label for="options">Employe Status</label>
                    <input type="checkbox" name="emp_status"  id="emp_status" />
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                      <button type="nextbutton" class="btn btn-primary" style="margin: 5px;" onclick="nextTab(2)">Next</button>
    
                      <button type="submit" class="btn btn-primary" style="margin: 5px;">Submit</button>
                  </div>
                </form>
              </div>  
            </div>
    
            <div class="tab" id="tab2">
              <h4><b> Company Information : </b></h4>
              <div style="padding: 10px;  border: 1px solid rgb(5, 5, 5);">
                <form class="w-100" action="{{ route('employees.store') }}" method="POST">
                  @csrf
                      
                  <div class="container d-flex justify-content-center align-items-center">
                    <div class="form-group">
                      <label for="Employee">Employee Name*</label>
                      <input type="text" class="form-control" name="employee_name" id="employee_name" placeholder="Employee Name" required/>
                    </div>
                    <div class="form-group">
                      <label for="Father name">Father Name</label>
                      <input  type="text" class="form-control" name="father_name" id="father_name" placeholder="Father Name"/>
                    </div>
                    <div class="form-group">
                      <label for="Father name">CNIC*</label>
                      <input  type="text" class="form-control" name="cnic" id="cnic" placeholder="CNIC" required />
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                          <label for="Mobile No">Mobile No*</label>
                          <input type="text" class="form-control" name="mobile_no"  id="mobile_no" placeholder="Mobile No" required/>
                      </div>
                      <div class="form-group">
                          <label for="Email">Email*</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required />
                      </div>
                      <div class="form-group">
                          <label for="Family_code">Family_code</label>
                          <input type="text" class="form-control" name="family_code" id="family_code" placeholder="Family_code" />
                      </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                      <div class="form-group">
                          <label for="DateOfBirth">Date Of Birth</label>
                          <input type="text" class="form-control" name="dob" id="dob" placeholder="DateOfBirth" />
                        </div>
                    <div class="form-group">
                      <label for="place of birth ">Place of Birth</label>
                      <input type="text" class="form-control" name="pob" id="pob" placeholder="Place of Birth" />
                    </div>
                    <div class="form-group">
                      <label for="FmailyContact">Family Contact</label>
                      <input type="text" class="form-control" name="familycontact" id="familycontact" placeholder="Family Contact" />
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                    
                    <div class="form-group">
                      <label for="Telephone No">Telephone No/other Contact</label>
                      <input type="text" class="form-control" name="tele_no" id="tele_no" placeholder="Telephone No/Other Contact"/>
                    </div>
                    <div class="form-group">
                      <label for="options">Country</label>
                      <select  name="country" id="country"  class="options">
                          <option class="options">None</option>
                        @foreach($countries as $item)
                          <option value="{{ $item->id }}">{{ $item->country }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Province/State</label>
                      <select id="state" name="state"  class="options">
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
                      <select id="cities" name="cities"  class="options">
                          <option class="options">None</option>
                        @foreach($cities as $item)
                          <option value="{{ $item->id }}">{{ $item->city }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Select an Area</label>
                      <select id="area" name="area"  class="options">
                          <option class="options">None</option>
                          <option value="">
                        @foreach($areas as $item)
                          <option value="{{ $item->id }}">{{ $item->area }}</option>
                        @endforeach
                      </option>
                      </select>
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                    <div class="form-group">
                      <label for="for address">Address</label>
                      <textarea id="address" name="address" rows="4" cols="130" placeholder="Address...."></textarea>
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                    <div class="form-group">
                      <label for="options">Select an Gender</label>
                      <select id="gender" name="gender"  class="options">
                        <option class="options">None</option>
                        <option class="options" value="option1">Male</option>
                        <option class="options" value="option2">Female</option>
                        <option class="options" value="option3">Trans-Gender</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Select an Marital Status</label>
                      <select id="maritalstatus" name="maritalstatus"  class="options">
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
                      <select id="nationality" name="nationality"  class="options">
                          <option class="options">None</option>
                          @foreach($nationalities as $item)
                          <option value="{{ $item->id }}">{{ $item->nationality }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group ">
                      <label for="options">Select an Citizenship</label>
                      <select id="citizenship" name="citizenship"  class="options">
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
                      <textarea type="text" class="form-control" name="emergency_c_n"  id="emergency_c_n" rows="4" cols="130" placeholder="Emergency Number" ></textarea>
                    </div>
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">  
                    <div class="form-group">
                      <label for="emergency_no1">Emergency No 1</label>
                      <input type="text" class="form-control" name="emergency_01" id="emergency_01" placeholder="Emergency No 1"/>
                    </div>
                    <div class="form-group">  
                      <label for="emergency_no2">Emergency No 2</label>
                      <input type="text" class="form-control" name="emergency_02" id="emergency_02" placeholder="Emergency No 2"/>
                    </div>
                    <div class="form-group">  
                      <label for="emergency_no3">Emergency No 3</label>
                      <input type="text" class="form-control" name="emergency_03" id="emergency_03" placeholder="Emergency No 3"/>
                    </div>
                  </div>
                  <h4>Employe Other Information:</h4>
                  <div class="container d-flex justify-content-center align-items-center">
                    <div class="form-group">
                      <label for="options">Select an Country</label>
                      <select id="options" name="options">
                        <option class="options">None</option>
                        
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Qualification</label>
                      <select id="qualification" name="qualification" style="width: 100%; padding: 7px;" >
                          <option class="options">None</option>
                        @foreach($qualifications as $item)
                          <option class="options" value="{{ $item->id }}">{{ $item->qualification }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Qualification Level</label>
                    
                      <select id="qualificationlevel" name="qualificationlevel" class="options">
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
                      <select id="skill" name="skill"  class="options">
                        <option class="options">None</option>
                        @foreach($skills as $item)
                          <option value="{{ $item->id }}">{{ $item->skill }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="options">Select an Skill Level</label>
                      <select id="skilllevel" name="skilllevel"  class="options">
                        <option class="options">None</option>
                        @foreach($skilllevels as $item)
                          <option class="options" value="{{ $item->id }}">{{ $item->skilllevel }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div>
                    <label for="options">Employe Status</label>
                    <input type="checkbox" name="emp_status"  id="emp_status" />
                  </div>
                  <div class="container d-flex justify-content-center align-items-center">
                    <button type="nextbutton" class="btn btn-primary" style="margin: 5px;" onclick="nextTab(1)">Next</button>
                    <button type="submit" class="btn btn-primary" style="margin: 5px;">Submit</button>
                    <button type="nextbutton" class="btn btn-primary" style="margin: 5px;" onclick="nextTab(3)">Previous</button>
    
                     
                  </div>
                </form>
              </div>
            </div>
    
            <div class="tab" id="tab3">
              <h2>Step 3</h2>
              <p>Data for Step 3</p>
              <button class="btn" onclick="nextTab(2)">Previous</button>
              <button class="btn" onclick="nextTab(4)">Next</button>
            </div>
    
            <div class="tab" id="tab4">
              <h2>Step 4</h2>
              <p>Data for Step 4</p>
              <button class="btn" onclick="nextTab(4)">Next</button>
              <button class="btn" onclick="submitForm()">Submit</button>
            </div>
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
            // Implement form submission logic here
    
            // For demonstration purposes, alert with a success message
            alert("Form submitted successfully!");
          }
    
          // Show the first tab initially
          showTab(currentTab);
        </script>
      </body>
        
  </section> 

@endsection    