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
    <div class="col-3">
        <button type="submit" class="text-white mt-4" name="pesan" value="pesan">
            <p>Semua</p>
        </button>
    </div>
    <div class="col-3">
        <button type="submit" class="text-white mt-4" name="pesan" value="pesan">
            <p>Makanan</p>
        </button>
    </div>
    <div class="col-3">
        <button type="submit" class="text-white mt-4" name="pesan" value="pesan">
            <p>Minuman</p>
        </button>
    </div>
    <div class="col-3">
        <button type="submit" class="text-white mt-4" name="pesan" value="pesan">
            <p>Topping</p>
        </button>
    </div>
</div>

<div class="wrapper d-flex ms-3">
    @foreach ($products as $product)
        <div class="card">
            <img src="/assets/buryam.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                <p class="card-text">Dari Toko :</p>
                <p class="card-text">{{ $product->seller->name }}</p>
                <div class="d-flex flex-row-reverse">
                    <a href="#" class="btn btn-light text-danger">Pesan</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
