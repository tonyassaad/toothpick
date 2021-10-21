<?php
use App\Http\Controllers\Auth;
use App\Http\Controllers\WebPortal;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

if (App::environment('production')) {
    URL::forceScheme('https');
}
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('reset', function () {
    Artisan::call('route:clear');
    Artisan::call('optimize:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
});


/**-----------------Web user login END--------------------------------*/

Route::prefix('user/')->group(function () {
    Route::post('login', [Auth\LoginController::class, 'login']);
    Route::post('logout', [Auth\LoginController::class, 'logout']);
     Route::get('{uuid}/reset-password', [Auth\ForgotPasswordController::class, 'getCreatePassword'])->name('reset-password')->middleware('signed');
 });

/*************************************************************************************
 *
 *  All the routs related to the web portal guest API
 *
/*************************************************************************************/

Route::prefix('web')->group(function () {

});


Route::fallback(function () {
    return response()->json([
        'message' => 'API Route Not Found. If error persists, contact the developers Tony',
    ], 404);
});
