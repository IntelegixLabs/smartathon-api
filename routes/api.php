<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Misc\CoOrdinateController;
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

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

/*
|--------------------------------------------------------------------------
| Test Route Working
|--------------------------------------------------------------------------
|
| Test if API works for getting users
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Set Data
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => ['auth:sanctum', 'user']], function() {
    Route::post('/co-ordinate', [CoOrdinateController::class, 'store']);
});

/*
| Fallback
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return response()->json(['message' => 'Page Not Found'], 404);
});
