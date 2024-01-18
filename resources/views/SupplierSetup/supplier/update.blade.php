@extends('layout.master')
@section('page-tab')
Update Supplier
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
        <h1>Update Supplier</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a> Create Supplier</a></li>
            </ol>
        </nav>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        #nextbutton {
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

        .dropdown {}

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
    <div class=" wrapper d-flex">
        <div class="tabs">
            <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                    onclick="showTab(1)">Suplier General Info</button></div>
            <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                    onclick="showTab(2)">Contact Person</button></div>
            <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                    onclick="showTab(3)">Suplier Tax Filer</button></div>
            <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                    onclick="showTab(4)">Suplier Bank Info</button></div>
        </div>
        <script>
            $(document).ready(function () {
                    $('#companyshipadres').on('change', function () {
                        var selectedOption = $(this).val();

                        // Enable/disable fields based on the selected option
                        if (selectedOption === 'above') {
                            $('#shippingaddress').prop('disabled', true);
                            $('#shippngcityon').prop('disabled', true);
                            $('#postalcodeon').prop('disabled', true);
                            $('#shippingprovinceon').prop('disabled', true);
                            $('#shippingcountryon').prop('disabled', true);
                            $('#countryabove').prop('disabled', false);
                            $('#zipcodeabove').prop('disabled', false);
                            $('#countryabove').prop('disabled', false);
                            $('#cityabove').prop('disabled', false);
                            $('#adressabove').prop('disabled', false);
                        } else if (selectedOption === 'other') {
                            $('#shippingaddress').prop('disabled', false);
                            $('#shippngcityon').prop('disabled', false);
                            $('#postalcodeon').prop('disabled', false);
                            $('#shippingprovinceon').prop('disabled', false);
                            $('#shippingcountryon').prop('disabled', false);
                            $('#countryabove').prop('disabled', true);
                            $('#zipcodeabove').prop('disabled', true);
                            $('#provinceabove').prop('disabled', true);
                            $('#cityabove').prop('disabled', true);
                            $('#adressabove').prop('disabled', true);
                        }
                    });
                });
        </script>
        <div class="container">
            <form class="w-100" id="multitab-form" action="{{ route('supplier.update',$getMaxid) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="tab" id="tab1">
                    <div class="col-md-12 form-group">
                        <h3> Suplier General Info</h3>
                        <div class="col-md-6  justify-content-center">
                            <strong>System Code</strong>
                            <input type="text" class="form-control" disabled id="systemid" value={{ $getMaxid->suplier_id }}
                                name="systemid" placeholder="0">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12"
                            style="border: 1px solid black;padding:20px;margin:10px">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Custom Code (Optional)</strong>
                                    <input type="text" class="form-control" id="customcode" name="customcode"
                                        placeholder="Customer Code" value={{ $getMaxid->customer_code }}>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Email</strong>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="Email" value="{{ $getMaxid->email }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Company Name</strong>
                                    <input type="text" class="form-control" id="companyname" name="companyname"
                                        placeholder="Company Name" value="{{ $getMaxid->companyname }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Phone no1#</strong>
                                    <input type="number" class="form-control" id="phone1" name="phone1"
                                        placeholder="Phone No1#" value="{{ $getMaxid->phone_no1 }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Adress</strong>
                                    <input type="textarea" class="form-control" id="adressabove" name="adressabove"
                                        placeholder="Address" value="{{ $getMaxid->address }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong for="attachment">phone no2#</strong>
                                    <input type="text" class="form-control" id="phone2" name="phone2"
                                        placeholder="phone no2#" value="{{ $getMaxid->phone_no2 }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>City</strong>
                                    <select name="city_id" id="cityabove" class="form-control">
                                        <option value="">Select City </option>
                                        @foreach ($city as $item)
                                        <option value={{ $item->id }} @if ($item->id == $getMaxid->City_id ) selected @endif>{{ $item->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong for="attachment">Cell no#</strong>
                                    <input type="text" class="form-control" id="cellno" name="cellno"
                                        placeholder="Cell no#"  value="{{ $getMaxid->cell_no }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Province</strong>
                                    <select name="province_id" id="province_id" class="form-control">
                                        <option value="">Select Province </option>
                                        @foreach ($province as $item)
                                        <option value={{ $item->province_id }} @if ($item->province_id == $getMaxid->province_id ) selected @endif>{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Contact Person</strong>
                                    <input type="text" class="form-control" id="contactperson" name="contact_person"
                                        placeholder="Contact Person" value="{{ $getMaxid->contactpersoncell_no }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Zip/Postal Code</strong>
                                    <input type="text" class="form-control" id="zipcodeabove" name="zipcodeabove"
                                        placeholder="Zip/Postal Code" value="{{ $getMaxid->zipcode }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Contact Person Cell no</strong>
                                    <input type="number" class="form-control" id="pcellno" name="cont_p_no"
                                        placeholder="{{ $getMaxid->contactpersoncell_no }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Country</strong>
                                    <select name="country_id" id="countryabove" class="form-control">
                                        <option value="Select Sale Type">Select Country </option>
                                        @foreach ($country as $item)
                                        <option value={{ $item->id }} @if ($item->id == $getMaxid->country_id ) selected @endif>{{ $item->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Contact Person Email</strong>
                                    <input type="text" class="form-control" id="contactemail" name="contactemail"
                                        placeholder="Contact Person Email" value="{{ $getMaxid->contactperson_email }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Suplier Type</strong>

                                    <select name="stype_id" id="supliertype_id" class="form-control">
                                        <option value="Select Sale Type">Select Supplier Type </option>
                                        @foreach ($stype as $item)
                                            <option value={{ $item->stype_id }} @if ($item->stype_id == $getMaxid->stype_id ) selected @endif>{{ $item->suppliertype }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Supplier Category</strong>
                                    <select name="supliercatg_id" id="suplierCatg_id" class="form-control">
                                        <option value="">Select Supplier Category </option>
                                        @foreach ($scategory as $item)
                                        <option value={{ $item->supliercatg_id }} @if ($item->supliercatg_id == $getMaxid->suplierCatg_id ) selected @endif>
                                            {{ $item->suplliercategoty }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Credit Days</strong>
                                    <input type="text" class="form-control" id="creditdays" name="creditdays"
                                        placeholder="Credit Days" value="{{ $getMaxid->creditdays }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Supplier Discount</strong>
                                    <input type="text" class="form-control" id="supplierdiscount"
                                        name="supplierdiscount" placeholder="Supplier Discount" value="{{ $getMaxid->suplierdiscount }}" >
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Credit limit</strong>
                                    <input type="text" class="form-control" id="creditlimit" name="creditlimit"
                                        placeholder="Credit limit" value="{{ $getMaxid->creditlimit }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Supplier Advance</strong>
                                    <input type="text" class="form-control" id="supplieradvance" name="supplieradvance"
                                    placeholder="Supplier Advance" value="{{ $getMaxid->suplieradvance }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Supplier Locality</strong>
                                    <input type="text" class="form-control" id="supplierlocality"
                                        name="supplierlocality" placeholder="Supplier Locality" value="{{ $getMaxid->suplierlocality }}">
                                </div>
                                <div class="col-md-6 form-group">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Company Shipping Address</strong>
                                    <select name="companyshipadres" id="companyshipadres" class="form-control">
                                        <option value="Select Sale Type">Select Company Shipping Adress </option>
                                        <option value="above">Same As Obove</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Shipping Address</strong>
                                    <input type="text" class="form-control" id="shippingaddress"
                                        name="shippingaddresson" placeholder="Shipping Address" value="{{ $getMaxid->shipier_addres }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Shipping City</strong>
                                    <select name="shippngcity" id="shippngcityon" class="form-control">
                                        <option value="Select Shipping City">Select Shipping City </option>
                                        @foreach ($city as $item)
                                        <option value={{ $item->id }} @if ($item->id == $getMaxid->shiping_city) selected @endif>{{ $item->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>ZIP/Postal Code</strong>
                                    <input type="text" class="form-control" id="postalcodeon" name="postalcodeon"
                                        placeholder="ZIP/Postal Code" value="{{ $getMaxid->zipcode }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Shipping Province</strong>
                                    <select name="shippingprovinceon" id="shippingprovinceon" class="form-control">
                                        <option value="Select Sale Type">Select Shipping province </option>
                                        @foreach ($province as $item)
                                            <option value={{ $item->province_id }}
                                            @if ($item->province_id == $getMaxid->province_id) selected @endif>
                                            {{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Shipping Country</strong>
                                    <select name="shippingcountryon" id="shippingcountryon" class="form-control">
                                        <option value="Select Sale Type">Select Shipping Country </option>
                                        @foreach ($country as $item)
                                        <option value={{ $item->id }} @if ( $item->id == $getMaxid->country_id) selected @endif>{{ $item->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="submit()">Submit</button>
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" id="sbumit2" style="margin: 5px;"
                            onclick="showTab(2)">Next</button>
                    </div>

                </div>
                <div class="tab" id="tab2">
                    <strong>
                        <h3>Contact Person</h3>
                    </strong>
                    <div class="col-xs-6 col-sm-6 col-md-12" style="border: 1px solid black;padding:20px;margin:10px">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Title</strong>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{ $getMaxid->title }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Contact Person Email</strong>
                                <input type="text" class="form-control" id="contactpersonemail"
                                    name="contactpersonemail" placeholder="Contact Person Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Contact Person</strong>
                                <input type="text" class="form-control" id="contactperson" name="contact_person"
                                    placeholder="Contact Person">
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Contact Person Cell no#</strong>
                                <input type="text" class="form-control" id="personcell#" name="cont_person_no"
                                    placeholder="Contact Person Cell no#">
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="showTab(1)">Previous</button>
                        <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="submit()">Submit</button>
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" id="sbumit2" style="margin: 5px;"
                            onclick="showTab(3)">Next</button>
                    </div>
                </div>
                <div class="tab" id="tab3">
                    <strong>
                        <h2>Supplier Tax</h2>
                    </strong>
                    <div class="col-xs-6 col-sm-6 col-md-12" style="border: 1px solid black;padding:20px;margin:10px">
                        <br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>is Tax Filer / Registered?</strong>
                                <select name="filterregistered" id="registered" class="form-control">
                                    <option value="">Select here </option>
                                    <option value="yes" >Yes </option>
                                    <option value="no">No </option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Display Notes in Invoice</strong>
                                <select name="dinvoice" id="dinvoice" class="form-control">
                                    <option value="">Select here </option>
                                    <option value="yes" @if ($getMaxid->dinvoice == 'yes') selected @endif>Yes </option>
                                    <option value="no" @if ($getMaxid->dinvoice == 'no') selected @endif>No </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>S.T. Registration No</strong>
                                <input type="text" class="form-control" id="registration_st" name="registration_st"
                                    placeholder="S.T. Registration No" value="{{  $getMaxid->st_registration_no}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>S.T. Invoice Note / Terms</strong>
                                <input type="textarea" class="form-control" id="invoinceterm" name="invoinceterm"
                                    placeholder="S.T. Invoice Note / Terms" value="{{  $getMaxid->st_invoicenote}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Withholding tax %age</strong>
                                <input type="text" class="form-control" id="Withholding" name="Withholding"
                                    placeholder="Withholding tax %age" value="{{  $getMaxid->withouttax_perc_age }}">
                            </div>
                            <div class="col-md-6 form-group">
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="showTab(2)">Previous</button>
                        <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="submit()">Submit</button>
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" id="sbumit2" style="margin: 5px;"
                            onclick="showTab(4)">Next</button>
                    </div>
                </div>

                <div class="tab" id="tab4">
                    <strong>
                        <h2>Suplier Bank Infor</h2>
                    </strong>
                    <div class="col-xs-6 col-sm-6 col-md-12" style="border: 1px solid black;padding:20px;margin:10px">
                        <strong>

                        </strong>
                        <br>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Select Bank</strong>
                                <select name="bankdata" id="bank" class="form-control">
                                    <option value="Select ">Select Bank </option>
                                    @foreach ($bank as $item)
                                    <option value={{ $item->bank_id }} @if ( $item->bank_id == $getMaxid->bank_id) selected @endif>{{ $item->Bank }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                h <strong>Account Title</strong>
                                <input type="text" class="form-control" id="accounttext" name="accounttext"
                                    placeholder="Account Title" value="{{ $getMaxid->account_title }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Account No</strong>

                                <input type="text" class="form-control" id="accountno" name="accountno"
                                    placeholder="Account No" value="{{ $getMaxid->accountno }}">

                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Branch Code</strong>
                                <input type="text" class="form-control" id="branchcode" name="branchcode"
                                    placeholder="Branch Code" value="{{ $getMaxid->branchcode }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Branch Name</strong>
                                <input type="text" class="form-control" id="branchname" name="branchname"
                                    placeholder="Branch Name" value="{{ $getMaxid->branchname }}">
                            </div>
                            <div class="col-md-6 form-group"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Opening Balance</strong>
                                <input type="number" class="form-control" id="openingbalance" name="openingbalance"
                                    placeholder="Opening Balance" value="{{ $getMaxid->openingbalance }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Opening Date</strong>
                                <input type="date" class="form-control" id="openingdate" name="openingdate"
                                    placeholder="Opening Date" value="{{ $getMaxid->dateopening }}">
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="showTab(3)">Previous</button>
                        <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="submit()">Submit</button>
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

</section>

@endsection
