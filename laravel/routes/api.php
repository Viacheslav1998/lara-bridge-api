<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

// tests
Route::get('/test', [UserController::class, 'testGetData']);

// Users
Route::get('/users/{name?}', [UserController::class, 'index']);

// Resource >
