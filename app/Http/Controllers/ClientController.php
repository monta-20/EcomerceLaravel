<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Commande;
use App\Models\Review;
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

    //add review
    public function addReview(Request $request){
       // dd($request);
       $review = new Review();
       $review->rate = $request->rate;
       $review->product_id = $request->product_id;
       $review->content = $request->content;
       $review->user_id = Auth::user()->id ;
       $review->save();
       return redirect()->back();

    }

    //cart page
    public function cart(){
        $categories = Category::all();
        // Verify if there is an existing command in progress for the current authenticated client
        $command = Commande::where('client_id', Auth::user()->id)
                           ->where('state', 'in progress')
                           ->first();
        return view('guest.cart')->with('categories',$categories)->with('command',$command);
    }
    //checkout
    public function checkout(Request $request){
       // dd($request);

       $command = Commande::find($request->command);
        //dd($command);
        $command->state = "pay";

        $command->update();
        return redirect('client/dashboard')->with('success','Command pay with success!');
    }
    //List of commandes delivery by client 
    public function mescommandes(){
         return view('client.commandes');
     }

     public function printMsg(){
        return view('client.blocked');
     }
}
