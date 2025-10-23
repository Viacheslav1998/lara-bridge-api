<?php 

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Analytics\UserAnalyticsController;



// tests
// Route::get('/test-log', function() {
//   Log::error('test logger');
//   return 200;
// });



Route::prefix('analytics')->group(function() {
	Route::get('users/test', [UserAnalyticsController::class, 'test']);
	// ...
});


// Resource 

/**
 * Default get All users [/users-filters]
 * find by key [country, first_name]
 * users-filters?country=UK
 */
Route::Resource('/users', UserController::class);