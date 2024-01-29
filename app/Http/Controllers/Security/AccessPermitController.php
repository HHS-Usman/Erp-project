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
use Spatie\Permission\Models\Permission;
use DB;
use Hash;
use Illuminate\Support\Arr;

class AccessPermitController extends Controller
{

    public function index(Request $request)
    {
        $data = User::orderBy('id','DESC')->paginate(5);
        return view('security.permit.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::all();
        $employes = Employee::all();
        $modules = Module::all();
        $pages = Page::all();
        $companies = Company::all();
        $permissions = Permissions::with('module', 'page', 'pageaction')->get();
        $role_access = role_access::all();
        $branches = Branch::with('company')->get();
        return view('security.permit.create' ,compact( 'permissions', 'employes' , 'modules', 'pages', 'roles', 'companies', 'branches', 'role_access' ));
    }
    public function store(Request $request)
{
    $this->validate($request, [
        'name' => 'required|unique:users,name',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
        'permissions' => 'required|array', // Add this line for permissions
    ]);

    // Create the user
    $input = $request->all();
    $input['password'] = Hash::make($input['password']);

    $user = User::create($input);

    // Assign roles to the user


    // Assign permissions to the user
    if ($request->has('permissions')) {
        $user->givePermissionTo($request->input('permissions'));
    }

    return redirect()->route('accesspermit.index')
                    ->with('success', 'User created successfully');
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
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        $employes = Employee::all();
        $modules = Module::all();
        $pages = Page::all();
        $companies = Company::all();

        $role_access = role_access::all();
        $branches = Branch::with('company')->get();
        return view('security.permit.update',compact('user','roles','userRole','employes' , 'modules', 'pages', 'companies', 'branches', 'role_access',));
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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6', // Adjust the minimum length as needed
            'roles' => 'required|array',

        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::findOrFail($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();



        return redirect()->route('accesspermit.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('accesspermit.index')->with('success','User deleted successfully');
    }
    // public function getPermissionId($roleId)
    //     {

    //         $role = Role::find($roleId);

    //         if ($role) {
    //             $permissions = $role->permissions;

    //             // Extract the relevant information (ID and name) from each permission
    //             $formattedPermissions = $permissions->map(function ($permission) {
    //                 return [
    //                     'id'   => $permission->id,
    //                     'name' => $permission->name,
    //                 ];
    //             });

    //             return response()->json(['permissions' => $formattedPermissions]);
    //         } else {
    //             return response()->json(['error' => 'Role not found for ID: ' . $roleId], 404);
    //         }
    //     }
    public function getPermissionId($roleId)
        {
            $role = Role::find($roleId);

            if ($role) {
                $permissions = $role->permissions;

                // Extract the relevant information (ID and name) from each permission
                $formattedPermissions = $permissions->map(function ($permission) use ($role) {
                    $module = $permission->module;
                    return [
                        'role_id' => $role->id, // Include role_id in the response
                        'role_name' => $role->name, // Include role_name in the response
                        'permission_id'   => $permission->id,
                        'name' => $permission->name,
                        'module_id'     => optional($module)->id,    // Include module_id, handle the case where module is not set
                        'module_name'   => optional($module)->name,  // Include module_name, handle the case where module is not set
                    ];
                });

                return response()->json(['permissions' => $formattedPermissions]);
            } else {
                return response()->json(['error' => 'Role not found for ID: ' . $roleId], 404);
            }
        }
    }
