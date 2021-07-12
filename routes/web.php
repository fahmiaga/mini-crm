<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

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

Route::get('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return view('auth/login');
});
// Route::get('/companies', function () {
//     return view('companies');
// });
// Route::get('/employees', function () {
//     return view('employees');
// });


Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
Route::post('import_companies', [CompanyController::class, 'importCompany'])->name('import_company');
Route::get('export_companies', [CompanyController::class, 'exportCompany'])->name('export-company');
Route::post('import_employees', [EmployeeController::class, 'importEmployee'])->name('import-employee');
Route::get('export_employees', [EmployeeController::class, 'exportEmployee'])->name('export-employee');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
