<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- style css -->
    <link rel="stylesheet" href="{{ $style }}">

    <title>Ubah Profile</title>

</head>

<body>
    <div class="container bg-white mt-5 w-75 shadow">
        <div class="profile">
            <img src="assets/logo profile.png" alt="">
        </div>

        <div class="form-group col-sm-6 mx-auto ">
            <label for="inputEmail" class="form-label">Email*</label>
            <input type="username" class="form-control rounded-pill" id="inputEmail" >
        </div>

        <div class="form-group col-sm-6 mx-auto">
            <label for="inputPassword5" class="form-label">Password*</label>
            <input type="password" id="inputPassword5" class="form-control rounded-pill"
                aria-describedby="passwordHelpBlock">
            <div id="passwordHelpBlock" class="form-text">
                Min. 8 characters
            </div>
        </div>
        <div class="form-group col-sm-6 mx-auto">
            <label for="inputPassword5" class="form-label">Confirm Password*</label>
            <input type="password" id="inputPassword5" class="form-control rounded-pill"
                aria-describedby="passwordHelpBlock">
        </div>


        <div class="btn d-grid m-3 col-5 mx-auto">
            <button type="button" class="btn btn-danger rounded-pill">UPDATE</button>
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