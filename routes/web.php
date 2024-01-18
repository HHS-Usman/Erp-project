<?php
use App\Http\Controllers\AccountcategoryController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BankController;
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
use App\Http\Controllers\Product\Productcontroller;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\BuyercategoryController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\BuyerpaymentController;
use App\Http\Controllers\BuyertypeController;
use App\Http\Controllers\BuyeruploadController;
use App\Http\Controllers\FinancialyearController;
use App\Http\Controllers\JournalvoucherController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\SupplierCategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SuppliertypeController;
use App\Http\Controllers\VoucherentriesController;
use App\Http\Controllers\VouchertypeController;
use App\Http\Controllers\YearClosingController;
use App\Http\Controllers\Product\BrandSelectionController;
use App\Http\Controllers\Product\ClassificationController;
use App\Http\Controllers\Product\PackingTypeController;
use App\Http\Controllers\Product\ProductActivityController;
use App\Http\Controllers\Product\Product2ndsubcategoryController;
use App\Http\Controllers\Product\ProductsubcategoryController;
use App\Http\Controllers\Product\ProductCategoryController;
use App\Http\Controllers\Product\ProductStatusController;
use App\Http\Controllers\Product\ProductSupplierController;
use App\Http\Controllers\Product\ProductTypeController;
use App\Http\Controllers\Product\StockTypeController;
use App\Http\Controllers\Product\UomController;
use App\Http\Controllers\Product\UploaderController;
use App\Http\Controllers\PurchasereuquisitionController;
use App\Http\Controllers\SupplieruploaderController;
use App\Http\Controllers\Treasury\SupplyController;
use App\Models\BuyerCategory;
use App\Models\Journalvoucher;
use App\Models\Supplier;
use App\Models\SupplierCategory;
use App\Models\Suppliertype;
use App\Models\Supplieruploader;
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
function permissionRoutes($permission, $controller, $routeName) {
    Route::middleware(["checkPermission:$permission"])->group(function () use ($controller, $routeName) {
        Route::get("$routeName/create", [$controller, 'create'])->name("$routeName.create");
        Route::get("$routeName", [$controller, 'index'])->name("$routeName.index");
        Route::get("$routeName/index", [$controller, 'index'])->name("$routeName.index");
        Route::get("$routeName/{id}/edit", [$controller, 'edit'])->name("$routeName.edit");
        Route::delete("$routeName/{id}", [$controller, 'destroy'])->name("$routeName.destroy");
    });

    Route::resource($routeName, $controller)->except(['create', 'edit', 'index', 'destroy']);
}
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
    permissionRoutes('add-division', DivisionController::class, 'division');
    permissionRoutes('view-division', DivisionController::class, 'division');
    permissionRoutes('edit-division', DivisionController::class, 'division');

