<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Analytics\UserAnalyticsController;


// tests
Route::get('/test-log', function() {
  Log::error('test logger');
  return 200;
});


Route::get('/', function() {
	return [
		'status' => 'ok',
		'code' => 200,
		'message' => 'nothing a special',
	];
});

// analytics
Route::prefix('analytics')->group(function() {
	Route::get('users/test', [UserAnalyticsController::class, 'test']);
	// ...
});


// Resource | CRUD
Route::Resource('/users', UserController::class);

/**
 * =======
 * Filters
 */
Route::get('/user-filter', [UserController::class, 'filter']);
