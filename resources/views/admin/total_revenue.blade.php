<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
        }

        .admin {
            font-size: 18px;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ebffec;
        }

        .search-box {
            width: 400px;
            padding: 10px 40px 10px 10px;
            /* Tambahkan padding untuk memberikan ruang bagi ikon */
            font-size: 16px;
            background-image: url("image/search.png");
            /* Ganti dengan path menuju gambar ikon search */
            background-repeat: no-repeat;
            background-position: 10px center;
            background-size: 20px 20px;
            /* Sesuaikan ukuran ikon */
            border: 1px solid #ccc;
            border-radius: 15px;
        }

        ::placeholder {
            padding-left: 35px;
            /* Tambahkan jarak antara ikon dan placeholder */
        }

        /* .row {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 15px;
        box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.3);
      } */

        .row img {
            width: 200px;
            height: 100px;
            object-fit: cover;
            border-radius: 15px;
            margin-right: 30px;
        }

        .row .content {
            flex-grow: 1;
        }

        .row h3 {
            margin: 0 0 10px 0;
        }

        .row h5 {
            margin: 0 0 2px 0;
        }

        .row h6 {
            margin: 0;
        }

        .row .button {
            padding: 20px 20px;
            margin-right: 20px;
            background-color: 1px solid#ccc;
            color: red;
            border: none;
            border-radius: 15px;
            box-shadow: 2px 4px 4px rgba(0, 0, 0, 0.3);
            cursor: pointer;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="logo">Revenue</div>
        <div class="admin">Admin</div>
    </div>

    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="row  d-flex justify-content-around">
                    <div
                        class="col-5 bg-success bg-opacity-50 py-3 rounded-5 shadow d-flex flex-column justify-content-center align-items-center">
                        <h4 class="m-0">Total Mitra</h4>
                        <p class="m-0">15 Mitra</p>
                    </div>
                    <div
                        class="col-5 bg-success bg-opacity-50 py-3 rounded-5 shadow d-flex flex-column justify-content-center align-items-center">
                        <h4 class="m-0">Total Pendapatan</h4>
                        <p class="m-0">Rp 1.600.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <img src="/assets/Photo1.jpg" alt="Gambar 1" />
        <div class="content">
            <h3>Bakso Lava Cak Kodir</h3>
            <div class="col">
                <h5 class="text-right">Total Pendapatan</h5>
                <h6 class="text-right">RP700.000</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <img src="/assets/Photo1.jpg" alt="Gambar 1" />
        <div class="content">
            <h3>Bakso Lava Cak Kodir</h3>
            <div class="col">
                <h5 class="text-right">Total Pendapatan</h5>
                <h6 class="text-right">RP700.000</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <img src="/assets/Photo1.jpg" alt="Gambar 1" />
        <div class="content">
            <h3>Bakso Lava Cak Kodir</h3>
            <div class="col">
                <h5 class="text-right">Total Pendapatan</h5>
                <h6 class="text-right">RP700.000</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <img src="/assets/Photo1.jpg" alt="Gambar 1" />
        <div class="content">
            <h3>Bakso Lava Cak Kodir</h3>
            <div class="col">
                <h5 class="text-right">Total Pendapatan</h5>
                <h6 class="text-right">RP700.000</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <img src="/assets/Photo1.jpg" alt="Gambar 1" />
        <div class="content">
            <h3>Bakso Lava Cak Kodir</h3>
            <div class="col">
                <h5 class="text-right">Total Pendapatan</h5>
                <h6 class="text-right">RP700.000</h6>
            </div>
        </div>
    </div>

    
    </div>
</body>

</html>
