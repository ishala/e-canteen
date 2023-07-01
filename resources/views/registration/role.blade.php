<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ $style }}">

    <title>Register</title>
</head>



<body>
    <div class="container bg-white mt-5 pt-2 w-75 shadow ">
        <h1 class="judul mt-4">What you want to be ?</h1>

        <form action="/register/regist" method="POST">
            @csrf
            <input type="hidden" value="{{ $data['name'] }}" name="name">
            <input type="hidden" value="{{ $data['email'] }}" name="email">
            <input type="hidden" value="{{ $data['password'] }}" name="password">
            <div class="row d-flex flex-row row-cols-md-3 g-5">
                <label for="seller">
                    <input type="radio" name="role" value="2" id="seller" style="display: none;">
                    <div class="col">
                        <div class="card d-flex flex-column shadow" id="seller" data-role="2">
                            <img src="/assets/logo profile.png" height="100px" width="100px">
                            <div class="card-body">
                                <h5 class="card-title">Seller</h5>
                            </div>
                        </div>
                    </div>
                </label>
                <label for="buyer">
                    <input type="radio" name="role" value="3" id="buyer" style="display: none;">
                    <div class="col">
                        <div class="card d-flex flex-column shadow" id="buyer" data-role="3">
                            <img src="/assets/logo profile.png" height="100px" width="100px">
                            <div class="card-body">
                                <h5 class="card-title">Buyer</h5>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            <div class="button mx-auto d-grid m-5 col-5">
                <button type="submit" class="btn btn-danger rounded-pill" id="submit">Register</button>
            </div>
        </form>



    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>




    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    -->
</body>

</html>
