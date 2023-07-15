<div id="dataCategory" data-value="{{ $category }}"></div>

<div class="iklan d-flex flex-row mt-5">
    <div class="container col-6 w-50">

        <p class="fs-3 fw-bold">{{ $bestSeller->name }}</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi eaque velit alias laborum officia minus
            accusantium assumenda ratione quaerat nostrum!</p>
        <button type="submit" class="text-white mt-4" name="pesan" value="pesan">
            <p>Pesan Sekarang</p>
        </button>
    </div>
    <div class="col-6">
        <img src="/assets/nasgor_1.png" alt="">
    </div>
</div>

<div class="filter container d-flex flex-row">
    <form action="{{ route('buyer') }}" method="POST" class="kategori-form">
        @csrf
        <input type="hidden" name="category" value="0">
        <div class="col-3">
            <button type="submit" class="mt-4 kategori" name="semua" data-category="0">
                <p>Semua</p>
            </button>
        </div>
    </form>
    <form action="{{ route('buyer') }}" method="POST" class="kategori-form">
        @csrf
        <input type="hidden" name="category" value="1">
        <div class="col-3">
            <button type="submit" class="mt-4 kategori" name="makanan" data-category="1">
                <p>Makanan</p>
            </button>
        </div>
    </form>
    <form action="{{ route('buyer') }}" method="POST" class="kategori-form">
        @csrf
        <input type="hidden" name="category" value="2">
        <div class="col-3">
            <button type="submit" class="mt-4 kategori" name="minuman" data-category="2">
                <p>Minuman</p>
            </button>
        </div>
    </form>
    <form action="{{ route('buyer') }}" method="POST" class="kategori-form">
        @csrf
        <input type="hidden" name="category" value="3">
        <div class="col-3">
            <button type="submit" class="mt-4 kategori" name="topping" data-category="3">
                <p>Topping</p>
            </button>
        </div>
    </form>

</div>

<div class="wrapper d-flex ms-3">
    @foreach ($products as $product)
        <div class="card">
            <img src="/assets/buryam.png" class="card-img-top" alt="gambar produk">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                <p class="card-text">Dari Toko :</p>
                <p class="card-text">{{ $product->seller->name }}</p>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('buyer.detail-product', $product) }}" class="btn btn-light text-danger">Pesan</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
