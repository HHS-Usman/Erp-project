<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accountcategory;
use App\Models\Bank;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use App\Models\Supplier;
use App\Models\SupplierCategory;
use App\Models\Suppliertype;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suplier = Supplier::all();
        return view('SupplierSetup.supplier.index',compact('suplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getMaxid = Supplier::max('suplier_id')+1;
        $bank = Bank::all();
        $scategory = SupplierCategory::all();
        $stype = Suppliertype::all();
        $province = Province::all();
        $country = Country::all();
        $city = City::all();
        return view('SupplierSetup.supplier.create',compact('province','country','city','stype','scategory','bank','getMaxid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customcode' => 'required',
            'email' => 'required|email',
            'companyname' => 'required',
            'phone1' => 'required',
            // Add more validation rules for other fields
        ], [
            'customcode.required' => 'Custom code is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'companyname.required' => 'Company name is required.',
            'phone1.required' => 'Phone number 1 is required.',
            // Add more custom error messages for other fields
        ]);
        Supplier::create([
            'customer_code'=>request()->get('customcode'),
            'email'=>request()->get('email'),
            'companyname'=>request()->get('companyname'),
            'phone_no1'=>request()->get('phone1'),
            'phone_no2'=>request()->get('phone2'),
            'address'=>request()->get('adress'),
            'city'=>request()->get('city'),
            'cell_no'=>request()->get('cellno'),
            'province'=>request()->get('province'),
            'contactperson'=>request()->get('contactperson'),
            'zipcode'=>request()->get('zipcode'),
            'contactpersoncell_no'=>request()->get('pcellno'),
            'country'=>request()->get('country'),
            'contactperson_email'=>request()->get('contactemail'),
            'supliertype'=>request()->get('suppliertype'),
            'supliercategory'=>request()->get('suppliercategory'),
            'creditdays'=>request()->get('creditdays'),
            'creditlimit'=>request()->get('creditlimit'),
            'suplierdiscount'=>request()->get('supplierdiscount'),
            'suplieradvance'=>request()->get('supplieradvance'),
            'suplierlocality'=>request()->get('supplierlocality'),
            'shipier_addres'=>request()->get('shippingaddress'),
            'shiping_city'=>request()->get('shippngcity'),
            'shippingprovince'=>request()->get('shippingprovince'),
            'shippingcountry'=>request()->get('shippingcountry'),
            'title'=>request()->get('title'),
            'contactpersonemail'=>request()->get('contactpersonemail'),
            'dispnote_invoice'=>request()->get('dinvoice'),
            'st_registration_no'=>request()->get('registration_st'),
            'st_invoicenote'=>request()->get('invoinceterm'),
            'withouttax_perc_age'=>request()->get('Withholding'),
            'bankname'=>request()->get('bank'),
            'account_title'=>request()->get('accounttext'),
            'accountno'=>request()->get('accountno'),
            'branchcode'=>request()->get('branchcode'),
            'branchname'=>request()->get('branchname'),
            'openingbalance'=>request()->get('openingbalance'),
            'dateopening'=>request()->get('openingdate'),
        ]);
        return redirect()->route('supplier.index')->with('success','Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
