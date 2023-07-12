<div id="dataCategory" data-value="{{ $category }}"></div>

<div class="container d-flex justify-content-center">
    <a href="{{ route('seller.add-product') }}">
        <button type="button" class="tambah mt-4">
            <p class="mt-3">Tambah Produk</p>
        </button>
    </a>
</div>

<div class="filter container d-flex flex-row">
    <form action="{{ route('seller.all-products') }}" method="POST" class="kategori-form">
        @csrf
        <input type="hidden" name="category" value="0">
        <div class="col-3">
            <button type="submit" class="kategori" name="semua" id="semua" data-category="0">
                Semua
            </button>
        </div>
    </form>
    <form action="{{ route('seller.all-products') }}" method="POST" class="kategori-form">
        @csrf
        <input type="hidden" name="category" value="1">
        <div class="col-3 ms-5">
            <button type="submit" class="kategori" name="makanan" id="makanan" data-category="1">
                Makanan
            </button>
        </div>
    </form>
    <form action="{{ route('seller.all-products') }}" method="POST" class="kategori-form">
        @csrf
        <input type="hidden" name="category" value="2">
        <div class="col-3 ms-5">
            <button type="submit" class="kategori" name="minuman" id="minuman" data-category="2">
                Minuman
            </button>
        </div>
    </form>
    <form action="{{ route('seller.all-products') }}" method="POST" class="kategori-form">
        @csrf
        <input type="hidden" name="category" value="3">
        <div class="col-3 ms-5">
            <button type="submit" class="kategori" name="topping" id="topping" data-category="3">
                Topping
            </button>
        </div>
    </form>
</div>

@if ($category == 0)
    <div class="wrapper d-flex mt-5 ms-5 flex-row">
        @foreach ($products as $product)
            <div class="card ms-2 col-3">
                <div class="card-body">
                    @if ($product->picture)
                        <img src="{{ asset('storage/' . $product->picture) }}" class="card-img-top" alt="...">
                    @else
                        <p class="fs-4 text-center" style="color: grey;">Tidak Ada <br> Gambar</p>
                    @endif
                    <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                    <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    <div class="d-flex flex-row-reverse mt-4">
                        <a href="{{ route('seller.edit-product', $product) }}"
                            class="btn btn-light text-danger">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

@if ($category != 0)
    @if ($count > 0)
        <div class="wrapper d-flex mt-5 ms-5">
            @foreach ($products as $product)
                <div class="card ms-2 col-3">
                    <div class="card-body">
                    @if ($product->picture)
                        <img src="{{ asset('storage/' . $product->picture) }}" class="card-img-top" alt="...">
                    @else
                        <p class="fs-4 text-center" style="color: grey;">Tidak Ada <br> Gambar</p>
                    @endif
                        <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                        <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                        <div class="d-flex flex-row-reverse mt-4">
                            <a href="{{ route('seller.edit-product', $product) }}"
                                class="btn btn-light text-danger">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center fs-3 nullProduct">Produk Belum Ditambahkan.</p>
    @endif
@endif
