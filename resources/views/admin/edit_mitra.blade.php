<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/admin/detail-mitra.css">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>{{ $title }}</title>

    <script>
        $(document).ready(function() {
            $('#save').click(function() {
                // Ambil referensi ke elemen form
                var form = $('#seller');
                // Setel aksi form ke URL yang diinginkan
                form.attr('action', "{{ route('admin.update-mitra', ['seller' => $seller]) }}");
                // Kirimkan formulir secara manual
                form.submit();
            });

            $('#formFile').change(function(){
                let fileReader = new FileReader();
                fileReader.onload = function(e) {
                    $('#gambar').attr('src', e.target.result);
                }
                fileReader.readAsDataURL(this.files[0]);
            })
            
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
    <form method="POST" action="{{ route('admin.update-mitra', ['seller' => $seller]) }}" id="seller">
        @csrf
        <input type="hidden" name="oldPicture" value="{{ $seller->picture }}">
        <div class="container d-flex flex-row mt-5 content">
            <div class="d-flex flex-column">
                @if ($seller->picture)
                    <div class="box p-1 mt-5">
                        <img src="{{ asset('storage/' . $seller->picture) }}" id="gambar" alt="...">
                    </div>
                @else
                    <div class="box p-1 mt-5">
                        <img src="/assets/cafe.png" id="gambar" alt="">
                    </div>
                @endif
                <div class="mt-3">
                    <input class="form-control" type="file" id="formFile" name="picture">
                </div>
            </div>
            <div class="container-fluid d-flex flex-column inputan">
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold">Nama Toko</label><br>
                    <input type="text" id="input-nama" name="name" class="p-2" value="{{ $seller->name }}"
                        placeholder="Masukkan nama mitra...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Nama Pemilik</label><br>
                    <input type="text" id="input-nama" name="owner" class="p-2" value="{{ $seller->owner }}"
                        placeholder="Masukkan nama pemilik...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Email</label><br>
                    <input type="email" id="input-nama" name="email" class="p-2" value="{{ $seller->email }}"
                        placeholder="Masukkan email...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Password</label><br>
                    <input type="password" id="input-nama" name="password" class="p-2"
                        value="{{ $seller->password }}" placeholder="Masukkan password...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Nomor Telepon</label><br>
                    <input type="text" id="input-nama" name="phone" class="p-2" value="{{ $seller->phone }}"
                        placeholder="Masukkan nomor telepon...">
                </div>
                <div class="input-teks">
                    <label for="input-nama" class="fw-semibold mt-2">Waktu Sewa</label><br>
                    <input type="text" id="input-nama" name="rent" class="p-2" value="{{ $seller->rent }}"
                        placeholder="Masukkan lama waktu...">
                </div>
    </form>
    </div>
    </div>

    <!--Tombol-->
    <div class="d-flex rounded-5 justify-content-center">
        <button type="submit" class="text-white mt-5 mb-3 fs-4" id="save">Simpan</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>





</html>
