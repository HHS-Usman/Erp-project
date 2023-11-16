@extends('layout.master')
@section('page-tab')
    Uploader organization Setup
@endsection    
@section('content')

<style>
     /* Default styles for the main container */
     .main-container-uploader {
        width: 100%;
        max-width: 500px;
        padding: 10px;
        border: 1px solid black;
    }

    /* Styles for the inner main container */
    .inner-container {
        padding: 10px;
        border: 1px solid rgb(28, 27, 27);
        margin: 1px;
    }

    /* Styles for the division uploader and other elements */
    .division-uploader {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    /* Styles for the file upload section */
    .file-upload {
        margin-bottom: 10px;
    }

    /* Styles for the select dropdown */
    .select-dropdown {
        width: 100%;
    }

    /* Styles for the selection section */
    .selection {
        width: 100%;
    }

    /* Styles for the checkboxes */
    .checkbox {
        display: flex;
        justify-content: space-between;
    }

    /* Styles for the labels */
    .label {
        text-align: center;
    }

    /* Styles for the file input */
    .file-input {
        width: 100%;
        font-size: 1rem;
    }
    .checkboxdata {
        margin-left: 25%;

    }

    .checkboxtext {
        margin-left: 5%;

    }
    .selectiondata {
        width: 100%;
    }

    #downloaddata {
        text-decoration: none;
        font-size: 1rem;
    }
    .checkboxcontainer{
      padding: 0px 0px 0px 10px;
      width: 50%;
    }
    .main-container-uploader{
        margin: 10px
    }
    .mainconatiner-uploader{
        justify-content: center
    }
    .upload-button{
        margin-top: 10px
    }

</style>
  <section id="main" class="main" style="padding-top: 0vh;">
            <div class="pagetitle" style="margin-left: 20px;">
                <h1>Uploader</h1>
                <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active"><a>Uploader</a></li>
                </ol>
                </nav>
            </div>
            <br>
            
            <div class="row mainconatiner-uploader">
               {{-- this is card 1 --}}
            <div class="col-sm-12 col-lg-4 main-container-uploader">
                <!-- Main div -->
                    <div class="inner-container">
                        <!-- Inner main div -->
                        <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Division</h5>
                            </div>
                            <div class="file-upload">
                                <div>
                                    <a id="downloaddata" href="{{ route('divisionupload') }}" download>Download</a>
                                </div>
                                <div class="select-dropdown">
                                    <select id="selectiondata" class="form-select" aria-label="Default select example" onchange="updateDownloadLink()">
                                        <option selected>None</option>
                                        <option value="1">Csv</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        
                      <!-- Repeat the JavaScript block for each div with a unique identifier -->
<script>
    function updateDownloadLink() {
        var selection = document.getElementById("selectiondata");
        var downloadLink = document.getElementById("downloaddata");

        if (selection.value === "1") {
            downloadLink.innerText = "Download CSV";
            downloadLink.href = "{{ route('divisionuploadcsv') }}";
           
        } else if (selection.value === "2") {
            downloadLink.innerText = "Download Excel";
            downloadLink.href = "{{ route('divisionupload') }}";
            
        } else {
          
            downloadLink.innerText = "Download";
        
        }
    }
