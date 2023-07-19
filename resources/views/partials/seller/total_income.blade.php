<div class="container" style="margin-left: 15%;">
    @foreach ($transactions as $transact)
        <div class="row mb-3">
            <div class="col-12 col-xl-10 mx-auto">
                <!-- Terapkan border pada div ini -->
                <div class="row col-xl-10 py-3 rounded-5 shadow rounded-5" style="height: 150px;">
                    <div class="col-3">
                        <img src="/assets/cafe.png" class="rounded-4" style="width:150px;">
                    </div>
                    <div class="col-5 d-flex align-items-center large-text1"><b>{{ $transact->product->name }}</b>
                    </div>
                    <div class="col-4 d-flex align-items-center justify-content-center large-text"
                        style="color: #46E84D;">Rp. {{ number_format($transact->price, 0, ',', '.') }}</div>
                </div>
            </div>
        </div>
    @endforeach
</div>
