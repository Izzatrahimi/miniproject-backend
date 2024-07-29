<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ParcelTrackingController;
use App\Http\Controllers\ParcelController;
  
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// User route to get the authenticated user
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Registration route
Route::post('register', [UserController::class, 'register']);

// Login route
Route::post('login', [UserController::class, 'login'])->name('login');

// Logout route
Route::post('logout', [UserController::class, 'logout'])->middleware('auth:sanctum');

// Parcel tracking route with authentication
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/index', [ParcelTrackingController::class, 'index'])->name('index');
});