</script>
                        <div class="selection d-flex">
                            <div>
                                <h6>Selection:</h6>
                            </div>
                            <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                <div>
                                    <span class="checkboxdata">
                                        <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                            value="Bike">
                                    </span>
        
                                    <span class="checkboxdata">
                                        <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                            value="Bike">
                                    </span>
                                </div>
                                <div class="d-flex label">
                                    <div class="checkboxtext" id="overwritetxt">
                                        <p>Overwrite</p>
                                    </div>
                                    <div class="checkboxtext" id="addontxt">
                                        <p>Add on</p>
                                    </div>
                                </div>
                            </div>
                         
                            <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="Division" id="Division">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
            {{-- this is second conatiner --}}
            <div class="col-sm-12 col-lg-4 main-container-uploader">
                <!-- Main div -->
                    <div class="inner-container">
                        <!-- Inner main div -->
                        <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Department</h5>
                            </div>
                            <div class="file-upload">
                                <div>
                                    <a id="downloaddata1" href="{{ route('deparmentuploader') }}" download>Download</a>
                                </div>
                                <div class="select-dropdown">
                                    <select id="selectiondata1" class="form-select" aria-label="Default select example" onchange="updateDownloadLink1()">
                                        <option selected>None</option>
                                        <option value="1">Csv</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- <script>
                            function updateDownloadLink1() {
                                var selection = document.getElementById("selectiondata1");
                                var downloadLink = document.getElementById("downloaddata1");
                        
                                if (selection.value === "1") {
                                    downloadLink.innerText = "Download CSV";
                                    downloadLink.href = "{{ route('deparmentuploadercsv') }}";
                                    
                                   
                                } else if (selection.value === "2") {
                                    downloadLink.innerText = "Download Excel";
                                    downloadLink.href = "{{ route('deparmentuploader') }}";
                                    
                                } else {
                                  
                                    downloadLink.innerText = "Download";
                                
                                }
                            }
                        </script> --}}
                        <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="selection d-flex">
                            <div>
                                <h6>Selection:</h6>
                            </div>
                            <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                <div>
                                    <span class="checkboxdata">
                                        <input type="checkbox" id="Overwrite" name="Overwrite"id="checkbox1" style="transform: scale(1.3)">
                                        {{-- <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                            value="Overwrite" > --}}
                                    </span>
        
                                    <span class="checkboxdata">
                                        <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                            value="Add-on"checked >
                                    </span>
                                </div>
                                <div class="d-flex label">
                                    <div class="checkboxtext" id="overwritetxt">
                                        <p>Overwrite</p>
                                    </div>
                                    <div class="checkboxtext" id="addontxt">
                                        <p>Add on</p>
                                    </div>
                                </div>
                            </div>
                            
                            
                            <input type="hidden" name="key" value="Department" id="Department">
                            <div id="fileupload">
                                <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                    id="inputGroupFile"
                                    accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                            </div>
                        </div>
                    </div>
                    <div class="upload-button">
                        <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                    </div>
                </form>
            </div>
            {{-- this is card 3 --}}
            <div class="col-sm-12 col-lg-4 main-container-uploader">
                <!-- Main div -->
                    <div class="inner-container">
                        <!-- Inner main div -->
                        <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Function</h5>
                            </div>
                            <div class="file-upload">
                                <div>
                                    <a id="downloaddata2" href="{{ route('functionupload') }}" download>Download</a>
                                </div>
                                <div class="select-dropdown">
                                    <select id="selectiondata2" class="form-select" aria-label="Default select example" onchange="updateDownloadLink2()">
                                        <option selected>None</option>
                                        <option value="1">Csv</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <script>
                            function updateDownloadLink2() {
                                var selection = document.getElementById("selectiondata2");
                                var downloadLink = document.getElementById("downloaddata2");
                        
                                if (selection.value === "1") {
                                    downloadLink.innerText = "Download CSV";
                                    downloadLink.href = "{{ route('functionuploadcsv') }}";
                                    
                                   
                                } else if (selection.value === "2") {
                                    downloadLink.innerText = "Download Excel";
                                    downloadLink.href = "{{ route('functionupload') }}";
                                    
                                } else {
                                  
                                    downloadLink.innerText = "Download";
                                
                                }
                            }
                        </script>
                        <div class="selection d-flex">
                            <div>
                                <h6>Selection:</h6>
                            </div>
                            <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                <div>
                                    <span class="checkboxdata">
                                        <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                            value="Bike">
                                    </span>
        
                                    <span class="checkboxdata">
                                        <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                            value="Bike">
                                    </span>
                                </div>
                                <div class="d-flex label">
                                    <div class="checkboxtext" id="overwritetxt">
                                        <p>Overwrite</p>
                                    </div>
                                    <div class="checkboxtext" id="addontxt">
                                        <p>Add on</p>
                                    </div>
                                </div>
                            </div>
                            <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="Functiondata" id="Functiondata">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
            </div>
            <div class="row mainconatiner-uploader">
                {{-- this is card 1 --}}
             <div class="col-sm-12 col-md-4 main-container-uploader">
                 <!-- Main div -->
                
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Management Level</h5>
                            </div>
                            <div class="file-upload">
                                <div>
                                    <a id="downloaddata3" href="{{ route('functionupload') }}" download>Download</a>
                                </div>
                                <div class="select-dropdown">
                                    <select id="selectiondata3" class="form-select" aria-label="Default select example" onchange="updateDownloadLink3()">
                                        <option selected>None</option>
                                        <option value="1">Csv</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <script>
                            function updateDownloadLink3() {
                                var selection = document.getElementById("selectiondata3");
                                var downloadLink = document.getElementById("downloaddata3");
                        
                                if (selection.value === "1") {
                                    downloadLink.innerText = "Download CSV";
                                    downloadLink.href = "{{ route('manageleveluploadcsv') }}";
                                    
                                   
                                } else if (selection.value === "2") {
                                    downloadLink.innerText = "Download Excel";
                                    downloadLink.href = "{{ route('managelevelupload') }}";
                                    
                                } else {
                                  
                                    downloadLink.innerText = "Download";
                                
                                }
                            }
                        </script>
                         <div class="selection d-flex">
                             <div>
                                 <h6>Selection:</h6>
                             </div>
                             <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                 <div>
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
         
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
                                 </div>
                                 <div class="d-flex label">
                                     <div class="checkboxtext" id="overwritetxt">
                                         <p>Overwrite</p>
                                     </div>
                                     <div class="checkboxtext" id="addontxt">
                                         <p>Add on</p>
                                     </div>
                                 </div>
                             </div>
                             <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="Managementlevel" id="Managementlevel">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
             </div>
 
             {{-- this is second conatiner --}}
             <div class="col-sm-12 col-md-4 main-container-uploader">
                 <!-- Main div -->
             
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Designation</h5>
                            </div>
                            <div class="file-upload">
                                <div>
                                    <a id="downloaddata4" href="{{ route('designateuploadcsv') }}" download>Download</a>
                                </div>
                                <div class="select-dropdown">
                                    <select id="selectiondata4" class="form-select" aria-label="Default select example" onchange="updateDownloadLink4()">
                                        <option selected>None</option>
                                        <option value="1">Csv</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <script>
                            function updateDownloadLink4() {
                                var selection = document.getElementById("selectiondata4");
                                var downloadLink = document.getElementById("downloaddata4");
                        
                                if (selection.value === "1") {
                                    downloadLink.innerText = "Download CSV";
                                    downloadLink.href = "{{ route('designateuploadcsv') }}";
                                    
                                   
                                } else if (selection.value === "2") {
                                    downloadLink.innerText = "Download Excel";
                                    downloadLink.href = "{{ route('designateupload') }}";
                                    
                                } else {
                                  
                                    downloadLink.innerText = "Download";
                                
                                }
                            }
                        </script>
                         <div class="selection d-flex">
                             <div>
                                 <h6>Selection:</h6>
                             </div>
                             <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                 <div>
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
                                 </div>
                                 <div class="d-flex label">
                                     <div class="checkboxtext" id="overwritetxt">
                                         <p>Overwrite</p>
                                     </div>
                                     <div class="checkboxtext" id="addontxt">
                                         <p>Add on</p>
                                     </div>
                                 </div>
                             </div>
                             <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="Designation" id="Designation">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
             </div>
             {{-- this is card 3 --}}
             <div class="col-sm-12 col-md-4 main-container-uploader">
                 <!-- Main div -->
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Group</h5>
                            </div>
                            <div class="file-upload">
                                <div>
                                    <a id="downloaddata5" href="{{ route('functionupload') }}" download>Download</a>
                                </div>
                                <div class="select-dropdown">
                                    <select id="selectiondata5" class="form-select" aria-label="Default select example" onchange="updateDownloadLink5()">
                                        <option selected>None</option>
                                        <option value="1">Csv</option>
                                        <option value="2">Excel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <script>
                            function updateDownloadLink5() {
                                var selection = document.getElementById("selectiondata5");
                                var downloadLink = document.getElementById("downloaddata5");
                        
                                if (selection.value === "1") {
                                    downloadLink.innerText = "Download CSV";
                                    downloadLink.href = "{{ route('groupuploadcsv') }}";
                                    
                                   
                                } else if (selection.value === "2") {
                                    downloadLink.innerText = "Download Excel";
                                    downloadLink.href = "{{ route('groupupload') }}";
                                    
                                } else {
                                  
                                    downloadLink.innerText = "Download";
                                
                                }
                            }
                        </script>
                         <div class="selection d-flex">
                             <div>
                                 <h6>Selection:</h6>
                             </div>
                             <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                 <div>
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
         
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
                                 </div>
                                 <div class="d-flex label">
                                     <div class="checkboxtext" id="overwritetxt">
                                         <p>Overwrite</p>
                                     </div>
                                     <div class="checkboxtext" id="addontxt">
                                         <p>Add on</p>
                                     </div>
                                 </div>
                             </div>
                             <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="Group" id="Group">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
             </div>
             <div class="row mainconatiner-uploader">
                {{-- this is card 1 --}}
             <div class="col-sm-12 col-md-4 main-container-uploader">
                 <!-- Main div -->
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                             <!-- Division uploader and other elements -->
                             <div>
                                 <h5>Upload Grade</h5>
                             </div>
                             <div class="file-upload ">
                                 <div>
                                    <a id="downloaddata" href="{{ route('gradpload') }}" download>Download</a>
                                 </div>
                                 <div class="select-dropdown">
                                     <select id="selectiondata" class="form-select" aria-label="Default select example">
                                         <option selected>None</option>
                                         <option value="1">Csv</option>
                                         <option value="2">Excel</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="selection d-flex">
                             <div>
                                 <h6>Selection:</h6>
                             </div>
                             <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                 <div>
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
         
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
                                 </div>
                                 <div class="d-flex label">
                                     <div class="checkboxtext" id="overwritetxt">
                                         <p>Overwrite</p>
                                     </div>
                                     <div class="checkboxtext" id="addontxt">
                                         <p>Add on</p>
                                     </div>
                                 </div>
                             </div>
                             <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="Grade" id="Grade">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
             </div>
 
             {{-- this is second conatiner --}}
             <div class="col-sm-12 col-md-4 main-container-uploader">
                 <!-- Main div -->
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                             <!-- Division uploader and other elements -->
                             <div>
                                 <h5>Upload Leaving Reason</h5>
                             </div>

                             <div class="file-upload ">
                                 <div>
                                    
                                    <a id="downloaddata" href="{{ route('leavingreasonuoload') }}" download>Download</a>
                                 </div>
                                 <div class="select-dropdown">
                                     <select id="selectiondata" class="form-select" aria-label="Default select example">
                                         <option selected>None</option>
                                         <option value="1">Csv</option>
                                         <option value="2">Excel</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="selection d-flex">
                             <div>
                                 <h6>Selection:</h6>
                             </div>
                             <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                 <div>
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
         
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
                                 </div>
                                 <div class="d-flex label">
                                     <div class="checkboxtext" id="overwritetxt">
                                         <p>Overwrite</p>
                                     </div>
                                     <div class="checkboxtext" id="addontxt">
                                         <p>Add on</p>
                                     </div>
                                 </div>
                             </div>
                             <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="LeavingReason" id="LeavingReason">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
             </div>
             {{-- this is card 3 --}}
             <div class="col-sm-12 col-md-4 main-container-uploader">
                 <!-- Main div -->
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                             <!-- Division uploader and other elements -->
                             <div>
                                 <h5>Upload Language</h5>
                             </div>
                             <div class="file-upload ">
                                 <div>religionupoload
                                    <a id="downloaddata" href="{{ route('languageupoload') }}" download>Download</a>
                                 </div>
                                 <div class="select-dropdown">
                                     <select id="selectiondata" class="form-select" aria-label="Default select example">
                                         <option selected>None</option>
                                         <option value="1">Csv</option>
                                         <option value="2">Excel</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="selection d-flex">
                             <div>
                                 <h6>Selection:</h6>
                             </div>
                             <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                 <div>
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
         
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
                                 </div>
                                 <div class="d-flex label">
                                     <div class="checkboxtext" id="overwritetxt">
                                         <p>Overwrite</p>
                                     </div>
                                     <div class="checkboxtext" id="addontxt">
                                         <p>Add on</p>
                                     </div>
                                 </div>
                             </div>
                             <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="Language" id="Language">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
             </div>
             <div class="row mainconatiner-uploader">
                {{-- this is card 1 --}}
             <div class="col-sm-12 col-md-4 main-container-uploader">
                 <!-- Main div -->
                 <form action="">
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                             <!-- Division uploader and other elements -->
                             <div>
                                 <h5>Upload Religion</h5>
                             </div>
                             @csrf
                             <div class="file-upload ">
                                 <div>
                                    <a id="downloaddata" href="{{ route('religionupoload') }}" download>Download</a>
                                 </div>
                                 <div class="select-dropdown">
                                     <select id="selectiondata" class="form-select" aria-label="Default select example">
                                         <option selected>None</option>
                                         <option value="1">Csv</option>
                                         <option value="2">Excel</option>
                                     </select>
                                 </div>
                             </div>
                         </div>
                         <div class="selection d-flex">
                             <div>
                                 <h6>Selection:</h6>
                             </div>
                             <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                 <div>
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox1" name="Overwrite" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
         
                                     <span class="checkboxdata">
                                         <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                             value="Bike">
                                     </span>
                                 </div>
                                 <div class="d-flex label">
                                     <div class="checkboxtext" id="overwritetxt">
                                         <p>Overwrite</p>
                                     </div>
                                     <div class="checkboxtext" id="addontxt">
                                         <p>Add on</p>
                                     </div>
                                 </div>
                             </div>
                             <form action="{{ route('fileuploade') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="key" value="Religion" id="Religion">
                                <div id="fileupload">
                                    <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file" class="form-control file-input"
                                        id="inputGroupFile"
                                        accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  >
                                </div>
                            </div>
                        </div>
                        <div class="upload-button">
                            <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                        </div>
                    </form>
             </div>
        </div>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        {{-- this is script for checkbox check is checked one only at a time --}}
        <script>
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', () => {
                    checkboxes.forEach((cb) => {
                        if (cb !== checkbox) {
                            cb.checked = false;
                        }
                    });
                });
            });
        </script>       
        
  </section> 

@endsection    