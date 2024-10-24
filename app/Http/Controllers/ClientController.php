<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    // Print Dashbaord for client 
    public function dashboard(){
        return view('client.dashboard');
    }

    //Profile client
    public function profile(){
        return view('client.profile');
    }

    //update client profile in DB
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
        return redirect('/client/profile')->with('success','Client update with success');
    }
}
