<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Accountcategory;
use App\Models\Bank;
use App\Models\Buyer;
use App\Models\BuyerCategory;
use App\Models\Buyertype;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use App\Models\SupplierCategory;
use App\Models\Suppliertype;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyer = Buyer::all();
        return view('buyersetup.buyer.index', compact('buyer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maxID = Buyer::max('buyer_id') + 1;
        $bank = Bank::all();
        $buyercetegory = BuyerCategory::all();
        $btype = Buyertype::all();
        $province = Province::all();
        $country = Country::all();
        $city = City::all();
        return view('buyersetup.buyer.create', compact('province', 'country', 'city', 'btype', 'buyercetegory', 'bank', 'maxID'));
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
            'buyertype' => 'nullable',
            'buyercategory' => 'nullable',
            'buyerdiscount' => 'nullable',
            'buyeradvance' => 'nullable',
            'buyerlocality' => 'nullable',
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
            $saddress=request()->get('adress');
            $szipcode=request()->get('zipcode');
        }
        elseif($selectdata=="other"){
            $scity=request()->get('shipping_city_id');
            $sprovince= request()->get('shipping_province_id');
            $spcountry= request()->get('shipping_country_id');
            $saddress = request()->get('shipping_addres');
            $szipcode = request()->get('zip_code_shpping');
        }
        Buyer::create([
            'customer_code' => request()->get('customcode'),
            'email' => request()->get('email'),
            'companyname' => request()->get('companyname'),
            'phone_no1' => request()->get('phoneone'),
            'phone_no2' => request()->get('phonetwo'),
            'address' => request()->get('adress'),
            'cell_no' => request()->get('cellno'),
            'contactperson' => request()->get('contactperson'),
            'zipcode' => request()->get('zipcode'),
            'contactpersoncell_no' => request()->get('pcellno'),
            'contactperson_email' => request()->get('contactemail'),
            'creditdays' => request()->get('creditdays'),
            'creditlimit' => request()->get('creditlimit'),
            'buyerdiscount' => request()->get('buyerdiscount'),
            'buyeradvance' => request()->get('buyeradvance'),
            'buyerlocality' => request()->get('buyerlocality'),
            'shipping_addres' => $saddress,
            'shipping_zip_code' => $szipcode,
            'title' => request()->get('title'),
            'cont_person' => request()->get('cont_person'),
            'cont_person_no' => request()->get('cont_person_no'),
            'contactpersonemail' => request()->get('contactpersonemail'),
            'dispnote_invoice' => request()->get('dinvoice'),
            'st_registration_no' => request()->get('registration_st'),
            'st_invoicenote' => request()->get('st_invoicenote'),
            'withouttax_perc_age' => request()->get('Withholding'),
            'bankname' => request()->get('bank'),
            'account_title' => request()->get('accounttext'),
            'accountno' => request()->get('accontno'),
            'branchcode' => request()->get('branchcode'),
            'branchname' => request()->get('branchname'),
            'openingbalance' => request()->get('openingbalance'),
            'dateopening' => request()->get('openingdate'),

            //Start For above condition data forign key
            'city_id' => request()->get('city_id'),
            'province_id' => request()->get('province_id'),
            'country_id' => request()->get('country_id'),
            // END
            //start for other Condition supplier data forign key
            'shipping_city_id' => $scity,
            'shipping_province_id' => $sprovince,
            'shipping_country_id' => $spcountry,
            // END
            'bank_id' => request()->get('bankvalue'),
            'bcategory_id' => request()->get('buyercategory'),
            'btype_id' => request()->get('buyertype'),
        ]);
        return redirect()->route('buyer.index')->with('success', 'Create successfully');
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
    public function edit($buyer_id)
    {
        $buyer = Buyer::findOrFail($buyer_id);
        $bank = Bank::all();
        $buyercetegory = BuyerCategory::all();
        $btype = Buyertype::all();
        $province = Province::all();
        $country = Country::all();
        $city = City::all();

        return view('buyersetup.buyer.edit', compact('province', 'country', 'city', 'btype', 'buyercetegory', 'bank', 'buyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $buyer_id)
    {
        $buyer = Buyer::find($buyer_id);
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
            $saddress=request()->get('adress');
            $szipcode=request()->get('zipcode');
        }
        elseif($selectdata=="other"){
            $scity=request()->get('shipping_city_id');
            $sprovince= request()->get('shipping_province_id');
            $spcountry= request()->get('shipping_country_id');
            $saddress = request()->get('shipping_addres');
            $szipcode = request()->get('zip_code_shpping');
        }
        $buyer->update([
            'customer_code' => request()->get('customcode'),
            'email' => request()->get('email'),
            'companyname' => request()->get('companyname'),
            'phone_no1' => request()->get('phoneone'),
            'phone_no2' => request()->get('phonetwo'),
            'address' => request()->get('adress'),
            'cell_no' => request()->get('cellno'),
            'contactperson' => request()->get('contactperson'),
            'zipcode' => request()->get('zipcode'),
            'contactpersoncell_no' => request()->get('pcellno'),
            'contactperson_email' => request()->get('contactemail'),
            'creditdays' => request()->get('creditdays'),
            'creditlimit' => request()->get('creditlimit'),
            'buyerdiscount' => request()->get('buyerdiscount'),
            'buyeradvance' => request()->get('buyeradvance'),
            'buyerlocality' => request()->get('buyerlocality'),
            'shipping_addres' => $saddress,
            'shipping_zip_code' => $szipcode,
            'title' => request()->get('title'),
            'cont_person' => request()->get('cont_person'),
            'cont_person_no' => request()->get('cont_person_no'),
            'contactpersonemail' => request()->get('contactpersonemail'),
            'dispnote_invoice' => request()->get('dinvoice'),
            'st_registration_no' => request()->get('registration_st'),
            'st_invoicenote' => request()->get('st_invoicenote'),
            'withouttax_perc_age' => request()->get('Withholding'),
            'bankname' => request()->get('bank'),
            'account_title' => request()->get('accounttext'),
            'accountno' => request()->get('accontno'),
            'branchcode' => request()->get('branchcode'),
            'branchname' => request()->get('branchname'),
            'openingbalance' => request()->get('openingbalance'),
            'dateopening' => request()->get('openingdate'),

            //Start For above condition data forign key
            'city_id' => request()->get('city_id'),
            'province_id' => request()->get('province_id'),
            'country_id' => request()->get('country_id'),
            // END
            //start for other Condition supplier data forign key
            'shipping_city_id' => $scity,
            'shipping_province_id' => $sprovince,
            'shipping_country_id' => $spcountry,
            // END
            'bank_id' => request()->get('bankvalue'),
            'bcategory_id' => request()->get('buyercategory'),
            'btype_id' => request()->get('buyertype'),
        ]);
        return redirect()->route('buyer.index')->with('success', 'Create successfully');
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
