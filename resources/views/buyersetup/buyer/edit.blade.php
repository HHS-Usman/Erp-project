@extends('layout.master')
@section('page-tab')
Update Buyer
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
        <h1>Update Buyer</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active"><a> Create Buyer</a></li>
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
                    onclick="showTab(1)">Buyer General Info</button></div>
            <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                    onclick="showTab(2)">Contact Person</button></div>
            <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                    onclick="showTab(3)">Buyer Tax Filer</button></div>
            <div style="margin:5px;"><button type="button" class="btn btn-primary p-3 px-5  col-12"
                    onclick="showTab(4)">Buyer Bank Info</button></div>
        </div>
        <script>
            $(document).ready(function () {
                    $('#companyshipadres').on('change', function () {
                        var selectedOption = $(this).val();

                        // Enable/disable fields based on the selected option
                      // Enable/disable fields based on the selected option
                      if (selectedOption === 'above') {
                            $('#shippingaddress').prop('disabled', true);
                            $('#shippngcity').prop('disabled', true);
                            $('#postalcodeon').prop('disabled', true);
                            $('#shippingprovince').prop('disabled', true);
                            $('#shippingcountry').prop('disabled', true);
                        } 
                        else if(selectedOption == "other"){
                            $('#shippingaddress').prop('disabled', false);
                            $('#shippngcity').prop('disabled', false);
                            $('#postalcodeon').prop('disabled', false);
                            $('#shippingprovince').prop('disabled', false);
                            $('#shippingcountry').prop('disabled', false);
                        }
                    });
                });
        </script>



        <div class="container">
            <form class="w-100" id="multitab-form" action="{{ route('buyer.update',['buyer' => $buyer->buyer_id]) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="tab" id="tab1">
                    <div class="col-md-12 form-group">
                        <strong>
                            <h2>Buyer General Info</h2>
                        </strong>
                        <br>
                        <div class="col-md-3 form-group">
                            <strong>System Code</strong>
                            <input type="text" class="form-control" disabled id="customcode"
                                value="{{ $buyer->buyer_id }}" name="customcode" placeholder="0">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-12"
                            style="border: 1px solid black;padding:20px;margin:10px">

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Custom Code (Optional)</strong>
                                    <input type="text" class="form-control" id="customcode" name="customcode"
                                        placeholder="Customer Code" value="{{ $buyer->customer_code }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Email</strong>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        value="{{ $buyer->email }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Company Name</strong>
                                    <input type="text" class="form-control" id="companyname" name="companyname"
                                        placeholder="Company Name" value="{{ $buyer->companyname }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Phone #No1</strong>
                                    <input type="number" class="form-control" id="phoneone" name="phoneone"
                                        placeholder="Phone #No1" value="{{ $buyer->phone_no1}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Adress</strong>
                                    <input type="textarea" class="form-control" id="adressa" name="adressb"
                                        placeholder="Address" value="{{ $buyer->address}}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Phone #No2</strong>
                                    <input type="number" class="form-control" id="phonetwo" name="phonetwo"
                                        placeholder="Phone #No2" value="{{ $buyer->phone_no2}}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>City</strong>
                                    <select name="city_id" id="citya" class="form-control">
                                        <option value="Select City">Select City </option>
                                        @foreach ($city as $item)
                                            <option value={{ $item->id }} @if ($item->id == $buyer->City_id) selected @endif>{{$item->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong for="attachment">Cell no#</strong>
                                    <input type="text" class="form-control" id="cellno" name="cellno"
                                        placeholder="Cell no#" value="{{ $buyer->cell_no }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Province</strong>
                                    <select name="province_id" id="provincea" class="form-control">
                                        <option value="Select Sale Type">Select Province </option>
                                        @foreach ($province as $item)
                                        <option value={{ $item->province_id }} @if ($item->province_id == $buyer->province_id )
                                            selected @endif>{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Contact Person</strong>
                                    <input type="text" class="form-control" id="contactperson" name="contactperson"
                                        placeholder="Contact Person" value="{{ $buyer->contactperson }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Zip/Postal Code</strong>
                                    <input type="text" class="form-control" id="zipcodea" name="zipcodeb"
                                        placeholder="Zip/Postal Code" value="{{ $buyer->zipcode }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Contact Person Cell no</strong>
                                    <input type="text" class="form-control" id="pcellno" name="pcellno"
                                        placeholder="ontact Person Cell no" value="{{ $buyer->contactpersoncell_no }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Country</strong>
                                    <select name="country_id" id="countryb" class="form-control">
                                        <option value="Select Sale Type">Select Country </option>
                                        @foreach ($country as $item)
                                        <option value={{ $item->id }} @if ($item->id == $buyer->country_id) selected
                                            @endif>{{ $item->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Contact Person Email</strong>
                                    <input type="text" class="form-control" id="contactemail" name="contactemail"
                                        placeholder="Contact Person Email" value="{{  $buyer->contactperson_email }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Buyer Type</strong>
                                    <select name="buyertype" id="buyertype" class="form-control">
                                        <option value="Select Sale Type">Select Buyer Type </option>
                                        @foreach ($btype as $item)
                                        <option value={{ $item->btype_id }} @if ($item->btype_id == $buyer->btype_id)
                                            selected @endif>{{ $item->buyertype }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Buyer Category</strong>
                                    <select name="buyercategory" id="buyercategory" class="form-control">
                                        <option value="Select Sale Type">Select buyer Category </option>
                                        @foreach ($buyercetegory as $item)
                                        <option value={{ $item->bcategory_id }} @if ($item->bcategory_id ==
                                            $buyer->bcategory_id) @endif>{{ $item->buyercategory }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Credit Days</strong>
                                    <input type="text" class="form-control" id="creditdays" name="creditdays"
                                        placeholder="Credit Days" value="{{ $buyer->creditdays }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>buyer Discount</strong>
                                    <input type="text" class="form-control" id="buyerdiscount" name="buyerdiscount"
                                        placeholder="buyer Discount" value="{{ $buyer->buyerdiscount }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Credit limit</strong>
                                    <input type="text" class="form-control" id="creditlimit" name="creditlimit"
                                        placeholder="Credit limit" value="{{ $buyer->creditlimit }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Buyer Advance</strong>
                                    <input type="text" class="form-control" id="buyeradvance" name="buyeradvance"
                                        placeholder="buyer Advance" value="{{ $buyer->buyeradvance }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Buyer Locality</strong>
                                    <input type="text" class="form-control" id="buyerlocality" name="buyerlocality"
                                        placeholder="Shipping Address" value="{{  $buyer->suplierlocality }}">
                                </div>
                                <div class="col-md-6 form-group">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Company Shipping Addres</strong>
                                    <select name="companyshipadres" id="companyshipadres" class="form-control">
                                        <option value="Select Sale Type">Select Company Shipping Adress </option>
                                        <option value="above">Same As Obove</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Shipping Address</strong>
                                    <input type="text" class="form-control" id="shippingaddress" name="shipping_addres"
                                        placeholder="Shipping Address" value="{{ $buyer->shiping_addres }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Shipping City</strong>
                                    <select name="shipping_city_id" id="shippngcity" class="form-control">
                                        <option value="Select Shipping City">Select Shipping City </option>
                                        @foreach ($city as $item)
                                        <option value={{ $item->id }} @if ($item->id == $buyer->shiping_city) selected
                                            @endif>{{ $item->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>ZIP/Postal Code</strong>
                                    <input type="text" class="form-control" id="postalcodeon" name="zip_code_shpping"
                                        placeholder="ZIP/Postal Code">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <strong>Shipping Province</strong>
                                    <select name="shipping_province_id" id="shippingprovince" class="form-control">
                                        <option value="Select Sale Type">Select Shipping province </option>
                                        @foreach ($province as $item)
                                        <option value={{ $item->province_id }} @if ($item->province_id ==
                                            $buyer->shippingprovince) selected @endif>{{ $item->province }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <strong>Shipping Country</strong>
                                    <select name="shipping_country_id" id="shippingcountry" class="form-control">
                                        <option value="Select Sale Type">Select Shipping Country </option>
                                        @foreach ($country as $item)
                                        <option value={{ $item->id }} @if ($item->province_id ==
                                            $buyer->shippingcountry) selected @endif>{{ $item->country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="container d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                                onclick="submit()">Submit</button>
                            <button type="button" class="btn btn-primary p-3 px-5  col-3" id="sbumit2"
                                style="margin: 5px;" onclick="showTab(2)">Next</button>
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
                <div class="tab" id="tab2">
                    <strong>
                        <h2>Contact Person</h2>
                    </strong>
                    <div class="col-xs-6 col-sm-6 col-md-12" style="border: 1px solid black;padding:20px;margin:10px">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Title</strong>
                                <select name="title" id="title" class="form-control">
                                    <option value="Select Sale Type">Select title </option>
                                    <option value="M/s" @if ($item->province_id == 'M/s') selected @endif>M/s </option>
                                    <option value="MS" @if ($item->province_id == 'MS') selected @endif>MS </option>
                                    <option value="MR" @if ($item->province_id == 'MR') selected @endif>MR </option>
                                    <option value="MRS" @if ($item->province_id == 'MRS') selected @endif>MRS </option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Contact Person Email</strong>
                                <input type="text" class="form-control" id="contactpersonemail"
                                    name="contactpersonemail" placeholder="Contact Person Email"
                                    value="{{ $buyer->contactpersonemail  }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Contact Person</strong>
                                <input type="text" class="form-control" id="contactperson" name="contactperson"
                                    placeholder="Contact Person" value="{{ $buyer->contactpersonemail  }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Contact Person Cell no#</strong>
                                <input type="text" class="form-control" id="personcell#" name="personcell#"
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
                    <script>
                        function submit1()
                      {
                        var form1 = document.getElementById('form1');
                        form1.submit();
                      }
                    </script>
                </div>
                <div class="tab" id="tab3">
                    <strong>
                        <h2>Buyer Tax</h2>
                    </strong>
                    <div class="col-xs-6 col-sm-6 col-md-12" style="border: 1px solid black;padding:20px;margin:10px">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>is Tax Filer / Registered?</strong>
                                <select name="title" id="registered" class="form-control">
                                    <option value="">Select here </option>
                                    <option value="yes">Yes </option>
                                    <option value="no">No </option>
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Display Notes in Invoice</strong>
                                <select name="dinvoice" id="invoice" class="form-control">
                                    <option value="Select ">Select here </option>
                                    <option value="yes" @if ($buyer->dispnote_invoice == 'yes') selected @endif>Yes
                                    </option>
                                    <option value="no" @if ($buyer->dispnote_invoice == 'no') selected @endif>No
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>S.T. Registration No</strong>
                                <input type="text" class="form-control" id="registration_st" name="registration_st"
                                    placeholder="S.T. Registration No" value="{{$buyer->st_registration_no }}">
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>S.T. Invoice Note / Terms</strong>
                                <input type="textarea" class="form-control" id="invoinceterm" name="invoinceterm"
                                    placeholder="S.T. Invoice Note / Terms" value="{{$buyer->st_invoicenote }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Withholding tax %age</strong>
                                <input type="text" class="form-control" id="Withholding" name="Withholding"
                                    placeholder="Withholding tax %age" value="{{ $buyer->withouttax_perc_age }}">
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
                    <script>
                        function submit1()
                  {
                    var form1 = document.getElementById('form1');
                    form1.submit();
                  }
                    </script>
                </div>
                <div class="tab" id="tab4">
                    <strong>
                        <h2>Buyer Bank Info</h2>
                    </strong>
                    <div class="col-xs-6 col-sm-6 col-md-12" style="border: 1px solid black;padding:20px;margin:10px">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Select Bank</strong>
                                <select name="bankvalue" id="bank" class="form-control">
                                    <option value="Select ">Select Bank </option>
                                    @foreach ($bank as $item)
                                    <option value={{ $item->bank_id }} @if($item->bank_id == $buyer->bank_id) selected
                                        @endif >{{ $item->Bank }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Account Title</strong>
                                <input type="text" class="form-control" id="accounttext" name="accounttext"
                                    placeholder="Account Title" value="{{ $buyer->account_title }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Account No</strong>
                                <input type="text" class="form-control" id="accontno" name="accontno"
                                    placeholder="Account No" value="{{ $buyer->accountno}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Branch Code</strong>
                                <input type="text" class="form-control" id="branchcode" name="branchcode"
                                    placeholder="Branch Code" value="{{ $buyer->branchcode}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Branch Name</strong>
                                <input type="text" class="form-control" id="branchname" name="branchname"
                                    placeholder="Branch Name" value="{{ $buyer->branchname}}">
                            </div>
                            <div class="col-md-6 form-group">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <strong>Opening Balance</strong>
                                <input type="number" class="form-control" id="openingbalance" name="openingbalance"
                                    placeholder="Opening Balance" value="{{ $buyer->openingbalance}}">
                            </div>
                            <div class="col-md-6 form-group">
                                <strong>Opening Date</strong>
                                <input type="date" class="form-control" placeholder="Opening Date" id="openingdate"
                                    name="openingdate" min="0" max="2000" value="{{ $buyer->dateopening}}" />
                            </div>
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="showTab(3)">Previous</button>
                        <button type="submit" class="btn btn-primary p-3 px-5  col-3" style="margin: 5px;"
                            onclick="submit()">Submit</button>

                    </div>
                    <script>
                        function submit1()
                  {
                    var form1 = document.getElementById('form1');
                    form1.submit();
                  }
                    </script>
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
