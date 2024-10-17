<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Print Dashbaord for admin 
    public function dashboard(){
        return view('admin.dashboard');
    }
}
