<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $categories = Category::all();
        return view('admin.products.index')->with('products',$products)->with('categories',$categories);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // Create a new instance of the Product model (which represents a row in the products table)
    $product = new product();

    // Assign the product name from the form input (from the request)
    $product->name = $request->name;
    
    // Assign the product description from the form input
    $product->description = $request->description;

    // Assign the product price from the form input
    $product->price = $request->price;

    // Assign the product quantity from the form input
    $product->quantity = $request->quantity;
     
    // Assign the product category from the form input
    $product->category_id = $request->category;
    // Get the uploaded file from the form (the 'photo' input field)
    $image = $request->file('photo');

    // Generate a unique name for the uploaded image using uniqid() function
    $newname = uniqid();

    // Append the file extension of the original image to the unique name
    $newname .= ".".$image->getClientOriginalExtension();

    // Specify the destination folder where the image will be uploaded
    $destinationPath = 'uploads';

    // Move the uploaded image to the specified folder with the new name
    $image->move($destinationPath, $newname);

    // Save the new image filename to the 'photo' field of the product
    $product->photo = $newname;

    // Attempt to save the product to the database
    if($product->save()){
        // If successful, redirect the user back to the previous page (usually the form)
        return redirect()->back();
    }
    else{
        // If saving the product fails, print an error message
        echo "error";
    }
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
        $id = $request->id_product;   
        $product = product::find($id);  // Find the product by ID
        //dd($product);  // Debugging line to inspect the product object
    
        // Assign the updated product details from the form input fields
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
    
        // Check if a new image file is uploaded
        if ($request->file('photo')) {
            // Get the current image file path and delete the old image from the server
            $file_path = public_path() . '/uploads/' . $product->photo;
            if (file_exists($file_path)) {  // Ensure file exists before deleting
                unlink($file_path);
            }
    
            // Generate a unique name for the new image
            $newname = uniqid() . "." . $request->file('photo')->getClientOriginalExtension();
    
            // Define the destination path for the new image
            $destinationPath = 'uploads';
    
            // Move the uploaded new image to the destination folder
            $request->file('photo')->move($destinationPath, $newname);
    
            // Assign the new image filename to the 'photo' field of the product
            $product->photo = $newname;
        }
    
        // Save the updated product details to the database
        if ($product->save()) {
            // Redirect back to the previous page if the update is successful
            return redirect()->back();
        } else {
            // Output an error message if the update fails
            echo "error updating";
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
     //Delete product
     public function destroy($id)
{
    // Find the product in the database by its ID
    $product = product::find($id);

    // Construct the full file path of the product's image by concatenating the public path and the image name
    $file_path = public_path() . '/uploads/' . $product->photo;

    // Uncomment this line to debug and see the file path (for troubleshooting)
    // dd($file_path);

    // Delete the image file from the server using the 'unlink' function to remove the file from the filesystem
    unlink($file_path);

    // If the product is successfully deleted from the database
    if ($product->delete()) {
        // Redirect the user back to the previous page (usually the product list page)
        return redirect()->back();
    }
}

}
