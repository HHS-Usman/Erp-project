@extends('layout.master')
@section('page-tab')
    Create Buyer Uploader
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

    .checkboxcontainer {
        padding: 0px 0px 0px 10px;
        width: 50%;
    }

    .main-container-uploader {
        margin: 10px
    }

    .mainconatiner-uploader {
        justify-content: center
    }

    .upload-button {
        margin-top: 10px
    }
</style>
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
            <h1>Create Buyer Uploader </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create </a></li>
                </ol>
            </nav>
        </div>
        @if (session('success'))
        <div id="successMessage" class="alert alert-success">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 7000); // 7 seconds
        </script>
    @endif
    @error('file')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
        <br><br><br>
        <div class="col-sm-12 col-lg-4 main-container-uploader mx-auto text-center">

            <!-- Main div -->
            <div class="inner-container">
                <form action="{{ route('buyerupload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                      <!-- Inner main div -->
                      <div class="division-uploader">
                        <!-- Division uploader and other elements -->
                        <div>
                            <h5>Upload Buyer</h5>
                        </div>
                        <div class="file-upload">
                            <div>
                                <a id="downloaddata" href="{{ route('divisionupload') }}" download>Download</a>
                            </div>
                            <div class="select-dropdown">
                                <select id="selectiondata" name="filedatainfor" class="form-select"
                                    aria-label="Default select example" onchange="updateDownloadLink()">
                                    <option value="0">None</option>
                                    <option value="1">Csv</option>
                                    <option value="2">Excel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- Inner main div -->
                 
                    <div class="selection d-flex">
                        <div>
                            <h6>Selection:</h6>
                        </div>
                        <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                            <div>
                                <span class="checkboxdata">
                                    <input type="checkbox" id="Overwrite" name="Overwrite" style="transform: scale(1.3)">
                                </span>
                        
                                <span class="checkboxdata">
                                    <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);" value="Add-on" checked>
                                </span>
                            </div>
                        
                            <script>
                                var overwriteCheckbox = document.getElementById("Overwrite");
                                var addonCheckbox = document.getElementById("checkbox2");
                        
                                overwriteCheckbox.addEventListener("change", function() {
                                    // If Overwrite is checked, uncheck Add-on
                                    addonCheckbox.checked = !this.checked;
                                });
                        
                                addonCheckbox.addEventListener("change", function() {
                                    // If Add-on is checked, uncheck Overwrite
                                    overwriteCheckbox.checked = !this.checked;
                                });
                            </script>
                            <div class="d-flex label">
                                <div class="checkboxtext" id="overwritetxt">
                                    <p>Overwrite</p>
                                </div>
                                <div class="checkboxtext" id="addontxt">
                                    <p>Add on</p>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="key" value="Buyer" id="Buyer">
                        <div id="fileupload">
                            <input style="padding: 5px; font-size: 0.8rem;" name="file" type="file"
                                class="form-control file-input" id="inputGroupFile"
                                accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"
                                required>
                        </div>
                    </div>
            </div>
            <div class="upload-button">
                <input type="submit" value="Upload" class="btn btn-warning" style="position: relative; left: 40%;">
            </div>
            </form>
        </div>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>
        <script>
             function updateDownloadLink() {
                    var selection = document.getElementById("selectiondata");
                    var downloadLink = document.getElementById("downloaddata");

                    if (selection.value === "1") {
                        downloadLink.innerText = "Download CSV";
                        downloadLink.href = "{{ route('buyeruploadcsv') }}";
                    } else if (selection.value === "2") {
                        downloadLink.innerText = "Download Excel";
                        downloadLink.href = "{{ route('divisionupload') }}";

                    } else {
                        downloadLink.innerText = "Download";
                    }
                }

        </script>

    </section>

@endsection
