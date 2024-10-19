7. Administration - Add Category
   - add name on two input(name,description) in index.blade.php
      -Task : add category in DB.
      -Path : '/admin/categories/store/'
      -Treatement: in CategoryController funcion store
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
                $categories = Category::all(); //retrives all data from DB.
        
                return view("admin.categories.index")->with('categories',$categories); /*/render to use in view
            }
         */   

   