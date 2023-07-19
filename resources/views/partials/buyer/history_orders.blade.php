@php
    $routeProcess = route('seller.detail-orders-process');
@endphp

<div>
    <div class="container mt-4 h-50 w-25 rounded-pill shadow-sm">
        <p class="title"><b>Riwayat Pesanan</b></p>
    </div>
    @if ($transactions->count() < 1)
        <h4 class="text-center">Histori kosong, pesan dulu dong...</h4>
    @else
        @foreach ($transactions as $transact)
            <div class="container-fluid text-center">
                <div class="row">
                    <div class="col gambar image-with-text">
                        <img src="/assets/nasgor1.png" class="mt-5">
                        <div class="d-flex flex-column mt-5">
                            <div class="row">
                                <p class="fs-4">{{ $transact->product->name }}</p>
                            </div>
                            <div class="row">
                                <p>{{ $transact->seller->name }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <p style="margin-top:80px; font-size:20px;">{{ $createdDate }}</p>
                    </div>
                    <div class="col">
                        <div class="status">
                            <p style="margin-right:280px; font-size:20px;"
                                @if ($transact->status == 'waiting') class="text-danger fw-bold" @endif
                                @if ($transact->status == 'accepted') class="text-primary fw-bold" @endif
                                @if ($transact->status == 'offered') class="text-primary fw-bold" @endif
                                @if ($transact->status == 'done') class="text-success fw-bold" @endif
                                @if ($transact->status == 'declined') class="text-danger fw-bold" @endif
                                class="text-dark fw-bold">
                                {{ strtoupper($transact->status) }}
                            </p>
                        </div>

                        <div class="tombol">
                            @if ($transact->status == 'accepted')
                                <button type="button"
                                    class="btn btn-outline-danger rounded-pill disabled">Diterima</button>
                            @endif
                            @if ($transact->status == 'offered')
                                <button type="button" class="btn btn-outline-danger rounded-pill done" value="done"
                                    data-id="{{ $transact->id }}">Diterima</button>
                            @endif
                            @if ($transact->status == 'declined')
                                <button type="button" class="btn btn-danger-outline disabled rounded-pill">Tidak
                                    Ada</button>
                            @endif
                            @if ($transact->status == 'done')
                            <a href="{{ route('buyer.detail-product', $transact->product) }}">
                                <button type="button" class="btn btn-danger rounded-pill">Pesan Lagi</button>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr class="garis" width="50%">
        @endforeach
    @endif

</div>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        let routeProcess = JSON.parse(`{!! json_encode($routeProcess) !!}`);


        $(document).on('click', '.done', function() {
            let allBtnCover = $(this).closest('.tombol');
            allBtnCover.empty();

            // Ambil elemen .status yang berada dalam satu kontainer dengan tombol yang diklik
            let txtStatus = allBtnCover.siblings('.status');
            txtStatus.empty();

            let valBtn = $(this).val();

            let transactId = $(this).data('id');

            $.ajax({
                url: routeProcess,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: {
                    status: valBtn,
                    transId: transactId
                },
                success: function(response) {
                    let newStatus = response;
                    console.log(newStatus);

                    //tambah button baru
                    let newButton =
                        '<button type="button" class="btn btn-danger rounded-pill">Pesan Lagi</button>';
                    allBtnCover.append(newButton);

                    // tambah status baru
                    let newText =
                        '<p style="margin-right:280px; font-size:20px;" class="text-success fw-bold">DONE</p>';

                    txtStatus.append(newText);

                    console.log('Status Transaksi Berubah Menjadi ' + newStatus);
                },
                error: function(xhr, status, error) {
                    console.log('Error', error);
                }
            });
        });
    })
</script>
