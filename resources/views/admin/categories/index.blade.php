<!doctype html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Phoenix</title>
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
                 {{-- include sidebar and navber code --}}

        @include('inc.admin.sidebar')
        @include('inc.admin.nav')
        <div class="content">
          <div class="pb-5">
           <!-- Button to trigger modal -->
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                      Add Category
              </button>
               {{-- lists categories in table  --}}
               <div class="container mt-5">
                <h2 class="mb-4">Categories</h2>
                <table class="table table-bordered table-hover custom-table">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($categories as $index=>$c )
                        <tr>
                            <td>{{ $index + 1}}</td>
                            <td>{{ $c->name }}</td>
                            <td>{{ $c->description }}</td>
                            <td>
                              <button type="button" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#modifyCategoryModal{{ $c->id }}">
                                Edit
                              </button>
                                <a onclick="return confirm('Are you sure to delete ?')" href="/admin/category/delete/{{ $c->id }}"><button class="btn btn-sm btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        
          </div>
         
          @include('inc.admin.footer')
        </div>
      </div>
    </main>
   
    
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
          <form id="addCategoryForm" method="POST" action="/admin/categories/store">
            @csrf
            <div class="mb-3">
              <label for="categoryName" class="form-label">Category Name</label>
              <input type="text" class="form-control" id="categoryName" name="name" value = {{ @old('name') }}>
              @error('name')
                <div class="alert alert-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="mb-3">
              <label for="categoryDescription" class="form-label">Description</label>
              <textarea class="form-control" id="categoryDescription" name="description" rows="3" value = {{ @old('description') }}></textarea>
              @error('name')
                <div class="alert alert-danger">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary w-100">Save Category</button>

            
            
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Button to trigger the modal -->
  @foreach ($categories as $index => $c)
  <!-- Modal Updating -->
  <div class="modal fade" id="modifyCategoryModal{{ $c->id }}" tabindex="-1" aria-labelledby="modifyCategoryModalLabel{{ $c->id }}" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="modifyCategoryModalLabel{{ $c->id }}">Modify Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- Form to modify the category -->
                  <form id="modifyCategoryForm{{ $c->id }}" method="POST" action="/admin/categories/update">
                      @csrf
                      <!-- Hidden input for category ID -->
                      <input type="hidden" name="id_category" value="{{ $c->id }}">

                      <!-- Category Name Input -->
                      <div class="mb-3">
                          <label for="categoryName{{ $c->id }}" class="form-label">Category Name</label>
                          <input type="text" class="form-control" id="categoryName{{ $c->id }}" name="name" value="{{ $c->name }}">
                          @error("name")
                              <div class="alert alert-danger">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>

                      <!-- Category Description Input -->
                      <div class="mb-3">
                          <label for="categoryDescription{{ $c->id }}" class="form-label">Category Description</label>
                          <textarea class="form-control" id="categoryDescription{{ $c->id }}" name="description" rows="3">{{ $c->description }}</textarea>
                          @error("description")
                              <div class="alert alert-danger">
                                  {{ $message }}
                              </div>
                          @enderror
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary" form="modifyCategoryForm{{ $c->id }}">Save Changes</button>
              </div>
          </div>
      </div>
  </div>
@endforeach

    <script src="{{ asset('dashassests/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassests/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>