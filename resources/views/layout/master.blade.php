<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - HHS-Softwares</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!--end cdn for tabs data -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- fontawesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Add the Bootstrap CSS -->


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    } -->
  {{-- </style> --}}
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
  {{-- <style>
    .list-group {
      max-height: 600px; /* Set a maximum height for the list */
      overflow-y: auto;  /* Add a vertical scrollbar when content overflows */
      opacity: 0.9;

    }
  </style> --}}
  {{-- <style>
  .dropdown-item
  {
    max-height: 600px; /* Set a maximum height for the list */
      overflow-y: auto;  /* Add a vertical scrollbar when content overflows */
      opacity: 0.9;
  }
  </style>   --}}
  <style>
  .dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
  }
  
  .dropright {
    position: relative;
    display: inline-block;
  }
  
  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #ffffff;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }
  
  .dropdown-content li {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
  }
  
  .dropdown-content li:hover {background-color: hsl(0, 33%, 98%);}
  
  .dropright:hover .dropdown-content {display: block;}
  </style>
</head>

<body>

  <div style="position: fixed; top:0px;left:0px;right:0px;bottom:0px; transform: scale(0.8);
  transform-origin: 0 0;
  width: 125%;;height: 0vh; background-color: rgb(246, 142, );">
    <nav class="navbar navbar-expand-lg navbar-light bg-white " id="navbarcontainermain"
      style="box-shadow: 0px 2px 20px rgba(1, 41, 112, 0.1);">
      <div style="width: 10%" id="logocompany" >
        <img src="/assets/img/logo.jpeg" alt="" style="padding-left: 10px;width:auto;height: 10vh;">
        <a href="index.html" class="logo d-flex align-items-center">
          <!-- <span class="d-none d-lg-block">NiceAdmin</span> -->
        </a>
      </div>
      <div class="navbar navbar-expand-xxl" id="" style="width: 100%;">
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 30px;">
          <div class="navbar-nav " >
            <div class="nav-item dropdown">
              <a   class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa fa-cogs" aria-hidden="true" style="color: black;"></i>&nbsp;SETUP
              </a>
              <div class="dropdown-menu" style="hover">
                <div class="dropdown-submenu dropdown-item dropright ">
                  <a class="test dropdown-toggle" tabindex="-1" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">Organization Setup</a>
                        <ul id="container" class="dropdown-menu dropdown-content" style="{display: block;}">
                              <li><a class="dropdown-item" href="{{ route('division.create')}}">Create Division</a></li>
                              <li><a class="dropdown-item" href="{{ route('division.index')}}">Manage Division</a></li>

                              <li><a class="dropdown-item" href="{{ route('department.create')}}">Create Deparrtment</a></li>
                              <li><a class="dropdown-item" href="{{ route('department.index')}}">Manage Department</a></li>
                         
                              <li><a class="dropdown-item" href="{{ route('subdepartment.create')}}">Create Sub Department</a></li>
                              <li><a class="dropdown-item" href="{{ route('subdepartment.index')}}">Manage Sub Department</a></li>
                             
                              <li><a class="dropdown-item" href="{{ route('function.create')}}">Create Function</a></li>
                              <li><a class="dropdown-item" href="{{ route('function.index')}}">Manage Function</a></li>

                              <li><a class="dropdown-item" href="{{ route('management.create')}}">Create Management</a></li>
                              <li><a class="dropdown-item" href="{{ route('management.index')}}">Manage Management</a></li>
                              
                         
                              <li><a class="dropdown-item" href="{{ route('submanagement.create')}}">Create Sub Management</a></li>
                              <li><a class="dropdown-item" href="{{ route('submanagement.index')}}">Manage Sub Management</a></li>
                                
                        
                              <li><a class="dropdown-item" href="{{ route('gazetedholiday.create')}}">Create Gazeted Holidays</a></li>
                              <li><a class="dropdown-item" href="{{ route('gazetedholiday.index')}}">Manage Gazeted Holidays</a></li>

                              <li><a class="dropdown-item" href="{{ route('costcenter.create')}}">Create Cost Center</a></li>
                              <li><a class="dropdown-item" href="{{ route('costcenter.index')}}">Manage Cost Center</a></li>
                           
                              <li><a class="dropdown-item" href="{{ route('language.create')}}">Create Language</a></li>
                              <li><a class="dropdown-item" href="{{ route('language.index')}}">Manage Language</a></li>
                            
                              <li><a class="dropdown-item" href="{{ route('religion.create')}}">Create Religion</a></li>
                              <li><a class="dropdown-item" href="{{ route('religion.index')}}">Manage Religion</a></li>
                            
                          
                              <li><a class="dropdown-item" href="{{ route('employees.create')}}">Create Employees</a></li>
                              <li><a class="dropdown-item" href="{{ route('employees.index')}}">Manage Employees</a></li>
                            
                        
                              <li><a class="dropdown-item" href="{{ route('designation.create')}}">Create Designation</a></li>
                              <li><a class="dropdown-item" href="{{ route('designation.index')}}">Manage Designation</a></li>
                        
                              <li><a class="dropdown-item" href="{{ route('group.create')}}">Create Group</a></li>
                              <li><a class="dropdown-item" href="{{ route('group.index')}}">Manage Group</a></li>
                            
                              <li><a class="dropdown-item" href="{{ route('grand.create')}}">Create Grand</a></li>
                              <li><a class="dropdown-item" href="{{ route('grand.index')}}">Manage Grand</a></li>
                            
                              <li><a class="dropdown-item" href="{{ route('leavereson.create')}}">Create Leaving Reason</a></li>
                              <li><a class="dropdown-item" href="{{ route('leavereson.index')}}">Manage Leaving Reason</a></li>
                          
                              <li><a class="dropdown-item" href="{{ route('subleavingreason.create')}}">Create Sub Leaving Reason</a></li>
                             
                              <li><a class="dropdown-item" href="{{ route('weekoffday.create')}}">Create Week Off days</a></li>
                              <li><a class="dropdown-item" href="{{ route('weekoffday.index')}}">Manage Week Off days</a></li>
                          
                        </ul>
                </div>
                <div class="dropdown-submenu dropdown-item dropright">
                  <a class="test dropdown-toggle" tabindex="-1" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">General Setup</a>
                        <ul id="container" class="dropdown-menu dropdown-content">
                              <li><a class="dropdown-item" href="{{ route('paymentterm.create')}}">Create Payment Term</a></li>
                              <li><a class="dropdown-item" href="{{ route('paymentterm.index')}}">Manage Payment Term</a></li>

                              <li><a class="dropdown-item" href="{{ route('modeofpayment.create')}}">Create Mode Of Payment</a></li>
                              <li><a class="dropdown-item" href="{{ route('modeofpayment.index')}}">Manage Mode Of Payment</a></li>
                         
                              <li><a class="dropdown-item" href="{{ route('email.create')}}">Create Email</a></li>
                              <li><a class="dropdown-item" href="{{ route('email.index')}}">Manage Email</a></li>
                             
                              <li><a class="dropdown-item" href="{{ route('usergroup.create')}}">Create User Group</a></li>
                              <li><a class="dropdown-item" href="{{ route('usergroup.index')}}">Manage User Group</a></li>

                              <li><a class="dropdown-item" href="{{ route('process.create')}}">Create Process</a></li>
                              <li><a class="dropdown-item" href="{{ route('process.index')}}">Manage Process</a></li>
                              
                         
                              <li><a class="dropdown-item" href="{{ route('cast.create')}}">Create Cast</a></li>
                              <li><a class="dropdown-item" href="{{ route('cast.index')}}">Manage Cast</a></li>
                                
                        
                              <li><a class="dropdown-item" href="{{ route('country.create')}}">Create Country</a></li>
                              <li><a class="dropdown-item" href="{{ route('country.index')}}">Manage Country</a></li>

                              <li><a class="dropdown-item" href="{{ route('citizenship.create')}}">Create Citizenship</a></li>
                              <li><a class="dropdown-item" href="{{ route('citizenship.index')}}">Manage Citizenship</a></li>
                           
                              <li><a class="dropdown-item" href="{{ route('nationality.create')}}">Create Nationality</a></li>
                              <li><a class="dropdown-item" href="{{ route('nationality.index')}}">Manage Nationality</a></li>
                            
                              <li><a class="dropdown-item" href="{{ route('city.create')}}">Create City</a></li>
                              <li><a class="dropdown-item" href="{{ route('city.index')}}">Manage City</a></li>
                            
                          
                        </ul>
                </div>
                <div class="dropdown-submenu dropdown-item dropright">
                  <a class="test dropdown-toggle" tabindex="-1" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">Employee</a>
                    <ul id="container" class="dropdown-menu dropdown-content">
                              <li><a class="dropdown-item" href="{{ route('employeeflag.create')}}">Create Employee Flag</a></li>
                              <li><a class="dropdown-item" href="{{ route('employeeflag.index')}}">Manage Employee Flag</a></li>

                              <li><a class="dropdown-item" href="{{ route('employeerule.create')}}">Create Employee rule</a></li>
                              <li><a class="dropdown-item" href="{{ route('employeerule.index')}}">Manage Employee rule</a></li>
                         
                              <li><a class="dropdown-item" href="{{ route('skilllevel.create')}}">Create Skill level</a></li>
                              <li><a class="dropdown-item" href="{{ route('skilllevel.index')}}">Manage Skill level</a></li>
                             
                              <li><a class="dropdown-item" href="{{ route('employeejobstatus.create')}}">Create Employee job Status</a></li>
                              <li><a class="dropdown-item" href="{{ route('employeejobstatus.index')}}">Manage Employee job Status</a></li>

                              <li><a class="dropdown-item" href="{{ route('qualification.create')}}">Create Qualification</a></li>
                              <li><a class="dropdown-item" href="{{ route('qualification.index')}}">Manage Qualification</a></li>
                              
                         
                              <li><a class="dropdown-item" href="{{ route('qualificationlevel.create')}}">Create Qualification Levels</a></li>
                              <li><a class="dropdown-item" href="{{ route('qualificationlevel.index')}}">Manage Qualification Levels</a></li>  
                        </ul>
                </div>      
              </div>
            </div>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa fa-line-chart" aria-hidden="true" style="color: black;"></i>&nbsp;ERP&CRM
              </a>
              <div class="dropdown-menu">
              <a class="dropdown-item" href="#" onclick="addTab('Data2', data2)" >data2</a>
                <a class="dropdown-item" href="{{ route('division.create') }}" >Data 4</a>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa-solid fa-users-gear" style="color: black;"></i>&nbsp;HCM
              </a>
              <div class="dropdown-menu">
              <a id="fontsize" class="dropdown-item" href="#" onclick="addTab('Data5', data5)">Data 5</a>
                <a class="dropdown-item" href="#" onclick="addTab('Data6', data6)">Data 6</a>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa fa-book" aria-hidden="true" style="color:  black;"></i>&nbsp;REPORTS
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="addTab('Data7', data7)">ERP</a>
                <a class="dropdown-item" href="#" onclick="addTab('Data8', data8)">HCM</a>
                <a class="dropdown-item" href="#" onclick="addTab('Data8', data8)">CRM</a>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa-solid fa-chart-column" style="color:  black;"></i>&nbsp;DASHBOARDS
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="addTab('Data7', data7)">ERP</a>
                <a class="dropdown-item" href="#" onclick="addTab('Data8', data16)">HCM</a>
                <a class="dropdown-item" href="#" onclick="addTab('Data8', data8)">CRM</a>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                aria-expanded="false">
                <i class="fa-solid fa-bullhorn" style="color: black;"></i>&nbsp;ANNCOUNCEMENTS
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#" onclick="addTab('Data7', data7)">Polocies</a>
                <a class="dropdown-item" href="#" onclick="addTab('Data8', data8)">Gernal Annoucements</a>
                <a class="dropdown-item" href="#" onclick="addTab('Data8', data8)">Survey</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="search-bar ">
        <form class="search-form d-flex" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div>
      <div class="header-nav ms-auto" id="iconscontainer">
        <ul class="d-flex align-items-center">
          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              <span class="badge bg-primary badge-number">4</span>
            </a><!-- End Notification Icon -->
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>Lorem Ipsum</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>30 min. ago</p>
                </div>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                  <h4>Atque rerum nesciunt</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>1 hr. ago</p>
                </div>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                  <h4>Sit rerum fuga</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>2 hrs. ago</p>
                </div>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                  <h4>Dicta reprehenderit</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>4 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
              </li>

            </ul><!-- End Notification Dropdown Items -->

          </li><!-- End Notification Nav -->

          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-chat-left-text"></i>
              <span class="badge bg-success badge-number">3</span>
            </a><!-- End Messages Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
              <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-1.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-2.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-3.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="dropdown-footer">
                <a href="#">Show all messages</a>
              </li>

            </ul><!-- End Messages Dropdown Items -->

          </li><!-- End Messages Nav -->
          <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <span class="bi bi-shield"></span>
              <span class="badge bg-primary badge-number">3</span>
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
              <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-1.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-2.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-3.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="dropdown-footer">
                <a href="#">Show all messages</a>
              </li>

            </ul><!-- End Messages Dropdown Items -->
          </li>
          

          <li class="nav-item dropdown">
            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-journal-bookmark"></i>
              <span class="badge bg-success badge-number">3</span>
            </a>
            
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
              <li class="dropdown-header">
                You have 3 new messages
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-1.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Maria Hudson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>4 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-2.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>Anna Nelson</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>6 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="message-item">
                <a href="#">
                  <img src="/assets/img/messages-3.jpg" alt="" class="rounded-circle">
                  <div>
                    <h4>David Muldon</h4>
                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                    <p>8 hrs. ago</p>
                  </div>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="dropdown-footer">
                <a href="#">Show all messages</a>
              </li>

            </ul><!-- End Messages Dropdown Items -->
          </li>

          <li class="nav-item dropdown pe-3">
            <a class="nav-link nav-profile" href="#" data-bs-toggle="dropdown">
              <img src="/assets/img/profile-img.jpg" style="margin-left: 35%;" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
                <h6>Kevin Anderson</h6>
                <span>Web Designer</span>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-person"></i>
                  <span>My Profile</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                  <i class="bi bi-gear"></i>
                  <span>Account Settings</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                  <i class="bi bi-question-circle"></i>
                  <span>Need Help?</span>
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li>
                <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-right"></i>  
                  Logout    
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              </li>

            </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </div>
    </nav>
    <div style="background-color: lightgray;opacity: 0.9;">
      <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
          <a class="nav-link active" data-bs-toggle="tab">@yield('page-tab')</a>
        </li>
      </ul>
    </div>
    <div style=" left:0px; top:170px;z-index: -1; width: 100%;">
      <div class="tab-content" id="myTabContent">
        
        <!-- Tab content will be dynamically added here -->
      </div>
    </div>
  </div>
  <!-- content of sidebar -->
 
  <div id="maincontainer">
    <div class="tab-content">
       <div class="tab-pane fade show active" id="home">
        <!-- start main container -->
        <!-- ======= Sidebar ======= -->
            <div id="maincontainersidebar" style="position:absolute; left:0px; z-index: -1;">
                <div class="sidebarleft">
                    <aside>
                    <span>Abc L</span>
                    </aside>
                    <div class="toggleinput">
                    <button style="border: 1px solid white;background-color: rgb(245, 249, 250);border-radius: 10px;"
                        onclick="toggleSidebar()"><i id="right_toggle" class="fa-solid fa-toggle-on"
                        style="color: orange;border: none;font-size: 2rem;border:1px solid rgb(245, 249, 250)"></i></button>
                    </div>
                </div>
                <div class="sidebarright">
                    <aside id="asidecontent">
                    <SPan>ABC R</SPan>
                    </aside>
                    <div class="toggleinputright justify-content-end">
                    <button style="border: 1px solid white;background-color: rgb(245, 249, 250);border-radius: 10px;"
                        onclick="toggleSidebarright()"><i id="right_toggle" class="fa-solid fa-toggle-on"
                        style="color: orange;border: none;font-size: 2rem;border:1px solid rgb(245, 249, 250)"></i></button>
                    </div>
                </div>
            </div>
                <!-- ======= Main section  ======= -->
                @yield('content')
                <!-- ======= End  Main Section ======= -->
                <!-- ======= Footer ======= -->
                <footer id="footer" class="footer">
                    <div class="copyright col-4">
                    &copy; Copyright By <strong><span>HHS-Softwares</span></strong>. All Rights Reserved
                    </div>
                    <div class="copyright col-4">
                    version 2.0
                    </div>
                    <div class="credits col-4">
                    Designed by <strong><a href="#"><span>Helping Hand Softwares</span></strong></a>
                    </div>
                </footer><!-- End Footer -->
         
            
        <!-- End #main -->
         
     </div>
    </div> 
  </div>>
      
 
  <!-- start from here all code which i have copy it  -->
  <!-- Vendor JS Files -->
  <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/assets/vendor/quill/quill.min.js"></script>
  <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/asset/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/asset/vendor/chart.js/chart.umd.js"></script>
  <script src="/asset/vendor/echarts/echarts.min.js"></script>
  <script src="/asset/vendor/quill/quill.min.js"></script>
  <script src="/asset/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/asset/vendor/tinymce/tinymce.min.js"></script>
  <script src="/asset/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="/asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  
  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script>
            $(document).ready(function(){
        $('.dropdown-submenu a.test').on("click", function(e){
            $(this).next('ul').toggle();
            e.stopPropagation();
            e.preventDefault();
        
        });
        myfunction();
        });
  </script>
  <style>
    .dropdown-submenu {
      position: relative;
    }

    .dropdown-submenu .dropdown-menu {
      top: 0;
      left: 100%;
      margin-top: -1px;
    }
</style>
  
</body>
</html>