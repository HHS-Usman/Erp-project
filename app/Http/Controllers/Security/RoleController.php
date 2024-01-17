<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Permissions;
use App\Models\Module;
use App\Models\Page;
use App\Models\PageAction;
use App\Models\role_access;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::all();
        if ($request->ajax()):
            return view($this->page.'TableData',compact('roles'));
        endif;
        return view('security.User.Role.IndexRole',compact('roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = User_role::all();
        $modals = Module::with('permissions')->get();
        $pagers = Permissions::join('pages', 'permissions.page_id', '=', 'pages.id')
         ->select('permissions.*', 'pages.name as page_name')
         ->get();
        $pgactions = Permissions::join('page_actions', 'permissions.page_action_id', '=', 'page_actions.id')
        ->select('permissions.*', 'page_actions.Name as page_action_name')
        ->get();
        $modules = Module::all();
        $pages = Page::all();
        $pageactions = PageAction::all();
        $permissions = Permissions::with('module', 'page', 'pageaction')->get(); // Permission::join('modules', 'permissions.module_id', '=', 'modules.id')
        // ->select('permissions.*', 'modules.module_name as module_name')
        // ->get();


        return view('security.User.Role.Addrole', compact('permissions', 'pageactions',
         'modules', 'pages', 'pagers','pgactions', 'roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // $moduleNames = $request->input('module_id', []);
        // $pageIds = $request->input('page_id', []);

        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permissions);
        return response()->json(['success'=>'Role Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();

        return redirect()->route('role.index',compact('role','rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = User_role::all();
        $role = Role::findOrFail($id);
        $permissions = Permissions::with('module', 'page')->get();
        $modals = Module::with('permissions')->get();
        $pagers = Permissions::join('pages', 'permissions.page_id', '=', 'pages.id')
         ->select('permissions.*', 'pages.name as page_name')
         ->get();
        $pgactions = Permissions::join('page_actions', 'permissions.page_action_id', '=', 'page_actions.id')
        ->select('permissions.*', 'page_actions.Name as page_action_name')
        ->get();
        $modules = Module::all();
        $pages = Page::all();
        $pageactions = PageAction::all();
         $permissions = Permissions::with('module', 'page')->get();
        return  view('security.User.Role.EditRole', compact('roles','role','permissions','permissions', 'pageactions',
        'modules', 'pages', 'pagers','pgactions'));

        // $role = Role::find($id);
        // $permission = Permission::get();
        // $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
        //     ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //     ->all();

        // return view('general.roles.edit',compact('role','permission','rolePermissions'));
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
        $role = Role::findOrFail($id);
        $role->syncPermissions($request->permissions);
        $role = $role->update(['name' => $request->role_name]);


        // $this->validate($request, [
        //     'name' => 'required',
        //     'permission' => 'required',
        // ]);

        // $role = Role::find($id);
        // $role->name = $request->input('name');
        // $role->save();

        // $role->syncPermissions($request->input('permission'));

        return redirect()->route('role.index')
                        ->with('success','Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $role = role::where('id', $id)->update(['status'=> 0]);
        // return response()->json(['success'=>'Role Deleted Successfully']);
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index')
                        ->with('success','Role deleted successfully');
    }
}
