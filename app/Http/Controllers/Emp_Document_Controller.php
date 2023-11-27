<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emp_document;
class Emp_Document_Controller extends Controller
{
    public function store(Request $request)
    {
        
        $fileName = 'none';
    	if (request()->hasFile('file')) 
    	{
    		$file = request()->file('file');
    		$fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
    		$file->move('./uploads/', $fileName);
    	}
        
        Emp_Document::Create([
            'document_name' => request()->get('document_name'),
            'document_type' => $fileName,
            'document_expiredate' => request()->get('document_expiredate'),
            'document_remark' => request()->get('document_remark'), 
        ]);  
        return redirect()->route('employees.index')->with('success','Employee Created  successfully ');   
    }
}
