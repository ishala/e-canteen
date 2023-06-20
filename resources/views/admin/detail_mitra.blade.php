<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/admin/detail-mitra.css">
    <title>Main Page : Admin</title>
</head>

<body>
    <!--Judul-->
    @include('/partials/admin/admin_title')

    <!--Isi-->
    <div class="container d-flex flex-row mt-5 content">
        <div class="box p-1 mt-5">
            <img src="/assets/cafe.png" alt="">
        </div>
        <div class="container-fluid d-flex flex-column inputan">
            <form>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold">Nama Toko</label><br>
                    <input type="text" id="input-nama" name="text-input" class="p-2"
                        placeholder="Masukkan nama mitra...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Nama Pemilik</label><br>
                    <input type="text" id="input-nama" name="text-input" class="p-2"
                        placeholder="Masukkan nama pemilik...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Email</label><br>
                    <input type="email" id="input-nama" name="text-input" class="p-2"
                        placeholder="Masukkan email...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Password</label><br>
                    <input type="password" id="input-nama" name="text-input" class="p-2"
                        placeholder="Masukkan password...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Nomor Telepon</label><br>
                    <input type="text" id="input-nama" name="text-input" class="p-2"
                        placeholder="Masukkan nomor telepon...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Waktu Sewa</label><br>
                    <input type="text" id="input-nama" name="text-input" class="p-2"
                        placeholder="Masukkan lama waktu...">
                </div>
            </form>
        </div>
    </div>

    <!--Tombol-->
    <div class="d-flex rounded-5 justify-content-center">
        <button type="submit" class="text-white mt-5 mb-3 fs-4" name="submit" value="submit">Simpan</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>





</html>
