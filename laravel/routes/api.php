<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

Route::get('/test', [UserController::class, 'testGetData']);