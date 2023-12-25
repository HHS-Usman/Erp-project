<?php
use App\Http\Controllers\AccountcategoryController;
use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SubdepartmentController;
use App\Http\Controllers\FundtionController;
use App\Http\Controllers\MangementlevelController;
use App\Http\Controllers\SubmanagementlevelController;
use App\Http\Controllers\GazetedholidayController;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\CostcenterController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GradController;
use App\Http\Controllers\LeavereasonController;
use App\Http\Controllers\SubleavingreasonController;
use App\Http\Controllers\WeekoffdayController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ModeofpaymentController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UsergroupController;
use App\Http\Controllers\ProcessController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CitizenshipController;
use App\Http\Controllers\NationalityController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\Employee\EmployeeflagController;
use App\Http\Controllers\Employee\EmployeeruleController;
use App\Http\Controllers\Employee\SkilllevelController;
use App\Http\Controllers\Employee\QualificationlevelController;
use App\Http\Controllers\Employee\QualificationController;
use App\Http\Controllers\Employee\EmployeejobstatusController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\CoaheadlevelController;
use App\Http\Controllers\CostcenteraccountController;
use App\Http\Controllers\DivisionuploadController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\DivuploadController;
use App\Http\Controllers\MonthlydaywiseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\Emp_Company_Info_Controller;
use App\Http\Controllers\Emp_Payroll_Controller;
use App\Http\Controllers\Emp_Document_Controller;
use App\Http\Controllers\ParentcoaContoller;
use App\Http\Controllers\SalepersontypeController;
use App\Http\Controllers\SalespersonController;
use App\Models\Parentcoa;
use App\Models\Saleperson;
use App\Http\Controllers\Security\PermissionController;
use App\Http\Controllers\Security\RoleAccessController;
use App\Http\Controllers\Security\RoleController;
use App\Http\Controllers\Security\AccesspermitController;
use App\Http\Controllers\Security\User_role_controller;
use App\Http\Controllers\Security\Usercontroller;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\FinancialyearController;
use App\Http\Controllers\JournalvoucherController;
use App\Http\Controllers\VoucherentriesController;
use App\Http\Controllers\VouchertypeController;
use App\Http\Controllers\YearClosingController;
use App\Models\Journalvoucher;
use App\Models\Vouchertype;
use App\Models\YearClosing;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
Route::resource('division',DivisionController::class);
Route::resource('department',DepartmentController::class);
Route::resource('subdepartment',SubdepartmentController::class);
Route::resource('function',FundtionController::class);
Route::resource('userrole',User_role_controller::class);
Route::resource('users',Usercontroller::class);
Route::resource('management',MangementlevelController::class);
Route::resource('submanagement',SubmanagementlevelController::class);
Route::resource('gazetedholiday',GazetedholidayController::class);
Route::resource('employees',EmpController::class);
Route::resource('permission',PermissionController::class);
Route::resource('/roleaccess',RoleAccessController::class);
Route::resource('role',RoleController::class);
Route::resource('accesspermit',AccessPermitController::class);
Route::resource('costcenter',CostcenterController::class);
Route::resource('language',LanguageController::class);
Route::resource('religion',ReligionController::class);
Route::resource('designation',DesignationController::class);
Route::resource('group',GroupController::class);
Route::resource('grade',GradController::class);
Route::resource('leavereson',LeavereasonController::class);
Route::resource('subleavingreason',SubleavingreasonController::class);
Route::resource('weekoffday',WeekoffdayController::class);
Route::resource('paymentterm',PaymentController::class);
Route::resource('modeofpayment',ModeofpaymentController::class);
Route::resource('email',EmailController::class);
Route::resource('usergroup',UsergroupController::class);
Route::resource('process',ProcessController::class);
Route::resource('cast',CastController::class);
Route::resource('company_info',Emp_Company_Info_Controller::class);
Route::resource('emp_payroll',Emp_Payroll_Controller::class);
Route::resource('emp_document',Emp_Document_Controller::class);
Route::resource('country',CountryController::class);
Route::resource('citizenship',CitizenshipController::class);
Route::resource('nationality',NationalityController::class);
Route::resource('city',CityController::class);
Route::resource('state',StateController::class);
Route::resource('employeeflag',EmployeeflagController::class);
Route::resource('employeerule',EmployeeruleController::class);
Route::resource('skilllevel',SkilllevelController::class);
Route::resource('employeejobstatus',EmployeejobstatusController::class);
Route::resource('qualification',QualificationController::class);
Route::resource('qualificationlevel',QualificationlevelController::class);
Route::resource('workflowgroup',WorkflowController::class);
Route::resource('divupload',DivuploadController::class);
Route::resource('event',EventController::class);

