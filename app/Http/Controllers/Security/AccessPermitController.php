<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Give_Permit;
use App\Models\Page;
use App\Models\Module;
use App\Models\User_role;
use App\Models\Company;
use App\Models\Branch;
use App\Models\role_access;
use App\Models\Permissions;
use App\Models\AccessPermit;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Validator;

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
        $companies = Company::all();

        $role_access = role_access::all();
        $branches = Branch::with('company')->get();
        return view('security.permit.create' ,compact('employes' , 'modules', 'pages', 'roles', 'companies', 'branches', 'role_access' ));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        // $records = $request->input('record', []);


        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6', // Adjust the minimum length as needed
            'roles' => 'required|array',
            'role_name' => 'required|string',
            'permissions' => 'required|array',
        ]);

        // Create the user
        $input = $request->only(['name', 'email', 'password']);
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        // Create the role
        $role = Role::create(['name' => $request->role_name]);

        // Assign the role and permissions to the user
        $user->assignRole($request->roles);
        $role->givePermissionTo($request->permissions);



        return redirect()->route('accesspermit.create')->with('success', 'Permission created successfully.');
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
    public function fetchEmployeeData($role_id)
    {
        // $roleAccessRecords = role_access::where('role_id', $role_id)->get();

        // if ($roleAccessRecords->isNotEmpty()) {
        //     // Adjust the response format based on your needs
        //     return response()->json([
        //         'role_access_records' => $roleAccessRecords,
        //     ]);
        // } else {
        //     // Handle the case where no records were found for the specified role_id
        //     return response()->json([
        //         'error' => 'No role access records found for the specified role_id.',
        //     ], 404); // You can customize the HTTP status code accordingly
        // }
        $roleAccessRecords = role_access::with(['user_role', 'module', 'page',])->where('role_id', $role_id)->get();

        if ($roleAccessRecords->isNotEmpty()) {
            // Adjust the response format based on your needs
            return response()->json([
                'role_access_records' => $roleAccessRecords,
            ]);
        } else {
            // Handle the case where no records were found for the specified role_id
            return response()->json([
                'error' => 'No role access records found for the specified role_id.',
            ], 404);
        }
    }
}
