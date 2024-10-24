<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home(){
        $products = product::all(); //get all products from DB.        
        $categories = Category::all(); //get all categories from DB.        
        return view('guest.home')->with('products',$products)->with('categories',$categories);
    }

    public function productDetails($id){
        $product = product::find($id);//get product by id
        // Retrieve all products from the database where the product ID is not equal to the given $id
       // This ensures that the product with the specific $id is excluded from the result
        $products = product::where('id','!=',$id)->get();
        $categories = Category::all(); //get all categories from DB.        
        return view('guest.product-details')->with('categories',$categories)->with('product',$product)->with('products',$products);
    }

    public function shop($id_category){
        $category =Category::find($id_category);
        // Retrieve all products that belong to the specified category
        // The products are fetched where the category_id matches the provided $id_category
       $products = product::where('category_id', $id_category)->get();
        dd($products);
        $categories = Category::all(); //get all categories from DB.        
        return view('guest.shop')->with('categories',$categories);
    }
}
