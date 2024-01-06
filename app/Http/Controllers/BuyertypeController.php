<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Buyertype;
use Illuminate\Http\Request;

class BuyertypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyertype = Buyertype::all();
        return view('buyersetup.buyertype.index',compact('buyertype'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buyersetup.buyertype.create');
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
            'buyertype'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        Buyertype::create([
            'buyertype'=>request()->get('buyertype'),
            'buyertype_code'=>request()->get('buyertypecode'),
            'detail'=>request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);
        return redirect()->route('buyertype.index')->with('success','Create successfully');
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
    public function edit($btype_id)
    {
        $buyertype  = Buyertype::find($btype_id);
        return view('buyersetup.buyertype.update',compact('buyertype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $btype_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $btype_id)
    {
        $buyertype = Buyertype::findOrFail($btype_id);

        //create a new product in database
        $buyertype->update([
            'buyertype'=>request()->get('buyertype'),
            'buyertype_code'=>request()->get('buyertype_code'),
            'detail'=>request()->get('detail'),
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('buyertype.index')->with('success','Create successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $btype_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($btype_id)
    {
        //
    }
}
