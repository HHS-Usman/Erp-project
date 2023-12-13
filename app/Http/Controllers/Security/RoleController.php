<?php

namespace App\Http\Controllers\Security;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User_role;
use App\Models\Permissions;
use App\Models\Module;
use App\Models\Page;
use App\Models\PageAction;

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
        //
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
