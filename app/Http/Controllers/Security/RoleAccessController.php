<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Give_Permit;
use App\Models\Page;
use App\Models\Module;
use App\Models\User_role;

class RoleAccessController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        $employes = Employee::all();
        $modules = Module::all();
        $pages = Page::all();
        $roles = User_role::all();
        return view('security.rollaccess.create' ,compact('employes' , 'modules', 'pages', 'roles' ));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $this->validate($request, [
            'permissions' => 'required|array',
            'permissions.*' => 'exists:your_permission_table,id',
            // Add other validation rules for other fields if needed
        ]);

        // Assuming you want to store the permissions related to a specific user or model
        $model = YourModel::find($request->your_model_id);

        // Attach the selected permissions to the model
        $model->permissions()->sync($request->input('permissions'));

        // You can redirect back with a success message or to any other route
        return redirect()->back()->with('success', 'Permissions have been saved successfully.');
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
