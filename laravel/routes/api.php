<?php

use App\Http\Controllers\Analytics\UserAnalyticsController;
use App\Http\Controllers\Api\SpaceTestAttentionController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

// tests and logs
Route::get('/test-log', function () {
    Log::error('test logger');
    return 200;
});

Route::get('/', function () {
    return [
        'status' => 'ok',
        'code' => 200,
        'message' => 'nothing a special',
    ];
});

// analytics
Route::prefix('analytics')->group(function () {
    Route::get('/users/test', [UserAnalyticsController::class, 'test']);
    // ...
});

// Resource | CRUD
Route::apiResources([
    'users' => UserController::class,
    'spaces' => SpaceTestAttentionController::class
]);

/**
 * =======
 * Filters [country, first_name, email]
 */
Route::get('/user-filter', [UserController::class, 'filter']);
