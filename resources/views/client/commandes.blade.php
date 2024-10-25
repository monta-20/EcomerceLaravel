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
        @include('inc.client.sidebar')
        @include('inc.client.nav')
        <div class="content">
          <div class="pb-5">
            <div class="container mt-5">
                <h2 class="text-center">Command Table</h2>
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Command</th>
                            <th>State</th>
                            <th>Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach( auth()->user()->commandes as $index => $c)
                        <tr>
                            <td>N° {{ $index + 1 }}</td>
                            
                            <!-- Conditionally set badge color based on the state -->
                            <td>
                                @if ($c->state === 'pay')
                                    <span class="badge bg-success">{{ $c->state }}</span> <!-- Green for 'pay' -->
                                @elseif ($c->state === 'in progress')
                                    <span class="badge bg-primary">{{ $c->state }}</span> <!-- Blue for 'in progress' -->
                                @else
                                    <span class="badge bg-secondary">{{ $c->state }}</span> <!-- Default for other states -->
                                @endif
                            </td>
                    
                            <td>{{ $c->created_at }}</td>
                            
                         </tr>
                    @endforeach
                    
                        
                    </tbody>
                </table>
            </div>
        
          </div>
         
          @include('inc.admin.footer')          
        </div>
      </div>
    </main>
    Dashboard
    <script src="{{ asset('dashassests/js/phoenix.js') }}"></script>
    <script src="{{ asset('dashassests/js/ecommerce-dashboard.js') }}"></script>
  </body>

</html>