// Route::get('division/create', [DivisionController::class, 'create'])->middleware('checkPermission:add-division');
// Route::resource('division',DivisionController::class);
// Route::middleware(['checkPermission:add-department'])->group(function () {
//     Route::get('department/create', [DepartmentController::class, 'create'])->name('department.create');
// });
// Route::middleware(['checkPermission:view-department'])->group(function () {
//     Route::get('department/index', [DepartmentController::class, 'index'])->name('department.index');
// });
// Route::middleware(['checkPermission:edit-department'])->group(function () {
//     Route::get('department/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
// });
// Route::resource('department',DepartmentController::class)->except(['create','edit','index']);
permissionRoutes('add-department', DepartmentController::class, 'department');
permissionRoutes('view-department', DepartmentController::class, 'department');
permissionRoutes('edit-department', DepartmentController::class, 'department');
permissionRoutes('delete-department', DepartmentController::class, 'department');
permissionRoutes('add-subdepartment', SubdepartmentController::class, 'subdepartment');
permissionRoutes('view-subdepartment', SubdepartmentController::class, 'subdepartment');
permissionRoutes('edit-subdepartment', SubdepartmentController::class, 'subdepartment');
permissionRoutes('delete-subdepartment', SubdepartmentController::class, 'subdepartment');
permissionRoutes('add-function', FundtionController::class, 'function');
permissionRoutes('view-function', FundtionController::class, 'function');
permissionRoutes('edit-function', FundtionController::class, 'function');
permissionRoutes('delete-function', FundtionController::class, 'function');
permissionRoutes('add-managementlevel', MangementlevelController::class, 'management');
permissionRoutes('view-managementlevel', MangementlevelController::class, 'management');
permissionRoutes('edit-managementlevel', MangementlevelController::class, 'management');
permissionRoutes('delete-managementlevel', MangementlevelController::class, 'management');
permissionRoutes('add-submanagementlevel', SubmanagementlevelController::class, 'submanagement');
permissionRoutes('view-submanagementlevel', SubmanagementlevelController::class, 'submanagement');
permissionRoutes('edit-submanagementlevel', SubmanagementlevelController::class, 'submanagement');
permissionRoutes('delete-submanagementlevel', SubmanagementlevelController::class, 'submanagement');
permissionRoutes('add-gazitedholiday', GazetedholidayController::class, 'gazetedholiday');
permissionRoutes('view-gazitedholiday', GazetedholidayController::class, 'gazetedholiday');
permissionRoutes('edit-gazitedholiday', GazetedholidayController::class, 'gazetedholiday');
permissionRoutes('delete-gazitedholiday', GazetedholidayController::class, 'gazetedholiday');
permissionRoutes('add-language',LanguageController::class, 'language');
permissionRoutes('view-language', LanguageController::class, 'language');
permissionRoutes('edit-language', LanguageController::class, 'language');
permissionRoutes('delete-language', LanguageController::class, 'language');
permissionRoutes('add-religion', ReligionController::class, 'religion');
permissionRoutes('view-religion', ReligionController::class, 'religion');
permissionRoutes('edit-religion', ReligionController::class, 'religion');
permissionRoutes('delete-religion', ReligionController::class, 'religion');
permissionRoutes('add-designation',DesignationController::class, 'designation');
permissionRoutes('view-designation', DesignationController::class, 'designation');
permissionRoutes('edit-designation', DesignationController::class, 'designation');
permissionRoutes('delete-designation', DesignationController::class, 'designation');
permissionRoutes('add-group', GroupController::class, 'group');
permissionRoutes('view-group', GroupController::class, 'group');
permissionRoutes('edit-group', GroupController::class, 'group');
permissionRoutes('delete-group', GroupController::class, 'group');
permissionRoutes('add-grade', GradController::class, 'grade');
permissionRoutes('view-grade', GradController::class, 'grade');
permissionRoutes('edit-grade', GradController::class, 'grade');
permissionRoutes('delete-grade', GradController::class, 'grade');
permissionRoutes('add-leavingreason',LeavereasonController::class, 'leavereson');
permissionRoutes('view-leavingreason', LeavereasonController::class, 'leavereson');
permissionRoutes('edit-leavingreason', LeavereasonController::class, 'leavereson');
permissionRoutes('delete-leavingreason', LeavereasonController::class, 'leavereson');
permissionRoutes('add-subleavingreason', SubleavingreasonController::class, 'subleavingreason');
permissionRoutes('view-subleavingreason', SubleavingreasonController::class, 'subleavingreason');
permissionRoutes('edit-subleavingreason', SubleavingreasonController::class, 'subleavingreason');
permissionRoutes('delete-subleavingreason', SubleavingreasonController::class, 'subleavingreason');
permissionRoutes('add-weekday', WeekoffdayController::class, 'weekoffday');
permissionRoutes('view-weekday', WeekoffdayController::class, 'weekoffday');
permissionRoutes('edit-weekday', WeekoffdayController::class, 'weekoffday');
permissionRoutes('delete-weekday', WeekoffdayController::class, 'weekoffday');
permissionRoutes('uploader', DivuploadController::class, 'divupload');
permissionRoutes('add-paymentterm', PaymentController::class, 'paymentterm');
permissionRoutes('view-paymentterm', PaymentController::class, 'paymentterm');
permissionRoutes('edit-paymentterm', PaymentController::class, 'paymentterm');
permissionRoutes('delete-paymentterm', PaymentController::class, 'paymentterm');
permissionRoutes('add-modeofpayment', ModeofpaymentController::class, 'modeofpayment');
permissionRoutes('view-modeofpayment', ModeofpaymentController::class, 'modeofpayment');
permissionRoutes('edit-modeofpayment', ModeofpaymentController::class, 'modeofpayment');
permissionRoutes('delete-modeofpayment', ModeofpaymentController::class, 'modeofpayment');
permissionRoutes('add-email', EmailController::class, 'email');
permissionRoutes('view-email', EmailController::class, 'email');
permissionRoutes('edit-email', EmailController::class, 'email');
permissionRoutes('delete-email', EmailController::class, 'email');
permissionRoutes('add-usergroup', UsergroupController::class, 'usergroup');
permissionRoutes('view-usergroup', UsergroupController::class, 'usergroup');
permissionRoutes('edit-usergroup', UsergroupController::class, 'usergroup');
permissionRoutes('delete-usergroup', UsergroupController::class, 'usergroup');
permissionRoutes('add-usergroup', UsergroupController::class, 'usergroup');
permissionRoutes('view-usergroup', UsergroupController::class, 'usergroup');
permissionRoutes('edit-usergroup', UsergroupController::class, 'usergroup');
permissionRoutes('delete-usergroup', UsergroupController::class, 'usergroup');
permissionRoutes('add-workflowgroup', WorkflowController::class, 'workflowgroup');
permissionRoutes('view-workflowgroup', WorkflowController::class, 'workflowgroup');
permissionRoutes('edit-workflowgroup', WorkflowController::class, 'workflowgroup');
permissionRoutes('delete-workflowgroup', WorkflowController::class, 'workflowgroup');
permissionRoutes('add-process', WorkflowController::class, 'process');
permissionRoutes('view-process', WorkflowController::class, 'process');
permissionRoutes('edit-process', WorkflowController::class, 'process');
permissionRoutes('delete-process', WorkflowController::class, 'process');
permissionRoutes('add-cast', CastController::class, 'cast');
permissionRoutes('view-cast', CastController::class, 'cast');
permissionRoutes('edit-cast', CastController::class, 'cast');
permissionRoutes('delete-cast', CastController::class, 'cast');
permissionRoutes('add-cast', CastController::class, 'cast');
permissionRoutes('view-cast', CastController::class, 'cast');
permissionRoutes('edit-cast', CastController::class, 'cast');
permissionRoutes('delete-cast', CastController::class, 'cast');
permissionRoutes('add-country', CountryController::class, 'country');
permissionRoutes('view-country', CountryController::class, 'country');
permissionRoutes('edit-country', CountryController::class, 'country');
permissionRoutes('delete-country', CountryController::class, 'country');
permissionRoutes('add-citizenship', CitizenshipController::class, 'citizenship');
permissionRoutes('view-citizenship', CitizenshipController::class, 'citizenship');
permissionRoutes('edit-citizenship', CitizenshipController::class, 'citizenship');
permissionRoutes('delete-citizenship', CitizenshipController::class, 'citizenship');
permissionRoutes('add-nationality', NationalityController::class, 'nationality');
permissionRoutes('view-nationality', NationalityController::class, 'nationality');
permissionRoutes('edit-nationality', NationalityController::class, 'nationality');
permissionRoutes('delete-nationality', NationalityController::class, 'nationality');
permissionRoutes('add-city', CityController::class, 'city');
permissionRoutes('view-city', CityController::class, 'city');
permissionRoutes('edit-city', CityController::class, 'city');
permissionRoutes('delete-city', CityController::class, 'city');
permissionRoutes('add-employee', EmpController::class, 'employees');
permissionRoutes('view-employee', EmpController::class, 'employees');
permissionRoutes('edit-employee', EmpController::class, 'employees');
permissionRoutes('delete-employee', EmpController::class, 'employees');
permissionRoutes('add-employeeflag', EmployeeflagController::class, 'employeeflag');
permissionRoutes('view-employeeflag', EmployeeflagController::class, 'employeeflag');
permissionRoutes('edit-employeeflag', EmployeeflagController::class, 'employeeflag');
permissionRoutes('delete-employeeflag', EmployeeflagController::class, 'employeeflag');
permissionRoutes('add-employeerule', EmployeeruleController::class, 'employeerule');
permissionRoutes('view-employeerule', EmployeeruleController::class, 'employeerule');
permissionRoutes('edit-employeerule', EmployeeruleController::class, 'employeerule');
permissionRoutes('delete-employeerule', EmployeeruleController::class, 'employeerule');
permissionRoutes('add-employeejobstatus', EmployeejobstatusController::class, 'employeejobstatus');
permissionRoutes('view-employeejobstatus', EmployeejobstatusController::class, 'employeejobstatus');
permissionRoutes('edit-employeejobstatus', EmployeejobstatusController::class, 'employeejobstatus');
permissionRoutes('delete-employeejobstatus', EmployeejobstatusController::class, 'employeejobstatus');
permissionRoutes('add-qualification', QualificationController::class, 'qualification');
permissionRoutes('view-qualification', QualificationController::class, 'qualification');
permissionRoutes('edit-qualification', QualificationController::class, 'qualification');
permissionRoutes('delete-qualification', QualificationController::class, 'qualification');
permissionRoutes('add-qualificationlevel', QualificationlevelController::class, 'qualificationlevel');
permissionRoutes('view-qualificationlevel', QualificationlevelController::class, 'qualificationlevel');
permissionRoutes('edit-qualificationlevel', QualificationlevelController::class, 'qualificationlevel');
permissionRoutes('delete-qualificationlevel', QualificationlevelController::class, 'qualificationlevel');
permissionRoutes('add-product', ProductController::class, 'product');
permissionRoutes('view-product', ProductController::class, 'product');
permissionRoutes('edit-product', ProductController::class, 'product');
permissionRoutes('delete-product', ProductController::class, 'product');
permissionRoutes('add-classification', ClassificationController::class, 'classification');
permissionRoutes('view-classification', ClassificationController::class, 'classification');
permissionRoutes('edit-classification', ClassificationController::class, 'classification');
permissionRoutes('delete-classification', ClassificationController::class, 'classification');
permissionRoutes('add-brands', BrandSelectionController::class, 'brand_selection');
permissionRoutes('view-brands', BrandSelectionController::class, 'brand_selection');
permissionRoutes('edit-brands', BrandSelectionController::class, 'brand_selection');
permissionRoutes('delete-brands', BrandSelectionController::class, 'brand_selection');
permissionRoutes('add-productactivity', ProductActivityController::class, 'productactivity');
permissionRoutes('view-productactivity', ProductActivityController::class, 'productactivity');
permissionRoutes('edit-productactivity', ProductActivityController::class, 'productactivity');
permissionRoutes('delete-productactivity', ProductActivityController::class, 'productactivity');
permissionRoutes('add-productcategory', ProductCategoryController::class, 'productcategory');
permissionRoutes('view-productcategory', ProductCategoryController::class, 'productcategory');
permissionRoutes('edit-productcategory', ProductCategoryController::class, 'productcategory');
permissionRoutes('delete-productcategory', ProductCategoryController::class, 'productcategory');

