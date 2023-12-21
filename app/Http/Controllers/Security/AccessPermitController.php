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
        $records = $request->input('record', []);

    foreach ($record as $record) {
        AccessPermit::create([
            'emp_id' => $record['emp_id'] ?? null,
            'login_id' => $record['login_id'] ?? null,
            'access' => $record['access'] ?? null,
            'password' => $record['password'] ?? null,
            'report_access' => $record['report_access'] ?? null,
            'back_date_entry' => $record['back_date_entry'] ?? null,
            'post_date_entry' => $record['post_date_entry'] ?? null,
            'role_id' => $record['role_id'] ?? null,
            'module_id' => $record['module_id'] ?? null,
            'page_id' => $record['page_id'] ?? null,
            // Add other fields as needed
        ]);
    }
    
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
