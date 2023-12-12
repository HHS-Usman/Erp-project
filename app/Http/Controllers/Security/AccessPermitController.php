<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Give_Permit;
use App\Models\Page;
use App\Models\Module;
use App\Models\User_role;

class AccessPermitController extends Controller
{
    public function index()
    {
        
    }

    public function create()
    {
        $roles = User_role::all();
        $employes = Employee::all();
        $modules = Module::all();
        $pages = Page::all();
        return view('security.permit.create' ,compact('employes' , 'modules', 'pages', 'roles' ));
    }
    public function store(Request $request)
    {
        $request->validate([
            'employee_name'=>'required',
            'role' => 'required'
        ]);
        //create a new product in database
        Give_Permit::create([
            'employee_name' => request()->get('employee_name'),
            'role' => request()->get('role'),
            'company_name' => request()->get('company_name'),
            'access' => request()->get('access'),
            'module' => request()->get('module'),
            'page' => request()->get('page'),
            'password' => request()->get('password'),
            'report_access' => request()->get('report_access'),
            'back_date_entry' => request()->get('back_date_entry'),
            'post_date_entry' => request()->get('post_date_entry'),
        ]);

        //redirect the user and send friendly message
        return redirect()->route('permit.create')->with('success','Manage successfully');
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
    public function edit(User_role $userrole)
    {
       
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
