<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       // dd(Auth::user()->role);//find all data for user
       if (Auth::check()) {
        // Check the user role
        return (Auth::user()->role == 'admin') 
            ? redirect('/admin/dashboard') 
            : redirect('/');
       }
     
    // If user is not authenticated, show the home page
    return view('home');
    }
}