permissionRoutes('add-productstatus', ProductStatusController::class, 'productstatus');
permissionRoutes('view-productstatus', ProductStatusController::class, 'productstatus');
permissionRoutes('edit-productstatus', ProductStatusController::class, 'productstatus');
permissionRoutes('delete-productstatus', ProductStatusController::class, 'productstatus');
permissionRoutes('add-productsupplier', ProductSupplierController::class, 'productsupplier');
permissionRoutes('view-productsupplier', ProductSupplierController::class, 'productsupplier');
permissionRoutes('edit-productsupplier', ProductSupplierController::class, 'productsupplier');
permissionRoutes('delete-productsupplier', ProductSupplierController::class, 'productsupplier');
permissionRoutes('add-producttype', ProductTypeController::class, 'producttype');
permissionRoutes('view-producttype', ProductTypeController::class, 'producttype');
permissionRoutes('edit-producttype', ProductTypeController::class, 'producttype');
permissionRoutes('delete-producttype', ProductTypeController::class, 'producttype');
permissionRoutes('add-stocktype', StockTypeController::class, 'stocktype');
permissionRoutes('view-stocktype', StockTypeController::class, 'stocktype');
permissionRoutes('edit-stocktype', StockTypeController::class, 'stocktype');
permissionRoutes('delete-stocktype', StockTypeController::class, 'stocktype');
permissionRoutes('add-uom', UomController::class, 'uom');
permissionRoutes('view-uom', UomController::class, 'uom');
permissionRoutes('edit-uom', UomController::class, 'uom');
permissionRoutes('delete-uom', UomController::class, 'uom');
permissionRoutes('add-productsubcategory', ProductsubcategoryController::class, 'product_sub_category');
permissionRoutes('view-productsubcategory', ProductsubcategoryController::class, 'product_sub_category');
permissionRoutes('edit-productsubcategory', ProductsubcategoryController::class, 'product_sub_category');
permissionRoutes('delete-productsubcategory', ProductsubcategoryController::class, 'product_sub_category');
permissionRoutes('add-product2subcategory', Product2ndsubcategoryController::class, 'product_2nd_sub_category');
permissionRoutes('view-product2subcategory', Product2ndsubcategoryController::class, 'product_2nd_sub_category');
permissionRoutes('edit-product2subcategory', Product2ndsubcategoryController::class, 'product_2nd_sub_category');
permissionRoutes('delete-product2subcategory', Product2ndsubcategoryController::class, 'product_2nd_sub_category');
permissionRoutes('add-packingtype', PackingTypeController::class, 'packingtype');
permissionRoutes('view-packingtype', PackingTypeController::class, 'packingtype');
permissionRoutes('edit-packingtype', PackingTypeController::class, 'packingtype');
permissionRoutes('delete-packingtype', PackingTypeController::class, 'packingtype');
permissionRoutes('view-puploader', UploaderController::class, 'productuploader');
permissionRoutes('add-persontype', SalepersontypeController::class, 'salepersontype');
permissionRoutes('view-persontype', SalepersontypeController::class, 'salepersontype');
permissionRoutes('edit-persontype', SalepersontypeController::class, 'salepersontype');
permissionRoutes('delete-persontype', SalepersontypeController::class, 'salepersontype');
permissionRoutes('add-saleperson', SalespersonController::class, 'salesaleperson');
permissionRoutes('view-saleperson', SalespersonController::class, 'salesaleperson');
permissionRoutes('edit-saleperson', SalespersonController::class, 'salesaleperson');
permissionRoutes('delete-persontype', SalespersonController::class, 'salesaleperson');
permissionRoutes('add-persontype', SalepersontypeController::class, 'salepersontype');
permissionRoutes('view-persontype', SalepersontypeController::class, 'salepersontype');
permissionRoutes('edit-persontype', SalepersontypeController::class, 'salepersontype');
permissionRoutes('delete-persontype', SalepersontypeController::class, 'salepersontype');
    // Route::get('division/create', [DivisionController::class, 'create'])->middleware('checkPermission:add-division');
    // Route::resource('division',DivisionController::class);
    Route::middleware(['checkPermission:add-department'])->group(function () {
        Route::get('department/create', [DepartmentController::class, 'create'])->name('department.create');
    });
    Route::middleware(['checkPermission:view-department'])->group(function () {
        Route::get('department/index', [DepartmentController::class, 'index'])->name('department.index');
    });
    Route::middleware(['checkPermission:edit-department'])->group(function () {
        Route::get('department/{department}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
    });
Route::resource('department',DepartmentController::class);
// ->except(['create','edit','index'])

permissionRoutes('add-accountcategory', AccountcategoryController::class, 'accountcategory');
permissionRoutes('view-accountcategory', AccountcategoryController::class, 'accountcategory');
permissionRoutes('edit-accountcategory', AccountcategoryController::class, 'accountcategory');
permissionRoutes('delete-accountcategory', AccountcategoryController::class, 'accountcategory');
permissionRoutes('add-mainheadlevel', CoaheadlevelController::class, 'coamainheaderlevel');
permissionRoutes('view-mainheadlevel', CoaheadlevelController::class, 'coamainheaderlevel');
permissionRoutes('edit-mainheadlevel', CoaheadlevelController::class, 'coamainheaderlevel');
permissionRoutes('delete-mainheadlevel', CoaheadlevelController::class, 'coamainheaderlevel');
permissionRoutes('add-coa', CoaControllerController::class, 'coa');
permissionRoutes('view-coa', CoaControllerController::class, 'coa');
permissionRoutes('edit-coa', CoaControllerController::class, 'coa');
permissionRoutes('delete-coa', CoaControllerController::class, 'coa');
permissionRoutes('add-costcenter', CostcenteraccountController::class, 'costcenteraccount');
permissionRoutes('view-costcenter', CostcenteraccountController::class, 'costcenteraccount');
permissionRoutes('edit-costcenter', CostcenteraccountController::class, 'costcenteraccount');
permissionRoutes('delete-costcenter', CostcenteraccountController::class, 'costcenteraccount');
permissionRoutes('add-vouchertype', VouchertypeController::class, 'vouchertype');
permissionRoutes('view-vouchertype', VouchertypeController::class, 'vouchertype');
permissionRoutes('edit-vouchertype', VouchertypeController::class, 'vouchertype');
permissionRoutes('delete-vouchertype', VouchertypeController::class, 'vouchertype');
permissionRoutes('add-yearclosing', YearClosingController::class, 'yearclosing');
permissionRoutes('view-yearclosing', YearClosingController::class, 'yearclosing');
permissionRoutes('edit-yearclosing', YearClosingController::class, 'yearclosing');
permissionRoutes('delete-yearclosing', YearClosingController::class, 'yearclosing');
permissionRoutes('add-financialyear', FinancialyearController::class, 'financailyear');
permissionRoutes('view-financialyear', FinancialyearController::class, 'financailyear');
permissionRoutes('edit-financialyear', FinancialyearController::class, 'financailyear');
permissionRoutes('delete-financialyear', FinancialyearController::class, 'financailyear');
permissionRoutes('add-journalvoucher', JournalvoucherController::class, 'journalvoucher');
permissionRoutes('view-journalvoucher', JournalvoucherController::class, 'journalvoucher');
permissionRoutes('edit-journalvoucher', JournalvoucherController::class, 'journalvoucher');
permissionRoutes('delete-journalvoucher', JournalvoucherController::class, 'journalvoucher');
permissionRoutes('add-voucherentry', VoucherentriesController::class, 'voucherentry');
permissionRoutes('view-voucherentry', VoucherentriesController::class, 'voucherentry');
permissionRoutes('edit-voucherentry', VoucherentriesController::class, 'voucherentry');
permissionRoutes('delete-voucherentry', VoucherentriesController::class, 'voucherentry');

permissionRoutes('add-buyerpayment', BuyerpaymentController::class, 'buyerpayment');
permissionRoutes('view-buyerpayment', BuyerpaymentController::class, 'buyerpayment');
permissionRoutes('edit-buyerpayment', BuyerpaymentController::class, 'buyerpayment');
permissionRoutes('delete-buyerpayment', BuyerpaymentController::class, 'buyerpayment');
permissionRoutes('add-supplierpayment', SupplyController::class, 'supplierpayment');
permissionRoutes('view-supplierpayment', SupplyController::class, 'supplierpayment');
permissionRoutes('edit-supplierpayment', SupplyController::class, 'supplierpayment');
permissionRoutes('delete-supplierpayment', SupplyController::class, 'supplierpayment');
permissionRoutes('add-supplier', SupplierController::class, 'supplier');
permissionRoutes('view-supplier', SupplierController::class, 'supplier');
permissionRoutes('edit-supplier', SupplierController::class, 'supplier');
permissionRoutes('delete-supplier', SupplierController::class, 'supplier');

permissionRoutes('add-s-category',  SupplierCategoryController::class , 'scategory');
permissionRoutes('view-s-category',  SupplierCategoryController::class , 'scategory');
permissionRoutes('edit-s-category',  SupplierCategoryController::class , 'scategory');
permissionRoutes('delete-s-category',  SupplierCategoryController::class , 'scategory');

permissionRoutes('add-s-type', SuppliertypeController::class, 'suppliertype');
permissionRoutes('view-s-type', SuppliertypeController::class, 'suppliertype');
permissionRoutes('edit-s-type', SuppliertypeController::class, 'suppliertype');
permissionRoutes('delete-s-type', SuppliertypeController::class, 'suppliertype');

permissionRoutes('add-buyer', BuyerController::class, 'buyer');
permissionRoutes('view-buyer', BuyerController::class, 'buyer');
permissionRoutes('edit-buyer', BuyerController::class, 'buyer');
permissionRoutes('delete-buyer', BuyerController::class, 'buyer');

permissionRoutes('add-b-category', BuyercategoryController::class, 'buyercategory');
permissionRoutes('view-add-b-category', BuyercategoryController::class, 'buyercategory');
permissionRoutes('edit-add-b-category', BuyercategoryController::class, 'buyercategory');
permissionRoutes('delete-add-b-category', BuyercategoryController::class, 'buyercategory');

permissionRoutes('add-b-type', BuyertypeController::class, 'buyertype');
permissionRoutes('view-b-type', BuyertypeController::class, 'buyertype');
permissionRoutes('edit-b-type', BuyertypeController::class, 'buyertype');
permissionRoutes('delete-b-type', BuyertypeController::class, 'buyertype');

permissionRoutes('add-b-type', BuyertypeController::class, 'buyertype');
permissionRoutes('view-b-type', BuyertypeController::class, 'buyertype');
permissionRoutes('edit-b-type', BuyertypeController::class, 'buyertype');
permissionRoutes('delete-b-type', BuyertypeController::class, 'buyertype');

permissionRoutes('view-b-uploader', BuyeruploadController::class, 'buyerupload');
permissionRoutes('view-s-uploader', SupplieruploaderController::class, 'supplierupload');

Route::resource('userrole',User_role_controller::class);
Route::resource('users',Usercontroller::class);
Route::resource('productuploader',UploaderController::class);
Route::resource('employees',EmpController::class);
Route::resource('permission',PermissionController::class);
Route::resource('/roleaccess',RoleAccessController::class);
Route::resource('role',RoleController::class);
Route::resource('accesspermit',AccessPermitController::class);

// Route::resource('costcenter',CostcenterController::class);
// Route::resource('company_info',Emp_Company_Info_Controller::class);
// Route::resource('emp_payroll',Emp_Payroll_Controller::class);
// Route::resource('emp_document',Emp_Document_Controller::class);


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
Route::resource('bank',BankController::class);
Route::resource('province',ProvinceController::class);
Route::resource('state',StateController::class);
Route::resource('event',EventController::class);
Route::resource('product',ProductController::class);
Route::get('/fetch-employee-data/{role_id}', [AccessPermitController::class, 'fetchEmployeeData']);

Route::resource('supplier',SupplierController::class);
Route::resource('buyer',BuyerController::class);
Route::resource('buyercategory',BuyercategoryController::class);
Route::resource('buyertype',BuyertypeController::class);
Route::resource('scategory',SupplierCategoryController::class);
Route::resource('suppliertype',SuppliertypeController::class);
Route::resource('buyerpayment',BuyerpaymentController::class);
Route::resource('supplierpayment',SupplyController::class);

Route::resource('supplierupload',SupplieruploaderController::class);



Route::resource('purchaserequisition',PurchasereuquisitionController::class);
Route::resource('account-store',AccountController::class);


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

// Suplier Uploader CSV
Route::get('suplieruploadcsv',[SupplieruploaderController::class ,'suplieruploadercsv'])->name('suplieruploadcsv');

// Buyer Uploader CSV
Route::get('buyeruploadcsv',[BuyeruploadController::class ,'buyeruploadercsv'])->name('buyeruploadcsv');


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
// for supplier Route
Route::post('/productupload',[UploaderController::class ,'store'])->name('productupload');
Route::post('/supplierupload',[SupplieruploaderController::class ,'store'])->name('supplierupload');


Route::resource('buyerupload',BuyeruploadController::class);
Route::post('/buyerupload',[BuyeruploadController::class ,'store'])->name('buyerupload');
Route::get('downloadcsv', [UploaderController::class ,'downloadCsv'])->name('downloadcsv');
Route::get('downloadexcel', [UploaderController::class ,'downloadExcel'])->name('downloadexcel');
// Create a route in your web.php file to handle the AJAX request.

Route::get('/get-uom/{id}', [PurchasereuquisitionController::class, 'getUOM']);
});
