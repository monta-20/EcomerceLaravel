11. Admin : Products
    - php artisan make:model product -mc
    - Colum : name,description,price,quantity,photo
    - create table locally : php artisan migrate
    - change web.php to create route of products.
    - resources\views\admin\products\index.blade.php => is copy from resources\views\admin\categories\index.blade.php
     and change the code
    - create index function in productController
12. Upload File 
    - Photo is translate from his place(Bureau) to under my folder of project ==> this is object
    - must input type="file" and in form add enctype="multipart/form-data" is essential 
    ===><form method="POST" action="/admin/product/store" enctype="multipart/form-data">
    - change code in productController
13. Store and Destroy Product
    - problem when i upload same name of image the image is not upload =>solution uniqid() function
    - add new product in store function at ProductController
    - delete product in destroy function at ProductController
    - Problem when i delete in browser product iamge is not delete in my uploads files ==> solution unlink($file_path) function
14. Update Product 
    - update product 
    - check if image exist delete and update to new image in ProductController@update
15. Models Relationship
    - each product continued categories.
    - i add new category_id (foreign key) in product table and continued with id (primary key) in categories table. 
    ===> on migrations_categories :$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
    - php artisan migrate:refresh ==> update DB and delete all
    - create new register : php artisan db:seed --class=AdminSeeder
    - i add select in add category for select correspond category of product
16. Integrate eshopper template
    - integrate new template eshopper and this link : https://themewagon.com/themes/eshopper-free-responsive-bootstrap-4-e-commerce-website-template/
    - create new page : guest.blade.php and copy index.html from template this page guest means when client or admin visit
    localhost:8000/ give this page not login or logout 
    - create new controller Guest : php artisan make:controller GuestController
    - get all product and categories and upload in page guest.blade.php
17. Integrate eshopper template
    - Split home page in multiple pages in inc/guest/....
    - call in home.blade.php by @include 
    - create details page for product name : product-details.blade.php (Topbar,navbar,Content(is copy from detail.html in template),Footer)
18. Guest Product Details Page
    - Create Details page and add some change (view in commit)
    - in home page(/) i hope when i click on category give my all product continued for this category
    - i copy shop(template) in shop.blade.php and make change
19. Guest List of products in category
    - complete the List of products in category 
20. Guest Product Search
    -  Search product in input (/)
    - Use dynamic search by LIKE in SQL   
21. Admin Edit Profile
    - in this section is update name , email of admin and password if hope to change (profile.blade.php)
    - click in profile in edit profile 
    - Auth::user() : all data of User
    - create flash_message to store success and error message and used in multiple blade     
22. Client Edit Profile
    - same principal in Admin Edit Profile 
23. Client Add Product Review
    - create new table review : php artisan make:migration create_reviews_table //two fields : rate , content
    - create model : php artisan make:model Review
    - Relationship User/Review (oneToMany) : each user can add at least one review
    - Relationship Review/Products (oneToMany) : each review can add at least one review
    - valid migration : php artisan migrate
    - i valid middleware again
    - must understand better relationship in database OK.
24.  Client Order && Order Line (1)
    - when client send commands 
    - first i connect client not admin  
    - create new DB Commande : php artisan make:model Commande -mc
    - create new DB Commande : php artisan make:model LigneCommande -mc
    - Diagram Relationship : 
 Users
 └───< hasMany >───┐
                   |
                Commandes
                   └───< hasMany >───┐
                                     |
                                LigneCommandes
                                     └───< belongsTo >─── Products
    - you can more explain in browser : explain relation for commandes ,lignecommandes,product and user table to send command
    - php artisan migrate
25. Client Order && Order Line (2)
    -  in url : http://127.0.0.1:8000/products/details/{id} (page details) There is button "Add To Cart" when i click
    on this button direct me to cart page
    - create web (url) and store function in 
    OBJECTIVE :
    The objective of this code is to handle the process of placing an order (or adding products to an existing order) for an authenticated user in an e-commerce system. Specifically:

     Check if the User has an Ongoing Order:
     If a command (order) is already in progress for the current authenticated user (Auth::user()), a new line item (product and quantity) is added to that order.
     Create a New Order:
     If no order is in progress, a new order is created for the user, and a line item is added to the newly created order.
     Example Scenario:
     User Adds a Product to an Existing Order:
     
     A user has already started an order, and it's in progress. When they add a product (e.g., a smartwatch) to the order, the system adds this product as a line item to the existing order.
     User Starts a New Order:
     
     If the user doesn't have any ongoing orders, the system creates a new order, associates it with the user, and then adds the selected product as a line item in that new order.

26. Client card 
    - add page card for print the line of Commands 
27. Client Cart remove product and edit quantity
    - Update Quantity of product commands to avoid duplicate same product command
    - Remove command
28.  Client Cart , Total , checkout
    - Calculate total of commands
    - Proceed checkout i not not use gateway example(paypal ,flousi,...) but i just valid command 
29 . Client commandes
    - print all commands of user 
30. Admin : Block User(1)
    - Give List of Client account and print
    - Block User 
       - i add field in DB (isactive) in table users for controller user blocked or not.
       - php artisan make:migration add_is_active --table=users //add field in table users => add field in database without loss all data
          -- this file add field : database\migrations\2024_10_25_111802_add_is_active.php
       - php artisan migrate
30. Admin : Block User(2)
       - i can active or blocked client
       - verify client is not do anything after blocked =>middleware
       - php artisan make:middleware Isactive
       - create blocked.blade.php for print message blocked client
31. Admin orders 
       - Print all commands in admin

