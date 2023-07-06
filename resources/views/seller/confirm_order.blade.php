<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ $style }}">
    <link rel="stylesheet" href="/styles/seller/jquery.nice-number.css">
    <title>{{ $title }}</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid logo">
            <img src="/assets/logo-e-canteen.png" height="70px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Discount</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Contact</a>
                    </li>
            </div>

            <div class="kanan">
                <div class="btn m-3 mx-auto me-3">
                    <button type="button" class="btn btn-light btn-lg rounded-pill shadow">+ Add Product</button>
                </div>
                <img src="/assets/profile.png" height="55px">
            </div>
        </div>
    </nav>

    <!-- konten -->
    <div class="konten">
        <p class="judul"> <b>KONFIRMASI PESANAN</b></p>
        <div class="container d-flex flex-row">
            <div class="cardd mb-5" style="max-width: 540px;">
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title">Nasi Goreng Bahagia</h5>
                            <p class="card-text"><small class="text-muted">Makanan</small></p>
                            <p class="uang">Rp 15.000</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/assets/nasigoyeng.jpeg" class="img-fluid foto" alt="...">
                        <div class="label me-3 mt-2">
                            <input type="number" name="" id="" value="1" min="1">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Es Jeruk</h5>
                            <p class="card-text"><small class="text-muted">Minuman</small></p>
                            <p class="uang">Rp 5.000</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <img src="/assets/es jeyuk.webp" class="img-fluid foto" alt="...">
                        <div class="label me-3 mt-2">
                            <input type="number" name="" id="" value="1" min="1">
                        </div>
                    </div>

                    <div class="bawah">
                        <p class="text"> <b>Ada lagi pesanannya?</b></p>
                        <p class="text">Masih bisa nambah lagi ya...</p>
                        <button type="button" class="btn btn-outline-success rounded-pill button1">Tambah
                            Pesanan</button>
                    </div>
                </div>
            </div>

            <div class=" mb-4 m-0 " style="max-width: 540px;">
                <div class="row ">
                    <div class="col">
                        <div class="card-body kanan">
                            <div class="card-title ">
                                <p>Meja Pengantaran</p>
                                <h5>Meja No 6, Lantai 2</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-outline-success rounded-pill ganti">Ganti Meja</button>
                    </div>

                    <div class="col-md-8">
                        <div class="card-body border border-dark rounded-3 kotak">
                            <h5 class="card-title text-center">Detail Transaksi</h5>
                            <div class="card-text">
                                <p>Nasi Goreng Bahagia &emsp; &ensp; &ensp; 2x Rp30.000</p>
                                <p>Es Jeruk &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &ensp; 2x Rp10.000</p>
                                <hr>
                                <p>Total Harga &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; Rp40.000</p>
                            </div>
                        </div>
                    </div>

                    <div class="button3 mt-4 d-flex flex-column">
                        <div class="row button3 mb-3">
                            <button type="button" class="btn btn-outline-dark rounded-pill ">Pilih Metode
                                Pembayaran</button>
                        </div>

                        <div class="row button3">
                            <button type="button" class="btn btn-danger rounded-pill ">Lanjut Pembayaran</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
        <script src="/styles/seller/jquery.nice-number.js"></script>
        <script>
            $(function() {
                $('input[type="number"]').niceNumber();
            });
        </script>
</body>

</html>
