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
        $records = $request->input('records', []);

        foreach ($records as $record) {
        // Check if 'password' key exists in the current $record
        if (isset($record['password'])) {
            AccessPermit::create([
                'emp_id' => $record['emp_id'],
                'login_id' => $record['login_id'],
                'access' => $record['access'],
                'password' => $record['password'],
                'report_access' => $record['report_access'],
                'back_date_entry' => $record['back_date_entry'],
                'post_date_entry' => $record['post_date_entry'],
                'role_id' => $record['role_id'],
                'module_id' => $record['module_id'],
                'page_id' => $record['page_id'],
                // Add other columns as needed
            ]);
        } else {
            // Handle the case when 'password' key is not present in the current $record
            // Log an error, set a default value, or skip the record
            Log::error('Missing "password" key in record: ' . json_encode($record));
            // You can add additional logic based on your requirements
        }
        }

        return redirect()->back()->with('success', 'Multiple records inserted successfully');

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
