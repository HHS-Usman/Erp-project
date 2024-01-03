<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
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
                $supplier = new Supplier();
                $supplier->customer_code= $value['customer_code'];
                $supplier->email = $value['email'];
                $supplier->phone_no1 = $value['phone_no1'];
                $supplier->phone_no2 = $value['phone_no2'];
                $supplier->address = $value['address'];
                $supplier->cell_no = $value['cell_no'];
                $supplier->contactperson = $value['contactperson'];
                $supplier->zipcode = $value['zipcode'];
                $supplier->contactpersoncell_no = $value['contactpersoncell_no'];
                $supplier->contactperson_email = $value['contactperson_email'];
                $supplier->creditdays = $value['creditdays'];
                $supplier->suplierdiscount	 = $value['suplierdiscount'];
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
                $supplier->bank_id = $value['bank_id'];
                $supplier->suplierCatg_id = $value['suplierCatg_id'];
                $supplier->supliertype_id = $value['supliertype_id'];
                $supplier->province_id = $value['province_id'];
                $supplier->country_id = $value['country_id'];
                $supplier->City_id = $value['City_id'];
                $supplier->created_at = $value['created_at'];
                $supplier->updated_at = $value['updated_at'];
            }
            $supplier->save();

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
