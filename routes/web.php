<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GuestController;
use App\Http\Middleware\admin;
use App\Http\Middleware\Isactive;
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
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class, 'dashboard'])->middleware(admin::class,'auth');

//Route to page client/dashboard
Route::get('/client/dashboard',[App\Http\Controllers\ClientController::class, 'dashboard'])->middleware(Isactive::class,'auth');

//Route List Categories
Route::get('/admin/categories', [CategoryController::class, 'index'])->middleware(admin::class);
//Route adding Categories
Route::post('/admin/categories/store',[App\Http\Controllers\CategoryController::class, 'store'])->middleware(admin::class,'auth');

//Route delete Categories
Route::get('/admin/category/delete/{id}',[App\Http\Controllers\CategoryController::class, 'destroy'])->middleware(admin::class,'auth');

//Route updating Categories
Route::post('/admin/categories/update',[App\Http\Controllers\CategoryController::class, 'update'])->middleware(admin::class,'auth');

//Route List Products
Route::get('/admin/products', [ProductController::class, 'index'])->middleware(admin::class,'auth');

//Route adding Products
Route::post('/admin/product/store',[App\Http\Controllers\ProductController::class, 'store'])->middleware(admin::class,'auth');

//Route delete Products
Route::get('/admin/product/delete/{id}',[App\Http\Controllers\ProductController::class, 'destroy'])->middleware(admin::class,'auth');

//Route updating Products
Route::post('/admin/product/update',[App\Http\Controllers\ProductController::class, 'update'])->middleware(admin::class,'auth');

//Profile Admin
Route::get('/admin/profile',[App\Http\Controllers\AdminController::class, 'profile'])->middleware(admin::class,'auth');

//Profile admin update
Route::post('/admin/profile/update',[App\Http\Controllers\AdminController::class, 'updateProfile'])->middleware(admin::class,'auth');

//Admin list of clients
Route::get('/admin/clients',[App\Http\Controllers\AdminController::class, 'client'])->middleware(admin::class,'auth');

//Admin Blocked clients
Route::get('/admin/user/{id}/blocked',[App\Http\Controllers\AdminController::class, 'BlockedClient'])->middleware(admin::class,'auth');

//Admin active clients
Route::get('/admin/user/{id}/active',[App\Http\Controllers\AdminController::class, 'ActiveClient'])->middleware(admin::class,'auth');

//Profile client
Route::get('/client/profile',[App\Http\Controllers\ClientController::class, 'profile'])->middleware('auth');

//Profile client update
Route::post('/client/profile/update',[App\Http\Controllers\ClientController::class, 'updateProfile'])->middleware('auth');

//client Review
Route::post('/client/review/store', [App\Http\Controllers\ClientController::class, 'addReview'])->middleware('auth');

//Client Order Command
Route::post('/client/order/store', [App\Http\Controllers\CommandeController::class, 'store'])->middleware('auth')->middleware(Isactive::class,'auth');

//Client Cart Page Order Command
Route::get('/client/cart', [App\Http\Controllers\ClientController::class, 'cart'])->middleware('auth');

//Client Delete Command
Route::get('/client/lc/{idlc}/destroy', [App\Http\Controllers\CommandeController::class, 'ligneCommandeDestroy'])->middleware('auth');

//Client checkout Command
Route::post('/client/checkout', [App\Http\Controllers\ClientController::class, 'checkout'])->middleware('auth');

//Client list of Command delivery by client
Route::get('/client/commandes', [App\Http\Controllers\ClientController::class, 'mescommandes'])->middleware('auth');

//View when client is blocked
Route::get('/client/blocked', [App\Http\Controllers\ClientController::class, 'printMsg'])->middleware('auth');

//Get all command
Route::get('/admin/commands', [App\Http\Controllers\AdminController::class, 'commands'])->middleware(admin::class,'auth');

//Search product on admin
Route::post('/admin/product/search', [App\Http\Controllers\ProductController::class, 'SearchProduct'])->middleware(admin::class,'auth');
