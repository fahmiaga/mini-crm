<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\SellSummaryController;
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

// Route::get('/', function () {
//     return view('auth/login');
// });
// Route::get('/companies', function () {
//     return view('companies');
// });
// Route::get('/employees', function () {
//     return view('employees');
// });

// Route::group([
//     'middleware' => 'web',
//     'prefix' => 'auth'
// ], function ($router) {
//     // $token = Session::get('token');
//     // if ($token != null) {
//     //     Route::resource('companies', CompanyController::class);
//     //     Route::resource('employees', EmployeeController::class);
//     // }
// });
Route::post('login-with-jwt', [AuthController::class, 'loginWithJwt']);
Route::get('/', [AuthController::class, 'index']);


// Route::post('login', [LoginController::class, 'loginJwt'])->name('login');
Route::middleware('session.has.token')->group(function () {
    Route::post('logout-with-jwt', [AuthController::class, 'logoutWithJwt'])->name('logout-with-jwt');
    Route::resource('companies', CompanyController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('items', ItemController::class);
    Route::resource('sells', SellController::class);
    Route::resource('sells-summary', SellSummaryController::class);
    Route::get('sells-summary-per-day', [SellSummaryController::class, 'summaryPerDay'])->name('sells-summary-per-day');
    Route::post('detail-summary-per-day', [SellSummaryController::class, 'detailPerday'])->name('detail-summary-per-day');
    Route::post('import_companies', [CompanyController::class, 'importCompany'])->name('import_company');
    Route::get('export_companies', [CompanyController::class, 'exportCompany'])->name('export-company');
    Route::post('import_employees', [EmployeeController::class, 'importEmployee'])->name('import-employee');
    Route::get('export_employees', [EmployeeController::class, 'exportEmployee'])->name('export-employee');
    Route::post('change-password/{id}', [EmployeeController::class, 'changePassword'])->name('change-password/{id}');
    Route::post('get-timezone', [CompanyController::class, 'getTimezone']);
});




// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
