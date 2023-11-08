@extends('layout.master')
@section('page-tab')
    Uploader Division
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
                <form action="">
                    <div class="inner-container">
                        <!-- Inner main div -->
                        <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Division</h5>
                            </div>
                            @csrf
                            <div class="file-upload ">
                                <div>
                                    <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                            <div id="fileupload">
                                <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                    id="inputGroupFile"
                                    accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                            </div>
                        </div>
                    </div>
                    <div class="upload-button">
                        <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
                    </div>
                </form>
            </div>

            {{-- this is second conatiner --}}
            <div class="col-sm-12 col-lg-4 main-container-uploader">
                <!-- Main div -->
                <form action="">
                    <div class="inner-container">
                        <!-- Inner main div -->
                        <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Department</h5>
                            </div>
                            @csrf
                            <div class="file-upload ">
                                <div>
                                    <a id="downloaddata" href="{{ asset('division/Department%20Template%20Uploader.xlsx') }}" download>Download</a>
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
                            <div id="fileupload">
                                <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                    id="inputGroupFile"
                                    accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
                <form action="">
                    <div class="inner-container">
                        <!-- Inner main div -->
                        <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Function</h5>
                            </div>
                            @csrf
                            <div class="file-upload ">
                                <div>
                                    <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                            <div id="fileupload">
                                <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                    id="inputGroupFile"
                                    accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
                                 <h5>Upload Management Level</h5>
                             </div>
                             @csrf
                             <div class="file-upload ">
                                 <div>
                                     <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                             <div id="fileupload">
                                 <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                     id="inputGroupFile"
                                     accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
                 <form action="">
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                             <!-- Division uploader and other elements -->
                             <div>
                                 <h5>Upload Designation</h5>
                             </div>
                             @csrf
                             <div class="file-upload ">
                                 <div>
                                     <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                             <div id="fileupload">
                                 <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                     id="inputGroupFile"
                                     accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
                 <form action="">
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                             <!-- Division uploader and other elements -->
                             <div>
                                 <h5>Upload Group</h5>
                             </div>
                             @csrf
                             <div class="file-upload ">
                                 <div>
                                     <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                             <div id="fileupload">
                                 <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                     id="inputGroupFile"
                                     accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
                                 <h5>Upload Grade</h5>
                             </div>
                             @csrf
                             <div class="file-upload ">
                                 <div>
                                     <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                             <div id="fileupload">
                                 <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                     id="inputGroupFile"
                                     accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
                 <form action="">
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                             <!-- Division uploader and other elements -->
                             <div>
                                 <h5>Upload Leaving Reason</h5>
                             </div>
                             @csrf
                             <div class="file-upload ">
                                 <div>
                                     <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                             <div id="fileupload">
                                 <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                     id="inputGroupFile"
                                     accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
                 <form action="">
                     <div class="inner-container">
                         <!-- Inner main div -->
                         <div class="division-uploader">
                             <!-- Division uploader and other elements -->
                             <div>
                                 <h5>Upload Language</h5>
                             </div>
                             @csrf
                             <div class="file-upload ">
                                 <div>
                                     <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                             <div id="fileupload">
                                 <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                     id="inputGroupFile"
                                     accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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
                                     <a id="downloaddata" href="./Department Template Uploader.xlsx" download>Download</a>
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
                             <div id="fileupload">
                                 <input style="padding: 5px; font-size: 0.8rem;" type="file" class="form-control file-input"
                                     id="inputGroupFile"
                                     accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
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