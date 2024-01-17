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
use Monolog\Handler\IFTTTHandler;

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
        $scity= "";
        $sprovince= "";
        $spcountry= "";
        $saddress = "";
        $szipcode = "";
        $selectdata = request()->get('companyshipadres');
        if($selectdata=="above"){
            $scity=request()->get('city_id');
            $sprovince=request()->get('province_id');
            $spcountry=request()->get('country_id');
            $saddress=request()->get('adressabove');
            $szipcode=request()->get('zipcodeabove');
        }
        elseif($selectdata=="other"){
            $scity=request()->get('shipping_city_id');
            $sprovince= request()->get('shipping_province_id');
            $spcountry= request()->get('shipping_country_id');
            $saddress = request()->get('shipping_addres');
            $szipcode = request()->get('zip_code_shpping');
        }
           Supplier::create([
                'customer_code'=>request()->get('customcode'),
                'email'=>request()->get('email'),
                'companyname'=>request()->get('companyname'),
                'phone_no1'=>request()->get('phone1'),
                'phone_no2'=>request()->get('phone2'),
                'address'=>request()->get('adressabove'),
                'cell_no'=>request()->get('cellno'),
                'contactperson'=>request()->get('contact_person'),
                'zipcode'=> request()->get('zipcodeabove'),
                'contactpersoncell_no'=>request()->get('cont_p_no'),
                'contactperson_email'=>request()->get('contactemail'),
                'creditdays'=>request()->get('creditdays'),
                'creditlimit'=>request()->get('creditlimit'),
                'suplierdiscount'=>request()->get('supplierdiscount'),
                'suplieradvance'=>request()->get('suplieradvance'),
                'suplierlocality'=>request()->get('supplierlocality'),
                'shipping_addres'=>$saddress,
                'shipping_zip_code'=>$szipcode,
                'title'=>request()->get('title'),
                'cont_person'=>request()->get('contact_person'),
                'cont_person_no'=>request()->get('cont_p_no'),
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
              
                //Start For above condition data forign key
                'city_id'=>request()->get('city_id'),
                'province_id'=>request()->get('province_id'),
                'country_id'=>request()->get('country_id'),
                // END
                 //start for other Condition supplier data forign key
                'shipping_city_id'=>$scity,
                'shipping_province_id'=> $sprovince,
                'shipping_country_id'=>$spcountry,
                // END
                'bank_id'=>request()->get('bankdata'),
                'supliercatg_id'=>request()->get('supliercatg_id'),
                'stype_id'=>request()->get('stype_id'),
               
               
            ]);

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
        $scity= "";
        $sprovince= "";
        $spcountry= "";
        $saddress = "";
        $szipcode = "";
        $selectdata = request()->get('companyshipadres');
        if($selectdata=="above"){
            $scity=request()->get('city_id');
            $sprovince=request()->get('province_id');
            $spcountry=request()->get('country_id');
            $saddress=request()->get('adressabove');
            $szipcode=request()->get('zipcodeabove');
        }
        elseif($selectdata=="other"){
            $scity=request()->get('shipping_city_id');
            $sprovince= request()->get('shipping_province_id');
            $spcountry= request()->get('shipping_country_id');
            $saddress = request()->get('shipping_addres');
            $szipcode = request()->get('zip_code_shpping');
        }
        $supplier->update([
            'customer_code'=>request()->get('customcode'),
            'email'=>request()->get('email'),
            'companyname'=>request()->get('companyname'),
            'phone_no1'=>request()->get('phone1'),
            'phone_no2'=>request()->get('phone2'),
            'address'=>request()->get('adressabove'),
            'cell_no'=>request()->get('cellno'),
            'contactperson'=>request()->get('contact_person'),
            'zipcode'=> request()->get('zipcodeabove'),
            'contactpersoncell_no'=>request()->get('cont_p_no'),
            'contactperson_email'=>request()->get('contactemail'),
            'creditdays'=>request()->get('creditdays'),
            'creditlimit'=>request()->get('creditlimit'),
            'suplierdiscount'=>request()->get('supplierdiscount'),
            'suplieradvance'=>request()->get('suplieradvance'),
            'suplierlocality'=>request()->get('supplierlocality'),
            'shipping_addres'=>$saddress,
            'shipping_zip_code'=>$szipcode,
            'title'=>request()->get('title'),
            'cont_person'=>request()->get('contact_person'),
            'cont_person_no'=>request()->get('cont_p_no'),
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
            //Start For above condition data forign key
            'city_id'=>request()->get('city_id'),
            'province_id'=>request()->get('province_id'),
            'country_id'=>request()->get('country_id'),
            // END
             //start for other Condition supplier data forign key
            'shipping_city_id'=>$scity,
            'shipping_province_id'=> $sprovince,
            'shipping_country_id'=>$spcountry,
            // END
            'bank_id'=>request()->get('bankdata'),
            'supliercatg_id'=>request()->get('supliercatg_id'),
            'stype_id'=>request()->get('stype_id'),
        ]);
    
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
