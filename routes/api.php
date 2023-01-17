<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ImageCoordsController;
use App\Http\Controllers\Misc\CoOrdinateController;
use App\Http\Controllers\PollutionController;
use App\Models\ImageCoords;
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
Route::get('/auth/user', [AuthController::class, 'showUser'])->middleware('auth:sanctum');

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

// Route::group(['middleware' => ['auth:sanctum', 'user']], function() {
//     Route::post('/co-ordinate', [CoOrdinateController::class, 'store']);
// });

Route::group(['middleware' => ['auth:sanctum', 'admin']], function() {
    Route::get('/admin/pollutions', [PollutionController::class, 'index']);
    Route::get('/admin/pollutions/{pollution_id}', [PollutionController::class, 'showPollution']);
    Route::get('/admin/pollutions/all', [PollutionController::class, 'showAllPollutions']);

    Route::post('/admin/image_coords', [ImageCoordsController::class, 'showAllImageCoords']);
    Route::get('/admin/image_coords/{image_id}', [ImageCoordsController::class, 'showImageCoords']);
    Route::get('/admin/image_coords/{image_id}/unfix', [ImageCoordsController::class, 'unfixImageCoords']);
});
/*
|-------------------------------------------------------------------------
| Image Co-ordinates Storing/Retrieving
|-------------------------------------------------------------------------
*/

Route::post('/image', [ImageCoordsController::class, 'store'])->middleware(['auth:sanctum', 'user']);
Route::get('/image', [ImageCoordsController::class, 'showUser'])->middleware(['auth:sanctum', 'user']);
Route::post('/admin/image', [ImageCoordsController::class, 'update'])->middleware(['auth:sanctum', 'admin']);
Route::get('/admin/image', [ImageCoordsController::class, 'showAdmin'])->middleware(['auth:sanctum', 'admin']);

/*
|--------------------------------------------------------------------------
| Fallback
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return response()->json(['message' => 'Page Not Found'], 404);
});
