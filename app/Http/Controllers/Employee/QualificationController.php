<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Qualification;
use App\Models\Qualificationlevel;
use Illuminate\Http\Request;

class QualificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qualifications = Qualification::latest()->paginate();
        return view('employee.qualification.index',compact('qualifications'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.qualification.create');
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
            'qualification'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Qualification::create([
            'qualification' => request()->get('qualification'),
            'qualification_code' => request()->get('qualification_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('qualification.index')->with('success','Record Created successfully  successfully ');
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
        $qualification = Qualification::find($id);
        return view('employee.qualification.update',compact('qualification'));
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
        $qualification = Qualification::findorfail($id);
        $qualification ->update([
           'qualification'=>$request->input('qualification'),
           'qualification_code'=>$request->input('qualification_code'),
           'detail'=>$request->input('detail'),
           'is_active'=>$request->has('is_active') ? 1 : 0,
       ]);
        return redirect()->route('qualification.index')->with('success','Qualification Updated  successfully ');
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
