<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ $style }}">
    <title>{{ $title }}</title>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand d-flex flex-row-reverse" style="background-color: #ebffec; height: 70px">
        <div class="container-fluid">
            <img src="/assets/logo-e-canteen.png" alt="Logo" style="width: 130px; height: auto" />
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto"></ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Discount</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Feedback</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <div>
                <a href="#">
                    <img src="/assets/logo-profile.png" alt="Profile Picture"
                        style="width: 45px; height: 45px; border-radius: 50px" /></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container row-3 mt-3">
        <div>
            <div>
                <h3>Mitra Tersedia</h3>
            </div>
        </div>
        <!--Search Bar-->
        <div class="menu-container d-flex justify-content-center">

            @foreach ($sellers as $seller)
                <div class="btn menu-item">
                    <img src="https://asset.kompas.com/crops/Kyp-MBp3Kf0PLGveth_zzhU2gfI=/0x0:1000x667/750x500/data/photo/2020/07/11/5f09e008e7fee.jpg"
                        alt="Menu 3" />
                    <h3 class="mt-3 text-center">{{ $seller->name }}</h3>
                </div>
            @endforeach

        </div>

        <!--Detail Menu-->
        <div class="row mt-3">
            <div>
                <div>
                    <h3>Menu Tersedia</h3>
                </div>
            </div>
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="btn card mb-3">
                        <img src="https://asset.kompas.com/crops/Kyp-MBp3Kf0PLGveth_zzhU2gfI=/0x0:1000x667/750x500/data/photo/2020/07/11/5f09e008e7fee.jpg"
                            class="card-img-top" alt="Bakso Jawir" />
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!--Menu Tersedia-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
