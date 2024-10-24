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