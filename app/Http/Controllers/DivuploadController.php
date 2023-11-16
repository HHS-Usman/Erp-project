<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Log;
use App\Models\DivisionUploader;
use Maatwebsite\Excel\Facades\Excel;
use League\Csv\Reader;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Division;
use App\Models\funcdata;
use App\Models\Fundtion;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;
use App\Models\Grade;
use App\Models\Group;
use App\Rules\FileOptionMatch;
use App\Models\Language;
use App\Models\Leavereason;
use App\Models\Managementlevel;
use Dflydev\DotAccessData\Data;
use PhpParser\Builder\Function_;

class DivuploadController extends Controller
{
   public function index()
   {
      return view('organizationsetup.division.uploader');
   }
   // function here create for csv file download  done
   public function divisionuploadercsv()
   {
      $path = public_path('csvfile/Division_Templete_Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download done
   public function departmentuploadcsv()
   {
      $path = public_path('csvfile/Department_Templete_Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download done
   public function functionuploadercsv()
   {
      $path = public_path('csvfile/Function_Templete_Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function manageleveluploadercsv()
   {
      $path = public_path('csvfile/ManagmentLevel_Templete Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function designationuploadercsv()
   {
      $path = public_path('csvfile/Designation_Templete_Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function gradpuploadercsv()
   {
      $path = public_path('csvfile/Grade_Templete_Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function groupuploadercsv()
   {
      $path = public_path('csvfile/Group_Templete_Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function leavingreasonuoloadercsv()
   {
      $path = public_path('file/Leaving_Reason_Templete_Uploader.xlsx');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function languageupoloadercsv()
   {
      $path = public_path('file/language_Templete_Uploader.xlsx');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function religionupoloader()
   {
      $path = public_path('file/Religion_Templete_Uploader.xlsx');
      return response()->download($path);
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
   public function religionupoloadercsv()
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
      $request->validate([
         'file' => 'required|mimes:csv,xlsx',
         'key' => 'required|in:Department',
      ]);

      if ($request->key == 'Department') {
         $file = $request->file('file');

         $extension = $file->getClientOriginalExtension();
        

         if ($extension == 'csv') {
             
        // Check if the selected file type matches the expected type
        if (($request->input('selectiondata1') == 1 && $extension == 'csv') ||
        ($request->input('selectiondata1') == 2 && $extension == 'xlsx')) {
        return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('selectiondata1') == 1 ? 'CSV' : 'Excel') . ' file.');
    }
            $csv = Reader::createFromPath($file->getPathname(), 'r');
                $csv->setHeaderOffset(0);
                $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // Add logic to handle Excel file
            // You can use a library like Maatwebsite\Excel to handle Excel files
            // See: https://docs.laravel-excel.com/3.1/imports/
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }

         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Department::truncate();
         }

         // Add new data to the existing data in the table
         foreach ($data as $value) {
            $department = new Department;
            $department->department = $value['Department'];
            $department->department_code = $value['Deparmet Code'];
            $department->detail = $value['Detail'];
            $department->is_active = $value['Active '];
            $department->save();
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }

      return redirect()->back()->with('error', 'Invalid request.');



      if ($request->key == 'Division') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();

            foreach ($data as $value) {
               $division = new Division;
               $division->division = $value['Division'];
               $division->division_code = $value['Division Code'];
               $division->detail = $value['Detail'];
               $division->is_active = $value['Active '];
               $division->save();
            }
         }
      }
      // data store in database table management level table from file 
      if ($request->key == 'Managementlevel') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();

            foreach ($data as $value) {
               $Mangementlevel = new Managementlevel;
               $Mangementlevel->managementlevel = $value['Management Level'];
               $Mangementlevel->managementlevel_code = $value['ML code '];
               $Mangementlevel->detail = $value['Detail'];
               $Mangementlevel->is_active = $value['Active '];
               $Mangementlevel->save();
            }
         }
      }
      // data store in database table Designation level table from file 
      if ($request->key == 'Designation') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            foreach ($data as $value) {
               $designation = new Designation;
               $designation->designation = $value['Designation'];
               $designation->designation_code = $value['Designation Code'];
               $designation->detail = $value['Detail'];
               $designation->is_active = $value['Active '];
               $designation->save();
            }
         }
      }
      // data store in database table Group table from file 
      if ($request->key == 'Group') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            foreach ($data as $value) {
               $group = new Group;
               $group->group = $value['Group'];
               $group->group_code = $value['Group code'];
               $group->detail = $value['Detail'];
               $group->is_active = $value['Active '];
               $group->save();
            }
         }
      }
      // data store in database table Grade table from file 
      if ($request->key == 'Grade') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            // dd($data);
            foreach ($data as $value) {
               $designation = new Grade;
               $designation->grade = $value['Grade'];
               $designation->grade_code = $value['Grade Code'];
               $designation->detail = $value['Detail'];
               $designation->is_active = $value['Active '];
               $designation->save();
            }
         }
      }
      // data store in database table leavingReason  table from file 
      if ($request->key == 'LeavingReason') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            // dd($data);
            foreach ($data as $value) {
               $leavingreason = new Leavereason;
               $leavingreason->leavingreason = $value['Leaving reason'];
               $leavingreason->leavingreason_code = $value['Leavnig Code'];
               $leavingreason->detail = $value['Detail'];
               $leavingreason->is_active = $value['Active '];
               $leavingreason->save();
            }
         }
      }
      // data store in database table leavingReason  table from file 
      if ($request->key == 'Language') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            foreach ($data as $value) {
               $langauge = new Language;
               $langauge->language_code = $value[' Language Code'];
               $langauge->language = $value['Language'];
               $langauge->detail = $value['Detail'];
               $langauge->is_active = $value['Active '];
               $langauge->save();
            }
         }
      }
      // data store in database table leavingReason  table from file 
      if ($request->key == 'Religion') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            foreach ($data as $value) {
               $religion = new Language;
               $religion->religion_code = $value['Language Code'];
               $religion->religion = $value['Language'];
               $religion->detail = $value['Detail'];
               $religion->is_active = $value['Active '];
               $religion->save();
            }
         }
      }
      // data store in database table Function table from file 
      if ($request->key == 'Functiondata') {

         if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('csv_imports');
            $csv = Reader::createFromPath(storage_path('app/' . $filePath), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
            foreach ($data as $value) {
               $designation = new Fundtion;
               $designation->function = $value['Function'];
               $designation->function_code = $value['Function Code'];
               $designation->detail = $value['Detail'];
               $designation->is_active = $value['Active '];
               $designation->save();
            }
         }
      }
      return redirect()->route('divupload.index');
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
