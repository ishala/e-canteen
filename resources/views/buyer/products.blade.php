<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ $style }}">
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
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light d-flex flex-row" style="height: 90px">
        <div class="mt-2 ms-2">
            <img src="/assets/logo1.png" alt="" class="navbar-brand">
        </div>
        <div class="container-fluid mt-2 col-10">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a @if ($title == 'Pembeli: Menu Utama') class="nav-link text-danger fw-bold" @endif
                            @if ($title == 'Pembeli: Detail Produk') class="nav-link text-danger fw-bold" @endif
                            class="nav-link text-dark}}" aria-current="page" href="{{ route('buyer') }}">Menu Utama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $title == 'Pembeli: Cari Produk' ? 'text-danger fw-bold' : 'text-dark' }}"
                            aria-current="page" href="{{ route('buyer.search-products') }}">Cari Produk</a>
                    </li>
                    <li class="nav-item">
                        <a @if ($title == 'Pembeli: Keranjang') class="nav-link text-danger fw-bold" @endif
                            @if ($title == 'Pembeli: Pilih Meja') class="nav-link text-danger fw-bold" @endif
                            @if ($title == 'Pembeli: Konfirmasi Pesanan') class="nav-link text-danger fw-bold" @endif
                            @if ($title == 'Pembeli: Pembayaran') class="nav-link text-danger fw-bold" @endif
                            @if ($title == 'Pembeli: Produk Penjual') class="nav-link text-danger fw-bold" @endif
                            class="nav-link text-dark" aria-current="page"
                            href="{{ route('buyer.cart') }}">Keranjang</a>
                    </li>
                    <li class="nav-item">
                        <a @if ($title == 'Pembeli: Pesanan') class="nav-link text-danger fw-bold" @endif
                            class="nav-link text-dark" aria-current="page"
                            href="{{ route('buyer.history-orders') }}">Pesanan</a>
                    </li>
                </ul>
            </div>
            <div class="me-5">
                <a href="{{ route('buyer.edit-profile', ['role' => $account->role, 'id' => $account->id]) }}">
                    <img src="/assets/logo-profile.png" alt="Profile Picture"
                        style="width: 45px; height: 45px; border-radius: 50px" /></a>
            </div>
        </div>
    </nav>


    <div class="content">
        @if ($title == 'Pembeli: Menu Utama')
            @include('partials.buyer.main_menu')
        @endif
        @if ($title == 'Pembeli: Keranjang')
            @include('partials.buyer.cart')
        @endif
        @if ($title == 'Pembeli: Detail Produk')
            @include('partials.buyer.detail_product')
        @endif
        @if ($title == 'Pembeli: Pembayaran')
            @include('partials.buyer.payment')
        @endif
        @if ($title == 'Pembeli: Cari Produk')
            @include('partials.buyer.search_product')
        @endif
        @if ($title == 'Pembeli: Pilih Meja')
            @include('partials.buyer.select_table')
        @endif
        @if ($title == 'Pembeli: Konfirmasi Pesanan')
            @include('partials.buyer.confirm_orders')
        @endif
        @if ($title == 'Pembeli: Pesanan')
            @include('partials.buyer.history_orders')
        @endif
        @if ($title == 'Pembeli: Produk Penjual')
            @include('partials.buyer.seller_products')
        @endif
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
