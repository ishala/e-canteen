<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/styles/admin/detail-mitra.css">
    <title>{{ $title }}</title>

    <script>
        $(document).ready(function() {
            $('#save').click(function() {
                // Ambil referensi ke elemen form
                var form = $('#seller');
                // Setel aksi form ke URL yang diinginkan
                form.attr('action', "{{ route('admin.add-mitra-process') }}");
                // Kirimkan formulir secara manual
                form.submit();
            });
        });
    </script>
</head>


<body>
    <!--Judul-->
    <div class="container-fluid header d-flex flex-row justify-content-between">
        <p class="fs-2 mt-3 ms-3 fw-semibold">{{ $title }}</p>
        <p class="mt-4 me-4">Admin</p>
    </div>

    <!--Isi-->
    <div class="container d-flex flex-row mt-5 content">
        <div class="box p-1 mt-5">
            <img src="/assets/cafe.png" alt="">
        </div>
        <div class="container-fluid d-flex flex-column inputan">
            <form method="POST" action="{{ route('admin.add-mitra-process') }}" id="seller">
                @csrf
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold">Nama Toko</label><br>
                    <input type="text" id="name" name="name" class="p-2"
                        placeholder="Masukkan nama mitra...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Nama Pemilik</label><br>
                    <input type="text" id="owner" name="owner" class="p-2"
                        placeholder="Masukkan nama pemilik...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Email</label><br>
                    <input type="email" id="email" name="email" class="p-2" 
                        placeholder="Masukkan email...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Password</label><br>
                    <input type="password" id="password" name="password" class="p-2"
                        placeholder="Masukkan password...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Nomor Telepon</label><br>
                    <input type="text" id="phone" name="phone" class="p-2"
                        placeholder="Masukkan nomor telepon...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Waktu Sewa</label><br>
                    <input type="text" id="rent" name="rent" class="p-2"
                        placeholder="Masukkan lama waktu...">
                </div>
            </form>
        </div>
    </div>

    <!--Tombol-->
    <div class="d-flex rounded-5 justify-content-center">
        <button type="submit" class="text-white mt-5 mb-3 fs-4" name="submit" id="save">Simpan</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>





</html>
