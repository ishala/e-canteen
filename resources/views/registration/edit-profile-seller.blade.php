<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{ $style }}">

    <title>{{ $title }}</title>

</head>

<body>
    <div class="container bg-white mt-5 pt-3 w-75 shadow">
        <form action="{{ route('account.edit-profile-process') }}" method="POST">
            @csrf
            <input type="hidden" name="role" id="" value="{{ $role }}">
            <input type="hidden" name="id" id="" value="{{ $id }}">

            
            <div class="form-group col-sm-6 mx-auto ">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="username" name="email" class="form-control rounded-pill" id="inputEmail"
                    value="{{ $account->email }}">
            </div>

            <div class="form-group col-sm-6 mx-auto">
                <label for="inputPassword5" class="form-label">Password</label>
                <div class="d-flex flex-row">
                    <input type="password" id="password" name="password" class="form-control rounded-pill"
                        value="{{ $account->password }}">
                    <button class="hide" type="button" id="togglePassword"><i class="bi bi-eye fs-4 pe-3"
                            style="background-color:white;"></i>
                </div>
            </div>

            <hr class="garis">

            <div class="form-group col-sm-6 mx-auto ">
                <label for="inputEmail" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control rounded-pill" value="{{ $account->name }}">
            </div>
            <div class="form-group col-sm-6 mx-auto ">
                <label for="inputEmail" class="form-label">Owner</label>
                <input type="text" name="owner" class="form-control rounded-pill" value="{{ $account->owner }}">
            </div>
            <div class="form-group col-sm-6 mx-auto ">
                <label for="inputEmail" class="form-label">Phone</label>
                <input type="number" name="phone" class="form-control rounded-pill" value="{{ $account->phone }}">
            </div>
            <div class="btn d-grid m-3 col-5 mx-auto">
                <button type="submit" class="btn btn-warning rounded-pill text-dark">Update</button>
            </div>
            <div class="btn d-grid m-3 col-5 mx-auto">
                <a href="{{ route('account.login') }}">
                    <button type="button" class="btn btn-danger rounded-pill">Logout</button>
                </a>
            </div>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.innerHTML = type === 'password' ?
                '<i class="bi bi-eye fs-4 pe-3" style="background-color:white;"></i>' :
                '<i class="bi bi-eye-slash fs-4 pe-3" style="background-color:white;"></i>';
        });
    </script>
</body>

</html>
