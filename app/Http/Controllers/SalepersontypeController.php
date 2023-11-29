<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Salespersontype;
use Illuminate\Http\Request;
use Validator;

class SalepersontypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persontypes=Salespersontype::latest()->paginate();
        return view('salesperson.salespersontype.index',compact('persontypes'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salesperson.salespersontype.create');
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
            'persontype' => 'required',
            'is_active' => 'integer|in:0,1',
        ]);
        //create a new product in database
        Salespersontype::create([
            'persontype' => request()->get('persontype'),
            'persontype_code' => request()->get('persontype_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('salepersontype.index')->with('success','Manage successfully');
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
    public function edit(Salespersontype $persontype)
    {
        return view('salesperson.salespersontype.update',compact('persontype'));
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
        $persontype = Salespersontype::findOrFail($id);
        $persontype->update([
            'persontype'=>$request->input('persontype'),
            'persontype_code'=>$request->input('persontype_code'),
            'detail'=>$request->input('detail'),
            'is_active'=>$request->has('is_active') ? 1 : 0, 
        ]);
         return redirect()->route('salespersontype.index')->with('success','Updated Sales Person  successfully');
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
