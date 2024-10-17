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
      ==> $table->enum('role',['admin','user'])->default('user');
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


 