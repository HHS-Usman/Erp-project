<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employeerule;
use Illuminate\Http\Request;

class EmployeeruleController extends Controller
{
    public function index()
    {
        $employeerules = Employeerule::latest()->paginate();
        return view('employee.employeerule.index', compact('employeerules'))->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.employeerule.create');
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
            'employeerule' => 'required',
            'is_active' => 'integer|in:0,1'

        ]);
        //create a new product in database
        Employeerule::create([
            'employeerule' => request()->get('employeerule'),
            'employeerule_code' => request()->get('employeerule_code'),
            'detail' => request()->get('detail',),
            'is_active' => request()->get('is_active', 0),
        ]);
        //redirect the user and send friendly message
        return redirect()->route('employeerule.index')->with('success', 'Record Created successfully ');
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
        $employeerule = Employeerule::find($id);
        return view('employee.employeerule.update', compact('employeerule'));
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
        $employeerule = Employeerule::find($id);
        // Update fields based on $request data
        $employeerule->update($request->all());
        return redirect()->route('employeerule.index')->with('success', 'Employeerule updated successfully');
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
