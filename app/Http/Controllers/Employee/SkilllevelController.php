<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Skilllevel;
use Illuminate\Http\Request;

class SkilllevelController extends Controller
{
    public function index()
    {
        $skilllevels = Skilllevel::latest()->paginate();
        return view('employee.skilllevel.index',compact('skilllevels'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.skilllevel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // validate the input
         $request->validate([
            'skilllevel'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Skilllevel::create([
            'skilllevel' => request()->get('skilllevel'),
            'skilllevel_code' => request()->get('skilllevel_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('skilllevel.index')->with('success','Record Created successfully ');
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
        $skilllevel = Skilllevel::find($id);
        return view('employee.skilllevel.update',compact('skilllevel'));
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
        $skilllevel = Skilllevel::findorfail($id);
        $skilllevel ->update([
            'skilllevel'=>$request->input('skilllevel'),
            'skilllevel_code'=>$request->input('skilllevel_code'),
            'detail'=>$request->input('detail'),
            'is_active'=>$request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('skilllevel.index')->with('success','Skill Level Updated successfully ');

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
