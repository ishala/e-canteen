@php
    $routeProcess = route('buyer.search-products-process');
@endphp





<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!--Search Bar-->
            <form class="d-flex">
                <input class="form-control me-2" type="search" id="search-input" placeholder="Search" />
                <button class="btn btn-danger" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<h2 class="ms-5 mt-3">Mitra Tersedia</h2>

<div class="menu-container wrapper-seller d-flex flex-row justify-content-center" id="search-result-seller">
    @foreach ($sellers as $seller)
        <div class="btn menu-item col-3 me-3">
            <img src="https://asset.kompas.com/crops/Kyp-MBp3Kf0PLGveth_zzhU2gfI=/0x0:1000x667/750x500/data/photo/2020/07/11/5f09e008e7fee.jpg"
                alt="Menu 3" />
            <p class="text-center">{{ $seller->name }}</p>
        </div>
    @endforeach
</div>

<h2 class="ms-5 mt-5">Produk Tersedia</h2>

<div class="wrapper-product d-flex ms-3" id="search-result-product">
    @foreach ($products as $product)
        <div class="card mb-4">
            <img src="/assets/buryam.png" class="card-img-top" alt="gambar produk">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                <p class="card-text">Dari Toko :</p>
                <p class="card-text">{{ $product->seller->name }}</p>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('buyer.detail-product', $product) }}" id="pesan"
                        class="btn btn-light text-danger">Pesan</a>
                </div>
            </div>
        </div>
    @endforeach

</div>



<script>
    $(document).ready(function() {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let routeProcess = JSON.parse(`{!! json_encode($routeProcess) !!}`);
        let allProduct = $(`@foreach ($products as $product)
        <div class="card mb-4">
            <img src="/assets/buryam.png" class="card-img-top" alt="gambar produk">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                <p class="card-text">Dari Toko :</p>
                <p class="card-text">{{ $product->seller->name }}</p>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('buyer.detail-product', $product) }}" id="pesan"
                        class="btn btn-light text-danger">Pesan</a>
                </div>
            </div>
        </div>
    @endforeach`);
        let allSeller = $(`@foreach ($sellers as $seller)
        <div class="btn menu-item col-3 me-3">
            <img src="https://asset.kompas.com/crops/Kyp-MBp3Kf0PLGveth_zzhU2gfI=/0x0:1000x667/750x500/data/photo/2020/07/11/5f09e008e7fee.jpg"
                alt="Menu 3" />
            <p class="text-center">{{ $seller->name }}</p>
        </div>
    @endforeach`)

        $('#search-input').keyup(function() {
            let dataSearch = $(this).val();
            $.ajax({
                url: routeProcess,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    query: dataSearch,
                },
                success: function(response) {
                    let dataResult = response;
                    let dataFoundSeller = dataResult.dataFoundSeller;
                    let dataFoundProduct = dataResult.dataFoundProduct;

                    console.log(dataFoundProduct);
                    if (dataSearch.length > 0) {
                        $('#search-result-seller').empty();
                        $('#search-result-product').empty();

                        dataFoundSeller.forEach(function(data) {
                            let name = data.name;

                            let resultHTML = '<div class="btn menu-item col-3 me-3">' +
                                '<img src="https://asset.kompas.com/crops/Kyp-MBp3Kf0PLGveth_zzhU2gfI=/0x0:1000x667/750x500/data/photo/2020/07/11/5f09e008e7fee.jpg"alt = "Menu 3" / > ' +
                                '<p class="text-center">' + name + '</p>' +
                                '</div>';

                            $('#search-result-seller').append(resultHTML);
                        });
                        dataFoundProduct.forEach(function(data) {
                            let name = data.name;
                            let price = data.price;
                            let sellerName = data.seller.name;
                            let link =
                                "{{ route('buyer.detail-product', ':product') }}"
                                .replace(':product', data.id);

                            let resultHTML = '<div class="card mb-4">' +
                                '<img src="/assets/buryam.png" class="card-img-top" alt="gambar produk">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title fw-bold">' + name + '</h5>' +
                                '<p class="card-text">Dari Toko :</p>' +
                                '<p class="card-text">' + sellerName + '</p>' +
                                '<a href="' + link +
                                '" class="btn btn-light text-danger">Pesan</a>' +
                                '</div>' + '</div>';

                            $('#search-result-product').append(resultHTML);
                        });

                    } else {
                        $('#search-result-seller').empty();
                        $('#search-result-product').empty();

                        $('#search-result-seller').append(allSeller);
                        $('#search-result-product').append(allProduct);
                    }
                    console.log('Berhasil Mencari Data');
                },
                error: function(xhr, status, error) {
                    console.log('Error', error);
                }
            });

        });
    });
</script>
