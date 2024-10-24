<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    // Add a new command (order)
    public function store(Request $request){
        // Uncommenting this would display the request data for debugging purposes
        // dd($request);
        
        // Verify if there is an existing command in progress for the current authenticated client
        $command = Commande::where('client_id', Auth::user()->id)
                           ->where('state', 'in progress')
                           ->first();
        // Uncommenting this would display the fetched command for debugging purposes
        // dd($command);

        // If a command already exists for this client in "in progress" state, create a new line for the order
        if ($command) {
            // Create a new Line Command for the existing command
            $LineCommand = new LigneCommande();
            $LineCommand->quantity = $request->quantity; // Set the quantity from the request
            $LineCommand->product_id = $request->product_id; // Set the product from the request
            $LineCommand->command_id = $command->id; // Associate with the existing command

            // Save the new Line Command to the database
            $LineCommand->save();

            // Redirect to the cart or display success message
            echo 'Yes';
        } else {
            // If no command exists, create a new one for the client
            $command = new Commande();
            $command->client_id = Auth::user()->id; // Associate the new command with the current authenticated client

            // Save the new command
            if ($command->save()) {
                // Create a new Line Command for the newly created command
                $LineCommand = new LigneCommande();
                $LineCommand->quantity = $request->quantity; // Set the quantity from the request
                $LineCommand->product_id = $request->product_id; // Set the product from the request
                $LineCommand->command_id = $command->id; // Associate with the newly created command

                // Save the Line Command
                $LineCommand->save();

                // Redirect to the cart or display success message
                echo 'Yes';
            } else {
                // If the command couldn't be created, redirect back with an error message
                return redirect()->back()->with("error", "Impossible to command product")->withInput();
            }
        }
    }
}

