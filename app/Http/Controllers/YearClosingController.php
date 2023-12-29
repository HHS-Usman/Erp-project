<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Coa;
use App\Models\YearClosing;
use Illuminate\Http\Request;

class YearClosingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fyear = YearClosing::with('coas')->get();
        return view('Accounts.yearclosing.index',compact('fyear'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fileaname = YearClosing::all();
        $coas = Coa::where('operational', 1)->get();
        return view('Accounts.yearclosing.create',compact('coas','fileaname'));
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
            'file' => 'required|mimes:jpeg,png,jpg,gif,txt,pdf,xlsx,csv|max:2048',
        ]);
    //   this is orginal name file store in database
         $fileName = time().'.'.$request->file->getClientOriginalName();
          // this is random encrypted form file name randome number or number and text
        // $fileName = time().'.'.$request->file->extension();
         YearClosing::create([
            'clsoingyear'=>request()->get('date'),
            'description'=>request()->get('description'),
            'file_name'=>$fileName,
            'coa_id'=>request()->get('chartofaccount'),

        ]);
        return redirect()->route('yearclosing.create')->with('success','Manage successfully');
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
