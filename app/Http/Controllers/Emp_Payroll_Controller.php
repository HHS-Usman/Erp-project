<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emp_Payroll;

class Emp_Payroll_Controller extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'eobi_num' => 'integer|in:0,1',
            'pf_num' => 'integer|in:0,1',
            'gratuity_num' => 'integer|in:0,1',
            
        ]);
        Emp_Payroll::Create([
            'costcenter' => request()->get('costcenter'),
            'bank_name' => request()->get('bank_name'),
            'bank_ac_no' => request()->get('bank_ac_no'),
            'company_bank' => request()->get('company_bank'),
            'eobi_num' => request()->get('eobi_num', 0),
            'eobi_no' => request()->get('eobi_no'),
            'pf_num' => request()->get('pf_num', 0),
            'pf_no' => request()->get('pf_no'),
            'gratuity_num' => request()->get('gratuity_num', 0),
            'gratuity_no' => request()->get('gratuity_no'),
            'pfstartdate' => request()->get('pfstartdate'),
            'gratuitystartdate' => request()->get('gratuitystartdate'),
            'overtime_rate_type' => request()->get('overtime_rate_type'),
            'holiday_rate_type' => request()->get('holiday_rate_type'),
            'shifthours' => request()->get('shifthours'),
            'gazettedholidayrate' => request()->get('gazettedholidayrate'),
            'ratefactor' => request()->get('ratefactor'),
            'offday_ratefactor' => request()->get('offday_ratefactor'),
            'workingday_ratefactor' => request()->get('workingday_ratefactor'),
            'offday_rate' => request()->get('offday_rate'),
            
        ]);
          
        return redirect()->route('employees.create')->with('success','Employee Created  successfully '); 
    }
}
