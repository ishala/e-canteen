<div class="container">
    <h3 style="text-align: center; margin-top: 20px;"><b>Pesanan Masuk</b></h3>
    @foreach ($transactions as $numTable => $tables)
        <div class="konten ">
            <div class="isi mt-5">
                <div class="card mb-3 shadow-sm" style="max-width: 700px;">
                    <div class="row g-0">
                        <div class="col">
                            <img src="/assets/Nasgor.jpg" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col ms-3">
                            <div class="card-body">
                                <h4 class="card-title mt-3"><b>Meja No. {{ $numTable }}</b></h4>

                                @php
                                // menghitung banyak table yang ada di dalam per grup meja
                                    $totalOrders = $tables->count();
                                    $totalPrice = 0;

                                //Menghitung jumlah harga transaksi per meja
                                    foreach ($tables as $table) {
                                        $totalPrice += $table->price;
                                    }
                                @endphp

                                <h5 class="card-text mt-3"><small class="text-muted">{{ $totalOrders }} pesanan</small></h5>
                                <p class="card-text fs-4 mt-3">Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <div class="col">
                            <a href="{{ route('seller.detail-orders', ['tables' => $numTable]) }}">
                                <button type="button" class="btn btn-outline-danger rounded-pill"
                                    style="margin-top: 70px; margin-left: 55px;">Detail Pesanan</button>
                            </a>
                        </div>
                    </div>
                </div>
    @endforeach
</div>
</div>
</div>
