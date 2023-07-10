@php
    $routeProcess = route('seller.search-products-process');
@endphp

<script>
    $(document).ready(function() {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let routeProcess = JSON.parse(`{!! json_encode($routeProcess) !!}`);

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
                    console.log(dataResult);
                    let dataProduct = dataResult.dataProduct;
                    let dataAll = dataResult.dataAll;

                    if (dataSearch.length > 0) {
                        $('#search-result').empty();
                        dataProduct.forEach(function(data) {
                            let name = data.name;
                            let price = data.price;
                            console.log(name);
                            let resultHTML = '<div class="card ms-3 mb-4 col-3">' +
                                '<img src="/assets/buryam.png" class="card-img-top" alt="...">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title fw-bold">' + name + '</h5>' +
                                '<p class="card-text">' + price + '</p>' +
                                '<div class="d-flex flex-row-reverse">' +
                                '<a href="#" class="btn btn-light text-danger">Detail</a>' +
                                '</div>' + '</div>' + '</div>';

                            $('#search-result').append(resultHTML);
                        });
                    } else {
                        $('#search-result').empty();
                        dataAll.forEach(function(data) {
                            let name = data.name;
                            let price = data.price;
                            console.log(name);
                            let resultHTML = '<div class="card ms-3 mb-4 col-3">' +
                                '<img src="/assets/buryam.png" class="card-img-top" alt="...">' +
                                '<div class="card-body">' +
                                '<h5 class="card-title fw-bold">' + name + '</h5>' +
                                '<p class="card-text">' + price + '</p>' +
                                '<div class="d-flex flex-row-reverse">' +
                                '<a href="#" class="btn btn-light text-danger">Detail</a>' +
                                '</div>' + '</div>' + '</div>';

                            $('#search-result').append(resultHTML);
                        });
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

<div class="bungkus d-flex flex-row mt-3 justify-content-center" id="search-result">
    @foreach ($products as $product)
        <div class="card ms-3 mb-4 col-3">
            <img src="/assets/buryam.png" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $product->name }}</h5>
                <p class="card-text">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                <div class="d-flex flex-row-reverse">
                    <a href="{{ route('seller.edit-product', $product) }} " class="btn btn-light text-danger">Detail</a>
                </div>
            </div>
        </div>
    @endforeach
    <!--Menu Tersedia-->
    {{-- {{ number_format($product->price, 0, ',', '.') }} --}}
    {{-- {{ route('seller.edit-product', $product) }} --}}
</div>
