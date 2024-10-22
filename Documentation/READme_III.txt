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
    ===><form id="modifyProductForm{{ $product->id }}" method="POST" action="/admin/product/update" enctype="multipart/form-data">
    - change code in productController
   