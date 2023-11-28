<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {  
        $departments = Department::latest()->paginate();
        return view('organizationsetup.department.index',compact('departments'))->with(request()->input('page'));
    }
    public function create()
    {
        return view('organizationsetup.department.create');
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
            'department'=>'required',
            'is_active' => 'integer|in:0,1'
            
        ]);
        //create a new product in database
        Department::create([
            'department' => request()->get('department'),
            'department_code' => request()->get('department_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('department.index')->with('success','department made  successfully ');
    }

    /**
     * Display the specified resource.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('organizationsetup.department.update',compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->update([
            'department' => $request->input('department'),
            'department_code'      => $request->input('department_code'),
            'detail'        => $request->input('detail'),
            'is_active'     => $request->has('is_active') ? 1 : 0, 
        ]);
        $department->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('department.index')->with('success','department update successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
