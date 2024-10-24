<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Print Dashboard for admin 
    public function dashboard(){
        return view('admin.dashboard');
    }
    //Profile admin
    public function profile(){
        return view('admin.profile');
    }
    //update profile in DB
    public function updateProfile(Request $request){
        // dd($request);
    
        // Update the currently authenticated user's name with the value from the request input
        Auth::user()->name = $request->name;
    
        // Update the currently authenticated user's email with the value from the request input
        Auth::user()->email = $request->email;
    
        // If a new password is provided in the request, hash it and update the user's password
        if($request->password){
            Auth::user()->password = Hash::make($request->password);
        }
    
        // Save the changes made to the authenticated user in the database
        Auth::user()->update();
    
        // Redirect the user back to the admin profile page with a success message
        return redirect('/admin/profile')->with('success','Admin update with success');
    }
    
}
