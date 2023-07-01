<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Total Pendapatan Mitra</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />

    <style>
        .navbar-nav li {
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar-nav li:hover::before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #1abc9c;
            visibility: visible;
            transform: scaleX(1);
            transition: all 0.3s ease;
        }
    </style>
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand d-flex flex-row-reverse" style="background-color: #ebffec; height: 70px">
        <div class="container-fluid">
            <img src="/assets/Logo1.png" alt="Logo" style="width: 130px; height: auto" />
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
                    <img src="/assets/logo profile.png" alt="Profile Picture"
                        style="width: 45px; height: 45px; border-radius: 50px" /></a>
            </div>
        </div>
    </nav>


    <!--Isi Pendapatan-->
    <div class="container">
        <h1 class="mt-3">Total Pendapatan Mitra</h1>
        <div class="row mt-4">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendapatan Tahun 2023</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Bulan</th>
                                    <th>Pendapatan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Januari 2023</td>
                                    <td>Rp.10.000</td>
                                </tr>
                                <tr>
                                    <td>Februari 2023</td>
                                    <td>Rp.20.000</td>
                                </tr>
                                <tr>
                                    <td>Maret 2023</td>
                                    <td>Rp.30.000</td>
                                </tr>
                                <tr>
                                    <td>April 2023</td>
                                    <td>Rp.40.000</td>
                                </tr>
                                <tr>
                                    <td>Mei 2023</td>
                                    <td>Rp.50.000</td>
                                </tr>
                                <tr>
                                    <td>Juni 2023</td>
                                    <td>Rp.60.000</td>
                                </tr>
                                <tr>
                                    <td>Juli 2023</td>
                                    <td>Rp.70.000</td>
                                </tr>
                                <tr>
                                    <td>Agustus 2023</td>
                                    <td>Rp.-</td>
                                </tr>
                                <tr>
                                    <td>September 2023</td>
                                    <td>Rp.-</td>
                                </tr>
                                <tr>
                                    <td>Oktober 2023</td>
                                    <td>Rp.-</td>
                                </tr>
                                <tr>
                                    <td>November 2023</td>
                                    <td>Rp.-</td>
                                </tr>
                                <tr>
                                    <td>Desember 2023</td>
                                    <td>Rp.-</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card bg-success">
                    <div class="card-body text-light">
                        <h5 class="card-title">Total Pendapatan Bulan Juni 2023</h5>
                        <p class="card-text">Rp.60.000</p>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card" style="background-color: #ebffec">
                        <div class="card-body">
                            <h5 class="card-title">Total Pendapatan Pertahun</h5>
                            <p class="card-text">Rp.210.000</p>
                        </div>
                    </div>
                    <div class="card mt-3 bg-success-subtle">
                        <div class="card-body">
                            <h5 class="card-title">Total Pendapatan Keseluruhan</h5>
                            <p class="card-text">Rp.1.210.000</p>
                        </div>
                    </div>
                </div>
                <div class="col mt-3">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <div class="mb-3">
                                    <label for="tahun" class="form-label">Ingin Melihat Pendapatan Ditahun Sebelumnya
                                        ?</label>
                                    <select class="form-select" id="tahun">
                                        <option selected disabled>Pilih Tahun</option>
                                        <option>2021</option>
                                        <option>2022</option>
                                        <option>2023</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-danger">
                                    Tampilkan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
