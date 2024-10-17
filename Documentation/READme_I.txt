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
