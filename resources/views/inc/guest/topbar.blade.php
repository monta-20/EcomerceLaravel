<div class="container-fluid bg-light shadow-sm">  
    <div class="row align-items-center py-3 px-xl-5">
        <div class="col-lg-3 d-none d-lg-block">
            <a href="#" class="text-decoration-none">
                <h1 class="m-0 display-5 font-weight-bold text-primary">
                    Shop<span class="font-weight-bold border border-primary rounded px-3 mr-1">4</span>Buy
                </h1>
            </a>
        </div>
        <div class="col-lg-6 col-12">
            <form action="/products/search" method="POST" class="d-flex">
                @csrf
                <input type="text" class="form-control me-2" placeholder="Search for products" name="keywords" aria-label="Search for products">
                <button class="btn btn-outline-primary" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </div>
        <div class="col-lg-3 col-12 text-end">
            <a href="#" class="btn border position-relative">
                <i class="fas fa-heart text-primary"></i>
                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle badge rounded-pill">0</span>
            </a>
            <a href="#" class="btn border position-relative">
                <i class="fas fa-shopping-cart text-primary"></i>
                <span class="badge bg-danger position-absolute top-0 start-100 translate-middle badge rounded-pill">0</span>
            </a>
        </div>
    </div>
</div>
