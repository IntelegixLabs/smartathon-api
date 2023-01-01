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

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
});

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

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::post('/co-ordinate', [CoOrdinateController::class, 'store']);
});
