1. Authentication 
   -- composer require laravel/ui
     ===> Once installed, you can scaffold the frontend 
     authentication and UI components (like Bootstrap, Vue, or React)
     ===> To add authentication scaffolding in Laravel using the Laravel 
     UI package, you can generate the necessary views, routes, and controllers
     for user authentication (login, registration, password reset, etc.).
   --  php artisan ui bootstrap --auth 
     ===> For Bootstrap authentication scaffolding
   -- run : npm install
   -- run : npm run dev 
   -- in views folder auth , layout and file home.blade.php and in app/Http/Controllers/Auth all this files follow install Auth.
   -- php artisan migrate : create table Users is the table responsable for register , login and logout.
   -- Ican register and login and logout and all data stored in table Users.
   -- visit : http://127.0.0.1:8000/home
   -- must run two server : php artisan serve | npm run dev
   - COLOR NAVBAR : #365194
   - OTHERs COLORs : #F1EAD2

2. Authentication : Roles
   - i add field in DB role So in migrations :
      ==> $table->enum('role',['admin','user'])->default('user'); //by default user
   - in Models/User.php add role 
      ===>  protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];
    - php artisan migrate:refresh  // If you're in development/testing environnement and don't mind losing data (لا تمانع في فقدان البيانات)
    - php artisan migrate:rollback // En mode production ,if you ever need to undo the last migration without losing your entire database
    - php artisan migrate:status // You can check which migrations have been run using

3. Seeding : Add Admin
    - seeding : adding fake data to DB
     ==> Seeding in Laravel is a way to populate your database with sample data for testing or development purposes.
    - create new seeder : php artisan make:seeder AdminSeeder
      -- is create on : C:\xampp\htdocs\Ecommerce\database\seeders\AdminSeeder.php 
         In class AdminSeeder.php : I add new user 
           /*    public function run(): void
             {
                 DB::table('users')->insert([
                      [
                         'name' => 'Admin',
                         "email" => "admin@admin.com",
                         "role" => "admin",
                         "password" => Hash::make("123456789") //Hash for hashinmg mdp in DB.
                      ]
                 ]);
             } */
    - Call seeder : php artisan db:seed --class=AdminSeeder
4. Dashboard : Admin & Client
    - We differentiate betwwen client and admin when login and render to different page
    - In views we create two folder admin and client and we create in two dashboard.blade.php
    - create routes :
    /*
             //Route to page admin/dashboard
         Route::get('/admin/dashboard',);
         
         //Route to page client/dashboard
         Route::get('/client/dashboard',);
    */
    -create two controller for admin and client : 
      - php artisan make:controller AdminController
      - php artisan make:controller ClientController
      - So code in controller to render to views : 
         ==> AdminController : public function dashboard(){ return view('admin.dashboard');}
         ==> ClientController : public function dashboard(){ return view('client.dashboard');}
      - Now i remark if i login i enter to home page (home.blade.php) ===> i change this code to when i redirect 
      from user go to user page and other case for client
      This old code in HomeController.php ===>  public function index(){return view('home');}
      So i change this code to :  
              public function index()
            {
               // dd(Auth::user()->role);//find all data for user
               return (Auth::user()->role == 'admin') ? redirect('/admin/dashboard') : redirect('/client/dashboard');
               //return view('home');
            }
5. Integrate Pheonix Dashboard to administration
     - Integrate template Pheonix on admin dashboard 
     - Create dashassests under public folder and i copy css,img,js folder who is under assets folder in template
     - Copyt index.html in admin.dashboard.blade.php and i do change in template 
     - Reamrk : for views image in dashboard must 
     ==> {{ asset('dashassests/....')}} //for access under public folder
      Example : <img src="{{ asset('dashassests/img/nav-icons/trello.png')}}" alt="" width="30">
6 . Administration - Categories Page
     - php artisan make:model Category -mc     ==>  will generate a model, migration, and controller for the Category.
     - in database/migration/2024_10_17_143140_create_categories_table.php ==> add name and description :
      /*
             public function up(): void
           {
               Schema::create('categories', function (Blueprint $table) {
                   $table->id();
                   $table->string('name');
                   $table->text('description');
                   $table->timestamps();
               });
           }
      /*
      - php artisan migrate : create my DB on localy.
          -Task : List of categories
          -Path : "\admin\categories"
          -Treatement : On CategoryController.php in function index.php 
          -Result : Return Page : list.blade.php (Path of file : resources\views\admin\categories\index.blade.php)
      - in file :app\Http\Controllers\CategoryController.php ==>
            /*
            class CategoryController extends Controller
          {
          public function index(){
              return view("admin.categories.index");
          }
      }
      */
      - in file :routes\web.php
        /* Route::get('/admin/categories',[App\Http\Controllers\CategoryController::class, 'index']); */
      - in file index.blade.php ,i copy same code in from dashboard.blade.php and i add modal for add category 
        and correct all href for navigate in page.
        modal:
        /*
        <!-- Button to trigger modal -->
               <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                        Add Category
               </button>
               
               <!-- Modal Structure -->
               <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                   <div class="modal-content" style="background-color: #F1EAD2;">
                     <div class="modal-header">
                       <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                     </div>
                     <div class="modal-body">
                       <!-- Form for adding categories -->
                       <form id="addCategoryForm" method="POST" action="/categories">
                         @csrf
                         <div class="mb-3">
                           <label for="categoryName" class="form-label">Category Name</label>
                           <input type="text" class="form-control" id="categoryName" name="name" required>
                         </div>
                         <div class="mb-3">
                           <label for="categoryDescription" class="form-label">Description</label>
                           <textarea class="form-control" id="categoryDescription" name="description" rows="3" required></textarea>
                         </div>
                         <button type="submit" class="btn btn-primary w-100">Save Category</button>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>
        */  
        