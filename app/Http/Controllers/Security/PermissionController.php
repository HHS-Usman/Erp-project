<?php

namespace App\Http\Controllers\Security;


use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use App\Models\Module;
use App\Models\Page;
use App\Models\PageAction;
use App\Models\Permissions;


class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permissions::with('module', 'page', 'pageaction')->orderBy('id','desc')->get();
        $modules = Module::all();
        $modals = Permission::join('page_actions', 'permissions.page_action_id', '=', 'page_actions.id')
        ->select('permissions.*', 'page_actions.Name as page_action_name')
        ->get();
        $pages = Page::all();
        $pageactions = PageAction::all();
        $pageacts = PageAction::with('permissions')->get();
        $pagers = Permission::join('pages', 'permissions.page_id', '=', 'pages.id')
        ->select('permissions.*', 'pages.name as page_name')
        ->get();
        $pgactions = Permission::join('page_actions', 'permissions.page_action_id', '=', 'page_actions.id')
        ->select('permissions.*', 'page_actions.Name as page_action_name')
        ->get();
        return view('pages.User.Permission.index', compact('permissions','modules','modals','pages','pagers','pageactions','pgactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            foreach ($request->name as $key => $name) {
                if (!empty($name)) {
                    $name = Str::replace(' ', '_', $name);
                    Permission::create(['name' => $name, 'module_id' => $request->module_id[$key],'page_id' => $request->page_id[$key],'page_action_id' => $request->page_action_id[$key]]);
                }
            }
            DB::commit();
            return redirect()->route('permission.index')->with('success', 'Your Permission Created Successfully');
        } catch (Exception $th) {
            DB::rollBack();
            return redirect()->route('permission.index')->with('success', 'Error');
        }
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
        //
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

