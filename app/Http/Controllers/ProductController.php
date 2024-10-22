<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = product::all();
        return view('admin.products.index')->with('products',$products);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Uncomment this line for debugging purposes to see the details of the uploaded file
        // dd($request->file('photo'));

        // Retrieve the uploaded file from the request ('photo' field from the form)
        $image = $request->file('photo');
        
        // Uncomment these lines to display the image's original extension, name, and path for debugging purposes
        // echo $image->getClientOriginalExtension(); // Displays the file extension, e.g., 'jpg', 'png'
        // echo $image->getClientOriginalName(); // Displays the original file name
        // echo $image->getClientOriginalPath(); // This method is not valid in Laravel, you can remove it
        
        // Set the destination folder where the uploaded file will be stored
        $destinationPath = 'uploads';
        
        // Move the uploaded image to the 'uploads' folder and give it the original file name
        $image->move($destinationPath, $image->getClientOriginalName());

    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
