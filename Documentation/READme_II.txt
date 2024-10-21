7. Administration - Add Category
   - add name on two input(name,description) in index.blade.php
      -Task : add category in DB.
      -Path : '/admin/categories/store/'
      -Treatment: in CategoryController function store
      -Result: redirection to list of category('/admin/categories')
   - Is the same thing for last example he add error for inputs
   - in index.blade.php i print list of categories in this page (@error ,@foreach ,POST,action='/admin/categories/store')
   - in CategoryController ==>
          /*
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
            
                      return redirect()->back(); //to redirect the user to the previous page. ==>render in the same page mean when
                      // i add it should not redirect to another page
            
                }
         */

         /*
            public function index(){
                //in adding new categories
                $categories = Category::all(); //retrieves all data from DB.
        
                return view("admin.categories.index")->with('categories',$categories); /*/render to use in view
            }
         */   
8. Administration - Edit & Delete Category
            Delete
     -Task: Delete Category
     -Path: '/admin/category/delete/{id}'
     -Treatment: CategoryController =>function destroy
     -Result: redirection to list of category('/admin/categories')
             Edit
    -Task: Edit Category
    -Path: '/admin/category/update'
    -Treatment: CategoryController =>function update
    -Result: redirection to list of category('/admin/categories')       
9. @include directive
   - Each page navbar and sidebar duplicate ==> solution include
   - Create new folder inc\admin (resources\views\inc\admin) and in this two folder Create
   two view sidebar.blade.php and nav.blade.php
   - after that copy code sidebar and navbar in this two files and call that by @include in they files.
   There many other things :
      . @extends ==> Specifies that the current view is inheriting (or extending) a layout or base template.
      -- Usage: When you want to create a child view that inherits a layout. The @extends directive is 
      typically placed at the top of the Blade file.(in the top of file)
      ---- Example:  @extends('layouts.app')
           This tells Laravel that the current view will extend the app.blade.php layout in the layouts folder.
           Scenario: Useful for when you want to build a template that follows a consistent layout across different 
           pages, like a master layout with a header and footer.

       . @section ==> Defines content sections within a layout. Used to define blocks of content that will be 
       injected into specific places within the parent template.
      -- Usage: Inside a child view, you define sections that correspond to @yield placeholders in the layout.
      ---- Example:  @section('content')
                       <p>This is the content of the page.</p>
                     @endsection
           This section will fill in the @yield('content') from the parent template.     
