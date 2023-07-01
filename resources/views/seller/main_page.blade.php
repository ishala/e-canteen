<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/seller/main-page.css">
</head>


<body>
    <div class="container">

    </div>
    <nav class="navbar navbar-expand-lg bg-light d-flex flex-row">
        <div class="col-2 mt-5 ms-2">
            <img src="/assets/logo-e-canteen.png" alt="" class="navbar-brand">
        </div>
        <div class="container-fluid mt-2 col-10">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mb-2">
                        <a class="nav-link fs-4 {{ $title == 'Dashboard Mitra' ? 'text-danger fw-bold' : 'text-dark' }}"
                            aria-current="page" href="{{ route('buyer') }}">Menu Utama</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link fs-4 {{ $title == 'Keranjang' ? 'text-danger fw-bold' : 'text-dark' }}"
                            href="{{ route('buyer.cart') }}">Keranjang</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link fs-4 text-dark" href="#">Feedback</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link fs-4 text-dark" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <p class="fs-3 fw-bold mt-4 ms-5">Selamat Datang, {{ $account->name }}!</p>
    <div class="container-fluid px-5 mt-5">
        <div class="row d-flex justify-content-around">
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Earnings</p>
                <p class="fs-2 fw-bold text-center">Rp. 3.242.144</p>

            </div>
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Users</p>
                <p class="fs-2 fw-bold text-center">24</p>
            </div>
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Products</p>
                <p class="fs-2 fw-bold text-center">{{ $totalProducts }}</p>
            </div>
        </div>
    </div>

    <div class="wrapper d-flex mt-5 justify-content-center">
        @foreach ($products as $product)
            <div class="card ms-2">
                <img src="/assets/buryam.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title fw-bold">{{ $product['name'] }}</h5>
                    <p class="card-text">Rp. {{ $product['price'] }}</p>
                    <div class="d-flex flex-row-reverse">
                        <a href="#" class="btn btn-light text-danger">Pesan</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>
