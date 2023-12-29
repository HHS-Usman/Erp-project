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
        return view('buyersetup.buyer.index',compact('buyer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maxID = Buyer::max('buyer_id')+1;
        $bank = Bank::all();
        $buyercetegory = BuyerCategory::all();
        $btype =Buyertype::all();
        $province = Province::all();
        $country = Country::all();
        $city = City::all();
        return view('buyersetup.buyer.create',compact('province','country','city','btype','buyercetegory','bank','maxID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $aboveaddress = request()->get('companyshipadres');
        // if($aboveaddress=="above"){
        //     Buyer::create([
        //         'customer_code'=>request()->get('customcode'),
        //         'email'=>request()->get('email'),
        //         'companyname'=>request()->get('companyname'),
        //         'phone_no1'=>request()->get('phoneone'),
        //         'phone_no2'=>request()->get('phonetwo'),
        //         'address'=>request()->get('adress'),
        //         'city'=>request()->get('city'),
        //         'cell_no'=>request()->get('cellno'),
        //         'province'=>request()->get('province'),
        //         'contactperson'=>request()->get('contactperson'),
        //         'zipcode'=>request()->get('zipcode'),
        //         'contactpersoncell_no'=>request()->get('pcellno'),
        //         'country'=>request()->get('country'),
        //         'contactperson_email'=>request()->get('contactemail'),
        //         'buyertype'=>request()->get('buyertype'),
        //         'buyercategory'=>request()->get('buyercategory'),
        //         'creditdays'=>request()->get('creditdays'),
        //         'creditlimit'=>request()->get('creditlimit'),
        //         'buyerdiscount'=>request()->get('buyerdiscount'),
        //         'buyeradvance'=>request()->get('buyeradvance'),
        //         'suplierlocality'=>request()->get('buyerlocality'),
        //         'shiping_addres'=>request()->get('shippingaddress'),
        //         'shiping_city'=>request()->get('shippngcity'),
        //         'shippingprovince'=>request()->get('shippingprovince'),
        //         'shippingcountry'=>request()->get('shippingcountry'),
        //         'title'=>request()->get('title'),
        //         'contactpersonemail'=>request()->get('contactpersonemail'),
        //         'dispnote_invoice'=>request()->get('dinvoice'),
        //         'st_registration_no'=>request()->get('registration_st'),
        //         'st_invoicenote'=>request()->get('invoinceterm'),
        //         'withouttax_perc_age'=>request()->get('Withholding'),
        //         'bankname'=>request()->get('bank'),
        //         'account_title'=>request()->get('accounttext'),
        //         'accountno'=>request()->get('accontno'),
        //         'branchcode'=>request()->get('branchcode'),
        //         'branchname'=>request()->get('bank'),
        //         'openingbalance'=>request()->get('openingbalance'),
        //         'dateopening'=>request()->get('openingdate'),
        //     ]);
        // }
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
        Buyer::create([
            'customer_code'=>request()->get(''),
            'email'=>request()->get('email'),
            'companyname'=>request()->get('companyname'),
            'phone_no1'=>request()->get('phoneone'),
            'phone_no2'=>request()->get('phonetwo'),
            'address'=>request()->get('adress'),
            'city'=>request()->get('city'),
            'cell_no'=>request()->get('cellno'),
            'province'=>request()->get('province'),
            'contactperson'=>request()->get('contactperson'),
            'zipcode'=>request()->get('zipcode'),
            'contactpersoncell_no'=>request()->get('pcellno'),
            'country'=>request()->get('country'),
            'contactperson_email'=>request()->get('contactemail'),
            'buyertype'=>request()->get('buyertype'),
            'buyercategory'=>request()->get('buyercategory'),
            'creditdays'=>request()->get('creditdays'),
            'creditlimit'=>request()->get('creditlimit'),
            'buyerdiscount'=>request()->get('buyerdiscount'),
            'buyeradvance'=>request()->get('buyeradvance'),
            'suplierlocality'=>request()->get('buyerlocality'),
            'shiping_addres'=>request()->get('shippingaddress'),
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
            'accountno'=>request()->get('accontno'),
            'branchcode'=>request()->get('branchcode'),
            'branchname'=>request()->get('branchname'),
            'openingbalance'=>request()->get('openingbalance'),
            'dateopening'=>request()->get('openingdate'),
        ]);
        // $buyer->payroll()->create($request->input('payroll'));
        // $buyer->companyInfo()->create($request->get('company_info'));

        return redirect()->route('buyer.index')->with('success','Create successfully');
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
