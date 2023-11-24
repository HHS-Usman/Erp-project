<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emp_document;
class Emp_Document_Controller extends Controller
{
    public function store(Request $request)
    {
        Emp_Document::Create([
            'document_name' => request()->get('document_name'),
            'document_type' => request()->get('document_type'),
            'document_expiredate' => request()->get('document_expiredate'),
            'document_remark' => request()->get('document_remark'), 
        ]);  
        return redirect()->route('employees.index')->with('success','Employee Created  successfully ');   
    }
}
