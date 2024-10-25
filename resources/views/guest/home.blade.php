
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EShopper - Bootstrap Shop Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('mainassests/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('mainassests/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    @include('inc.guest.topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('inc.guest.navbar')
    <!-- Navbar End -->


    <!-- Featured Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="feature-card d-flex align-items-center border mb-4" style="padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                    <h1 class="fa fa-check text-primary m-0 mr-3" style="font-size: 36px;"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="feature-card d-flex align-items-center border mb-4" style="padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2" style="font-size: 36px;"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="feature-card d-flex align-items-center border mb-4" style="padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3" style="font-size: 36px;"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="feature-card d-flex align-items-center border mb-4" style="padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3" style="font-size: 36px;"></h1>
                    <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    
    <style>
        .feature-card:hover {
            transform: translateY(-5px);
        }
    
        .text-primary {
            color: #007bff; /* Customize your primary color here */
        }
    
        .font-weight-semi-bold {
            font-weight: 600; /* Adjust the font weight for better visibility */
        }
    </style>
    
    <!-- Featured End -->


    <!-- Categories Start -->
    
    <!-- Categories End -->


    <!-- Offer Start -->
    
    <!-- Offer End -->


    <!-- Products Start -->
    <div class="container-fluid pt-5">
        <style>
            .product-item {
                transition: transform 0.3s ease;
            }
    
            .product-item:hover {
                transform: translateY(-5px);
            }
    
            .card-header img {
                transition: transform 0.3s ease;
            }
    
            .card-header img:hover {
                transform: scale(1.05);
            }
        </style>
    
        <div class="text-center mb-4">
            <h2 class="section-title px-5">
                <span class="px-2">Trendy Products</span>
            </h2>
        </div>
        <div class="row px-xl-5 pb-3">
            @foreach ($products as $p)
                <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                    <div class="card product-item border-0 mb-4 shadow-sm">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('uploads') }}/{{ $p->photo }}" alt="{{ $p->name }}">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3 font-weight-bold">{{ $p->name }}</h6>
                            <div class="d-flex justify-content-center align-items-center">
                                <h6 class="mb-0">{{ $p->price }} TND</h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center bg-light border-top">
                            <a href="/products/details/{{ $p->id }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye mr-1"></i>View Detail
                            </a>
                            <a href="" class="btn btn-sm btn-outline-success">
                                <i class="fas fa-shopping-cart mr-1"></i>Add To Cart
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Products End -->


    <!-- Subscribe Start -->
    
    <!-- Subscribe End -->


    <!-- Products Start -->
    
    <!-- Products End -->


    <!-- Vendor Start -->
    
    <!-- Vendor End -->


    <!-- Footer Start -->
    @include('inc.guest.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('mainassests/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('mainassests/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('mainassests/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('mainassests/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('mainassests/js/main.js') }}"></script>
</body>

</html>