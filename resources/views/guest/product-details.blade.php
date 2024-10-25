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
    
    <!--Details Content Start -->
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('uploads') }}/{{ $product->photo }}" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold text-primary">{{ $product->name }}</h3>
                <h4 class="font-weight-bold mb-4">{{ $product->price }} TND</h4>
                <p class="mb-4 text-muted">{{ $product->description }}</p>
            
                <form action="/client/order/store" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
            
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <div class="input-group quantity mr-3" style="width: 150px;">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-primary btn-minus">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="number" class="form-control bg-light text-center" value="1" name="quantity" min="1">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-primary btn-plus">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="fa fa-shopping-cart mr-1"></i> Add To Cart
                        </button>
                    </div>
                </form>
            
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <style>
                .text-primary {
                    color: #007bff; /* Customize primary color */
                }
            
                .text-muted {
                    color: #6c757d; /* Light color for description */
                }
            
                .btn-outline-primary {
                    border-color: #007bff; /* Customize button outline color */
                    color: #007bff; /* Customize button text color */
                }
            
                .btn-outline-primary:hover {
                    background-color: #007bff; /* Background color on hover */
                    color: white; /* Text color on hover */
                }
            
                .input-group .form-control {
                    border-radius: 0; /* Remove border radius for a sleek look */
                }
            
                .input-group .btn {
                    border-radius: 0; /* Uniform button shape */
                }
            </style>
            
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Reviews {{ count($product->reviews) }}</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <h4 class="mb-3">Product Description</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                    
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">{{ count($product->reviews) }} Review(s) for {{ $product->name }}</h4>
                                    @foreach ($product->reviews as $review)
                                        <div class="media mb-4 border rounded p-3 shadow-sm">
                                            <img src="{{ asset('dashassests/img/team/58.png') }}" alt="Image" class="img-fluid mr-3" style="width: 45px; border-radius: 50%;">
                                            <div class="media-body">
                                                <h6 class="font-weight-bold">{{ $review->user->name }} <small class="text-muted"> - <i>{{ $review->created_at->format('d M, Y') }}</i></small></h6>
                                                <div class="text-primary mb-2">
                                                    @for ($i = 0; $i < $review->rate; $i++)
                                                        <i class="fas fa-star"></i>
                                                    @endfor
                                                </div>
                                                <p class="mb-0">{{ $review->content }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            
                                <div class="col-md-6">
                                    <h4 class="mb-4">Leave a Review</h4>
                                    <small class="text-muted">Your email address will not be published. Required fields are marked *</small>
                                    <form action="/client/review/store" method="POST" class="mt-3">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <div class="form-group">
                                            <label class="mb-0">Your Rating * :</label>
                                            <input type="number" max="5" min="1" class="form-control" name="rate" required />
                                        </div>
                            
                                        <div class="form-group">
                                            <label for="message">Your Review * :</label>
                                            <textarea cols="30" rows="5" class="form-control" name="content" required></textarea>
                                        </div>
                            
                                        <div class="form-group mb-0">
                                            <input type="submit" value="Leave Your Review" class="btn btn-primary px-3">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                            <style>
                                .media {
                                    background-color: #f8f9fa; /* Light background for review cards */
                                    transition: box-shadow 0.3s ease;
                                }
                            
                                .media:hover {
                                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow on hover */
                                }
                            
                                .form-control {
                                    border-radius: 0.5rem; /* Rounded corners for inputs */
                                    border: 1px solid #ced4da; /* Light border for inputs */
                                    transition: border-color 0.3s ease;
                                }
                            
                                .form-control:focus {
                                    border-color: #007bff; /* Primary border color on focus */
                                    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Subtle glow on focus */
                                }
                            
                                .btn-primary {
                                    background-color: #007bff; /* Primary button color */
                                    border: none; /* No border for buttons */
                                }
                            
                                .btn-primary:hover {
                                    background-color: #0056b3; /* Darker shade on hover */
                                }
                            
                                .text-muted {
                                    font-size: 0.9rem; /* Smaller text for notes */
                                }
                            </style>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">You May Also Like</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    
                    @foreach ($products as $prod)
                    <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="{{ asset('uploads') }}/{{ $prod->photo }}" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">{{ $prod->name }}</h6>
                            <div class="d-flex justify-content-center">
                                <h6>{{ $prod->price }} TND</h6><h6 class="text-muted ml-2"></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                            <a href="/products/details/{{ $prod->id }}" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                            <a href="" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
    <!--Details Content End -->

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

</html