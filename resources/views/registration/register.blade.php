<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/registration/register.css">
    <title>E-Canteen: Register</title>
</head>

<body>
    <img src="/assets/mini-logo.png" class="logo" alt="">
    <div class="isian container d-flex justify-content-center bg-light">
        <!--FORM-->
        <form method="POST" action="/register/role">
            @csrf
            <h2 class="text-center fw-bold mt-4 mb-5">Sign Up</h2>
            <div class="row">
                <div class="col-12 col-lg-12">
                    <p>Nama</p>
                    <div class="inputan d-flex flex-row bg-white mb-3 border border-2 border-dark p-2">
                        <input type="text" class="ms-3 border border-0" id="name" name="name"
                            placeholder="Masukkan nama anda..." value="{{ old('name') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Email</p>
                    <div class="inputan d-flex flex-row bg-white mb-3 border border-2 border-dark p-2">
                        <input type="text" class="ms-3 border border-0" id="email" name="email"
                            placeholder="Masukkan email anda..." value="{{ old('email') }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <p>Password</p>
                    <div class="inputan d-flex flex-row bg-white mb-3 border border-2 border-dark p-2">
                        <input type="password" class="ms-3 border border-0" id="password" name="password"
                            placeholder="Masukkan password anda..." value="{{ old('password') }}">
                        <button class="hide" type="button" id="togglePassword"><i class="bi bi-eye fs-4"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="container d-flex justify-content-center rounded-5 tombol mb-4">
                <button type="submit" class="button text-white mt-4 fs-4">REGISTER</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="bi bi-eye fs-4"></i>' :
                '<i class="bi bi-eye-slash fs-4"></i>';
        });
    </script>
</body>

</html>
