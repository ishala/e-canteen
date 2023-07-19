<p class="fs-3 fw-bold mt-4 ms-5">Selamat Datang, {{ $account->owner }}!</p>
    <div class="container-fluid px-5 mt-5">
        <div class="row d-flex justify-content-around">
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Pendapatan</p>
                <p class="fs-2 fw-bold text-center">Rp. {{ number_format($totalIncome, 0, ',', '.') }}</p>

            </div>
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Pesanan</p>
                <p class="fs-2 fw-bold text-center">{{ $totalOrders }}</p>
            </div>
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Produk</p>
                <p class="fs-2 fw-bold text-center">{{ $totalProducts }}</p>
            </div>
        </div>
    </div>
