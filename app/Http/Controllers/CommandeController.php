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
    
    // Verify if there is an existing command (order) in progress for the current authenticated client
    $command = Commande::where('client_id', Auth::user()->id)
                       ->where('state', 'in progress') // Check for commands that are still in progress
                       ->first(); // Get the first (and likely only) ongoing command

    // Uncommenting this would display the fetched command for debugging purposes
    // dd($command);

    // If a command already exists for this client in the "in progress" state, add or update the product in the order
    if ($command) {
        // Initialize variable to track if the product already exists in the current order
        $exist = false; // Assume the product doesn't exist in the command

        // Loop through the existing line items (products) of the command to check if the product is already in the order
        foreach($command->lignecommandes as $lineCd) {
            // If the product already exists in the command, update the quantity
            if($lineCd->product_id == $request->product_id) {
                $exist = true; // Mark that the product exists
                $lineCd->quantity += $request->quantity; // Add the new quantity to the existing one
                $lineCd->update(); // Update the line item in the database
            }
        }

        // If the product does not exist in the order, create a new line for the product
        if (!$exist) {
            // Create a new line for the product in the current command
            $LineCommand = new LigneCommande();
            $LineCommand->quantity = $request->quantity; // Set the requested quantity
            $LineCommand->product_id = $request->product_id; // Set the product ID from the request
            $LineCommand->command_id = $command->id; // Associate this line with the current command (order)

            // Save the new line item (product) to the database
            $LineCommand->save();
        }

        // Redirect the client to the cart page with a success message
        return redirect('client/cart')->with("success", "Product added to your command");
    } else {
        // If no command exists for the client, create a new one
        $command = new Commande();
        $command->client_id = Auth::user()->id; // Link the new command to the current authenticated client

        // Save the new command (order) to the database
        if ($command->save()) {
            // Create a new line for the product in the new command
            $LineCommand = new LigneCommande();
            $LineCommand->quantity = $request->quantity; // Set the requested quantity
            $LineCommand->product_id = $request->product_id; // Set the product ID from the request
            $LineCommand->command_id = $command->id; // Link the line to the newly created command

            // Save the new line item (product) to the database
            $LineCommand->save();

            // Redirect the client to the cart page with a success message
            return redirect('client/cart')->with("success", "Product added to your command");
        } else {
            // If the command could not be created, redirect back with an error message
            return redirect('client/cart')->with("error", "Unable to place the product in the command");
        }
    }
}


    //Delete Command
    public function ligneCommandeDestroy($idlc){
        $lc = LigneCommande::find($idlc);
        $lc->delete();
        return redirect()->back()->with("success", "Command Deleting");
    }
}

