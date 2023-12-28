<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Packing_Type;
class PackingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packingtypes =Packing_Type::latest()->paginate();
        return vieW('productsetup.packingtype.index',compact('packingtypes'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return vieW('productsetup.packingtype.create');

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
            'packing_type'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
         //create a new product in database
         Packing_Type::create([ 
            'packing_type' => request()->get('packing_type'),
            'packing_type_code' => request()->get('packing_type_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
            ]);
            return redirect()->route('packingtype.index')->with('success','Manage successfully');
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
        $packingtype = Packing_Type::find($id);
        return vieW('productsetup.packingtype.update',compact('packingtype'));
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
        $Packing_Type = Packing_Type::findOrFail($id);
        $Packing_Type->update([ 
            'packing_type' => request()->get('packing_type'),
            'packing_type_code' => request()->get('packing_type_code'),
            'detail' => request()->get('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
            ]);        
        return redirect()->route('packingtype.index')->with('success','Manage successfully');    
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
