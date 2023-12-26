@extends('layout.master')
@section('page-tab')
    Create Supplier
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
            <h1>Create Supplier</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a> Create Supplier</a></li>
                </ol>
            </nav>
        </div>
        <br><br><br>
        <form action="{{ route('financailyear.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="col-md-4 form-group">
                    <strong>System Code</strong>
                    <input type="text" class="form-control" disabled id="systemid" name="systemid" placeholder="0">
                </div>
                <div class="col-xs-6 col-sm-6 col-md-8" style="border: 1px solid black;padding:20px;margin:10px">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Custom Code (Optional)</strong>
                            <input type="text" class="form-control" id="customcode" name="customcode" placeholder="Customer Code">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Email</strong>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Company Name</strong>
                            <input type="text" class="form-control" id="companyname" name="companyname" placeholder="Company Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Phone no1#</strong>
                            <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Phone No1#">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Adress</strong>
                            <input type="textarea" class="form-control" id="adress" name="adress"  placeholder="Address">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong for="attachment">phone no2#</strong>
                            <input type="text" class="form-control" id="phone1" name="phone1" placeholder="phone no2#">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>City</strong>
                            <select name="city" id="city" class="form-control">
                                <option value="Select City">Select City </option>
                                @foreach ($city as $item)
                                    <option value=>{{$item->city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong for="attachment">Cell no#</strong>
                            <input type="text" class="form-control" id="cellno" name="cellno" placeholder="Cell no#">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Province</strong>
                            <select name="province" id="province" class="form-control">
                                <option value="Select Sale Type">Select Province </option>
                                @foreach ($province as $item)
                                    <option value=>{{$item->province}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Contact Person</strong>
                            <input type="text" class="form-control" id="contactperson" name="contactperson" placeholder="Contact Person">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Zip/Postal Code</strong>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zip/Postal Code">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Contact Person Cell no</strong>
                            <input type="text" class="form-control" id="pcellno" name="pcellno" placeholder="ontact Person Cell no">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Country</strong>
                            <select name="country" id="country" class="form-control">
                                <option value="Select Sale Type">Select Country </option>
                                @foreach ($country as $item)
                                    <option value=>{{$item->country}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Contact Person Email</strong>
                            <input type="text" class="form-control" id="contactemail" name="contactemail" placeholder="Contact Person Email">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Supplier Type</strong>
                            
                            <select name="suppliertype" id="suppliertype" class="form-control"> 
                                <option value="Select Sale Type">Select Supplier Type </option>
                                @foreach ($stype as $item)
                                <option value=>{{$item->suppliertype}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Supplier Category</strong>
                            <select name="suppliercategory" id="suppliercategory" class="form-control">
                                <option value="Select Sale Type">Select Supplier Category </option>
                                @foreach ($scategory as $item)
                                <option value=>{{$item->suplliercategoty}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Credit Days</strong>
                            <input type="text" class="form-control" id="creditdays" name="creditdays" placeholder="Credit Days">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Supplier Discount</strong>
                            <input type="text" class="form-control" id="supplierdiscount" name="supplierdiscount" placeholder="Supplier Discount">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Credit limit</strong>
                            <input type="text" class="form-control" id="creditlimit" name="creditlimit" placeholder="Credit limit">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Supplier Advance</strong>
                            <input type="text" class="form-control" id="supplieradvance" name="supplieradvance" placeholder="Supplier Advance">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Supplier Locality</strong>
                            <select name="supplierlocality" id="supplierlocality" class="form-control">
                                <option value="Select Sale Type">Select Locality </option>
                                <option value="above">Same As Obove</option>
                                <option value="above">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Company Shipping Addres</strong>
                            <select name="suppliercategory" id="suppliercategory" class="form-control">
                                <option value="Select Sale Type">Select Company Shipping Address </option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Shipping Address</strong>
                            <input type="text" class="form-control" id="shippingaddress" name="shippingaddress" placeholder="Shipping Address">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Shipping City</strong>
                            <select name="shippngcity" id="shippngcity" class="form-control">
                            <option value="Select Shipping City">Select Shipping City </option>
                            @foreach ($city as $item)
                                <option value=>{{$item->city}}</option>
                            @endforeach
                           </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>ZIP/Postal Code</strong>
                            <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="ZIP/Postal Code">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Shipping Province</strong>
                            <select name="shippingprovince" id="shippingprovince" class="form-control">
                                <option value="Select Sale Type">Select Shipping province </option>
                                @foreach ($province as $item)
                                <option value=>{{$item->province}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Shipping Country</strong>
                            <select name="shippingcountry" id="shippingcountry" class="form-control">
                                <option value="Select Sale Type">Select Shipping Country </option>
                                @foreach ($country as $item)
                                    <option value=>{{$item->country}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-8" style="border: 1px solid black;padding:20px;margin:10px">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Title</strong>
                            <select name="title" id="title" class="form-control">
                                <option value="Select Sale Type">Select title </option>
                            </select>
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
                            <input type="text" class="form-control" id="contactperson" name="contactperson" placeholder="Contact Person">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Contact Person Cell no#</strong>
                            <input type="text" class="form-control" id="personcell#" name="personcell#" placeholder="Contact Person Cell no#">
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-8" style="border: 1px solid black;padding:20px;margin:10px">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>is Tax Filer / Registered?</strong>
                            <select name="title" id="registered" class="form-control">
                                <option value="Select ">Select here </option>
                                <option value="yes">Yes </option>
                                <option value="no">No </option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Display Notes in Invoice</strong>
                            <select name="invoice" id="invoice" class="form-control">
                                <option value="Select ">Select here </option>
                                <option value="yes">Yes </option>
                                <option value="no">No </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>S.T. Registration No</strong>
                            <input type="text" class="form-control" id="registration_st" name="registration_st" placeholder="S.T. Registration No">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>S.T. Invoice Note / Terms</strong>
                            <input type="textarea" class="form-control" id="invoinceterm" name="invoinceterm" placeholder="S.T. Invoice Note / Terms">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Withholding tax %age</strong>
                            <input type="text" class="form-control" id="Withholding" name="Withholding" placeholder="Withholding tax %age">
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-8" style="border: 1px solid black;padding:20px;margin:10px">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Select Bank</strong>
                            <select name="bank" id="bank" class="form-control">
                                <option value="Select ">Select Bank </option>
                                @foreach ($bank as $item)
                                <option value=>{{$item->Bank}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Account Title</strong>
                            <input type="text" class="form-control" id="accounttext" name="accounttext" placeholder="Account Title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Account No</strong>
                            <select name="accountno" id="accountno" class="form-control">
                                <option value="Select ">Select Account No </option>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Branch Code</strong>
                            <input type="text" class="form-control" id="branchcode" name="branchcode" placeholder="Branch Code">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Branch Name</strong>
                            <input type="text" class="form-control" id="branchname" name="branchname" placeholder="Branch Name">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <strong>Opening Balance</strong>
                            <input type="text" class="form-control" id="openingbalance" name="openingbalance" placeholder="Opening Balance">
                        </div>
                        <div class="col-md-6 form-group">
                            <strong>Opening Date</strong>
                            <input type="text" class="form-control" id="openingdate" name="openingdate" placeholder="Opening Date">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center ">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        </div>
        <br><br><br>
        <br>
        <br>
        <div><br> </div>

    </section>

@endsection
