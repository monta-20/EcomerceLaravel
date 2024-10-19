<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        //in adding new categories
        $categories = Category::all();

        return view("admin.categories.index")->with('categories',$categories);
    }
    //Add category
    public function store(Request $request){
          $request->validate([
            'name'=>'required',
            'description'=>'required'
          ]);

          //Creation new category so We deserve it Category model
          $category = new Category();
          $category->name = $request->name;
          $category->description = $request->description;

          $category->save(); //save data on DB

          return redirect()->back(); //render in the same page

    }
}
