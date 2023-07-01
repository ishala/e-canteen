<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ $title }}</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />

    <style>
        .profile-cover {
            height: 500px;
            margin-top: -200px;
            background-image: url("/assets/cafe.png");
            background-size: cover;
            background-position: center;
        }

        .profile-picture {
            width: 200px;
            border-radius: 50%;
            border: 5px solid #fff;
            margin-top: -200px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        }

        .submit-button {
            position: fixed;
            top: 20px;
            right: 20px;
        }
    </style>
</head>

<body>
    <!-- setting foto sampul dan logo mitra -->
    <header>
        <div class="profile-cover rounded-bottom-3">
            <div class="container mt-5">
                <a href="{{ route('admin.edit-mitra', ['seller' => $seller->id]) }}">
                    <button type="submit" class="btn btn-danger submit-button">
                        Edit Mitra
                    </button>
                </a>
            </div>
        </div>

        <div class="container mt-5 text-center">
            <img src="/assets/nasgor1.png" class="profile-picture mb-4 mt-100" alt="Foto Profil" />

            <h1 class="fw-bold">{{ $seller->name }}</h1>
            <div class="row text-muted mt-3">
                <!--Batas Sewa-->
                <div class="col order-last">
                    <h6>Lama Sewa</h6>
                    <p>{{ $seller->rent }} Tahun</p>
                </div>
                <!--Tanggal Bergabung-->
                <div class="col">
                    <h6>Nomor HP</h6>
                    <p>{{ $seller->phone }}</p>
                </div>
                <!--Nama Pemilik-->
                <div class="col order-first">
                    <h6>Nama Pemilik</h6>
                    <p>{{ $seller->owner }}</p>
                </div>
            </div>
        </div>
    </header>
    <!-- Content section-->
    <section class="py-5 bg-success-subtle">
        <div class="container text-center">
            <div class="row">
                <div class="col order-last">
                    <h3>Total Pendapatan</h3>
                    <p class="text-muted">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum
                        nesciunt voluptas, eius dolore facilis vitae explicabo molestiae
                        magnam, saepe illo doloremque veritatis reiciendis ipsam qui
                        placeat id blanditiis dicta perferendis!
                    </p>
                </div>
                <div class="col">
                    <h3>Product Terlaris</h3>
                    <p class="text-muted">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam
                        veritatis soluta natus nostrum, quaerat esse dolorum rem deleniti
                        tenetur quis itaque recusandae consequuntur aliquid? Corrupti
                        sequi eveniet totam obcaecati at?
                    </p>
                </div>
                <div class="col order-first">
                    <h3>Product Laku</h3>
                    <p class="text-muted">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quas sed
                        aliquam temporibus dicta veritatis tempore sapiente, sunt enim
                        ratione non accusantium. Quae fugit minus odit iste repudiandae
                        officia praesentium. Velit.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>
