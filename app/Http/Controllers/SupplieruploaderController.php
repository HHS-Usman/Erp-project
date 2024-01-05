<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use App\Models\Supplier;
use App\Models\SupplierCategory;
use App\Models\Suppliertype;
use Illuminate\Http\Request;
use League\Csv\Reader;

class SupplieruploaderController extends Controller
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
        return view('SupplierSetup.uploadsupplier.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->key == 'Supplier') {
            $file = $request->file('file');
            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            if ($request->has('Overwrite')) {
                Supplier::truncate();
            }
            foreach ($data as $value) {
                // for country data
                $countrydata = Country::firstOrCreate(['country' => $value['country_id']]);
                $countryid = $countrydata->id;
                // for province data
                $provincedata = Province::firstOrCreate(['province' => $value['province_id']]);
                $provinceid = $provincedata->province_id;
                // for  data city
                $citydata = City::firstOrCreate(['city' => $value['City_id']]);
                $cityid =  $citydata->id;
                // for  data bank
                $bankdata = Bank::firstOrCreate(['Bank' => $value['bank_id']]);
                $bankid =  $bankdata->bank_id;
                // for  data supplier category
                $suppliercategorydata = SupplierCategory::firstOrCreate(['suplliercategoty' => $value['suplierCatg_id']]);
                $supliercatgoryid =   $suppliercategorydata->supliercatg_id;
                // for  data supplier type
                $suppliertypedata = Suppliertype::firstOrCreate(['suppliertype' => $value['supliertype_id']]);
                $supliertypeid = $suppliertypedata->stype_id;

                $supplier = new Supplier();
                $supplier->customer_code = $value['customer_code'];
                $supplier->email = $value['email'];
                $supplier->companyname = $value['companyname'];
                $supplier->phone_no1 = $value['phone_no1'];
                $supplier->phone_no2 = $value['phone_no2'];
                $supplier->address = $value['address'];
                $supplier->cell_no = $value['cell_no'];
                $supplier->contactperson = $value['contactperson'];
                $supplier->zipcode = $value['zipcode'];
                $supplier->contactpersoncell_no = $value['contactpersoncell_no'];
                $supplier->contactperson_email = $value['contactperson_email'];
                $supplier->creditdays = $value['creditdays'];
                $supplier->suplierdiscount     = $value['suplierdiscount'];
                $supplier->creditlimit = $value['creditlimit'];
                $supplier->suplieradvance = $value['suplieradvance'];
                $supplier->suplierlocality = $value['suplierlocality'];
                $supplier->shipier_addres = $value['shipier_addres'];
                $supplier->shiping_city = $value['shiping_city'];
                $supplier->title = $value['title'];
                $supplier->contactpersonemail = $value['contactpersonemail'];
                $supplier->dispnote_invoice = $value['dispnote_invoice'];
                $supplier->st_registration_no = $value['st_registration_no'];
                $supplier->st_invoicenote = $value['st_invoicenote'];
                $supplier->withouttax_perc_age = $value['withouttax_perc_age'];
                $supplier->account_title = $value['account_title'];
                $supplier->accountno = $value['accountno'];
                $supplier->branchcode = $value['branchcode'];
                $supplier->branchname = $value['branchname'];
                $supplier->openingbalance = $value['openingbalance'];
                $supplier->dateopening = $value['dateopening'];
                $supplier->bank_id = $bankid;
                $supplier->suplierCatg_id = $supliercatgoryid;
                $supplier->supliertype_id = $supliertypeid;
                $supplier->province_id = $provinceid;
                $supplier->country_id =  $countryid;
                $supplier->City_id = $cityid;
                $supplier->save();
            }
            return redirect()->back()->with('success', 'File uploaded successfully.');
            return redirect()->route('supplierupload.create')->with('success', 'Create successfully');
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
