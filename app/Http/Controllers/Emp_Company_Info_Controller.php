<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emp_Company_Info;
class Emp_Company_Info_Controller extends Controller
{
    public function store(Request $request) {
        {
            // validate the input
           
            //create a new product in database
            Emp_Company_Info::create([
                'designation' => request()->get('designation')->nullable(),
                'branch' => request()->get('branch'),
                'division' => request()->get('division'),
                'department' => request()->get('department'),
                'subdepartment' => request()->get('subdepartment'),
                'group' => request()->get('group'),
                'employeegrade' => request()->get('employeegrade'),
                'employeecategory' => request()->get('employeecategory'),
                'function' => request()->get('function'),
                'managementlevel' => request()->get('managementlevel'),
                'submanagementlevel' => request()->get('submanagementlevel'),
                'employeejobstatus' => request()->get('employeejobstatus'),
                'appointment_date' => request()->get('appointment_date'),
                'joining_date' => request()->get('joining_date'),
                'confirmation_date' => request()->get('confirmation_date'),
                'retirement_date' => request()->get('retirement_date'),
                'contract_start_date' => request()->get('contract_start_date'),
                'contract_end_date' => request()->get('contract_end_date'),
                'resign_date' => request()->get('resign_date'),
                'resign_acceptance_date' => request()->get('resign_acceptance_date'),
                'leaving_reason' => request()->get('leaving_reason'),
                'leaving_date' => request()->get('leaving_date'),
                'approval_level' => request()->get('approval_level'),
                'additional_approval' => request()->get('additional_approval'),
                'approver' => request()->get('approver'),
                'user_group' => request()->get('user_group'),
                'workflow_group' => request()->get('workflow_group'),
                'emp_status' => request()->get('is_active', 0),
            ]);
            //redirect the user and send friendly message
            return redirect()->route('employees.create')->with('success','Employee Created  successfully ');
        }
     
    }
}
