<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login-with-sanctum', [AuthController::class, 'loginWithSanctum']);

// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('get-employees-by-company-id', [EmployeeController::class, 'get_employees_by_company_id']);
// });
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('get-employees-by-company-id/{id}', [EmployeeController::class, 'get_employees_by_company_id']);
});
