<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Log;

/**
 * Default get All users [/users-filters]
 * find by key [country, first_name]
 * users-filters?country=UK
 */
Route::get('/users-filters', [UserController::class, 'index']);



// tests
// Route::get('/test-log', function() {
//   Log::error('test logger');
//   return 200;
// });

// Resource >
