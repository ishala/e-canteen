<div class="container">
    <h3 style="text-align: center; margin-top: 20px;"><b>Pesanan Masuk</b></h3>
    <div class="konten ">

        <div class="isi mt-5">
            <div class="card mb-3 shadow-sm" style="max-width: 700px;">
                <div class="row g-0">
                    <div class="col">
                        <img src="/assets/Nasgor.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col">
                        <div class="card-body">
                            <h5 class="card-title"><b>Meja No 6, Lantai 2</b></h5>
                            <p class="card-text"><small class="text-muted">5 item pesanan</small></p>
                            <p class="card-text">Rp 45.000</p>
                        </div>
                    </div>
                    <div class="col">
                        <a href="{{ route('seller.detail-orders') }}">
                            <button type="button" class="btn btn-outline-danger rounded-pill"
                                style="margin-top: 15px; margin-left: 55px;">Detail Pesanan</button>
                        </a>
                        <button type="button" class="btn btn-success rounded-pill"
                            style="margin-top: 85px; margin-left: 35px;">Terima</button>
                        <button type="button" class="btn btn-danger rounded-pill"
                            style="margin-top: 85px; margin-left: 35px;">Tolak</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
