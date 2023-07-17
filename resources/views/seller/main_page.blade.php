<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            let category = $('#dataCategory').data('value');
            let prevCat = -1;

            if (category == 0) {
                $('.kategori').eq(0).addClass('default');
            }
            $('.kategori[data-category="' + category + '"]').addClass('default');
            prevCat = 0;


            $('.kategori').click(function() {
                let category = $(this).data('category');
                if (prevCat !== category) {
                    $('.kategori[data-category="' + prevCat + '"]').removeClass('default');
                }
                $(this).addClass('default');
                prevCat = category;

                if (prevCat !== 0) {
                    $('.kategori').eq(0).removeClass('default');
                }
            });

            $('.kategori-form').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let action = form.attr('action');
                // Membuat elemen input tersembunyi dengan nilai kategori yang dipilih
                let inputCategory = $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'category')
                    .val();
                // Menggabungkan elemen input dengan form
                form.append(inputCategory);
                // Mengirimkan form
                form.unbind('submit').submit();
            });

            $('#formFile').change(function() {
                if (this.files && this.files[0]) {
                    let fileReader = new FileReader();
                    fileReader.onload = function(e) {
                        $('#gambar').attr('src', e.target.result);
                    }
                    fileReader.readAsDataURL(this.files[0]);
                } else {
                    $('#gambar').attr('src', '/assets/empty-picture.png');
                }
            })
        });
    </script>
    <link rel="stylesheet" href="{{ $style }}">
</head>


<body>
    <nav class="navbar navbar-expand-lg bg-light d-flex flex-row">
        <div class="col-2 mt-2 ms-2">
            <img src="/assets/logo-e-canteen.png" alt="" class="navbar-brand">
        </div>
        <div class="container-fluid mt-2 col-10 navigasi">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mt-1">
                        <a class="nav-link {{ $title == 'Dashboard Mitra' ? 'text-danger fw-bold' : 'text-dark' }}"
                            aria-current="page" href="{{ route('seller') }}">Dashboard</a>
                    </li>
                    <li class="nav-item mt-1">
                        <a @if ($title == 'Penjual: Tampil Produk') class="nav-link  text-danger fw-bold" @endif
                            @if ($title == 'Penjual: Tambah Produk') class="nav-link  text-danger fw-bold" @endif
                            @if ($title == 'Penjual: Edit Produk') class="nav-link  text-danger fw-bold" @endif
                            class="nav-link " href="{{ route('seller.all-products') }}">Semua Produk</a>
                    </li>
                    <li class="nav-item mt-1">
                        <a @if ($title == 'Penjual: Cari Produk') class="nav-link  text-danger fw-bold" @endif
                            class="nav-link text-dark" href="{{ route('seller.search-products') }}">Cari Produk</a>
                    </li>
                    <li class="nav-item mt-1">
                        <a class="nav-link  text-dark" href="#">Pendapatan</a>
                    </li>
                    <li class="nav-item mt-1">
                        <a @if ($title == 'Penjual: Lihat Pesanan') class="nav-link  text-danger fw-bold" @endif
                            @if ($title == 'Penjual: Detail Pesanan') class="nav-link  text-danger fw-bold" @endif
                            class="nav-link text-dark" href="{{ route('seller.incoming-orders') }}">Pesanan</a>
                    </li>
                    <li class="nav-item" style="margin-left: 350px;">
                        <a href="{{ route('seller.edit-profile', ['role' => $account->role, 'id' => $account->id]) }}">
                            <img src="/assets/profile.png" alt="" style="width:70px;">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @if ($title == 'Dashboard Mitra')
        @include('partials.seller.dashboard')
    @endif
    @if ($title == 'Penjual: Tampil Produk')
        @include('partials.seller.all_products')
    @endif
    @if ($title == 'Penjual: Tambah Produk')
        @include('partials.seller.add_product')
    @endif
    @if ($title == 'Penjual: Edit Produk')
        @include('partials.seller.edit_product')
    @endif
    @if ($title == 'Penjual: Cari Produk')
        @include('partials.seller.search_product')
    @endif
    @if ($title == 'Penjual: Lihat Pesanan')
        @include('partials.seller.incoming_orders')
    @endif
    @if ($title == 'Penjual: Detail Pesanan')
        @include('partials.seller.detail_orders')
    @endif
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

</body>
