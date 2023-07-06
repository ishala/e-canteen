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
                    <button type="button" class="btn btn-light btn-lg rounded-pill shadow">Daftar Pesanan</button>
                </div>
                <img src="/assets/profile.png" height="55px">
            </div>
        </div>
    </nav>

    <div class="container mt-5 ">
        <p class="judul">E-CANTEEN</p>
        <p class="deskripsi">Berawal dari pengalaman pribadi ketika membeli sebuah makanan atau minuman dikantin yang
            sangat antri dan tidak kondusif. Maka kami menciptakan sebuah solusi, yaitu membangun sebuah website untuk
            order makanan dikantin tanpa ribet. Dengan hanya memesan melalui gadget anda. </p>


        <div class="team ">
            <p class="our">~OUR TEAM~</p>
            <div class="d-flex flex-row  tes">
                <div class="d-flex flex-column">
                    <img src="/assets/pap/jakbar.jfif" alt="foto jakbar" height="200px" width="200px">
                    <div class="p">
                        <p>Muhammad Rizky</p>
                        <p>@rizkyjackbar</p>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <img src="/assets/pap/rangga.jfif" alt="foto rangga" height="200px" width="200px">
                    <div class="p">
                        <p>M Dwi Turangga</p>
                        <p>@zalx___</p>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <img src="/assets/pap/faishal.jpg" alt="foto faishal" height="200px" width="200px">
                    <div class="p">
                        <p>Muh Faishal</p>
                        <p>@ullhaq_ali</p>
                    </div>

                </div>
            </div>

            <div class="rowbawah">
                <div class="d-flex flex-row tes">
                    <div class="d-flex flex-column">
                        <img src="/assets/pap/dapa.jfif" alt="foto dapa" height="200px" width="200px">
                        <div class="p">
                            <p>Atilia Dhaffazra</p>
                            <p>@daffa_hermawan03</p>
                        </div>
                    </div>
                    <div class="d-flex flex-column">
                        <img src="/assets/pap/shelaa.jpg" alt="foto cela" height="200px" width="200px">
                        <div class="p">
                            <p>Shela Widiya</p>
                            <p>@shelawdya</p>
                        </div>
                    </div>
                </div>
            </div>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
            </script>


</body>

</html>
