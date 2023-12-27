<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock_Type;
class StockTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocktypes =Stock_Type::latest()->paginate();
        return view('stocksetup.stocktype.index',compact('stocktypes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocksetup.stocktype.create');
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
            'stock_type'=>'required',
            'is_active' => 'integer|in:0,1'

        ]);
         //create a new stock in database
         Stock_Type::create([ 
            'stock_type' => request()->get('stock_type'),
            'stock_type_code' => request()->get('stock_type_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
            ]);
            return redirect()->route('stocktype.index')->with('success','Manage successfully');
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
        $stock_type = Stock_Type::find($id);
        return vieW('stocksetup.stocktype.edit');
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
        $stock_type = Stock_Type::findOrFail($id);
         //create a new stock in database
        $stock_type->update([ 
            'stock_type' => request()->get('stock_type'),
            'stock_type_code' => request()->get('stock_type_code'),
            'detail' => request()->get('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
            ]);
        return redirect()->route('stock_type.index')->with('success','Manage successfully');    
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
