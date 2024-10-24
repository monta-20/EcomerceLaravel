<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GuestController;
use App\Http\Middleware\admin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Add this line
//return view pages

//Guest Home
Route::get('/', [App\Http\Controllers\GuestController::class, 'home']);

//Guest page for details
Route::get('/products/details/{id}', [App\Http\Controllers\GuestController::class, 'productDetails']);

//Guest shop page
Route::get('/products/{category}/list', [App\Http\Controllers\GuestController::class, 'shop']);

//Search product
Route::post('/products/search', [App\Http\Controllers\GuestController::class, 'search']);

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

//Route List Products
Route::get('/admin/products', [ProductController::class, 'index']);
//Route adding Products
Route::post('/admin/product/store',[App\Http\Controllers\ProductController::class, 'store']);

//Route delete Products
Route::get('/admin/product/delete/{id}',[App\Http\Controllers\ProductController::class, 'destroy']);

//Route updating Products
Route::post('/admin/product/update',[App\Http\Controllers\ProductController::class, 'update']);

//Profile Admin
Route::get('/admin/profile',[App\Http\Controllers\AdminController::class, 'profile']);

//Profile update
Route::post('/admin/profile/update',[App\Http\Controllers\AdminController::class, 'updateProfile']);
