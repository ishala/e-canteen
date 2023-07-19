<div class="container title ">
    <div class="title d-flex flex-row">
        <img class="col-2" src="/assets/logo-bu-siti.png" style="height: 200px;">
        <div class="col-5 mt-4 ms-5">
            <h3><b>{{ $seller->name }}</b></h3>
        </div>
        <div class="col-5 mt-3">
            <p class="fw-bold">Yang Sudah Beli</p>
            <p>{{ $ordered }} orang</p>
        </div>

    </div>
</div>


<div class="container ">
    <div class="judul">
        <p class="fs-4">Menu Tersedia</p>
    </div>

    <div class="kartu row row-cols-1 row-cols-md-3 g-4">
        @foreach($products as $product)
        <div class="konten col">
            <div class="card  d-flex flex-column shadow">
                <img src="/assets/Nasgor.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ $product->description }}</p>
                    <p>Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                    <a href="{{ route('buyer.detail-product', $product) }}">
                        <button type="button" class="btn1 btn btn-outline-danger rounded-pill">Pesan</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>