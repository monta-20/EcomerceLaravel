<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Add this line
//return view pages
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
