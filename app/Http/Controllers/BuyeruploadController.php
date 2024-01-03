<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\Buyer;
use App\Models\BuyerCategory;
use App\Models\Buyertype;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Http\Request;
use League\Csv\Reader;

class BuyeruploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyersetup.Buyerupload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->key == 'Buyer') {
            // $request->validate([
            //    'file' => 'required|mimes:csv,xlsx',
            //    'key' => 'required|in:Supplier',
            // ]);
            $file = $request->file('file');
            // $extension = $file->getClientOriginalExtension();
            // $valuegetting = $request->input('filedatainfor');

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            if ($request->has('Overwrite')) {
                Buyer::truncate();
            }
            // Add new data to the existing data in the table
            // if($value['Active '] > 1 && $value['Active '] < 0){
            //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            // }
            $getbank = Bank::all();
            $buyertype = Buyertype::all();
            $buyecategory = BuyerCategory::all();
            $privince = Province::all();
            $city = City::all();
            $country = Country::all();
            foreach ($data as $value) {
                $bankdata = null;
                $btypeid = null;
                $btcategoryid = null;
                $provincedata = null;
                $cityid =null;
                $countryid = null;
                // for bankdata get here
                foreach ($getbank as $bank) {
                    if (strtolower($value['bank_id']) == strtolower($bank->Bank)){
                        $bankdata = $bank->bank_id;
                        break;
                    } 
                }
                // for buyertypedata get here
                foreach ($buyertype as $btye) {
                    if ($value['btype_id'] == $btye->buyertype) {
                        $btypeid = $btye->btype_id;
                        break;
                    } 
                }
                // for buyer category data get here
                foreach ($buyecategory as $bcategory) {
                    if ($value['bcategory_id'] == $bcategory->buyercategory) {
                        $btcategoryid = $bcategory->bcategory_id;
                        break;
                    }
                }
                // for Province data get here
                foreach ($privince as $province) {
                    if ($value['province_id'] == $province->province) {
                        $provincedata = $province->province_id;
                        break;
                    } 
                }
                // for City data get here
                foreach ($city as $citys) {
                    if ($value['City_id'] == $citys->city) {
                        $cityid = $citys->id;
                        break;
                    };
                }

                // for country data get here
                $countryid = null;  // Initialize to null in case no match is found
                foreach ($country as $countryItem) {
                    if (strtolower($value['country_id']) == strtolower($countryItem->country)) {
                        $countryid = $countryItem->id;
                        break; // Break out of the loop once a match is found
                    }
                }

                $buyer = new Buyer();
                $buyer->customer_code = $value['customer_code'];
                $buyer->email = $value['email'];
                $buyer->companyname = $value['companyname'];
                $buyer->phone_no1 = $value['phone_no1'];
                $buyer->phone_no2 = $value['phone_no2'];
                $buyer->address = $value['address'];
                $buyer->cell_no = $value['cell_no'];
                $buyer->contactperson = $value['contactperson'];
                $buyer->zipcode = $value['zipcode'];
                $buyer->contactpersoncell_no = $value['contactpersoncell_no'];
                $buyer->contactperson_email = $value['contactperson_email'];
                $buyer->creditdays = $value['creditdays'];
                $buyer->buyerdiscount = $value['buyerdiscount'];
                $buyer->creditlimit = $value['creditlimit'];
                $buyer->buyeradvance = $value['buyeradvance'];
                $buyer->suplierlocality = $value['suplierlocality'];
                $buyer->title = $value['title'];
                $buyer->contactpersonemail = $value['contactpersonemail'];
                $buyer->dispnote_invoice = $value['dispnote_invoice'];
                $buyer->st_registration_no = $value['st_registration_no'];
                $buyer->st_invoicenote = $value['st_invoicenote'];
                $buyer->withouttax_perc_age = $value['withouttax_perc_age'];
                $buyer->account_title = $value['account_title'];
                $buyer->accountno = $value['accountno'];
                $buyer->branchcode = $value['branchcode'];
                $buyer->branchname = $value['branchname'];
                $buyer->openingbalance = $value['openingbalance'];
                $buyer->dateopening = $value['dateopening'];
                //    forign key data
                $buyer->bank_id = $bankdata;
                $buyer->bcategory_id = $btcategoryid;
                $buyer->btype_id = $btypeid;
                $buyer->province_id = $provincedata;
                $buyer->country_id = $countryid;
                $buyer->City_id = $cityid;
                $buyer->save();
            }
            return redirect()->route('buyerupload.create')->with('success', 'Create successfully');
        }
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
