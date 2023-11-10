<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class DivuploadController extends Controller
{
    public function index()
    {  
        Return view('organizationsetup.division.uploader');    
    }

    // function declare for departmentuploader
    public function departmentupload()
    {
       $path = public_path('file/Department_Templete_Uploader.xlsx');
       return response()->download($path);
    }

    // function declare for functionuploader
    public function functionuploader()
    {
       $path = public_path('file/Function_Templete_Uploader.xlsx');
       return response()->download($path);
    }
    // function declare for dvision uploader
    public function divisionuploader()
    {
       $path = public_path('file/Division_Templete_Uploader.xlsx');
       return response()->download($path);
    }
     // function declare for management level uploader
    public function manageleveluploader()
    {
       $path = public_path('file/Management_level_Templete_Uploader.xlsx');
       return response()->download($path);
    }
     // function declare for designation uploader
     public function designationuploader()
     {
        $path = public_path('file/Designation_Templete_Uploader.xlsx');
        return response()->download($path);
     }
    // function declare for grade uploader
     public function gradpuploader()
     {
        $path = public_path('file/grade_Templete_Uploader.xlsx');
        return response()->download($path);
     }
     // function declare for group leaving Reason uploader
     public function groupuploader()
     {
        $path = public_path('file/Group_Templete_Uploader.xlsx');
        return response()->download($path);
     }
      // function declare for dvision uploader
      public function leavingreasonuoloader()
      {
         $path = public_path('file/Leaving_Reason_Templete_Uploader.xlsx');
         return response()->download($path);
      }
      // function declare for dvision uploader
      public function languageupoloader()
      {
         $path = public_path('file/language_Templete_Uploader.xlsx');
         return response()->download($path);
      }
      public function religionupoloader()
      {
         $path = public_path('file/Religion_Templete_Uploader.xlsx');
         return response()->download($path);
      }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
    }

    /**
     * Display the specified resource.
     *
     
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         //validate the input
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
