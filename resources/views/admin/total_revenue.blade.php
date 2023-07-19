<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Raleway&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins&family=Raleway&display=swap');


        * {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            outline: none;
            border: none;
            text-decoration: none;
        }


        img {
            width: 100px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            padding: 10px 30px 0 30px;
        }

        .logo {
            font-weight: 500;
        }

        .admin {
            font-size: 18px;
        }

        .col-5.align-items-center:last-child {
            text-align: right;
        }

        .total-mitra-container {
            background-color: #C7E8CA;
        }

        .total-pendapatan {
            background-color: #C7E8CA;
        }

        .large-text {
            font-size: 24px;
        }

        .large-text1 {
            font-size: 20px;
        }

        /* Tambahkan border pada class "rounded-5" */
        .rounded-5 {
            border: 2px solid #ced4da;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="header">
        <h3 class="logo pt-2">Pendapatan</h3>
        <div class="admin pt-2">Admin</div>
    </div>

    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-8 mx-auto">
                <div class="row d-flex justify-content-around">
                    <div class="col-5 py-3 rounded-5 shadow d-flex flex-column justify-content-center align-items-center total-mitra-container"
                        style="background-color: #C7E8CA;">
                        <h4>Total Mitra</h4>
                        <h5>{{ $totalSeller }} Mitra</h5>
                    </div>
                    <div class="col-5 py-3 rounded-5 shadow d-flex flex-column justify-content-center align-items-center total-pendapatan"
                        style="background-color: #C7E8CA;">
                        <h4>Total Pendapatan</h4>
                        <h5>Rp. {{ number_format($revenueTotal, 0, ',', '.') }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="margin-left: 15%;">
        @foreach ($transactions as $transaction => $transact)
            @foreach ($transact as $trans)
                @php
                    $income = 0;
                    $income += $trans->price;
                @endphp
                <div class="row">
                    <div class="col-12 col-xl-10 mx-auto">
                        <!-- Terapkan border pada div ini -->
                        <div class="row col-xl-10 py-3 rounded-5 shadow rounded-5" style="height: 150px;">
                            <div class="col-3">
                                <img src="/assets/cafe.png" class="rounded-4" style="width:150px;">
                            </div>
                            <div class="col-5 d-flex align-items-center large-text1"><b>{{ $trans->seller->name }}</b>
                            </div>
                            <div class="col-4 d-flex align-items-center justify-content-center large-text"
                                style="color: #46E84D;">Rp. {{ number_format($income, 0, ',', '.') }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

</body>

</html>
