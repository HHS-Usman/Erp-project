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

            'shippingaddress' => 'nullable',
            'phoneone' => 'nullable',
            'customcode' => 'nullable',
            'phonetwo' => 'nullable',
            'adress' => 'nullable',
            'city' => 'nullable',
            'cellno' => 'nullable',
            'province' => 'nullable',
            'contactperson' => 'nullable',
            'pcellno' => 'nullable',
            'country' => 'nullable',
            'contactemail' => 'nullable',
            'supliertype_id' => 'nullable',
            'suplierCatg_id' => 'nullable',
            'supplierdiscount' => 'nullable',
            'supplieradvance' => 'nullable',
            'supplierlocality' => 'nullable',
            'shippngcity' => 'nullable',
            'shippingprovince' => 'nullable',
            'shippingcountry' => 'nullable',
            'contactpersonemail' => 'nullable',
            'registration_st' => 'nullable',
            'invoinceterm' => 'nullable',
            'Withholding' => 'nullable',
            'accounttext' => 'nullable',
            'bank' => 'nullable',
            'accontno' => 'nullable',
            'branchcode' => 'nullable',
            'branchname' => 'nullable',
            'openingbalance' => 'nullable',
            'openingdate' => 'nullable',
            'phone1' => 'nullable',
            'phone2' => 'nullable',
        ]);

        if(request()->get('companyshipadres') ==  "above"){

            Supplier::create([
                'customer_code'=>request()->get('customcode'),
                'email'=>request()->get('email'),
                'companyname'=>request()->get('companyname'),
                'phone_no1'=>request()->get('phone1'),
                'phone_no2'=>request()->get('phone2'),
                'address'=>request()->get('adressabove'),
                // 'city'=>request()->get('city'),
                'cell_no'=>request()->get('cellno'),
                // 'province'=>request()->get('province'),
                'contactperson'=>request()->get('contactperson'),
                'zipcode'=>request()->get('zipcodeabove'),
                'contactpersoncell_no'=>request()->get('pcellno'),
                // 'country'=>request()->get('country'),
                'contactperson_email'=>request()->get('contactemail'),
                'creditdays'=>request()->get('creditdays'),
                'creditlimit'=>request()->get('creditlimit'),
                'suplierdiscount'=>request()->get('supplierdiscount'),
                'suplieradvance'=>request()->get('supplieradvance'),
                'suplierlocality'=>request()->get('supplierlocality'),
                'shipier_addres'=>request()->get('shippingaddress'),
                // 'shiping_city'=>request()->get('shippngcity'),
                // 'shippingprovince'=>request()->get('shippingprovince'),
                // 'shippingcountry'=>request()->get('shippingcountry'),
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
                // for forign key use here
                'bank_id'=>request()->get('bankdata'),
                'suplierCatg_id'=>request()->get('suplierCatg_id'),
                'stype_id'=>request()->get('stype_id'),
                'province_id'=>request()->get('province_id'),
                'country_id'=>request()->get('countryabove'),
                'City_id'=>request()->get('citydabove'),
            ]);
        }
        else{
        Supplier::create([
            'customer_code'=>request()->get('customcode'),
            'email'=>request()->get('email'),
            'companyname'=>request()->get('companyname'),
            'phone_no1'=>request()->get('phone1'),
            'phone_no2'=>request()->get('phone2'),
            'address'=>request()->get('adress'),
            // 'city'=>request()->get('city'),
            'cell_no'=>request()->get('cellno'),
            // 'province'=>request()->get('province'),
            'contactperson'=>request()->get('contactperson'),
            // 'zipcode'=>request()->get('postalcodeon'),
            'contactpersoncell_no'=>request()->get('pcellno'),
            'country'=>request()->get('country'),
            'contactperson_email'=>request()->get('contactemail'),
            // 'supliertype'=>request()->get('suppliertype'),
            // 'supliercategory'=>request()->get('suppliercategory'),
            'creditdays'=>request()->get('creditdays'),
            'creditlimit'=>request()->get('creditlimit'),
            'suplierdiscount'=>request()->get('supplierdiscount'),
            'suplieradvance'=>request()->get('supplieradvance'),
            'suplierlocality'=>request()->get('supplierlocality'),
            'shipier_addres'=>request()->get('shippingaddresson'),
            // 'shiping_city'=>request()->get('shippngcity'),
            // 'shippingprovince'=>request()->get('shippingprovince'),
            // 'shippingcountry'=>request()->get('shippingcountry'),
            'title'=>request()->get('title'),
            'zipcode' => request()->get('postalcodeon'),
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
            // for forign key use here
            'bank_id'=>request()->get('bankdata'),
            'suplierCatg_id'=>request()->get('suppliercategory'),
            'supliertype_id'=>request()->get('suppliertype'),
            'province_id'=>request()->get('shippingprovinceon'),
            'country_id'=>request()->get('shippingcountryon'),
            'City_id'=>request()->get('shippngcityon'),
        ]);
    }
        return redirect()->route('supplier.index')->with('success','Create successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $suplier_id
     * @return \Illuminate\Http\Response
     */
    public function show($suplier_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $suplier_id
     * @return \Illuminate\Http\Response
     */
    public function edit($suplier_id)
    {
        $getMaxid = Supplier::find($suplier_id);
        $bank = Bank::all();
        $scategory = SupplierCategory::all();
        $stype = Suppliertype::all();
        $province = Province::all();
        $country = Country::all();
        $city = City::all();
        return view('SupplierSetup.supplier.update',compact('province','country','city','stype','scategory','bank','getMaxid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $suplier_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $suplier_id)
    {
        $supplier = Supplier::findOrFail($suplier_id);
        $supplier->update([]);
        if(request()->get('companyshipadres') ==  "above"){

            $supplier->update([
                'customer_code'=>request()->get('customcode'),
                'email'=>request()->get('email'),
                'companyname'=>request()->get('companyname'),
                'phone_no1'=>request()->get('phone1'),
                'phone_no2'=>request()->get('phone2'),
                'address'=>request()->get('adressabove'),
                // 'city'=>request()->get('city'),
                'cell_no'=>request()->get('cellno'),
                // 'province'=>request()->get('province'),
                'contactperson'=>request()->get('contactperson'),
                'zipcode'=>request()->get('zipcodeabove'),
                'contactpersoncell_no'=>request()->get('pcellno'),
                // 'country'=>request()->get('country'),
                'contactperson_email'=>request()->get('contactemail'),
                'creditdays'=>request()->get('creditdays'),
                'creditlimit'=>request()->get('creditlimit'),
                'suplierdiscount'=>request()->get('supplierdiscount'),
                'suplieradvance'=>request()->get('supplieradvance'),
                'suplierlocality'=>request()->get('supplierlocality'),
                'shipier_addres'=>request()->get('shippingaddress'),
                // 'shiping_city'=>request()->get('shippngcity'),
                // 'shippingprovince'=>request()->get('shippingprovince'),
                // 'shippingcountry'=>request()->get('shippingcountry'),
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
                // for forign key use here
                'bank_id'=>request()->get('bankdata'),
                'suplierCatg_id'=>request()->get('suplierCatg_id'),
                'stype_id'=>request()->get('stype_id'),
                'province_id'=>request()->get('province_id'),
                'country_id'=>request()->get('countryabove'),
                'City_id'=>request()->get('citydabove'),
            ]);
        }
        else{
        $supplier->update([
            'customer_code'=>request()->get('customcode'),
            'email'=>request()->get('email'),
            'companyname'=>request()->get('companyname'),
            'phone_no1'=>request()->get('phone1'),
            'phone_no2'=>request()->get('phone2'),
            'address'=>request()->get('adress'),
            // 'city'=>request()->get('city'),
            'cell_no'=>request()->get('cellno'),
            // 'province'=>request()->get('province'),
            'contactperson'=>request()->get('contactperson'),
            // 'zipcode'=>request()->get('postalcodeon'),
            'contactpersoncell_no'=>request()->get('pcellno'),
            'country'=>request()->get('country'),
            'contactperson_email'=>request()->get('contactemail'),
            // 'supliertype'=>request()->get('suppliertype'),
            // 'supliercategory'=>request()->get('suppliercategory'),
            'creditdays'=>request()->get('creditdays'),
            'creditlimit'=>request()->get('creditlimit'),
            'suplierdiscount'=>request()->get('supplierdiscount'),
            'suplieradvance'=>request()->get('supplieradvance'),
            'suplierlocality'=>request()->get('supplierlocality'),
            'shipier_addres'=>request()->get('shippingaddresson'),
            // 'shiping_city'=>request()->get('shippngcity'),
            // 'shippingprovince'=>request()->get('shippingprovince'),
            // 'shippingcountry'=>request()->get('shippingcountry'),
            'title'=>request()->get('title'),
            'zipcode' => request()->get('postalcodeon'),
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
            // for forign key use here
            'bank_id'=>request()->get('bankdata'),
            'suplierCatg_id'=>request()->get('suplierCatg_id'),
            'supliertype_id'=>request()->get('suppliertype'),
            'province_id'=>request()->get('shippingprovinceon'),
            'country_id'=>request()->get('shippingcountryon'),
            'City_id'=>request()->get('shippngcityon'),
        ]);
    }
    return redirect()->route('supplier.index')->with('success','Create successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $suplier_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($suplier_id)
    {
        //
    }
}
