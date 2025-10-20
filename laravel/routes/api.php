<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Log;

// Users

Route::get('/users-filters', [UserController::class, 'index']);
// Route::get('/users', [UserController::class, '']);

// tests
// Route::get('/test-log', function() {
//   Log::error('test logger');
//   return 200;
// });

// Resource >
