<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('employees', App\Http\Controllers\EmployeeController::class);
Route::resource('salaries', App\Http\Controllers\SalariesController::class);
Route::resource('departments', App\Http\Controllers\DepartmentsController::class);
Route::resource('banks', App\Http\Controllers\BanksController::class);
Route::resource('documentations', App\Http\Controllers\DocumentationsController::class);
Route::resource('payrolls', App\Http\Controllers\PayrollsController::class);
Route::resource('allowances', App\Http\Controllers\AllowancesController::class);
Route::resource('attendances', App\Http\Controllers\AttendanceController::class);
Route::resource('employeerecords', App\Http\Controllers\EmployeerecordsController::class);
Route::resource('promotions', App\Http\Controllers\PromotionsController::class);
Route::resource('leaves', App\Http\Controllers\LeavesController::class);
Route::resource('leavetypes', App\Http\Controllers\LeavetypesController::class);
Route::resource('deductions', App\Http\Controllers\DeductionsController::class);
Route::post('/upload', [App\Http\Controllers\DocumentationsController::class, 'store'])->name('file.store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('users', App\Http\Controllers\UsersController::class);