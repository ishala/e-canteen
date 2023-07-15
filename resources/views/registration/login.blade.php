<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/registration/login.css">
    <title>E-Canteen: Login</title>
</head>

<body>
    <img src="/assets/logo-e-canteen.png" alt="" class="logo">
    <div class="container-fluid d-flex justify-content-center">
        <form method="POST" action="/login">
            @csrf
            <div class="inputan d-flex flex-row bg-white mb-3 border border-dark p-2">
                <img src="/assets/email.png" alt="" class="ms-2 email">
                <input type="text" class="ms-3 border border-0" id="email" name="email"
                    placeholder="Masukkan email anda..." value="{{ old('email') }}">
            </div>
            <div class="inputan d-flex flex-row bg-white mb-3 border border-dark p-2">
                <img src="/assets/lock.png" alt="" class="ms-3 lock">
                <input type="password" class=" ms-3 border border-0" id="password" name="password"
                    placeholder="Masukkan password anda..." value="{{ old('password') }}">
                <button class="hide" type="button" id="togglePassword"><i class="bi bi-eye fs-4 pe-3"></i>
                </button>
            </div>
            <div class="container d-flex justify-content-center rounded-5 tombol">
                <button type="submit" class="button text-white mt-5 fs-4" name="submit" value="submit">LOGIN</button>
            </div>
        </form>
    </div>
    <p class="text-center mt-2 fs-5">Don't have an account? <a href="{{ url('/register') }}"><span
                class="text-decoration-underline fw-bold text-black">Register</span></a></p>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="bi bi-eye fs-4 pe-3"></i>' :
                '<i class="bi bi-eye-slash fs-4 pe-3"></i>';
        });
    </script>
</body>





</html>
