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
    
   <!-- Page Header Start -->
   <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
        <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
        <div class="d-inline-flex">
            <p class="m-0"><a href="">Home</a></p>
            <p class="m-0 px-2">-</p>
            <p class="m-0">Shopping Cart</p>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Cart Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5">
        <!-- Product Table -->
        <div class="col-lg-8 table-responsive mb-5">
            <table class="table table-bordered text-center mb-0">
                @include('inc.flash_messageTwo')
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($command->lignecommandes as $lc )
                    <tr>
                        <!-- Product Name and Image -->
                        <td class="align-middle">
                            <img src="{{ asset('uploads') }}/{{ $lc->product->photo }}" alt="" style="width: 50px;" class="img-thumbnail mr-2">
                            <span>{{ $lc->product->name }}</span>
                        </td>
                        <!-- Product Price -->
                        <td class="align-middle">{{ $lc->product->price }} TND</td>
                        <!-- Product Quantity -->
                        <td class="align-middle">
                            <div class="input-group quantity mx-auto" style="width: 100px;">
                                <input type="text" class="form-control form-control-sm text-center" value="{{ $lc->quantity }}" readonly>
                            </div>
                        </td>
                        <!-- Total Price -->
                        <td class="align-middle">{{ $lc->product->price * $lc->quantity }} TND</td>
                        <!-- Remove Button -->
                        <td class="align-middle">
                            <a href="/client/lc/{{ $lc->id }}/destroy" class="btn btn-sm btn-danger">
                                <i class="fa fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="text-right mt-3">
                <a href="/client/commandes" class="btn btn-secondary">Display Completed Orders</a>
            </div>
        </div>

        <!-- Cart Summary & Checkout -->
        <div class="col-lg-4">
            <form action="/client/checkout" method="POST">
                @csrf
                <input type="hidden" name="command" value="{{ $command->id }}">
                
                <!-- Coupon Code Input -->
                <div class="input-group mb-4">
                    <input type="text" class="form-control p-4" placeholder="Coupon Code" aria-label="Coupon Code">
                    <div class="input-group-append">
                        <button class="btn btn-primary">Apply Coupon</button>
                    </div>
                </div>

                <!-- Cart Summary Card -->
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-primary text-white">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        <!-- Subtotal -->
                        <div class="d-flex justify-content-between mb-3">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">{{ $command->getTotal() }} TND</h6>
                        </div>
                        <!-- Shipping -->
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Shipping</h6>
                            <h6 class="font-weight-medium">10 TND</h6>
                        </div>
                    </div>
                    <!-- Total -->
                    <div class="card-footer bg-transparent border-secondary">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total</h5>
                            <h5 class="font-weight-bold">{{ $command->getTotal() + 10 }} TND</h5>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary my-3 py-3">Proceed to Checkout</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Cart End -->


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