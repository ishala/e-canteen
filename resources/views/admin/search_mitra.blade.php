<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ $style }}">
    <title>{{ $title }}</title>
    @php
        $routeProcess = route('admin.search-mitra-process');
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
                        let dataSeller = dataResult.dataSeller;
                        let dataAll = dataResult.dataAll;
 
                        if (dataSearch.length > 0) {
                            $('#search-result').empty();
                            dataSeller.forEach(function(data) {
                                let name = data.name;
                                console.log(name);
                                let resultHTML = '<div class="btn menu-item col-3">' +
                                    '<img src="https://asset.kompas.com/crops/Kyp-MBp3Kf0PLGveth_zzhU2gfI=/0x0:1000x667/750x500/data/photo/2020/07/11/5f09e008e7fee.jpg" alt="Menu 3" />' +
                                    '<p class="text-center">' + name + '</p>' +
                                    '</div>';

                                $('#search-result').append(resultHTML);
                            });
                        } else {
                            $('#search-result').empty();
                            dataAll.forEach(function(data) {
                                let name = data.name;
                                console.log(name);
                                let resultHTML = '<div class="btn menu-item col-3">' +
                                    '<img src="https://asset.kompas.com/crops/Kyp-MBp3Kf0PLGveth_zzhU2gfI=/0x0:1000x667/750x500/data/photo/2020/07/11/5f09e008e7fee.jpg" alt="Menu 3" />' +
                                    '<p class="text-center">' + name + '</p>' +
                                    '</div>';

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
</head>

<body>
    <div class="container-fluid atas d-flex flex-row justify-content-between bg-light">
        <img src="/assets/logo-e-canteen.png" alt="" class="logo">
        <p class="me-4 mt-3 fs-3">Admin</p>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!--Search Bar-->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" id="search-input" placeholder="Search" />
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container row-3 mt-3">
        <div>
            <div>
                <h3>Mitra Tersedia</h3>
            </div>
        </div>

        <div class="menu-container d-flex flex-row justify-content-center" id="search-result">
            @foreach ($sellers as $seller)
                <div class="btn menu-item col-3">
                    <img src="https://asset.kompas.com/crops/Kyp-MBp3Kf0PLGveth_zzhU2gfI=/0x0:1000x667/750x500/data/photo/2020/07/11/5f09e008e7fee.jpg"
                        alt="Menu 3" />
                    <p class="text-center"> {{ $seller->name }} </p>
                </div>
            @endforeach
        </div>
        <!--Menu Tersedia-->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
