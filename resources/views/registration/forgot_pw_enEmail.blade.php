<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ $style }}">

    <title>Forgot Password</title>
</head>

<body>
    <div class="container bg-white mt-5  shadow">
        <div class="navbar d-flex flex-row">
            <div class="ikon">
                <img src="/assets/smallBtn.png" alt="">
            </div>
            <div class="nvbr">
                <p>Forgot Password</p>
            </div>
            
        </div>

        <div class="form-group mb-2 ">
            <p class="enter mt-5">Enter Email Address</p>
            <input type="username" class="form-control rounded-pill" placeholder="example@gmail.com" id="inputEmail" >
        </div>

        <div class="sign">
            <a class="enter1 text-decoration-none" href="#">Back to sign in</a>
        </div>

        <div class="btn d-grid m-3 col-sm-6 mx-auto mt-5">
            <button type="button" class="btn btn-danger rounded-pill">Send</button>
        </div>


        <div class="bagianbawah d-grid m-3 col-sm-6 mx-auto">
            <p class="enter1">Do you have an account?</p>
            <button type="button" class="btn btn-outline-secondary rounded-pill">Sign up</button>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>