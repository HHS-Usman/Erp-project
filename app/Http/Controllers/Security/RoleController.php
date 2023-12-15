<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_role;
use App\Models\Permissions;
use App\Models\Module;
use App\Models\Page;
use App\Models\PageAction;
use App\Models\role_access;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        return view('security.User.Role.IndexRole');

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
         $permissions = Permissions::with('module', 'page')->get(); // Permission::join('modules', 'permissions.module_id', '=', 'modules.id')
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
        

        // Example: Storing module data
        $moduleNames = $request->input('module_id', []);
        $pageIds = $request->input('page_id', []);

        // Assuming 'role_access' is the model name
        foreach ($pageIds as $pageId) {
            // Perform your logic to store page data here

            // Check if $moduleNames is an array and get the first element
            $moduleName = is_array($moduleNames) ? reset($moduleNames) : $moduleNames;

            role_access::create([
                'page_id' => $pageId,
                'role_id' => $request->get('role_id'),
                'module_id' => $moduleName,
                // Add other fields as needed
            ]);
        }    
        return redirect()->route('role.create')->with('success','Manage successfully');
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
        return view('security.User.Role.EditRole');
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
        //
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
