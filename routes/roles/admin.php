<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Route;

Route::get('check', function () {
    return 'admin here';
});

Route::get('users/{uuid}', [Auth\RegisterController::class, 'loadProfileByUuid']);

Route::apiResource('posts', Admin\PostsController::class);

Route::fallback(function () {
    return response()->json([
        'message' => 'API Route Not Found. If error persists, contact the developers',
    ], 404);
});
