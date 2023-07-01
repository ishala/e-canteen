<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ $style }}">

    <script>
        $(document).ready(function() {
            var totalDelete = 0;
            $('#delText').text(totalDelete);

            $('input[name="sellerChecked[]"]').change(function() {
                totalDelete = $('input[name="sellerChecked[]"]:checked')
                .length; // Hitung jumlah checkbox yang terceklis
                $('#delText').text(totalDelete);
            });

            $('#hapus').click(function() {
                // Ambil referensi ke elemen form
                var form = $('#seller');
                // Setel aksi form ke URL yang diinginkan
                form.attr('action', "{{ route('admin.delete-mitra') }}");
                // Kirimkan formulir secara manual
                form.submit();
            });
        });
    </script>

    <title>{{ $title }}</title>
</head>


<body>
    <!--Judul-->
    <div class="container-fluid atas d-flex flex-row justify-content-between bg-light">
        <img src="/assets/logo-e-canteen.png" alt="" class="plus">
        <p class="me-4">Admin</p>
    </div>

    <!--Tombol-->
    <div class="container-fluid tombol d-flex flex-row row mt-2">
        <div class="container col-2 d-flex flex-row">
            <div class="container d-flex btn tambah col-4 ms-2">
                <a href="{{ route('admin.add-mitra') }}" class="d-flex flex-row text-decoration-none">
                    <img src="/assets/plus.png" class="mt-1 col-2" alt="tambah">
                    <p class="mt-1 ms-4 col-10">Tambah Mitra</p>
                </a>
            </div>
        </div>
        <div class="container col-7"></div>
        <div class="container col-3 d-flex flex-row justify-content-end">
            <div class="container d-flex btn revenue col-4 me-3">
                <a href="{{ route('admin.search-mitra') }}" class="d-flex flex-row text-decoration-none">
                    <img src="/assets/revenue.png" class="mt-1 ms-3" alt="revenue">
                    <p class="mt-1 ms-3 fs-5 fw-medium">Pendapatan</p>
                </a>
            </div>
            <div class="container d-flex btn cari col-4">
                <a href="{{ route('admin.search-mitra') }}" class="d-flex flex-row text-decoration-none">
                    <img src="/assets/search.png" class="mt-1" alt="tambah">
                </a>
            </div>
        </div>
    </div>

    <!--Menu-->
    <form action="{{ route('admin.delete-mitra') }}" method="POST" id="seller">
        @csrf
        <div class="container d-flex flex-row baris-kartu row justify-content-center">
            @foreach ($sellers as $seller)
                <div class="card col-3 ms-3 mt-2">
                    <img src="/assets/buryam.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $seller->name }}</h5>
                        <p class="card-text">Pengunjung Hari Ini </p>
                        <p class="card-text">15 Orang </p>
                        <div class="d-flex flex-row">
                            <input type="checkbox" id="check" name="sellerChecked[]" value="{{ $seller->id }}">
                            <a href="{{ route('admin.detail-mitra', $seller) }}"
                                class="btn btn-light detail text-danger border border-1">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </form>
    <div class="container-fluid kotak-hapus d-flex flex-row justify-content-center">
        <button class="btn border border-2 text-danger" id="hapus">Hapus (<span id="delText"></span>)</button>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
