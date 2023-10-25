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
