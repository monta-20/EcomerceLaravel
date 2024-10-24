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
        //use model relationship (function products in categories model) in this case but it the same solution 
        $products = $category->products;
        //dd($products);
        $categories = Category::all(); //get all categories from DB.        
        return view('guest.shop')->with('categories',$categories)->with('products',$products);
    }

    public function search(Request $request){
        //dd($request);
        
       // Retrieve all products where the name contains the specified keyword(s)
       // The 'LIKE' SQL operator is used for a partial match, searching for products
       // whose name includes the value provided in the request's 'keywords' field
       $products = product::where('name', 'LIKE', '%' . $request->keywords . '%')->get();    //o search dynamically not static
       // dd($products);
       $categories =Category::all();

       return view('guest.shop')->with('categories',$categories)->with('products',$products);

    }
}
