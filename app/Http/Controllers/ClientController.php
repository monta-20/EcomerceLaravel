<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Print Dashbaord for client 
    public function dashboard(){
        return view('client.dashboard');
    }
}
