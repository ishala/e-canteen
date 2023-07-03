<p class="fs-3 fw-bold mt-4 ms-5">Selamat Datang, {{ $account->name }}!</p>
    <div class="container-fluid px-5 mt-5">
        <div class="row d-flex justify-content-around">
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Earnings</p>
                <p class="fs-2 fw-bold text-center">Rp. 3.242.144</p>

            </div>
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Users</p>
                <p class="fs-2 fw-bold text-center">24</p>
            </div>
            <div class="container data-penjualan col">
                <p class="fs-4 text-center mt-5">Total Products</p>
                <p class="fs-2 fw-bold text-center">{{ $totalProducts }}</p>
            </div>
        </div>
    </div>
