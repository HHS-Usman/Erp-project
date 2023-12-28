<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit_selection;
class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
       $uoms =Unit_Selection::latest()->paginate();
       return view('productsetup.uom.index',compact('uoms'));
       
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
       return view('productsetup.uom.create');
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
           'uom'=>'required',
           'is_active' => 'integer|in:0,1'

       ]);
        //create a new stock in database
        Unit_Selection::create([ 
           'uom' => request()->get('uom'),
           'uom_code' => request()->get('uom_code'),
           'detail' => request()->get('detail'),
           'is_active' => request()->get('is_active', 0),
           ]);
           return redirect()->route('uom.index')->with('success','Manage successfully');
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
       $uom = Unit_Selection::find($id);
       return view('productsetup.uom.update',compact('uom'));
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
       $uom = Unit_Selection::findOrFail($id);
        //create a new stock in database
       $uom->update([ 
           'uom' => request()->get('uom'),
           'uom_code' => request()->get('uom_code'),
           'detail' => request()->get('detail'),
           'is_active'     => $request->has('is_active') ? 1 : 0, 
           ]);
       return redirect()->route('uom.index')->with('success','Manage successfully');    
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