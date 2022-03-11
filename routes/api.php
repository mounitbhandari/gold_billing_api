<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
Route::post("login",[UserController::class,'login']);

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/me', function (Request $request) {
        return auth()->user();
    });
    Route::get("user",[UserController::class,'getCurrentUser']);
    Route::put("user",[UserController::class,'updatePassword']);
    Route::get("token",[UserController::class,'getBearerToken']);
    Route::get("actualToken",[UserController::class,'actualToken']);
    Route::get("logout",[UserController::class,'logout']);
    Route::get("revokeAll",[UserController::class,'revoke_all']);

    Route::post('customers', [CustomerController::class, 'saveCustomer']);
    Route::delete("customers/{id}",[CustomerController::class, 'delete']);

    //product

    Route::post("products",[ProductController::class,'save_products']);
    Route::get("products",[ProductController::class, 'get_all_products']);

    //company
    Route::get("companies",[CompanyController::class, 'get_all_company']);


});



