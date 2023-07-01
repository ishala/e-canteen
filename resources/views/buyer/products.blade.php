<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ $style }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light d-flex flex-row mb-3">
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
                        <a class="nav-link fs-4 {{ $title == 'Pembeli: Semua Mitra dan Produk' ? 'text-danger fw-bold' : 'text-dark' }}"
                            aria-current="page" href="{{ route('buyer') }}">Menu Utama</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link fs-4 {{ $title == 'Pembeli: Keranjang' ? 'text-danger fw-bold' : 'text-dark' }}"
                            href="{{ route('buyer.cart') }}">Keranjang</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link fs-4 text-dark" href="#">Semua Produk</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link fs-4 text-dark" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content">
        @if ($title == 'Pembeli: Semua Mitra dan Produk')
            @include('partials.buyer.main_menu')
        @endif
        @if ($title == 'Pembeli: Keranjang')
            @include('partials.buyer.cart')
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
