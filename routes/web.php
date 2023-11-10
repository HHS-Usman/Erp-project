<?php

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
use App\Http\Controllers\DivisionuploadController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\DivuploadController;
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
Route::resource('management',MangementlevelController::class);
Route::resource('submanagement',SubmanagementlevelController::class);
Route::resource('gazetedholiday',GazetedholidayController::class);
Route::resource('employees',EmpController::class);
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
Route::resource('country',CountryController::class);
Route::resource('citizenship',CitizenshipController::class);
Route::resource('nationality',NationalityController::class);
Route::resource('city',CityController::class);
Route::resource('employeeflag',EmployeeflagController::class);
Route::resource('employeerule',EmployeeruleController::class);
Route::resource('skilllevel',SkilllevelController::class);
Route::resource('employeejobstatus',EmployeejobstatusController::class);
Route::resource('qualification',QualificationController::class);
Route::resource('qualificationlevel',QualificationlevelController::class);
Route::resource('workflowgroup',WorkflowController::class);
Route::resource('divupload',DivuploadController::class);
// Route::resource('uplaoder',DivisionuploadController::class);
// Route::get('uploader',  [DivisionuploadController::class, 'uploader']);
Route::get('/monthly-calendar', [CalendarController::class, 'monthlyCalendar'])->name('departmentupload');
Route::get('deparmentuploader',[DivuploadController::class ,'departmentupload'])->name('deparmentuploader');
Route::get('functionupload',[DivuploadController::class ,'functionuploader'])->name('functionupload');
Route::get('divisionupload',[DivuploadController::class ,'divisionuploader'])->name('divisionupload');
Route::get('managelevelupload',[DivuploadController::class ,'manageleveluploader'])->name('managelevelupload');
Route::get('designateupload',[DivuploadController::class ,'designationuploader'])->name('designateupload');
Route::get('gradpload',[DivuploadController::class ,'gradpuploader'])->name('gradpload');
Route::get('groupupload',[DivuploadController::class ,'groupuploader'])->name('groupupload');
Route::get('leavingreasonuoload',[DivuploadController::class ,'leavingreasonuoloader'])->name('leavingreasonuoload');
Route::get('languageupoload',[DivuploadController::class ,'languageupoloader'])->name('languageupoload');
Route::get('religionupoload',[DivuploadController::class ,'religionupoloader'])->name('religionupoload');
Route::get('/download', 'DivuploadController@DivuploadController')->name('download');
Route::get('religionupoload',[DivuploadController::class ,'religionupoloader'])->name('religionupoload');
Route::post('/fileuploade',[DivuploadController::class ,'store'])->name('fileuploade');
});
