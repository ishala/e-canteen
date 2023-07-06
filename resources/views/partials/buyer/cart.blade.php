<h3 class="text-center text-black ">Daftar Keranjang</h3>

<div class="list-produk mt-5">
    @foreach ($transaction as $trans)
        <div class="container produk d-flex flex-row mt-4">
            <div class="col-3 mt-3">
                <img src="/assets/nasgor1.png" class="img-fluid rounded-3" alt="Cotton T-shirt" />
            </div>
            <div class="col-6">
                <h2 class="fw-normal  mt-3 text-center">{{ $trans->product->name }}</h2>
                <div class="d-flex flex-row">
                    <div class="col-6">
                        <p class="fw-bold fs-4"> Banyak Produk</p>
                        <p class="nilai1 text-danger">{{ $trans->quantity }}</p>
                    </div>
                    <div class="col-6">
                        <p class="fw-bold fs-4" style="margin-left: 70px;">Total Harga</p>
                        <p class="nilai2 text-danger">Rp. {{ number_format($trans->price, 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>
            <a href="{{ route('buyer.cart-delete', ['transact' => $trans]) }}">
                <p class="fs-3 fw-bold ms-5 mt-5">Hapus</p>
            </a>
        </div>
    @endforeach
</div>

<form action="{{ route('buyer.payment-process') }}" method="POST">
    @csrf
    <input type="hidden" value="{{ $transaction }}" name="transaction">
    <button type="submit" class="btn btn-warning mt-3">
        Buat Pesanan
    </button>
</form>
