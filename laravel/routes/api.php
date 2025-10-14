<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

// tests
Route::get('/test', [UserController::class, 'testGetData']);

// Users
Route::get('/users', [UserController::class, 'index']);

// Resource >
