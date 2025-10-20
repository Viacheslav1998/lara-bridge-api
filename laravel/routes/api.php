<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Log;

// Users
// Route::get('/users/{name?}', [UserController::class, 'index']);

Route::get('/users', [UserController::class, 'index']);

// tests
Route::get('/test-log', function() {
  Log::info('test logger');
  return 200;
});

// Resource >
