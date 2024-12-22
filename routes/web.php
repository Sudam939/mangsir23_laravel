<?php

use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/',[PageController::class, 'home'])->name('home');
Route::get('/category/{slug}',[PageController::class, 'category'])->name('cat');
Route::get('/news/{id}',[PageController::class, 'news'])->name('news');


Route::get('/dashboard',[DashboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Admin Routes ctrl+space
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/admin/company', CompanyController::class)->names('company');
    Route::resource('/admin/category', CategoryController::class)->names('category');
    Route::resource('/admin/post', PostController::class)->names('post');
    Route::resource('/admin/advertise', AdvertiseController::class)->names('advertise');

});

require __DIR__.'/auth.php';
