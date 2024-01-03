@extends('layout.master')
@section('page-tab')
    Product Uploader
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
        <div class="pagetitle" style="margin-left: 20px;">
            <h1>Uploader</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a>Uploader</a></li>
                </ol>
            </nav>
        </div>
        <br>

        {{-- this is section for validation start --}}
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
        @if (session('error'))
            <div id="errorMessage" class="alert alert-danger">
                {{ session('error') }}
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('errorMessage').style.display = 'none';
                }, 7000); // 7 seconds
            </script>
        @endif
        @error('file')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        {{-- this is section for validation End --}}
        <div class="row mainconatiner-uploader">
            {{-- this is card 1  for Division --}}
            <div class="col-sm-12 col-lg-4 main-container-uploader">
                <!-- Main div -->
                <div class="inner-container">
                    <form action="{{ route('productupload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Inner main div -->
                        <div class="division-uploader">
                            <!-- Division uploader and other elements -->
                            <div>
                                <h5>Upload Product</h5>
                            </div>

                        </div>

                        <div class="selection d-flex">
                            <div>
                                <h6>Selection:</h6>
                            </div>
                            <div class="checkboxcontainer" style="padding: 0px 0px 0px 10px;width: 50%;">
                                <div>
                                    <span class="checkboxdata">
                                        <input type="checkbox" id="Overwrite" name="Overwrite"id="checkbox1"
                                            style="transform: scale(1.3)">
                                    </span>

                                    <span class="checkboxdata">
                                        <input type="checkbox" id="checkbox2" name="Add-on" style="transform: scale(1.3);"
                                            value="Add-on"checked>
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

                            <input type="hidden" name="key" value="Product" id="Product">
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

            {{-- this is second conatiner for Department --}}

            {{-- this is second conatiner for Function --}}

            <br><br><br>
            <br>
            <br>
            <div><br> </div>
            {{-- this is script for checkbox check is checked one only at a time --}}


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

                function updateDownloadLink9() {
                    var selection = document.getElementById("selectiondata9");
                    var downloadLink = document.getElementById("downloaddata9");

                    if (selection.value === "1") {
                        downloadLink.innerText = "Download CSV";
                        downloadLink.href = "{{ route('religionupoloadcsv') }}";


                    } else if (selection.value === "2") {
                        downloadLink.innerText = "Download Excel";
                        downloadLink.href = "{{ route('religionupoload') }}";

                    } else {

                        downloadLink.innerText = "Download";

                    }
                }

                function updateDownloadLink8() {
                    var selection = document.getElementById("selectiondata8");
                    var downloadLink = document.getElementById("downloaddata8");

                    if (selection.value === "1") {
                        downloadLink.innerText = "Download CSV";
                        downloadLink.href = "{{ route('languageupoloadcsv') }}";


                    } else if (selection.value === "2") {
                        downloadLink.innerText = "Download Excel";
                        downloadLink.href = "{{ route('languageupoload') }}";

                    } else {

                        downloadLink.innerText = "Download";

                    }
                }

                function updateDownloadLink7() {
                    var selection = document.getElementById("selectiondata7");
                    var downloadLink = document.getElementById("downloaddata7");

                    if (selection.value === "1") {
                        downloadLink.innerText = "Download CSV";
                        downloadLink.href = "{{ route('leavingreasonuoloadcsv') }}";


                    } else if (selection.value === "2") {
                        downloadLink.innerText = "Download Excel";
                        downloadLink.href = "{{ route('leavingreasonuoload') }}";

                    } else {

                        downloadLink.innerText = "Download";

                    }
                }

                function updateDownloadLink6() {
                    var selection = document.getElementById("selectiondata6");
                    var downloadLink = document.getElementById("downloaddata6");

                    if (selection.value === "1") {
                        downloadLink.innerText = "Download CSV";
                        downloadLink.href = "{{ route('gradploadcsv') }}";


                    } else if (selection.value === "2") {
                        downloadLink.innerText = "Download Excel";
                        downloadLink.href = "{{ route('gradpload') }}";

                    } else {

                        downloadLink.innerText = "Download";

                    }
                }

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
