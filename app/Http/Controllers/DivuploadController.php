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
use Illuminate\Support\Facades\Validator;
use App\Models\Leavereason;
use App\Models\Managementlevel;
use App\Models\Religion;
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
      $path = public_path('csvfile/LeavingReasons_Templete_Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function languageupoloadercsv()
   {
      $path = public_path('csvfile/Language_Templete_Uploader_(CSV).csv');
      return response()->download($path);
   }
   // function here create for csv file download 
   public function religionupoloadercsv()
   {
      $path = public_path('csvfile/Religion_Templete_Uploader_(CSV).csv');
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
      if ($request->key == 'Department') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Department',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Department::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $department = new Department;
            $department->department = $value['Department'];
            $department->department_code = $value['Deparmet Code'];
            $department->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $department->is_active = $isActive;
               $department->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'Division') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Division',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Division::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $division = new Division;
            $division->division = $value['Division'];
            $division->division_code = $value['Division Code'];
            $division->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $division->is_active = $isActive;
               $division->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'Functiondata') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Functiondata',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Fundtion::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $functiondata = new Fundtion;
            $functiondata->function = $value['Function'];
            $functiondata->function_code = $value['Function Code'];
            $functiondata->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $functiondata->is_active = $isActive;
               $functiondata->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'Managementlevel') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Managementlevel',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Managementlevel::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $Mangementlevel = new Managementlevel;
            $Mangementlevel->managementlevel = $value['Management Level'];
            $Mangementlevel->managementlevel_code = $value['ML code '];
            $Mangementlevel->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $Mangementlevel->is_active = $isActive;
               $Mangementlevel->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'Designation') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Designation',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Designation::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $designation = new Designation;
            $designation->designation = $value['Designation'];
            $designation->designation_code = $value['Designation Code'];
            $designation->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $designation->is_active = $isActive;
               $designation->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'Group') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Group',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
             Group::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $group = new Group;
            $group->group = $value['Group'];
            $group->group_code = $value['Group code'];
            $group->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
                $group->is_active = $isActive;
                $group->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'Grade') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Grade',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Grade::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $grade = new Grade;
            $grade->grade = $value['Grade'];
            $grade->grade_code = $value['Grade Code'];
            $grade->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $grade->is_active = $isActive;
               $grade->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'LeavingReason') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:LeavingReason',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Leavereason::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $leavingreason = new Leavereason;
            $leavingreason->leavingreason = $value['Leaving reason'];
            $leavingreason->leavingreason_code = $value['Leavnig Code'];
            $leavingreason->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $leavingreason->is_active = $isActive;
               $leavingreason->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'Language') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Language',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Language::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $langauge = new Language;
            $langauge->language_code = $value[' Language Code'];
            $langauge->language = $value['Language'];
            $langauge->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $langauge->is_active = $isActive;
               $langauge->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
      }
      if ($request->key == 'Religion') {
         $request->validate([
            'file' => 'required|mimes:csv,xlsx',
            'key' => 'required|in:Religion',
         ]);
         $file = $request->file('file');
         $extension = $file->getClientOriginalExtension();
         $valuegetting = $request->input('filedatainfor');
         if ($extension === 'csv') {
            // Check if the selected file type matches the expected type
            if (($valuegetting == "1" && $extension != 'csv') ||
               ($valuegetting == "2" && $extension != 'xlsx')
            ) {

               return redirect()->back()->with('error', 'Invalid file format. Please upload a ' . ($request->input('filedatainfor') == 1 ? 'CSV' : 'Excel') . ' file.');
            } elseif ($valuegetting == "0") {
               return redirect()->back()->with('error', 'None not Accept Please choose any Type.');
            }

            $csv = Reader::createFromPath($file->getPathname(), 'r');
            $csv->setHeaderOffset(0);
            $data = $csv->getRecords();
         } elseif ($extension == 'xlsx') {
            // i will implement logic of excel
            // here will use library like Maatwebsite\Excel to handle Excel files
            return redirect()->back()->with('error', 'Invalid file format. Please upload an Excel file.');
         }
         // Check if "Overwrite" checkbox is selected
         if ($request->has('Overwrite')) {
            Religion::truncate();
         }
         // Add new data to the existing data in the table
         // if($value['Active '] > 1 && $value['Active '] < 0){
         //    return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
         // }
         foreach ($data as $value) {
            $religion = new Religion;
            $religion->religion_code = $value['Religion Code'];
            $religion->religion = $value['Religion'];
            $religion->detail = $value['Detail'];

            // Check if the 'Active' column contains only 0 or 1
            $isActive = intval($value['Active ']);
            if ($isActive === 0 || $isActive === 1) {
               $religion->is_active = $isActive;
               $religion->save();
            } else {
               // If 'Active' column contains a number other than 0 or 1, show an error or handle it accordingly
               // For example, you can log an error, throw an exception, or take any other appropriate action.
               // Here, I'm just logging an error message.
               return redirect()->back()->with('error', 'We Dont Accept Greater than 0 and 1 We accept only 0 or 1 in Active');
            }
         }

         return redirect()->back()->with('success', 'File uploaded successfully.');
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
