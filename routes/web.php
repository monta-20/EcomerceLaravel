<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Add this line
//return view pages
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route to page admin/dashboard
Route::get('/admin/dashboard',[App\Http\Controllers\AdminController::class, 'dashboard']);

//Route to page client/dashboard
Route::get('/client/dashboard',[App\Http\Controllers\ClientController::class, 'dashboard']);