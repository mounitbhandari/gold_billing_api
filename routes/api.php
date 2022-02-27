<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

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
});
