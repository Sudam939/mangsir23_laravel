<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
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


Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('post', PostController::class);
    Route::delete('/logout', [AuthController::class, 'logout']);
});

// Auth Routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

