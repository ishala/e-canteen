<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h4>Konfirmasi Pesanan</h4>
            <hr>
            <div class="card kotak border border-danger-subtle">
                <div class="card-body">
                    @foreach ($transaction as $transact)
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <img src="/assets/buryam2.png" class="img-fluid" alt="Product 1">
                            </div>
                            <div class="col-md-9">
                                <h5 class="card-title">{{ $transact->product->name }}</h5>
                                <p class="card-text">Harga: Rp. {{ number_format($transact->price, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h4>Meja Pengantaran</h4>
            <hr>
            <div class="row">
                <div class="col-sm-6">
                    <p class="nomor-meja">Meja No. {{ $seatNumber }}</p>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('buyer.select-table') }}" style="margin-left:20px; width:130px;" class="btn btn-outline-danger ">Ganti
                        Meja</a>
                </div>
            </div>
            <hr>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Transaksi</h5>
                    <p class="card-text">Jumlah produk: {{ $totalProduct }}</p>
                    <p class="card-text">Metode Pembayaran: {{ strtoupper($payment) }}</p>
                    <p class="card-text">Total harga: Rp. {{ number_format($totalPrice, 0, ',', '.') }}</p>
                    <div class="d-flex flex-column">
                        <a href="{{ route('buyer.payment') }}" class="btn btn-outline-success mb-3 col-12">Ubah Metode Pembayaran</a>
                        <button class="btn btn-danger col-12" id="pay" type="submit">
                            <p>Bayar</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- form ke database history transactions --}}
<form action="{{ route('buyer.paid') }}" method="POST" id="bayar">
    @csrf
    <input type="hidden" value="{{ $totalPrice }}" name="totalPrice">
    <input type="hidden" value="{{ $seatNumber }}" name="seatNumber">
    <input type="hidden" value="{{ $payment }}" name="payment">
    <input type="hidden" value="{{ $transaction }}" name="transaction">
</form>

<script>
    $(document).ready(function(){
        $('#pay').click(function() {
                // Ambil referensi ke elemen form
                let form = $('#bayar');
                // Setel aksi form ke URL yang diinginkan
                form.attr('action', "{{ route('buyer.paid') }}");
                // Kirimkan formulir secara manual
                form.submit();
            });
    })
</script>