<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Workflow;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class WorkflowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workflows = Workflow::latest()->paginate();
        return view('generalsetup.Workflowgroup.index',compact('workflows'))->with(request()->Input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generalsetup.Workflowgroup.create');
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
            'workflow'=>'required',
            'is_active' => 'integer|in:0,1'
        ]);
        //create a new product in database
        Workflow::create([
            'workflow' => request()->get('workflow'),
            'workflow_code' => request()->get('workflow_code'),
            'detail' => request()->get('detail'),
            'is_active' => request()->get('is_active', 0),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('workflowgroup.index')->with('success','Employee Created  successfully ');
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
    public function edit(Workflow $workflowgroup)
    {
        return view('generalsetup.Workflowgroup.update',compact('workflowgroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Workflow $workflowgroup)
    {
        // validate the input
        $request->validate([
            'workflow'=>'required',
            'workflow_code' => 'nullable',
            'detail' => 'nullable',
            'is_active' => 'integer|in:0,1'
        ]);
        $workflowgroup->update($request->all());
        //redirect the user and send friendly message
        return redirect()->route('workflowgroup.index')->with('success','Workflow Group  successfully ');
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
