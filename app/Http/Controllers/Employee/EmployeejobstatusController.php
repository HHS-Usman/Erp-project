<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employeejobstatus;
use Illuminate\Http\Request;

class EmployeejobstatusController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeejobs = Employeejobstatus::latest()->paginate();
        return view('employee.employeejobstatus.index',compact('employeejobs'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.employeejobstatus.create');
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
            'employeejobstatus'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Employeejobstatus::create([
            'employeejobstatus' => request()->get('employeejobstatus'),
            'employeejobstatus_code' => request()->get('employeejobstatus_code'),
            'detail' => request()->get('detail', ),
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('employeejobstatus.index')->with('success','Record Created successfully  successfully ');
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
        $employeejob = Employeejobstatus::find($id);
        return view('employee.employeejobstatus.update',compact('employeejob'));
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
         $employeejob = Employeejobstatus::findorfail($id);
         $employeejob ->update([
            'employeejobstatus'=>$request->input('employeejobstatus'),
            'employeejobstatus_code'=>$request->input('employeejobstatus_code'),
            'detail'=>$request->input('detail'),
            'is_active'=>$request->has('is_active') ? 1 : 0,
        ]);
        return redirect()->route('employeejobstatus.index')->with('success','Employee Job status Updated  successfully ');
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
