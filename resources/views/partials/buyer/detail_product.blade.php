<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ $style }}">

    <script>
        $(document).ready(function() {
            let qty = 0;
            $('.tambah').click(function() {
                if (qty >= 0) {
                    qty++;
                    $('.kuantitas').text(qty);

                    $(this).addClass('scale');
                    setTimeout(() => {
                        $('.tambah').removeClass('scale');
                    }, 200);

                    parseInt($('#quantity').val(qty));
                    let kuantitas = $('#quantity').val();
                    console.log('ini kuantitas ' + kuantitas);
                }
            })
            $('.kurang').click(function() {
                if (qty > 0) {
                    qty--;
                    $('.kuantitas').text(qty);

                    $(this).addClass('scale');
                    setTimeout(() => {
                        $('.kurang').removeClass('scale');
                    }, 200);

                    parseInt($('#quantity').val(qty));
                    let kuantitas = $('#quantity').val();
                    console.log('ini kuantitas ' + kuantitas);
                }

            })
            $('.keranjang').click(function() {
                // Ambil referensi ke elemen form
                var form = $('#cart');
                // Setel aksi form ke URL yang diinginkan
                form.attr('action', "{{ route('buyer.cart-process') }}");
                // Kirimkan formulir secara manual
                form.submit();
            })

            $('.beli').click(function() {
                // Ambil referensi ke elemen form
                var form = $('#cart');
                // Setel aksi form ke URL yang diinginkan
                form.attr('action', "{{ route('buyer.select-table-process') }}");
                // Kirimkan formulir secara manual
                form.submit();
            })
        })
    </script>
</head>

<body>
    <p class="text-center fw-bold fs-2 mt-4">Pesan Produk</p>

    <div class="container d-flex flex-row mt-5">
        <div class="col-5">
            <img src="/assets/buryam2.png" alt="">
        </div>
        <div class="col-7 d-flex flex-column">
            <div class="d-flex flex-row">
                <div class="col-6 d-flex flex-column">
                    <h3>{{ $product->name }}</h3>
                    @if ($product->category == 1)
                        <p class="fw-light text-secondary fs-5">Makanan</p>
                    @endif
                    @if ($product->category == 2)
                        <p class="fw-light text-secondary fs-5">Minuman</p>
                    @endif
                    @if ($product->category == 3)
                        <p class="fw-light text-secondary fs-5">Topping</p>
                    @endif
                    <p class="fw-bold fs-5">Rp.
                        {{ number_format($product->price, 0, ',', '.') }}</p>
                </div>
            </div>
            <p class="deskripsi"> {{ $product->description }}</p>


            <div class="container d-flex flex-row">
                <img src="/assets/plus_qty.png" class="tambah" alt="">
                <p class="ms-4 fs-3 kuantitas">0</p>
                <img src="/assets/minus_qty.png" class="kurang ms-4" alt="">
            </div>
        </div>
    </div>

    <form action="{{ route('buyer.cart-process') }}" id="cart" method="POST">
        @csrf
        <input type="hidden" name="quantity" id="quantity">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="price" value="{{ $product->price }}">
    </form>

    <form action="{{ route('buyer.select-table-process') }}" id="table" method="POST">
        @csrf
        <input type="hidden" name="quantity" id="quantity">
        <input type="hidden" name="product_id" value="{{ $product->id }}">
    </form>


    <div class="container d-flex flex-row justify-content-end">
        <button type="submit" class="mt-4 me-3 keranjang">
            Add Cart
        </button>
        <button type="submit" class="mt-4 beli">
            Buy Now
        </button>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
