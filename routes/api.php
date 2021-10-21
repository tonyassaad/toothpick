<?php

use App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes Handle Common Routes for admin and web
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     //  return $request->user();
// });
Route::get('check', function () {
    return 'api here';
});


Route::prefix('user/')->group(function () {
    Route::post('{uuid}/edit-profile', [Auth\RegisterController::class, 'editProfile']);
    Route::get('{uuid}/', [Auth\RegisterController::class, 'getProfile']);
});
