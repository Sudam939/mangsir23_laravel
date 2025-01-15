<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\SuperAdmin\AuthController as SuperAdminAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('category/{slug}', [ApiController::class, 'category']);
Route::get('categories', [ApiController::class, 'categories']);
Route::get('company', [ApiController::class, 'company']);
Route::get('trending-posts', [ApiController::class, 'trending_posts']);
Route::post('create-category', [ApiController::class, 'create_category']);


Route::middleware(['auth:sanctum', 'super_admin'])->group(function () {
    Route::apiResource('post', PostController::class);
    Route::delete('/logout', [AuthController::class, 'logout']);
});

// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


// Super Admin Auth Routes
Route::post('/admin/register', [SuperAdminAuthController::class, 'register']);
Route::post('/admin/login', [SuperAdminAuthController::class, 'login']);
