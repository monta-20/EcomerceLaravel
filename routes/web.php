<?php

use App\Http\Controllers\CategoryController;
use App\Http\Middleware\admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Add this line
//return view pages
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route to page admin/dashboard
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class, 'dashboard']);//->middleware(admin::class);

//Route to page client/dashboard
Route::get('/client/dashboard',[App\Http\Controllers\ClientController::class, 'dashboard']);

//Route List Categories
Route::get('/admin/categories', [CategoryController::class, 'index']);//->middleware(admin::class);
//Route adding Categories
Route::post('/admin/categories/store',[App\Http\Controllers\CategoryController::class, 'store']);//->middleware(admin::class);

//Route delete Categories
Route::get('/admin/category/delete/{id}',[App\Http\Controllers\CategoryController::class, 'destroy']);//->middleware(admin::class);

//Route updating Categories
Route::post('/admin/categories/update',[App\Http\Controllers\CategoryController::class, 'update']);//->middleware(admin::class);