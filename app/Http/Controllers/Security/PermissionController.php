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
        $modals = Module::with('permissions')->get();
        $pagers = Permission::join('pages', 'permissions.page_id', '=', 'pages.id')
        ->select('permissions.*', 'pages.name as page_name')
        ->get();
        $pgactions = Permission::join('page_actions', 'permissions.page_action_id', '=', 'page_actions.id')
        ->select('permissions.*', 'page_actions.Name as page_action_name')
        ->get();
        $modules = Module::all();
        $pages = Page::all();
        $pageactions = PageAction::all();
        $permissions = Permissions::with('module', 'page', 'pageaction')->get(); // Permission::join('modules', 'permissions.module_id', '=', 'modules.id')
        //join('modules', 'permissions.module_id', '=', 'modules.id')
        // ->select('permissions.*', 'modules.module_name as module_name')
        // ->get();

       
        return view('security.User.Permission.index', compact('permissions', 'pageactions',
         'modules', 'pages', 'pagers','pgactions'));
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
    
                    $module_id = (int)$request->module_id[$key];  // Cast to integer
    
                    Permission::create([
                        'name' => $name,
                        'module_id' => $module_id,
                        'page_id' => $request->page_id[$key],
                        'page_action_id' => $request->page_action_id[$key]
                    ]);
                }
            }
    
            DB::commit();
            return redirect()->route('permission.index')->with('success', 'Permission created successfully.');
        } catch (Exception $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()]);
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

