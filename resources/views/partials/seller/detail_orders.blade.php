@php
    $routeProcess = route('seller.detail-orders-process');
@endphp

<p class="judul" style="margin-bottom: 50px; margin-top: 20px;"> <b>Detail Pesanan</b></p>

<div class="container d-flex flex-row" style="margin-top: -20px;">
    <div class="cardd row mb-5" style="max-width: 540px;">
        @foreach ($transactions as $transact)
            <div class="col">
                <div class="card-body">
                    <h5 class="card-title">{{ $transact->product->name }}</h5>
                    <p class="card-text">
                        <small class="text-muted">
                            @if ($transact->product->category == 1)
                                Makanan
                            @endif
                            @if ($transact->product->category == 2)
                                Minuman
                            @endif
                            @if ($transact->product->category == 3)
                                Topping
                            @endif
                        </small>
                    </p>
                    <p class="uang">Rp. {{ number_format($transact->product->price, 0, ',', '.') }} x
                        {{ $transact->quantity }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <img src="/assets/Nasgor.jpg" class="img-fluid foto" alt="...">
            </div>

            <div class="button mt-2 mb-4 tombol">
                @if ($transact->status == 'waiting')
                    <button type="button" value="accepted" data-id="{{ $transact->id }}"
                        class="btn btn-success rounded-pill me-3 accept">Terima</button>
                    <button type="button" value="declined" data-id="{{ $transact->id }}"
                        class="btn btn-danger rounded-pill decline">Tolak</button>
                @endif
                @if ($transact->status == 'accepted')
                    <button type="button" value="offered" data-id=" {{ $transact->id }}"
                        class="order btn btn-warning rounded-pill me-3">Antar</button>
                @endif
                @if ($transact->status == 'declined')
                    <button type="button" value="declined"
                        class="canceled btn btn-outline-danger disabled rounded-pill me-3">Dibatalkan</button>
                @endif
                @if ($transact->status == 'offered')
                    <button type="button" 
                        class="done btn btn-outline-warning text-warning fw-bold disabled rounded-pill me-3">Antar
                        Antar</button>
                @endif
                @if ($transact->status == 'done')
                    <button type="button" 
                        class="done btn btn-success disabled rounded-pill me-3">Selesai</button>
                @endif

            </div>
        @endforeach
    </div>

    <div class="row m-0 " style="max-width: 540px;">
        <div class="card-body meja col-12">
            <div class="card-title ">
                <p class="fs-4">Meja Pengantaran</p>
                <p class="fs-5 fw-light">Meja No. {{ $numTable }}</p>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card-body border border-dark rounded-3 kotak">
                <h5 class="card-title text-center mb-2">Detail Transaksi</h5>
                @foreach ($transactions as $transact)
                    <div class="card-text d-flex flex-row container">
                        <p class="col-8">{{ $transact->product->name }}</p>
                        <p class="col-4">Rp. {{ number_format($transact->price, 0, ',', '.') }}</p>
                    </div>
                @endforeach

                <hr>

                @php
                    $totalPrice = 0;
                    foreach ($transactions as $transact) {
                        $totalPrice += $transact->price;
                    }
                @endphp
                <div class="d-flex flex-row container">
                    <p class="col-8">Total Harga</p>
                    <p class="col-4">Rp {{ number_format($totalPrice, 0, ',', '.') }}</p>
                </div>
            </div>

        </div>


    </div>

    <script>
        $(document).ready(function() {
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            let routeProcess = JSON.parse(`{!! json_encode($routeProcess) !!}`);

            // Event delegation untuk menangani klik pada tombol "Terima"
            //value="accepted"
            $(document).on('click', '.accept', function() {
                let allBtnCover = $(this).closest('.tombol');
                allBtnCover.empty();

                let valBtn = $(this).val();

                let transactId = $(this).data('id');
                console.log(transactId);

                $.ajax({
                    url: routeProcess,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        status: valBtn,
                        transId: transactId
                    },
                    success: function(response) {
                        let newStatus = response;
                        console.log(newStatus);
                        let newButton =
                            '<button type="button" value="offered" data-id="' + transactId +
                            '" class="order btn btn-warning rounded-pill me-3">Antar</button>';
                        allBtnCover.append(newButton);

                        console.log('Status Transaksi Berubah Menjadi ' + newStatus);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error', error);
                    }
                });
            });

            // Event delegation untuk menangani klik pada tombol "Tolak"
            // value="declined"
            $(document).on('click', '.decline', function() {
                let allBtnCover = $(this).closest('.tombol');
                allBtnCover.empty();

                let valBtn = $(this).val();

                let transactId = $(this).data('id');
                console.log(transactId);

                $.ajax({
                    url: routeProcess,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        status: valBtn,
                        transId: transactId
                    },
                    success: function(response) {
                        let newStatus = response;
                        console.log(newStatus);
                        let newButton =
                            '<button type="button" value="canceled" class="canceled btn btn-outline-danger disabled rounded-pill me-3">Dibatalkan</button>';
                        allBtnCover.append(newButton);

                        console.log('Status Transaksi Berubah Menjadi ' + newStatus);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error', error);
                    }
                });
            });

            // Event delegation untuk menangani klik pada tombol "Antar"
            //
            $(document).on('click', '.order', function() {
                let allBtnCover = $(this).closest('.tombol');
                allBtnCover.empty();

                let valBtn = $(this).val();

                let transactId = $(this).data('id');
                console.log(transactId);
                $.ajax({
                    url: routeProcess,
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    data: {
                        status: valBtn,
                        transId: transactId
                    },
                    success: function(response) {
                        let newStatus = response;
                        console.log(newStatus);
                        let newButton =
                            '<button type="button" class="done btn btn-outline-warning text-warning fw-bold disabled rounded-pill me-3">On Going</button>';
                        allBtnCover.append(newButton);

                        console.log('Status Transaksi Berubah Menjadi ' + newStatus);
                    },
                    error: function(xhr, status, error) {
                        console.log('Error', error);
                    }
                });
            });
        });
    </script>
