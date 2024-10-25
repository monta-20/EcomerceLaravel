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
      body {
            background-color: #F1EAD2; /* Background color */
        }
        .form-container {
            margin-top: 50px;
        }
    </style>
  </head>

  <body>
    <main class="main" id="top">
      <div class="container-fluid px-0">
         {{-- include sidebar and navber code --}}
        @include('inc.client.sidebar')
        @include('inc.client.nav')
        <div class="content">
          <div class="pb-5">
            <div class="container form-container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header text-center">
                                @include('inc.flash_message')
                                
                                <h4>Client Edit Profile</h4>
                            </div>
                            <div class="card-body">
                                <!-- Form start -->
                                <form action="/client/profile/update" method="POST">
                                    @csrf
                                    <!-- Continent Name Field -->
                                    <div class="mb-3">
                                        <label for="continentName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="continentName" placeholder="Enter your continent name" name='name' value={{ auth()->user()->name }}>
                                    </div>
                                    
                                    <!-- Email Field -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter your email" name='email' value={{ auth()->user()->email }}>
                                    </div>
            
                                    <!-- Password Field -->
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Enter your password" name='password'>
                                    </div>
            
                                    <!-- Submit Button -->
                                    <button type="submit" class="btn btn-primary w-100">Save</button>
                                </form>
                                <!-- Form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
         
          @include('inc.admin.footer')
        </div>
      </div>
    </main>
    
    <script src="{{ asset('dashassests/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassests/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>