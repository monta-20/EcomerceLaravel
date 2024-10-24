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
            <!-- Dashboard Header -->
            <h1 class="mb-4">Dashboard</h1>
          
            <!-- User Welcome Section -->
            <div class="alert alert-primary" role="alert">
              Welcome back, {{ Auth::user()->name }}!
            </div>
          
            <!-- Overview Section -->
            <div class="row mb-4">
              <!-- Total Orders Card -->
              <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                  <div class="card-header">Total Orders</div>
                  <div class="card-body">
                    <h5 class="card-title">15</h5>
                    <p class="card-text">You have placed 15 orders.</p>
                  </div>
                </div>
              </div>
          
              <!-- Wishlist Items Card -->
              <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                  <div class="card-header">Wishlist Items</div>
                  <div class="card-body">
                    <h5 class="card-title">5</h5>
                    <p class="card-text">You have 5 items in your wishlist.</p>
                  </div>
                </div>
              </div>
          
              <!-- Recent Messages/Notifications -->
              <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                  <div class="card-header">Notifications</div>
                  <div class="card-body">
                    <h5 class="card-title">2 New Notifications</h5>
                    <p class="card-text">You have 2 new notifications.</p>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Recent Orders Section -->
            <h2 class="mb-3">Recent Orders</h2>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th scope="col">Order ID</th>
                  <th scope="col">Date</th>
                  <th scope="col">Status</th>
                  <th scope="col">Total</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">#101</th>
                  <td>2024-10-23</td>
                  <td><span class="badge bg-success">Delivered</span></td>
                  <td>120.00 TND</td>
                  <td><a href="#" class="btn btn-info btn-sm">View</a></td>
                </tr>
                <tr>
                  <th scope="row">#102</th>
                  <td>2024-10-21</td>
                  <td><span class="badge bg-warning">Processing</span></td>
                  <td>80.00 TND</td>
                  <td><a href="#" class="btn btn-info btn-sm">View</a></td>
                </tr>
              </tbody>
            </table>
          
           
          
         
            <footer class="footer bg-light text-center py-4">
              <div class="container">
                <div class="row justify-content-between align-items-center">
                  <div class="col-12 col-sm-auto mb-2 mb-sm-0">
                    <p class="mb-0 text-900">Thank you for shopping with <strong class="text-primary">YourStore</strong>!<span class="d-none d-sm-inline-block"></span><span class="mx-1">|</span><br class="d-sm-none">2024 &copy; <a href="https://yourstore.com" class="text-primary">YourStore</a></p>
                  </div>
                  <div class="col-12 col-sm-auto">
                    <p class="mb-0 text-600">Explore our collections | Version: <strong>v1.1.0</strong></p>
                  </div>
                </div>
              </div>
            </footer>
            
            
    </main>
    Dashboard
    <script src="{{ asset('dashassests/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassests/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>