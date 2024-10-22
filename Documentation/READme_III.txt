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
    