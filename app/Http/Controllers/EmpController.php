<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Nationality;
use App\Models\Citizenship;
use App\Models\Qualification;
use App\Models\Qualificationlevel;
use App\Models\Skill;
use App\Models\Skilllevel;
use App\Models\Area;
use App\Models\Designation;
use App\Models\Division;
use App\Models\Department;
use App\Models\Subdepartment;
use App\Models\Grade;
use App\Models\Group;
use App\Models\Fundtion;
use App\Models\Managementlevel;
use App\Models\Submanagementlevel;
use App\Models\Employeejobstatus;
use App\Models\Leavereason;
use App\Models\Branch;
use App\Models\Bank;
use App\Models\Overtime_type;
use App\Models\Additional_approval;
use App\Models\Approval_level;
use App\Models\Workflow;
use App\Models\Emp_Company_info;
use App\Models\Emp_document;
use App\Models\Emp_Payroll;

use App\Models\Costcenter;
use File;
use Illuminate\Support\Facades\DB;
class EmpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payrolls = Emp_Payroll::all();
        $documents = Emp_document::all();
        $companies = Emp_Company_info::all();
        $employes = Employee::latest()->paginate();
        return view('organizationsetup.employe.index',compact('employes', 'companies', 'documents', 'payrolls'))->with(request()->input('page'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $nationalities = Nationality::all();
        $citizenships = Citizenship::all();
        $qualifications = Qualification::all();
        $qualificationlevels = Qualificationlevel::all();
        $skills = Skill::all();
        $skilllevels = Skilllevel::all();
        $areas = Area::all();
        $designations = Designation::all();
        $branchs = Branch::all();
        $divisions = Division::all();
        $departments = Department::all();
        $subdepartments = Subdepartment::all();
        $grades = Grade::all();
        $groups = Group::all();
        $managementlevels = Managementlevel::all();
        $submanagementlevels = Submanagementlevel::all();
        $employeejobstatus = Employeejobstatus::all();
        $employee = Employee::all();
        $leavereasons = Leavereason::all();
        $costcenters = Costcenter::all();
        $banks = Bank::all();
        $overtimes = Overtime_type::all();
        $workflows = Workflow::all();
        $employes = new Employee();
        $add_approvals = Additional_approval::all();
        $approvals = Approval_level::all();
        $nextId = DB::table('employees')->max('id') + 1;
        return view('organizationsetup.employe.create',
        compact('countries','costcenters', 'employee', 'employes', 'leavereasons','employeejobstatus', 'states', 'cities', 'nationalities', 'citizenships', 'qualifications', 'qualificationlevels', 'skills', 'skilllevels', 
        'areas', 'designations', 'divisions', 'departments', 'subdepartments', 'grades', 'groups', 'managementlevels', 'submanagementlevels',
        'add_approvals','approvals','workflows','banks', 'branchs', 'nextId'));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the input
        $request->validate([
            'employee_code' => 'nullable',
            'employee_name'=>'required',
            'cnic'=>'required',
            'mobile_no'=>'required',
            'email'=>'required',
            'emp_status' => 'integer|in:0,1'
        ]);
        //create a new product in database
        $employes = Employee::create([
            'employee_code' => request()->get('employee_code'),
            'employee_name' => request()->get('employee_name'),
            'father_name' => request()->get('father_name'),
            'cnic' => request()->get('cnic'),
            'email' => request()->get('email'),
            'mobile_no' => request()->get('mobile_no'),
            'family_code' => request()->get('family_code'),
            'dob' => request()->get('dob'),
            'pob' => request()->get('pob'),
            'familycontact' => request()->get('familycontact'),
            'tele_no' => request()->get('tele_no'),
            'country' => request()->get('country'),
            'state' => request()->get('state'),
            'city' => request()->get('city'),
            'area' => request()->get('area'),
            'address' => request()->get('address'),
            'gender' => request()->get('gender'),
            'maritalstatus' => request()->get('maritalstatus'),
            'nationality' => request()->get('nationality'),
            'citizenship' => request()->get('citizenship'),
            'emergency_c_n' => request()->get('emergency_c_n'),
            'emergency_01' => request()->get('emergency_01'),
            'emergency_02' => request()->get('emergency_02'),
            'emergency_03' => request()->get('emergency_03'),
            'qualification' => request()->get('qualification'),
            'qualificationlevel' => request()->get('qualificationlevel'),
            'skill' => request()->get('skill'),
            'skilllevel' => request()->get('skilllevel'),
            'emp_status' => request()->get('is_active', 0),
        ]);
        $employes->payroll()->create($request->input('payroll'));
        $employes->companyInfo()->create($request->get('company_info'));

    // Handle document upload
        $request->validate([
            'document_name' => 'nullable',
            'document_type'=>'nullable',
            'document_expiredate'=>'nullable',
            'document_remark'=>'nullable',
            
        ]);
         $fileName = 'none';
         if ($request->hasFile('document')) {
             $file = $request->file('document');
             $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
             $file->move('./uploads/', $fileName);

             $employes->document()->create([
                 'document_name' => $request->get('document_name'),
                 'document_type' => $fileName,
                 'document_expiredate' => $request->get('document_expiredate'),
                 'document_remark' => $request->get('document_remark'),
             ]);
         }
        // $fileName = 'none';
    	// if (request()->hasFile('document')) 
    	// {
    	// 	$file = request()->file('document');
    	// 	$fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
    	// 	$file->move('./uploads/', $fileName);
    	// }
        
        // $employes = Emp_Document::Create([
        //     'document_name' => request()->get('document_name'),
        //     'document_type' => $fileName,
        //     'document_expiredate' => request()->get('document_expiredate'),
        //     'document_remark' => request()->get('document_remark'), 
        // ]);

    return redirect()->route('employees.index',compact('employes'))->with('success', 'Employee created successfully!');
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
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $nationalities = Nationality::all();
        $citizenships = Citizenship::all();
        $qualifications = Qualification::all();
        $qualificationlevels = Qualificationlevel::all();
        $skills = Skill::all();
        $skilllevels = Skilllevel::all();
        $areas = Area::all();
        $designations = Designation::all();
        $branchs = Branch::all();
        $divisions = Division::all();
        $departments = Department::all();
        $subdepartments = Subdepartment::all();
        $grades = Grade::all();
        $groups = Group::all();
        $managementlevels = Managementlevel::all();
        $submanagementlevels = Submanagementlevel::all();
        $employeejobstatus = Employeejobstatus::all();
        $employee = Employee::all();
        $leavereasons = Leavereason::all();
        $costcenters = Costcenter::all();
        $banks = Bank::all();
        $overtimes = Overtime_type::all();
        $workflows = Workflow::all();
        $employes = new Employee();
        $add_approvals = Additional_approval::all();
        $approvals = Approval_level::all();
        $nextId = DB::table('employees')->max('id') + 1;
        $employed = Employee::with('payroll', 'companyInfo', 'document')->find($id);
        return view('organizationsetup.employe.edit',
        compact('countries','costcenters', 'employee', 'employed', 'employes', 'leavereasons','employeejobstatus', 'states', 'cities', 'nationalities', 'citizenships', 'qualifications', 'qualificationlevels', 'skills', 'skilllevels', 
        'areas', 'designations', 'divisions', 'departments', 'subdepartments', 'grades', 'groups', 'managementlevels', 'submanagementlevels',
        'add_approvals','approvals','workflows','banks', 'branchs', 'nextId'));
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
        // Validate and update data in the employees, payrolls, company_infos, and documents tables
        $request->validate([
            'employee_code' => 'nullable',
            'employee_name'=>'required',
            'cnic'=>'required',
            'mobile_no'=>'required',
            'email'=>'required',
            'emp_status' => 'integer|in:0,1'
        ]);
        $employed = Employee::find($id);
        $employed->update([
            'employee_code' => request()->get('employee_code'),
            'employee_name' => request()->get('employee_name'),
            'father_name' => request()->get('father_name'),
            'cnic' => request()->get('cnic'),
            'mobile_no' => request()->get('mobile_no'),
            'family_code' => request()->get('family_code'),
            'dob' => request()->get('dob'),
            'pob' => request()->get('pob'),
            'familycontact' => request()->get('familycontact'),
            'tele_no' => request()->get('tele_no'),
            'country' => request()->get('country'),
            'state' => request()->get('state'),
            'city' => request()->get('city'),
            'area' => request()->get('area'),
            'address' => request()->get('address'),
            'gender' => request()->get('gender'),
            'maritalstatus' => request()->get('maritalstatus'),
            'nationality' => request()->get('nationality'),
            'citizenship' => request()->get('citizenship'),
            'emergency_c_n' => request()->get('emergency_c_n'),
            'emergency_01' => request()->get('emergency_01'),
            'emergency_02' => request()->get('emergency_02'),
            'emergency_03' => request()->get('emergency_03'),
            'qualification' => request()->get('qualification'),
            'qualificationlevel' => request()->get('qualificationlevel'),
            'skill' => request()->get('skill'),
            'skilllevel' => request()->get('skilllevel'),
            'emp_status' => request()->get('is_active', 0),
        ]);
        $employed->payroll->update($request->input('payroll'));
        $employed->companyInfo->update($request->get('company_info'));

        // Handle document upload
        // $currentFile = $author->document;

        //     $fileName = 'none';
        //         if (request()->hasFile('document')) 
        //         {
        //             $file = request()->file('document');
        //             $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
        //             $file->move('./uploads/', $fileName);
        //         }    
        // if ($request->hasFile('document')) {
        //     $file = $request->file('document');
        //     $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
        //     $file->move('./uploads/', $fileName);

        //     $employee->document->update([
        //         'document_name' => $request->get('document_name'),
        //         'document_type' => $fileName,
        //         'document_expiredate' => $request->get('document_expiredate'),
        //         'document_remark' => $request->get('document_remark'),
        //     ]);
        // }
        $request->validate([
            'document_name' => 'nullable',
            'document_type'=>'nullable',
            'document_expiredate'=>'nullable',
            'document_remark'=>'nullable',
            
        ]);
        $currentFile = $employed->document_type;
        $fileName = null;
	    	if (request()->hasFile('document')) 
	    	{
	    		$file = request()->file('document');
	    		$fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
	    		$file->move('./uploads/', $fileName);
	    	}
        
            
            // Update the document in the 'documents' table
            $employed->document()->update([
                'document_name' => $request->get('document_name'),
                'document_type' => ($fileName) ? $fileName : $currentFile,
                'document_expiredate' => $request->get('document_expiredate'),
                'document_remark' => $request->get('document_remark'),
            ]);
        if ($fileName) 
        	File::delete('./uploads/' . $currentFile);
        
        $notification = [
            'message' => 'Record Updated Successfully!',
            'alert-type' => 'success',
        ];

        return redirect()->route('employees.index', $id)->with($notification);

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
// public function update(Request $request, $id)
// {
//     // Validate and update data in the employees, payrolls, company_infos, and documents tables
//     $employee = Employee::find($id);
//     $employee->update($request->input());
//     $employee->payroll->update($request->input('payroll'));
//     $employee->companyInfo->update($request->input('company_info'));

//     // Handle document upload
//     if ($request->hasFile('document')) {
//         $file = $request->file('document');
//         $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
//         $file->move('./uploads/', $fileName);

//         $employee->document->update([
//             'document_name' => $request->input('document_name'),
//             'document_type' => $fileName,
//             'document_expiredate' => $request->input('document_expiredate'),
//             'document_remark' => $request->input('document_remark'),
//         ]);
//     }

//     return redirect()->route('employees.show', $id)->with('success', 'Employee details updated successfully!');
// }