Route::get('/fetch-employee-data/{role_id}', [AccessPermitController::class, 'fetchEmployeeData']);
Route::resource('accountcategory',AccountcategoryController::class);
Route::resource('coamainheaderlevel',CoaheadlevelController::class);
Route::resource('vouchertype',VouchertypeController::class);
Route::resource('journalvoucher',JournalvoucherController::class);
Route::resource('voucherentry',VoucherentriesController::class);
Route::resource('financailyear',FinancialyearController::class);
Route::resource('yearclosing',YearClosingController::class);

Route::resource('coa',CoaController::class);
Route::resource('account-store',AccountController::class);
Route::resource('costcenteraccount',CostcenteraccountController::class);
Route::resource('salesperson',SalespersonController::class);
Route::resource('salepersontype',SalepersontypeController::class);
Route::resource('monthlydaywise',MonthlydaywiseController::class);
Route::get('/branches', 'BranchController@index');
Route::post('/account-store', 'AccountController@store')->name('account-store');
// for fetch record of DB in JS file
Route::get('/get-countries', [MonthlydaywiseController::class, 'getCountries']);
Route::get('/get-religion', [MonthlydaywiseController::class, 'getReligion']);
Route::get('/get-group', [MonthlydaywiseController::class, 'getGroup']);
Route::get('/get-state', [MonthlydaywiseController::class, 'getState']);
// rollacces temporary
// Route::resource('uplaoder',DivisionuploadController::class);
// Route::get('uploader',  [DivisionuploadController::class, 'uploader']);
Route::get('/monthly-calendar', [CalendarController::class, 'monthlyCalendar'])->name('departmentupload');

// for excel download file
Route::get('deparmentuploader',[DivuploadController::class ,'departmentupload'])->name('deparmentuploader');
// for csv download router
Route::get('deparmentuploadercsv',[DivuploadController::class ,'departmentuploadcsv'])->name('deparmentuploadercsv');

// for excel download file
Route::get('functionupload',[DivuploadController::class ,'functionuploader'])->name('functionupload');
// for csv download file
Route::get('functionuploadcsv',[DivuploadController::class ,'functionuploadercsv'])->name('functionuploadcsv');

// for excel download file
Route::get('divisionupload',[DivuploadController::class ,'divisionuploader'])->name('divisionupload');
// for csv download file
Route::get('divisionuploadcsv',[DivuploadController::class ,'divisionuploadercsv'])->name('divisionuploadcsv');

// for excel download file
Route::get('managelevelupload',[DivuploadController::class ,'manageleveluploader'])->name('managelevelupload');
// for csv download file
Route::get('manageleveluploadcsv',[DivuploadController::class ,'manageleveluploadercsv'])->name('manageleveluploadcsv');

// for excel download file
Route::get('designateupload',[DivuploadController::class ,'designationuploader'])->name('designateupload');
// for csv download file
Route::get('designateuploadcsv',[DivuploadController::class ,'designationuploadercsv'])->name('designateuploadcsv');

// for excel download file
Route::get('gradpload',[DivuploadController::class ,'gradpuploader'])->name('gradpload');
// for csv download file
Route::get('gradploadcsv',[DivuploadController::class ,'gradpuploadercsv'])->name('gradploadcsv');

// for excel download file
Route::get('groupupload',[DivuploadController::class ,'groupuploader'])->name('groupupload');
// for csv download file
Route::get('groupuploadcsv',[DivuploadController::class ,'groupuploadercsv'])->name('groupuploadcsv');

// for excel download file
Route::get('leavingreasonuoload',[DivuploadController::class ,'leavingreasonuoloader'])->name('leavingreasonuoload');
// for csv download file
Route::get('leavingreasonuoloadcsv',[DivuploadController::class ,'leavingreasonuoloadercsv'])->name('leavingreasonuoloadcsv');

// for excel download file
Route::get('languageupoload',[DivuploadController::class ,'languageupoloader'])->name('languageupoload');
// for csv download file
Route::get('languageupoloadcsv',[DivuploadController::class ,'languageupoloadercsv'])->name('languageupoloadcsv');

Route::get('religionupoload',[DivuploadController::class ,'religionupoloader'])->name('religionupoload');
Route::get('religionupoloadcsv',[DivuploadController::class ,'religionupoloadercsv'])->name('religionupoloadcsv');



Route::get('/download', 'DivuploadController@DivuploadController')->name('download');
Route::get('religionupoload',[DivuploadController::class ,'religionupoloader'])->name('religionupoload');
Route::post('/fileuploade',[DivuploadController::class ,'store'])->name('fileuploade');
});
