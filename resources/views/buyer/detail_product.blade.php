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
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid px-4 mt-2">
            <a class="navbar-brand text-dark fw-bold fs-2" href="#">E-Canteen</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-4" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-dark" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link text-dark" href="#">Discount</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link text-dark" href="#">Feedback</a>
                    </li>
                    <li class="nav-item ms-4">
                        <a class="nav-link text-dark" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div class="container pesanan bg-white d-flex justify-content-end">
                <p>Daftar Pesanan</p>
            </div>
        </div>
    </nav>

    <p class="text-center fw-bold fs-2 mt-4">Pesan Produk</p>

    <div class="container d-flex flex-row mt-5">
        <div class="col-5">
            <img src="/assets/buryam2.png" alt="">
        </div>
        <div class="col-7 d-flex flex-column">
            <div class="d-flex flex-row">
                <div class="col-6 d-flex flex-column">
                    <h3>Nasi Goreng Ishal Enak</h3>
                    <p class="fw-light text-secondary fs-5">Makanan</p>
                    <p class="fw-bold fs-5">Rp. 15.000</p>
                </div>
                <div class="col-6">
                    <img src="/assets/favorite_icon.png" class="favorite" alt="">
                </div>
            </div>
            <p class="deskripsi">Nasi goreng buatan Pak Faishal adalah sebuah hidangan yang memukau dengan
                aroma yang menggugah selera dan cita rasa yang lezat. Pak Faishal, seorang ahli
                masakan yang berbakat, sehingga menghasilkan hidangan yang luar biasa.</p>
            <div class="container d-flex flex-row">
                <img src="/assets/plus_qty.png" class="kuantitas" alt="">
                <p class="ms-4 fs-3">0</p>
                <img src="/assets/minus_qty.png" class="kuantitas ms-4" alt="">
            </div>
        </div>
    </div>

    <div class="container d-flex flex-row justify-content-end">
        <button type="submit" class="mt-4 fw-bold keranjang" name="pesan" value="pesan">
            <p>Keranjang</p>
        </button>
        <button type="submit" class="mt-4 ms-5 fw-bold tambah" name="pesan" value="pesan">
            <p>Tambahkan</p>
        </button>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
