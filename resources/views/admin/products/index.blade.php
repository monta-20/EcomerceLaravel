<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Products Management</title>
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link href="{{ asset('dashassests/css/phoenix.min.css') }}" rel="stylesheet" id="style-default">
    <link href=""{{ asset('dashassests/css/user.min.css') }}"" rel="stylesheet" id="user-style-default">
    <style>
      body {
        opacity: 0;
      }
      
        /* Custom styling for table background color */
        .custom-table {
            background-color: #F1EAD2;
        }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
                 {{-- include sidebar and navbar code --}}

        @include('inc.admin.sidebar')
        @include('inc.admin.nav')
        <div class="content">
          <div class="pb-5">
           <!-- Button to trigger modal -->
           <div class="container mt-3">
           
            
            <!-- Inline Add Product Button and Search Form -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px;">
              <button 
                type="button" 
                class="btn btn-primary" 
                data-bs-toggle="modal" 
                data-bs-target="#productModal" 
                style="margin-right: 10px;"
              >
                Add Product
              </button>
              
              <div style="background-color: #F1EAD2;  border-radius: 8px; flex: 1;">
                <form action="/admin/product/search/" method="POST" style="display: flex; align-items: center;">
                  @csrf
                  <input 
                    type="text" 
                    name="product_name" 
                    placeholder="Search" 
                    style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-right: 10px; font-size: 16px;"
                  >
                  <input 
                    type="number" 
                    name="quantity" 
                    min="1"
                    placeholder="Quantity"
                    style="flex: 0.5; padding: 8px; border: 1px solid #ccc; border-radius: 4px; margin-right: 10px; font-size: 16px;"
                  >
                  <button 
                    type="submit" 
                    style="background-color: #4CAF50; color: white; padding: 8px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; font-weight: bold;"
                  >
                    Search
                  </button>
                </form>
              </div>
              
            </div>
          
            
          </div>
          
                
                <table class="table table-bordered table-hover custom-table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($products as $index=>$product )
                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }} TND</td>
                            <td>{{ $product->quantity }}</td>
                            <td><img src="{{ asset('uploads') }}/{{ $product->photo }}" alt="{{ $product->name }}" style="width: 50px;"></td>
                            <td>
                              <button type="button" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#modifyProductModal{{ $product->id }}">
                                Edit
                              </button>
                                <a onclick="return confirm('Are you sure to delete ?')" href="/admin/product/delete/{{ $product->id }}"><button class="btn btn-sm btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
          
         @include('inc.admin.footer')
         
        </div>
      </div>
    </main>
   
    <!-- Add Product Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="background-color: #F1EAD2;">
            <div class="modal-header">
              <h5 class="modal-title" id="productModalLabel">Add New Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <!-- Form for adding products -->
              <form id="addProductForm" method="POST" action="/admin/product/store" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="productName" class="form-label">Category Product</label>
                  <select name="category" class="form-control">
                    @foreach ($categories as $c )
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                  </select>
                  @error('name')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="productName" class="form-label">Product Name</label>
                  <input type="text" class="form-control" id="productName" name="name" value="{{ old('name') }}">
                  @error('name')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="productDescription" class="form-label">Description</label>
                  <textarea class="form-control" id="productDescription" name="description" rows="3">{{ old('description') }}</textarea>
                  @error('description')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="productPrice" class="form-label">Price</label>
                  <input type="number" step="0.01" class="form-control" id="productPrice" name="price" value="{{ old('price') }}">
                  @error('price')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="productQuantity" class="form-label">Quantity</label>
                  <input type="number" class="form-control" id="productQuantity" name="quantity" value="{{ old('quantity') }}">
                  @error('quantity')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <div class="mb-3">
                  <label for="productPhoto" class="form-label">Photo URL</label>
                  <input type="file" class="form-control" id="productPhoto" name="photo" value="{{ old('photo') }}">
                  @error('photo')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Save Product</button>
              </form>
            </div>
          </div>
        </div>
    </div>
    
    <!-- Modal for modifying products -->
    @foreach ($products as $product)
    <div class="modal fade" id="modifyProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="modifyProductModalLabel{{ $product->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modifyProductModalLabel{{ $product->id }}">Modify Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <!-- Form to modify the product -->
                    <form id="modifyProductForm{{ $product->id }}" method="POST" action="/admin/product/update">
                        @csrf
                        <img src="{{ asset('uploads') }}/{{ $product->photo }}" alt="{{ $product->name }}" style="width: 50px;">
                        {{-- it's necessary to use id in controller --}}
                        <input type="hidden" name="id_product" value="{{ $product->id }}">

                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="productDescription" name="description" rows="3">{{ $product->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" step="0.01" class="form-control" id="productPrice" name="price" value="{{ $product->price }}">
                        </div>

                        <div class="mb-3">
                            <label for="productQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="productQuantity" name="quantity" value="{{ $product->quantity }}">
                        </div>

                        <div class="mb-3">
                            <label for="productPhoto" class="form-label">Photo URL</label>
                            <input type="file" class="form-control" id="productPhoto" name="photo" value="{{ $product->photo }}">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    
    <script src="{{ asset('dashassests/js/phoenix.js') }}"></script>
  </body>

</html>