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

    public function productDetails(){
        $categories = Category::all(); //get all categories from DB.        
        return view('guest.product-details')->with('categories',$categories);
    }
}
