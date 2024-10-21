11. Admin : Products
    - php artisan make:model product -mc
    - Colum : name,description,price,quantity,photo
    - create table locally : php artisan migrate
    - change web.php to create route of products.
    - resources\views\admin\products\index.blade.php => is copy from resources\views\admin\categories\index.blade.php
     and change the code
    - create index function in productController