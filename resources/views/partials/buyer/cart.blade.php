<h3 class="text-center text-black ">Daftar Keranjang</h3>


<style>
    .checkProduct input[type="checkbox"] {
        /* Mengatur ukuran checkbox */
        width: 25px;
        height: 25px;
    }
</style>

<div class="mt-5">
    <form action="{{ route('buyer.select-table-process') }}" method="POST" id="transactions">
        @csrf
        @foreach ($transaction as $trans)
            <div class="container border border-3 rounded-3 mb-4">
                <div class="p-4 d-flex flex-row list-produk justify-content-between align-items-center">
                    <div class="checkProduct">
                        <input name="productChecked[]" type="checkbox" value="{{ $trans->id }}" id="chkProduct">
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2">
                        <img src="/assets/nasgor1.png" class="img-fluid rounded-3" alt="Cotton T-shirt">
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-3">
                        <p class="lead fw-normal mb-2">
                        <h3>{{ $trans->product->name }}</h3>
                        </p>
                    </div>
                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <p class="lead fw-normal mb-2">
                        <h5 class="ms-5">X{{ $trans->quantity }}</h5>
                        </p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h5 class="mb-0">Rp. {{ number_format($trans->price, 0, ',', '.') }}</h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1">
                        <a href="{{ route('buyer.cart-delete', ['transact' => $trans]) }}"
                            class="text-danger fw-normal text-decoration-none">
                            <h3><i class="bi bi-trash3-fill"></i></h3>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
</div>
</form>

<button type="submit" class="btn btn-warning btn-block btn-lg tombol-pesan" id="buat-pesanan">
    <p class="text-center ms-1">Buat Pesanan</p>
</button>



<script>
    $('#buat-pesanan').click(function() {
        // Ambil referensi ke elemen form
        let form = $('#transactions');
        // Setel aksi form ke URL yang diinginkan
        form.attr('action', "{{ route('buyer.select-table-process') }}");
        // Kirimkan formulir secara manual
        form.submit();
    });
</script>
