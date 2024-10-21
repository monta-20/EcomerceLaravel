<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{   
    //List Category
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
    //Delete Category
    public function destroy($id){
      $categories =Category::find($id);
      if($categories->delete()){
        return redirect()->back();
      }
 
    }
    //Edit Category
    public function update(Request $request){
      $request->validate([
        'name'=>'required',
        'description'=>'required'
      ]);

      $id = $request->id_category;
      //dd($id);
      $category =Category::find($id);
      $category->name = $request->name;
      $category->description = $request->description;

      if($category->update()){
        return redirect()->back();
      }
      else{
        echo "Error";
      }
      
      
    }

}
