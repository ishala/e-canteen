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

    <!-- icon button -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>{{ $title }}</title>
</head>

<body class="">
    <div class="d-flex flex-row">
        <div class="logo col">
            <img src="/assets/logo-e-canteen.png" height="80px">
        </div>
        <div class="d-flex flex-row justify-content-end">
            <div class="btn1  m-3 z-index: 50; " style="z-index: 50;">
                <a href="{{ route('account.register') }}">
                    <button><i class="fa-solid fa-user"></i>&nbsp;Sign in</button>
                </a>
            </div>
            <div class="btn2 m-3  justify-content-end " style="z-index: 50;">
                <a href="{{ route('account.login') }}">
                    <button><i class="fa-solid fa-right-to-bracket"></i>&ensp;Login</button>
                </a>
            </div>
        </div>
    </div>
    </nav>



    <div class="container">
        <div class="title">
            <p style="font-size: 75px;"><b>Order Your</b></p>
            <p style="font-size: 65px;">Favorit Foods</p>
            <p style="color: #777; font-size: 20px;">Pesan makananmu disini sekarang tanpa harus ribet mengantri!</p>

            <button type="button" class="btn btn-danger rounded-pill ">Pesan Sekarang</button>
        </div>
    </div>

    <div class="container-fluid">
        <div class="d-flex">
            <img class="foto1 position-absolute" src="/assets/nasgor1.png" height="350px"
                style="z-index: 50; left: 750px; top: 180px;">
            <img src="/assets/setling.png" alt="" class="img-setling position-absolute top-0 end-0">
            <img src="/assets/elements.png" class="img-elements position-absolute top-0 end-0" height="525px">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>
